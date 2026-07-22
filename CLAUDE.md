# IPF Academy Website — Project Context

## Overview
Static HTML website for **IPF Academy** (International Perfume Foundation) — a natural perfumery school founded by Creezy Courtoy. The site promotes the **IPF Natural Perfumery Teacher's Academy**, an online certification program for natural perfumery teachers.

**Git repo:** https://github.com/adsimize-cell/IPF-Academy.git (private)
**Git config:** user.name "adsimize-cell", user.email "adsimize@gmail.com"

## Tech Stack
- **Static HTML** — 7 pages, no build system, no framework
- **Tailwind CSS** via CDN (`https://cdn.tailwindcss.com`)
- **Google Fonts:** Cormorant Garamond (serif, headings, weight 600) + Montserrat (sans-serif, body, weight 500)

### CSS Custom Properties
```css
--green-primary: #0b4131;
--green-secondary: #1a5c44;
--ivory: #f7f3ec;
--soft-sage: #8fac8a;
--light-sage: #c8d9c6;
--text-dark: #2a2a2a;
```

### Design Rules
- Base font-size: 18px
- text-align: justify
- font-weight: 500 (body)
- Container max-width: 1680px, content max-width: 1560px
- Responsive nav breakpoint at `xl:` with compressed nav sizes
- Images MUST only come from the `assets/` folder — no external images

## Pages (7 total)
1. `index.html` — Homepage (hero, personal involvement, mission, programs, testimonials, teachers, FAQ, footer)
2. `master-natural-perfumery.html` — Main course page (12-week program, weekly modules, pricing)
3. `teaching-methodology.html` — Teaching methodology masterclass details
4. `programs.html` — Programs overview
5. `why-choose-us.html` — Why choose IPF
6. `for-professionals.html` — School certification / institutional partnerships
7. `certified-graduates.html` — Graduate certification info

## Translator Conventions (IMPORTANT — apply to ALL content)
These are validated corrections from Creezy's official translator (June 2026). Always follow them:

### Dates & Numbers
- IPF Certification since **2017** (not 1995 — 1995 is IPF founding, 2017 is certification start)
- Years of IPF Certification: **9** (as of 2026)
- Years Experience in stats: **31** (IPF founded 1995)
- IPF Teacher's Academy certification years: **7**

### Creezy's Title
- Always "**Creator**" of The New Luxury Code (NEVER "Author")
- "IPF Chairman" is correct

### Naming Conventions
- Always use "**IPF Natural Perfumery Teacher's Academy**" (full name with IPF prefix)
- "Teacher's Academy student" not just "IPF student"
- "Teacher's Academy Experts" instead of "Consultancies" for post-course support

### Wording Preferences
- "synthetification" not "standardisation" (for industrial fragrance)
- Include "consumers" alongside "perfumers, teachers, and brand founders"
- "Personal Involvement" not "Personal Accompaniment"
- "Our Students from Around the World" (with "from")
- "Student Successes" (plural)
- "narratives" (plural) for brand design descriptions
- "another number" not "a number" ("You are never just another number")

### Footer Standard (all pages)
- "IPF Certification since 2017"
- Phone: +33 6 5976 4466
- Address: 49 Quai des Grands Augustins, 75006 Paris, France
- WhatsApp button present on all pages

## Teachers (with full names)
The teachers grid on index.html includes these 8 teachers:
1. Vennie Chou
2. Andrej Babicky
3. Danica-Lea Larcombe
4. Chen Li
5. Naziha Allalou
6. Rodney Hughes
7. Roxana Villa
8. Terry Johnson

Led by **Creezy Courtoy** — IPF Chairman, Creator of The New Luxury Code, Founder of the IPF Natural Perfumery Teacher's Academy.

## Work History

### Completed (Rounds 1-4 + Translator Corrections)
- Full 7-page site built from scratch
- Navigation with dropdown menus (Programs, For Institutions)
- Hero section with stats and CTA
- Personal Involvement section (3 cards: 1:1 mentorship, weekly assessments, post-course support)
- Our Mission section
- Study Experience cards
- Programs overview with checkmarks
- Testimonial slider
- Teachers grid (8 teachers with real portraits)
- FAQ accordion
- Footer with contact form, WhatsApp, address, phone
- All "certified-graduates.html" links → perfumefoundation.org (external)
- Round 4 meeting notes: ~23 changes implemented
- Translator V2 corrections: ~41 changes applied across all 7 pages
- Word document created for translator: `IPF_Academy_Website_Content.docx`

### Pending / Waiting on Creezy
- **Hero:** Replace caricature with official logo (waiting for file from Creezy)
- **Programs page:** Replace Bali photo (waiting for replacement image)
- **Greta photo:** User needs to save to assets folder
- **FAQ content:** Send to Creezy for validation
- **Why-choose-us.html:** Creezy noted "(is this duplication of above?)" — may need text deduplication

## Communication Style
- User speaks French, content is in English
- Creezy is the client/founder — use "tu" when writing emails to her
- User prefers concise communication, no unnecessary summaries
- Push to GitHub after each batch of changes
