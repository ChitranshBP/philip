<?php
/**
 * Contact / free-consultation form handler.
 *
 * Uses PHP's mail(). If the host doesn't have a configured MTA, swap the
 * send() call for SMTP (PHPMailer / Symfony Mailer) — see README.md.
 * Every submission is also appended to storage/leads.csv as a backup so a
 * mail failure never loses a lead.
 */

/* The static build (build.php) includes the pages from the CLI, where there is
   no request and no session to speak of. */
if (PHP_SAPI !== 'cli' && session_status() === PHP_SESSION_NONE) {
    session_start();
}

$form = [
    'status' => null,   // 'success' | 'error'
    'message' => '',
    'errors' => [],
    'old' => [],
];

// Pick up a flash message after the post/redirect/get bounce.
if (!empty($_SESSION['form_flash'])) {
    $form = array_merge($form, $_SESSION['form_flash']);
    unset($_SESSION['form_flash']);
}

if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_POST['contact_form'])) {

    $field = static function (string $key): string {
        return trim((string) ($_POST[$key] ?? ''));
    };

    $data = [
        'name'     => $field('name'),
        'phone'    => $field('phone'),
        'email'    => $field('email'),
        'zip'      => $field('zip'),
        'interest' => $field('interest'),
        'best_time'=> $field('best_time'),
        'message'  => $field('message'),
    ];

    $errors = [];

    // --- Spam traps -------------------------------------------------
    $isSpam = $field('website') !== '';                       // honeypot
    $started = (int) ($_POST['started_at'] ?? 0);
    if ($started && (time() - $started) < 3) {
        $isSpam = true;                                        // submitted too fast
    }

    // --- Validation -------------------------------------------------
    if ($data['name'] === '' || mb_strlen($data['name']) < 2) {
        $errors['name'] = 'Please tell us your name.';
    }

    $digits = preg_replace('/\D+/', '', $data['phone']);
    if ($data['phone'] === '') {
        $errors['phone'] = 'Please add a phone number so Philip can call you back.';
    } elseif (strlen($digits) < 10) {
        $errors['phone'] = 'That phone number looks a little short — please check it.';
    }

    if ($data['email'] !== '' && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Please check the email address.';
    }

    if ($data['zip'] !== '' && !preg_match('/^\d{5}(-\d{4})?$/', $data['zip'])) {
        $errors['zip'] = 'Please enter a 5-digit ZIP code.';
    }

    if (mb_strlen($data['message']) > 4000) {
        $errors['message'] = 'Please keep your message under 4,000 characters.';
    }

    // Header-injection guard.
    foreach (['name', 'email', 'phone'] as $k) {
        if (preg_match('/[\r\n]/', $data[$k])) {
            $errors[$k] = 'Please remove line breaks from this field.';
        }
    }

    if ($isSpam) {
        // Pretend it worked; don't tell the bot anything useful.
        $flash = ['status' => 'success', 'message' => 'Thank you! Your request has been sent.'];
    } elseif ($errors) {
        $flash = [
            'status'  => 'error',
            'message' => 'Please fix the highlighted fields and send again.',
            'errors'  => $errors,
            'old'     => $data,
        ];
    } else {
        // --- Backup to CSV -----------------------------------------
        $dir = __DIR__ . '/../storage';
        if (!is_dir($dir)) {
            @mkdir($dir, 0775, true);
        }
        if (is_dir($dir) && ($fh = @fopen($dir . '/leads.csv', 'a')) !== false) {
            if (flock($fh, LOCK_EX)) {
                if (ftell($fh) === 0) {
                    fputcsv($fh, ['received_at', 'name', 'phone', 'email', 'zip', 'interest', 'best_time', 'message', 'ip']);
                }
                fputcsv($fh, array_merge(
                    [date('c')],
                    array_values($data),
                    [$_SERVER['REMOTE_ADDR'] ?? '']
                ));
                fflush($fh);
                flock($fh, LOCK_UN);
            }
            fclose($fh);
        }

        // --- Email --------------------------------------------------
        $subject = 'New consultation request — ' . $data['name'];

        $body = "A new request came in from the website.\n\n"
              . "Name:        {$data['name']}\n"
              . "Phone:       {$data['phone']}\n"
              . "Email:       " . ($data['email'] ?: '—') . "\n"
              . "ZIP:         " . ($data['zip'] ?: '—') . "\n"
              . "Interested in: " . ($data['interest'] ?: '—') . "\n"
              . "Best time:   " . ($data['best_time'] ?: '—') . "\n\n"
              . "Message:\n" . ($data['message'] ?: '—') . "\n\n"
              . "-- \nSent " . date('D, j M Y g:i a') . " from " . ($_SERVER['HTTP_HOST'] ?? 'the website');

        $headers = [
            'From: ' . ($SITE['brand'] ?? 'Website') . ' <' . ($SITE['form_from'] ?? 'no-reply@localhost') . '>',
            'Content-Type: text/plain; charset=UTF-8',
            'X-Mailer: PHP/' . phpversion(),
        ];
        if ($data['email'] !== '') {
            $headers[] = 'Reply-To: ' . $data['email'];
        }

        $sent = @mail(
            $SITE['form_to'] ?? '',
            $subject,
            $body,
            implode("\r\n", $headers)
        );

        $flash = $sent
            ? [
                'status'  => 'success',
                'message' => 'Thank you, ' . $data['name'] . '. Your request is on its way — Philip will call you back within one business day.',
              ]
            : [
                'status'  => 'error',
                'message' => 'We saved your request, but the email didn\'t go through. Please call ' . ($SITE['phone'] ?? '') . ' so we don\'t keep you waiting.',
                'old'     => $data,
              ];
    }

    $_SESSION['form_flash'] = $flash;

    $target = strtok($_SERVER['REQUEST_URI'] ?? '/', '?') . '#contact';
    header('Location: ' . $target, true, 303);
    exit;
}
