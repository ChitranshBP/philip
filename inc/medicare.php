<?php
/**
 * Medicare content, shared by the home page teaser and medicare-101.php.
 *
 * Written from Philip's brief (see docs/client-brief.pdf).
 * Two rules for anything added here:
 *   1. No dollar figures — CMS resets them yearly and stale numbers mislead.
 *   2. Plan F and Plan C are closed to anyone eligible on or after 1 Jan 2020.
 */

/* ---- Medicare 101 ------------------------------------------------ *
 * Facts checked against Philip's own client notes. Deliberately no
 * dollar figures: CMS resets them every year and stale numbers on a
 * page are worse than none. Philip quotes live figures on the call.   */
$parts = [
    [
        'letter' => 'A', 'name' => 'Hospital Insurance',
        'tag'    => 'Original Medicare',
        'lead'   => 'The hospital half. Most people have already paid for it.',
        'covers' => ['Inpatient hospital care', 'Skilled nursing facility care after a qualifying stay', 'Home health care', 'Hospice care'],
        'facts'  => [
            ['Who provides it', 'The federal government'],
            ['What you pay',    'No premium if you have 40+ working quarters, then a deductible per benefit period'],
            ['When to enrol',   'Automatic if you already draw Social Security or SSDI'],
        ],
        'watch'  => 'Forty working quarters is about ten years of paying Medicare taxes — yours or a spouse\'s. You also need to be a citizen or a lawful resident of five years. The deductible applies per benefit period, not per year, so a bad twelve months can trigger it more than once.',
    ],
    [
        'letter' => 'B', 'name' => 'Medical Insurance',
        'tag'    => 'Original Medicare',
        'lead'   => 'Everything outside the hospital bed — and the 20% nobody mentions.',
        'covers' => ['Doctors, specialists and providers', 'Diagnostic and outpatient services', 'Durable medical equipment', 'Preventive screenings, shots and vaccines'],
        'facts'  => [
            ['Who provides it', 'The federal government'],
            ['What you pay',    'A monthly premium, an annual deductible, then 20% of most services'],
            ['When to enrol',   'Your 7-month initial window, or a Special window if you have employer cover'],
        ],
        'watch'  => 'A and B together cover about 80% of your care. The remaining 20% has no ceiling at all — one serious year can run into five figures. That gap is the entire reason Part C and Medigap exist. Higher-income households also pay an IRMAA surcharge, based on a tax return from two years ago.',
    ],
    [
        'letter' => 'C', 'name' => 'Medicare Advantage',
        'tag'    => 'One private plan',
        'lead'   => 'One private plan that replaces A and B, usually with extras.',
        'covers' => ['Everything Parts A and B cover', 'Usually a Part D drug plan built in', 'Dental, vision, hearing, fitness, transport and OTC allowances', 'A maximum out-of-pocket that caps your year'],
        'facts'  => [
            ['Who provides it', 'A private carrier approved by Medicare'],
            ['What you pay',    'Your Part B premium, often a $0 plan premium, then copays up to the yearly cap'],
            ['When to enrol',   'Your initial window, or 15 October – 7 December each year'],
        ],
        'watch'  => 'There are hundreds of these plans and no two counties see the same list — some are income-based, others are built around a chronic condition. Nobody can quote you a copay without knowing your ZIP code. The real protection is the maximum out-of-pocket; the dental and fitness extras are what sell it.',
    ],
    [
        'letter' => 'D', 'name' => 'Prescription Drugs',
        'tag'    => 'Add-on cover',
        'lead'   => 'The part that is never automatic — and penalised for life if you skip it.',
        'covers' => ['Retail and mail-order prescriptions', 'A formulary of covered drugs, arranged in tiers', 'Shots and vaccines', 'An annual cap on what you spend on covered drugs'],
        'facts'  => [
            ['Who provides it', 'Private carriers following Medicare\'s rules'],
            ['What you pay',    'A monthly premium, then a copay set by your drug\'s tier'],
            ['When to enrol',   'With Parts A and B, or 15 October – 7 December each year'],
        ],
        'watch'  => 'Nobody enrols you into a drug plan — you have to choose one, or have other creditable coverage. Skip it and the late-enrolment penalty is added to your premium for the rest of your life. Two plans with the same premium can differ by thousands depending on how they tier your specific drugs.',
    ],
];

/* ---- How the pieces fit together -------------------------------- */
$roads = [
    [
        'label' => 'Road one',
        'title' => 'Original Medicare + a Medigap',
        'items' => ['Parts A and B stay exactly as they are', 'A Medigap policy pays the share Medicare leaves you', 'Add a standalone Part D drug plan', 'Any provider in the country who takes Medicare'],
        'note'  => 'A set monthly premium, almost nothing at the counter.',
    ],
    [
        'label' => 'Road two',
        'title' => 'A Medicare Advantage plan (Part C)',
        'items' => ['One private plan delivers your Part A and Part B', 'Drug coverage is usually built in', 'Dental, vision, hearing, fitness and OTC extras', 'A maximum out-of-pocket caps your worst year'],
        'note'  => 'Often a $0 plan premium, care inside a network.',
    ],
];

/* ---- What you pay across a Part D year --------------------------- */
$drugStages = [
    ['Stage one',   'The deductible',   'If your plan has one, you pay the full negotiated price for your prescriptions until you have met it. Plenty of plans set this at zero for the lower drug tiers.'],
    ['Stage two',   'Initial coverage', 'You pay a copay or a percentage for each prescription and the plan pays the rest. What tier your drug sits on matters far more here than the plan premium did.'],
    ['Stage three', 'The yearly cap',   'Once your own spending on covered drugs reaches the annual out-of-pocket limit, you pay nothing more for them for the rest of the calendar year. The old coverage gap — the "donut hole" — no longer applies.'],
];

/* ---- What Medicare does not cover -------------------------------- */
$gaps = [
    ['sparkles', 'Routine dental, vision, hearing', 'Cleanings, dentures, glasses and hearing aids are not covered by Original Medicare. Some Advantage plans include an allowance; standalone policies fill the rest.'],
    ['home',     'Long-term custodial care',        'Help with bathing, dressing and daily living is not a Medicare benefit — a surprise that catches most families off guard.'],
    ['plane',    'Most care outside the U.S.',      'Original Medicare rarely travels abroad. Certain Medigap plans add a foreign travel emergency benefit, which matters if you cruise.'],
    ['heart',    'Cosmetic and most alternative care', 'Elective procedures, acupuncture beyond narrow limits, and most chiropractic care sit outside the programme.'],
];

/* ---- Advantage vs Medigap, side by side -------------------------- */
$compare = [
    ['Freedom to choose doctors', 'Plan network — in-network care costs less',      'Any provider in the U.S. who accepts Medicare'],
    ['Monthly premium',           'Often $0, on top of your Part B premium',         'A set monthly premium, on top of Part B'],
    ['Costs when you use care',   'A copay each visit, capped by a yearly maximum',  'Little to nothing at the point of care'],
    ['Prescription drugs',        'Usually built into the plan',                     'Purchased separately as a Part D plan'],
    ['Extra benefits',            'Dental, vision, hearing, fitness, OTC allowance', 'Not included — added separately'],
    ['Referrals to specialists',  'HMO plans may require one',                       'Never required'],
    ['Health questions',          'None — you cannot be turned down',                'None during your Medigap open enrolment window'],
    ['Travel',                    'Best suited to care close to home',               'Excellent — your coverage travels with you'],
];
