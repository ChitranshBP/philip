<?php
/**
 * Site configuration
 * ------------------------------------------------------------------
 * PLACEHOLDER DATA — replace every value marked "TODO" with Philip's
 * real business details before this site goes live.
 */

$SITE = [
    // ---- Identity -------------------------------------------------
    'agent_name'   => 'Philip Smith',
    'agent_title'  => 'Licensed Insurance Agent',
    'brand'        => 'Philip Smith',
    'company'      => 'Trucare Insurance Agency',
    'brand_sub'    => 'Medicare & Senior Benefits',
    'tagline'      => 'No jargon. No pressure. Just Trucare.',   // Philip's line — use it as-is

    // ---- Contact (TODO: real details) -----------------------------
    'phone'        => '(555) 123-4567',          // TODO
    'phone_raw'    => '+15551234567',            // TODO
    'phone_alt'    => '(555) 987-6543',          // TODO — TTY / office line
    'email'        => 'philip@philipsmithmedicare.com', // TODO
    'hours'        => 'Seven days a week',
    'hours_note'   => 'A call is always the best way to reach me',

    'address'      => [
        'street'  => '123 Main Street, Suite 100',   // TODO
        'city'    => 'Sarasota',                     // TODO — confirm street address
        'state'   => 'FL',                           // TODO
        'zip'     => '34202',                        // TODO
    ],

    'service_area' => 'Sarasota, Bradenton, Lakewood Ranch and Manatee County', // TODO — confirm

    // ---- Social / listings (TODO) ---------------------------------
    'facebook'     => '#',
    'google'       => '#',
    'linkedin'     => '#',

    // ---- Credentials (TODO) ---------------------------------------
    'license'      => 'FL License #W000000',
    'years'        => '15',
    'clients'      => '1,200',
    'carriers'     => '30',

    // ---- Logo ------------------------------------------------------
    // Black artwork on transparency; CSS flips it to white on dark grounds.
    'logo'         => 'assets/logo/truecare-logo.png',
    'logo_alt'     => 'TruCare — Insurance, Health & Wealth',

    // ---- Dedicated Medicare 101 page ------------------------------
    // The "Read more" links on the home page point here. The page is not
    // built yet — set this to '' to hide those links until it exists.
    'learn_url'    => 'medicare-101.php',

    // ---- Dedicated About page --------------------------------------
    // Philip's full story lives here. Not built yet; set to '' to hide
    // the "Read Philip's full story" link on the home page.
    'about_url'    => 'about.php',

    // ---- Where the contact form sends -----------------------------
    'form_to'      => 'philip@philipsmithmedicare.com', // TODO
    'form_from'    => 'no-reply@philipsmithmedicare.com', // TODO — must be on your domain
];

$SITE['address_line'] = $SITE['address']['street'] . ', ' . $SITE['address']['city']
    . ', ' . $SITE['address']['state'] . ' ' . $SITE['address']['zip'];
