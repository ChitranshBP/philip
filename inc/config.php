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
    'company_short'=> 'Trucare Insurance',
    'brand_sub'    => 'Medicare & Senior Benefits',
    'tagline'      => 'No Jargon. No Pressure. Just Trucare.',   // Philip's line — use it as-is

    // ---- Contact (TODO: real details) -----------------------------
    'phone'        => '(941) 400-0109',
    'phone_raw'    => '+19414000109',
    'phone_alt'    => '',                        // TODO — second line, if there is one
    'email'        => 'philipsmiththankyou@gmail.com', // TODO — confirm; a @trucare domain would look stronger
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
    'form_to'      => 'philipsmiththankyou@gmail.com',
    'form_from'    => 'no-reply@philipsmithmedicare.com', // TODO — must be on your domain
];

/* Header + footer navigation. Anchors point at sections on this page;
   the .php entries are pages still to be built — build.php lists them and
   skips the ones that do not exist yet. */
$nav = [
    'index.php'         => 'Home',
    'about.php'         => 'About Us',
    'medicare-101.php'  => 'Medicare',
    'dental-vision.php' => 'Dental & Vision',
    'travel.php'        => 'Travel',
    'newsletter.php'    => 'Newsletter',
];

/* ---- Glossary ------------------------------------------------------ */
$glossary = [
    ['IEP',           'Initial Enrollment Period — your seven-month window: three months before your 65th birthday month, the month itself, three months after.'],
    ['GEP',           'General Enrollment Period — 1 January to 31 March, the catch-up window if you missed your IEP.'],
    ['AEP',           'Annual Enrollment Period — 15 October to 7 December, when you change Advantage and drug plans. Not the same as the GEP.'],
    ['LEP',           'Late Enrollment Penalty — a permanent surcharge for missing your window on Part B or Part D.'],
    ['MOOP',          'Maximum out-of-pocket — the yearly ceiling on your costs in an Advantage plan. Original Medicare has none.'],
    ['Working quarter', 'Three months of paying Medicare taxes. Forty of them, yours or a spouse\'s, earn premium-free Part A.'],
    ['Formulary',     'The list of prescription drugs a plan covers, sorted into price tiers.'],
    ['Network',       'The doctors, hospitals and pharmacies an Advantage plan has contracted with.'],
    ['Creditable coverage', 'Other coverage at least as good as Medicare\'s, which protects you from the late penalty while you delay.'],
    ['IRMAA',         'An income-related surcharge added to Part B and Part D for higher earners, based on a tax return from two years ago.'],
    ['ANOC',          'Annual Notice of Change — the September letter listing what your plan is altering in January.'],
    ['Extra Help',    'A federal programme that lowers prescription costs for people with limited income and resources.'],
];

$SITE['address_line'] = $SITE['address']['street'] . ', ' . $SITE['address']['city']
    . ', ' . $SITE['address']['state'] . ' ' . $SITE['address']['zip'];
