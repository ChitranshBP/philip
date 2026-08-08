<?php
/**
 * All site copy lives here. Edit these arrays and every page updates.
 */

/* ---- Navigation --------------------------------------------------- */
$NAV = [
    '#about'    => 'About Philip',
    '#learn'    => 'Medicare 101',
    '#coverage' => 'Coverage',
    '#faq'      => 'FAQ',
    '#contact'  => 'Contact',
];

/* ---- Concierge promises ------------------------------------------- */
$concierge = [
    ['compass',   'A guide, not a switchboard',        'You get my mobile number on day one. The person who explains your plan is the person who answers when you call in March with a question about a bill.'],
    ['search',    'Your doctors and drugs come first', 'Before I mention a single plan name I check your physicians against each network and price your exact prescriptions against each formulary. Then we talk.'],
    ['shield',    'Paperwork and claims are mine',     'Applications, effective dates, Social Security forms — and any bill that looks wrong. You sign; I sit through the hold music.'],
    ['calendar',  'A proper review every autumn',      'Premiums, drug tiers and networks change every year. Each October I re-run your numbers against the new options — free, whether you move or stay.'],
];

/* ---- Coverage ----------------------------------------------------- */
$services = [
    ['shield',   'Medicare Advantage (Part C)',    'HMO, PPO and Special Needs Plans, often at a $0 monthly premium.'],
    ['hospital', 'Medicare Supplements (Medigap)', 'Plans A through N. Keep Original Medicare and close the gaps it leaves.'],
    ['pills',    'Part D Prescription Drugs',      'Your exact medication list priced against every formulary in your ZIP.'],
    ['sparkles', 'Dental, Vision & Hearing',       'The cleanings, glasses and hearing aids Medicare will not pay for.'],
    ['wallet',   'Hospital Indemnity & Cancer',    'Cash paid straight to you when you are admitted or first diagnosed.'],
    ['heart',    'Life & Final Expense',           'Term, whole and guaranteed-issue, including no-medical-exam options.'],
    ['badge',    'Annuities & Retirement Income',  'A predictable paycheck in retirement that does not run out.'],
    ['globe',    'Under 65 & Small Business',      'ACA Marketplace plans and group cover for the not-yet-eligible.'],
];

/* ---- The four parts ------------------------------------------------ */
$parts = [
    [
        'letter' => 'A', 'name' => 'Hospital Insurance', 'tag' => 'Original Medicare',
        'lead'   => 'The part that catches you when you are admitted.',
        'covers' => ['Inpatient hospital stays', 'Skilled nursing facility care after a qualifying stay', 'Hospice care', 'Some home health care'],
        'facts'  => [
            ['Who provides it', 'The federal government'],
            ['What you pay',    'No premium for most people, then a deductible per benefit period'],
            ['When to enrol',   'Automatic if you already draw Social Security'],
        ],
        'watch'  => 'Most people pay no premium if they or a spouse paid Medicare taxes for roughly ten years. There is still a deductible for each benefit period, and it is not once a year — it can apply more than once in twelve months.',
    ],
    [
        'letter' => 'B', 'name' => 'Medical Insurance', 'tag' => 'Original Medicare',
        'lead'   => 'The part that handles everything outside the hospital bed.',
        'covers' => ['Doctor and specialist visits', 'Outpatient surgery and lab work', 'Preventive screenings and annual wellness visits', 'Durable medical equipment'],
        'facts'  => [
            ['Who provides it', 'The federal government'],
            ['What you pay',    'A monthly premium, an annual deductible, then 20% of most services'],
            ['When to enrol',   'Your initial window, or a Special window if you have employer cover'],
        ],
        'watch'  => 'Part B has a monthly premium and generally pays 80% after the annual deductible — leaving you the other 20% with no cap. Higher-income households pay an extra amount called IRMAA. That uncapped 20% is exactly what a Supplement or an Advantage plan exists to handle.',
    ],
    [
        'letter' => 'C', 'name' => 'Medicare Advantage', 'tag' => 'One private plan',
        'lead'   => 'One private plan that takes over A and B, usually with extras.',
        'covers' => ['Everything Parts A and B cover', 'Usually Part D drug coverage built in', 'Often dental, vision, hearing and fitness', 'A yearly cap on what you can spend'],
        'facts'  => [
            ['Who provides it', 'A private insurance carrier, approved by Medicare'],
            ['What you pay',    'Your Part B premium, often a $0 plan premium, then copays up to a yearly cap'],
            ['When to enrol',   'Your initial window, or 15 October – 7 December each year'],
        ],
        'watch'  => 'You still pay your Part B premium. Care runs through a network, so the plan is only as good as whether your doctors are in it — and networks are redrawn every January. Some plans require referrals or prior authorisation.',
    ],
    [
        'letter' => 'D', 'name' => 'Prescription Drugs', 'tag' => 'Add-on cover',
        'lead'   => 'The part everybody underestimates until January.',
        'covers' => ['Retail and mail-order prescriptions', 'A formulary of covered drugs, arranged in tiers', 'An annual cap on your out-of-pocket drug spending', 'Preferred pharmacy pricing'],
        'facts'  => [
            ['Who provides it', 'A private carrier — standalone, or built into an Advantage plan'],
            ['What you pay',    'A monthly premium, then a copay set by your drug\'s tier'],
            ['When to enrol',   'Your initial window, or 15 October – 7 December each year'],
        ],
        'watch'  => 'Two plans with identical premiums can differ by thousands a year depending on how they tier your specific drugs. Delay Part D without other creditable coverage and a late-enrolment penalty is added to your premium for life.',
    ],
];

/* ---- The two roads -------------------------------------------------- */
$roads = [
    [
        'label' => 'Road one',
        'title' => 'Original Medicare + a Supplement',
        'items' => ['Parts A and B stay as they are', 'A Medigap policy pays the share Medicare leaves you', 'Add a standalone Part D drug plan', 'Add dental, vision and hearing separately if you want them'],
        'note'  => 'Maximum freedom, a predictable monthly premium.',
    ],
    [
        'label' => 'Road two',
        'title' => 'A Medicare Advantage plan',
        'items' => ['One private plan delivers your Part A and Part B', 'Drug coverage is usually built in', 'Extras such as dental, vision and fitness often included', 'Costs are capped by a yearly out-of-pocket maximum'],
        'note'  => 'Lower monthly cost, care within a network.',
    ],
];

/* ---- A Part D year -------------------------------------------------- */
$drugStages = [
    ['Stage one',   'The deductible',   'If your plan has one, you pay the full negotiated price for your prescriptions until you have met it. Plenty of plans set this at zero for the lower drug tiers.'],
    ['Stage two',   'Initial coverage', 'You pay a copay or a percentage for each prescription and the plan pays the rest. What tier your drug sits on matters far more here than the plan premium did.'],
    ['Stage three', 'The yearly cap',   'Once your own spending on covered drugs reaches the annual out-of-pocket limit, you pay nothing more for them for the rest of the calendar year. The old coverage gap — the "donut hole" — no longer applies.'],
];

/* ==================================================================
 * NOT ON THE HOMEPAGE — kept here, ready to drop into inner pages
 * (a Medicare guide page, a costs page) whenever you want them back.
 * ================================================================== */

/* ---- What Medicare will not pay for --------------------------------- */
$gaps = [
    ['sparkles', 'Routine dental, vision, hearing', 'Cleanings, dentures, glasses and hearing aids are not covered by Original Medicare. Some Advantage plans include an allowance; standalone policies fill the rest.'],
    ['home',     'Long-term custodial care',        'Help with bathing, dressing and daily living is not a Medicare benefit — a surprise that catches most families off guard.'],
    ['plane',    'Most care outside the U.S.',      'Original Medicare rarely travels abroad. Certain Medigap plans add a foreign travel emergency benefit, which matters if you cruise.'],
    ['heart',    'Cosmetic and most alternative care', 'Elective procedures, acupuncture beyond narrow limits, and most chiropractic care sit outside the programme.'],
];

/* ---- Real costs ------------------------------------------------------ */
$costs = [
    ['wallet',  'Your Part B premium',      'Nearly everyone pays a monthly Part B premium, deducted from Social Security. Higher-income households pay an IRMAA surcharge on top, based on a tax return from two years ago.'],
    ['dollar',  'Deductibles that reset',   'Part A has a deductible per benefit period, Part B has an annual one, and many drug plans carry a separate deductible before coverage kicks in.'],
    ['badge',   'The uncapped 20%',         'Original Medicare on its own has no maximum out-of-pocket. One serious year without a Supplement or Advantage plan can run into five figures.'],
    ['warning', 'Late-enrolment penalties', 'Skip Part B or Part D without creditable coverage and the penalty is permanent — it rides along with your premium for the rest of your life.'],
];

$mistakes = [
    ['Choosing on premium alone',         'The cheapest monthly figure is regularly the most expensive plan by December once copays, tiers and deductibles are counted.'],
    ['Assuming your doctor is in-network','Networks are re-drawn every January. The specialist you have seen for a decade can quietly drop off on the first of the month.'],
    ['Letting the Medigap window lapse',  'For six months you cannot be asked a single health question. After that, a Supplement carrier can decline you outright.'],
    ['Auto-renewing without reading',     'Your plan is allowed to change its costs and drug list each year. The Annual Notice of Change lands in September and almost nobody opens it.'],
    ['Not checking Extra Help',           'Millions who qualify for prescription and premium assistance never apply, because nobody told them the programme exists.'],
];

/* ---- Advantage vs Supplement ----------------------------------------- */
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

/* ---- Process ---------------------------------------------------------- */
$steps = [
    ['01', 'A conversation, not a pitch', 'Twenty unhurried minutes over coffee, at your table or on video. Your doctors, your prescriptions, your budget, your travel. Nothing is sold and nothing is signed.'],
    ['02', 'A comparison you can read',   'I come back with a plain-English, side-by-side sheet showing what each realistic option costs across a full year — not just the headline premium.'],
    ['03', 'Enrol, then never be alone',  'I file the paperwork with you and then stay on as your agent: ID cards, claims, prescription snags, and a free review every October.'],
];

/* ---- Reviews — TODO: replace with real, permissioned quotes ------------ */
$reviews = [
    ['Philip sat at our kitchen table and worked through every option until my husband and I actually understood it. No rush, no pressure. We have sent three neighbours his way since.', 'Margaret D.', 'Bradenton', 'Medicare Supplement'],
    ['I was paying for a plan that did not even cover my heart medication. Philip found one that did and saved me close to ninety dollars a month.', 'Ronald H.', 'Sarasota', 'Part D review'],
    ['He answers his own phone. After a year of being passed around call centres, that alone was worth everything.', 'Dolores M.', 'Lakewood Ranch', 'Medicare Advantage'],
];

/* ---- Glossary ---------------------------------------------------------- */
$glossary = [
    ['Formulary',           'The list of prescription drugs a plan covers, sorted into price tiers.'],
    ['Network',             'The doctors, hospitals and pharmacies a plan has contracted with.'],
    ['MOOP',                'Maximum out-of-pocket — the yearly ceiling on your costs in an Advantage plan.'],
    ['IRMAA',               'An income-related surcharge added to Part B and Part D for higher earners.'],
    ['Creditable coverage', 'Other drug coverage at least as good as Part D, which protects you from the late penalty.'],
    ['ANOC',                'Annual Notice of Change — the September letter listing what your plan is altering in January.'],
    ['Extra Help',          'A federal programme that lowers prescription costs for people with limited income and resources.'],
    ['Guaranteed issue',    'A situation where a Supplement carrier must accept you regardless of health history.'],
];

/* ---- FAQ ---------------------------------------------------------------- */
$faqs = [
    ['What does your help cost me?', 'Nothing — not a dollar. I am compensated by whichever carrier you choose, and your premium is identical whether you enrol through me, online, or over the phone with the company directly. What you get at no charge is somebody who reads the fine print beside you.'],
    ['Do I have to change my plan?', 'No, and plenty of my reviews end with me saying "stay exactly where you are." If what you have is genuinely the best fit, my job is to tell you so and put it in writing.'],
    ['Which companies do you work with?', 'I am appointed with most of the major national and regional carriers serving this area, which lets me compare rather than sell one brand. I do not offer every plan available — you can always reach 1-800-MEDICARE or visit Medicare.gov to review all of your options.'],
    ['I am still working and becoming eligible. What should I do?', 'Call me about three months before your eligibility date. Whether you should take Part B now or delay it depends on how many people your employer covers and how good the drug coverage is. Getting this wrong creates a lifelong penalty, so it is worth one short conversation.'],
    ['What should I have ready when we talk?', 'Your red-white-and-blue Medicare card if you have one, a list of your prescriptions with dosages, and the names of the doctors you would like to keep. That is enough for me to do real work on your behalf.'],
    ['Can you help my spouse, or my parents?', 'Absolutely — most of my appointments are with couples, and I regularly work with adult children helping a parent sort this out from another state.'],
];

/* ---- Personality — TODO: replace with details true of Philip ----------- */
$personal = [
    ['sun',   'On the water by six', 'Most mornings start with a paddle before the boats wake up.'],
    ['users', 'Four grandchildren',  'Two of whom are convinced I work at the beach.'],
    ['heart', 'Volunteer driver',    'Wednesdays I run neighbours to their appointments.'],
];
