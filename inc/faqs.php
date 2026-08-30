<?php
/**
 * Every question and answer on the site, grouped.
 *
 * Shared by faq.php (renders all of it) and about.php (renders just the
 * "Working with me" group). Written from Philip's own brief — see docs/client-brief.pdf. Keep answers in his voice: plain, first person,
 * no dollar figures.
 */

$faqGroups = [
    'Getting started' => [
        ['Who is eligible for Medicare?',
         'Generally people turning 65 who are a US citizen or have been a resident for five years, and who have worked more than 40 working quarters — roughly ten years — are eligible for zero-premium Part A. Marriage status can change the rules. You can also become eligible before 65: after receiving SSDI for 24 months, automatically with ALS, or with end-stage renal disease from the fourth month of your dialysis treatments.'],
        ['What age does Medicare start?',
         'At 65 you are eligible, whether or not you are already taking Social Security income benefits. Some people qualify earlier than 65 through a disability or illness.'],
        ['How do I know when I should sign up?',
         'For most people the Initial Enrollment Period is the right time — a seven-month window covering the three months before your 65th birthday month, the month itself, and the three months after. Enrolling in that window is how you avoid a late-enrolment penalty on Part B.'],
        ['How do I get Medicare?',
         'Social Security offers a quick online application that takes fewer than ten minutes. You do not have to be receiving income benefits to get Medicare. Visit the Social Security website and follow the links about applying. Choosing what sits on top of Parts A and B is where I come in, at no charge to you.'],
        ['Is it mandatory to go on Medicare when you turn 65?',
         'No. But there are significant penalties for late enrolment unless you have other creditable medical coverage, such as from a large employer. Whether your coverage counts is worth one short conversation before your birthday.'],
    ],

    'The four parts' => [
        ['What does Medicare Part A cover?',
         'Part A helps cover inpatient care, home health care, skilled nursing facility care and hospice. For most people who have 40+ working quarters it costs no premium, though a deductible applies per benefit period.'],
        ['What does Medicare Part B cover?',
         'Part B covers your outpatient services: services from doctors and providers, durable medical equipment, diagnostic services, and many preventive services such as screenings, shots and vaccines. It carries a monthly premium and an annual deductible.'],
        ['What is Part D coverage?',
         'Part D covers prescription drugs, plus certain shots and vaccines. The plans are run by private insurance companies that follow Medicare guidelines, so premiums and drug tiers differ from one plan to the next even when the drug is identical.'],
        ['What is Medicare Part C, or a Medicare Advantage plan?',
         'When you are enrolled in Parts A and B you are covered for about 80% of your health care costs. So what is left? Twenty per cent — with no ceiling. That is where I come in. Part C, usually called Medicare Advantage, is a private plan that takes over your Part A and B and limits what Medicare leaves you to pay.'],
    ],

    'Choosing a plan' => [
        ['What do Medicare Advantage plans actually cover?',
         'The tricky part is that there are hundreds of options across the country, so telling you the exact copays without knowing your ZIP code is almost impossible — each carrier differs, and plans are determined by the area you live in, sometimes by income, sometimes by a chronic condition. In a nutshell, each one comes with a maximum out-of-pocket that protects you if you have a bad year. Premiums are generally very low and most carry no additional premium at all. Many add dental, vision, hearing, fitness memberships, transportation, over-the-counter allowances and Part B givebacks, and most include your drug plan.'],
        ['What is a Medigap "Supplement" plan?',
         'A Medigap policy is sold by private companies and helps fill the gaps in Original Medicare — copayments, coinsurance and deductibles. Some Medigap policies also cover benefits Original Medicare does not, such as emergency foreign travel. Medigap does not pay your share under other coverage, including Medicare Advantage plans, standalone drug plans, employer or union group health coverage, Medicaid or TRICARE.'],
        ['What do I need to know about Part C?',
         'If you are enrolled in both Part A and Part B then you are eligible for Part C. Enrolment is entirely voluntary — many people choose to stay with Original Medicare and add a Medigap policy instead.'],
        ['Which Medigap plan should I buy?',
         'Every Medigap of the same letter is identical whichever private carrier sells it — the letter sets the coverage, so the real question is who is charging least for it this year. Plan G is the practical top choice for most people today: it covers everything except the Part B deductible. Plan N costs less in exchange for small copays. Plan F covers every deductible and coinsurance, but it is closed to anyone who became eligible for Medicare on or after 1 January 2020.'],
    ],

    'Penalties and deadlines' => [
        ['What is a late-enrolment penalty?',
         'It is a penalty for not using your election periods properly. One way to get one is not enrolling in Part B when you become eligible — usually at 65, or after 24 months on SSDI. If you are on SSDI you are enrolled automatically at your eligibility month; at 65, unless you are taking Social Security, you are not. Miss your seven-month window and you wait for the General Enrollment Period, 1 January to 31 March. The other way is not enrolling in a Prescription Drug Plan, which never happens automatically. Both penalties are permanent.'],
        ['Is the GEP the same as the AEP?',
         'No, and people mix them up constantly. The General Enrollment Period, 1 January to 31 March, is the catch-up window for Part B if you missed your initial one. The Annual Enrollment Period, 15 October to 7 December, is when you change Medicare Advantage and drug plans for the coming year.'],
    ],

    'Dental, vision & hearing' => [
        ['Does Medicare cover a dental cleaning?',
         'No. Original Medicare does not pay for routine dental care — cleanings, fillings, crowns, dentures, none of it. The only exceptions are narrow hospital cases, such as an exam required before certain surgeries or treatment after a jaw injury. For everything else you need either a standalone dental plan or an Advantage plan that includes a dental allowance.'],
        ['Will Medicare pay for my glasses?',
         'Not for routine eye exams or ordinary glasses. It does cover cataract surgery, and one pair of corrective glasses or contacts afterwards. It also covers annual glaucoma testing if you are considered high risk, and diabetic retinopathy exams. People often pay out of pocket for those last two without realising they were entitled to them.'],
        ['Are hearing aids covered?',
         'Hearing aids are not covered by Original Medicare, and they are where the sticker shock usually is. Cochlear implants are covered, as a prosthetic device. For ordinary aids you are looking at an allowance from an Advantage plan or a standalone hearing benefit — and those allowances vary enormously.'],
        ['Standalone plan, or the dental benefit in my Advantage plan?',
         'It depends entirely on what you expect to need. For two cleanings a year and nothing else, the Advantage extras are usually plenty. Facing a crown, a bridge or hearing aids, a standalone plan almost always wins — higher annual maximums, a wider choice of dentists, and it does not get re-drawn every January along with the rest of your plan.'],
        ['Is there a waiting period before I can use it?',
         'Usually yes for major work. Cleanings and exams normally start straight away, but crowns, bridges and dentures often wait six to twelve months from your start date. If you already know a piece of work is coming, tell me — it changes which plan makes sense.'],
    ],

    'Working with me' => [
        ['What does your help cost me?',
         'Nothing — not a dollar. I am paid by whichever carrier you choose, and your premium is identical whether you enrol through me, online, or on the phone with the company. What you get at no charge is somebody who reads the fine print beside you.'],
        ['Do I have to change what I already have?',
         'No, and plenty of my reviews end with me saying stay exactly where you are. If what you hold is genuinely the best fit, my job is to tell you so. Each October I re-check your plan against the coming year anyway, free, whether you move or stay.'],
        ['What should I have ready when we talk?',
         'Your red, white and blue Medicare card if you have one, a list of your prescriptions with dosages, and the names of the doctors you would like to keep. That is enough for me to do real work on your behalf.'],
    ],

    'Travel' => [
        ['Does Medicare cover me overseas?',
         'Original Medicare rarely covers care outside the United States. There are a handful of narrow exceptions, but you should plan on the answer being no. That surprises a lot of people the first time they take a big trip after retiring.'],
        ['What about a cruise?',
         'Medicare may cover medically necessary care in a ship\'s infirmary while you are in US territorial waters — broadly, when the ship is within six hours of a US port. Most Caribbean itineraries spend a good deal of the week well past that line. It is the most common gap I find, and the cheapest one to close.'],
        ['Does my Medigap policy travel with me?',
         'On most letters, yes. Plans C, D, F, G, M and N include a foreign travel emergency benefit: 80% of billed charges for medically necessary emergency care in the first 60 days of a trip, after a $250 deductible, up to a $50,000 lifetime maximum. Useful, but it is a lifetime cap, not an annual one.'],
        ['I have a Medicare Advantage plan. Am I covered abroad?',
         'Many Advantage plans add worldwide emergency and urgent care cover, but not routine care, and the detail differs plan by plan. It is written in the Evidence of Coverage, and I am happy to read that section with you before you book.'],
        ['Do I really need medical evacuation cover?',
         'It is the one I would not skip. An air ambulance across an ocean routinely runs past six figures, and no health plan — Medicare, Medigap or Advantage — pays to fly you home. It is also one of the cheaper parts of a travel policy.'],
        ['When should I buy a travel policy?',
         'When the deposit goes down, not the week you fly. Waivers for pre-existing conditions usually have to be bought within days of your first trip payment, and trip cancellation only helps if you bought it before the thing you are cancelling for happened.'],
    ],
];
