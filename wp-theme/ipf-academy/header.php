<!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,400;0,500;0,600;1,400;1,500&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root{--green-primary:#0b4131;--green-secondary:#1a5c44;--ivory:#f7f3ec;--soft-sage:#8fac8a;--light-sage:#c8d9c6;--text-dark:#2a2a2a}
    html{scroll-behavior:smooth}body{font-family:'Montserrat',system-ui,sans-serif;-webkit-font-smoothing:antialiased;color:var(--text-dark);font-weight:500;font-size:18px;text-align:left}
    h1,h2,h3,h4,h5{font-family:'Cormorant Garamond',Georgia,serif;font-weight:600;letter-spacing:-0.01em;text-align:left}
    .payment-badge { display: inline-flex; align-items: center; gap: 8px; background: transparent; color: var(--green-primary); border: 2px solid var(--green-primary); padding: 10px 20px; font-size: 16px; font-weight: 600; text-align: left; letter-spacing: 0.04em; }
    .payment-badge svg { flex-shrink: 0; }
    /* Powr Pay-Later widget kept in the academy style */
    .powr-paypal-button{min-height:44px}
      .text-center h1,.text-center h2,.text-center h3,.text-center h4,.text-center h5,.text-center h6{text-align:center}
      h1 em,h2 em,h3 em,h4 em,h5 em{font-style:normal}
  body{overflow-wrap:break-word;-webkit-hyphens:auto;hyphens:auto}h1,h2,h3,h4,h5{-webkit-hyphens:manual;hyphens:manual}</style>
  <link rel="stylesheet" href="<?php echo esc_url(get_template_directory_uri()); ?>/assets/tailwind.css?v=<?php echo filemtime(get_template_directory() . '/assets/tailwind.css'); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?> style="background-color: var(--ivory);">
<header id="nav-header" class="sticky top-0 z-50 w-full transition-all duration-500" style="background-color: var(--ivory);">
    <div class="mx-auto flex max-w-[1680px] items-center justify-between gap-4 px-6 py-4 lg:px-10">
      <a href="/" class="shrink-0 flex items-center gap-3">
        <img src="/assets/teachers-academy-logo_57.png" alt="IPF Natural Perfumery Teacher's Academy" class="h-14 w-auto sm:h-16" style="background-color: var(--ivory); border-radius: 50%;">
      </a>
      <nav class="hidden xl:flex items-center gap-2 2xl:gap-5">
        <div class="relative" onmouseenter="document.getElementById('progDD').classList.remove('hidden')" onmouseleave="document.getElementById('progDD').classList.add('hidden')">
          <button class="text-[12.5px] 2xl:text-[15px] font-medium uppercase tracking-[0.08em] hover:opacity-70 transition-colors whitespace-nowrap" style="color: var(--green-primary);">Programs &#9662;</button>
          <div id="progDD" class="hidden absolute left-0 top-full pt-2 min-w-[640px] max-w-[92vw]">
            <div class="border shadow-lg p-6" style="background-color: var(--ivory); border-color: rgba(11,65,49,0.15);">
              <a href="/programs/" class="block pb-3 mb-4 border-b text-[14px] font-semibold uppercase tracking-[0.18em]" style="color: var(--green-primary); border-color: rgba(11,65,49,0.12);">All Programs</a>
              <div class="grid grid-cols-2 gap-x-10">
                <div>
                  <p class="pb-2 text-[11px] uppercase tracking-[0.22em] font-semibold" style="color: var(--soft-sage);">Courses</p>
                  <a href="/master-natural-perfumery/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Master Natural Perfumery</a>
                  <a href="/learnnaturalperfumery-790464/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Natural Perfumery</a>
                  <a href="/private-mentoring/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Private Mentoring</a>
                  <a href="/fragrance-brand-design/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Fragrance Brand Design</a>
                  <a href="/natural-olfaction-training/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Natural Olfaction Training</a>
                  <a href="/learn-natural-aromatherapy/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Natural Aromatherapy</a>
                  <a href="/learnperfumotherapy-170401/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Perfumotherapy</a>
                  <a href="/natural-skin-care/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Natural Skin Care</a>
                  <a href="/world-perfume-history-course/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">World Perfume History</a>
                  <a href="/world-perfume-distribution/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">World Perfume Distribution</a>
                  <a href="/business-marketing/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Business & Marketing</a>
                </div>
                <div>
                  <p class="pb-2 text-[11px] uppercase tracking-[0.22em] font-semibold" style="color: var(--soft-sage);">Masterclasses</p>
                  <a href="/teaching-methodology/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Teaching Methodology</a>
                  <a href="/raw-material-extraction-course/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Raw Material Extraction</a>
                  <a href="/naturalcandlemaking/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Natural Candle Making</a>
                  <a href="/healing-gardening/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Healing Gardening</a>
                  <a href="/sustainable-oud-masterclass/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Sustainable Oud</a>
                  <a href="/world-perfume-history-master-class/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">World Perfume History Master Class</a>
                  <a href="/perfume-design-concept-and-storytelling/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Perfume Design & Storytelling</a>
                  <a href="/olfaction-training-for-children/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Olfaction Training for Children</a>
                  <a href="/training-horses-with-scents/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Training Horses with Scents</a>
                  <a href="/ancient-chinese-perfume-beads/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Ancient Chinese Perfume Beads</a>
                  <a href="/accords-chypre/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Accords - Chypre</a>
                  <a href="/accords-white-florals/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Accords - White Florals</a>
                  <a href="/accords-fougeres-aromatics/" class="block py-1 text-[13.5px] transition-colors whitespace-nowrap" style="color: var(--text-dark);" onmouseenter="this.style.color='var(--green-primary)'" onmouseleave="this.style.color='var(--text-dark)'">Accords - Fougeres & Aromatics</a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <a href="/teachers/" class="text-[12.5px] 2xl:text-[15px] font-medium uppercase tracking-[0.08em] hover:opacity-70 transition-colors whitespace-nowrap" style="color: var(--green-primary);">Teachers</a>
        <a href="https://www.perfumefoundation.org" target="_blank" class="text-[12.5px] 2xl:text-[15px] font-medium uppercase tracking-[0.08em] hover:opacity-70 transition-colors whitespace-nowrap" style="color: var(--green-primary);">IPF Certification</a>
        <a href="/why-choose-us/" class="text-[12.5px] 2xl:text-[15px] font-medium uppercase tracking-[0.08em] hover:opacity-70 transition-colors whitespace-nowrap" style="color: var(--green-primary);">Why Choose Us</a>
        <a href="/questions-answers/" class="text-[12.5px] 2xl:text-[15px] font-medium uppercase tracking-[0.08em] hover:opacity-70 transition-colors whitespace-nowrap" style="color: var(--green-primary);">Q&amp;A</a>
        <a href="/contact/" class="text-[12.5px] 2xl:text-[15px] font-medium uppercase tracking-[0.08em] hover:opacity-70 transition-colors whitespace-nowrap" style="color: var(--green-primary);">Contact</a>
      </nav>
      <div class="hidden xl:flex items-center gap-2 shrink-0">
        <a href="#enrol" class="text-white text-[13px] 2xl:text-[14px] font-medium uppercase tracking-[0.1em] px-3 2xl:px-4 py-2.5 hover:opacity-90 transition-colors whitespace-nowrap" style="background-color: var(--green-primary);">Begin Your Training</a>
        <div class="relative" onmouseenter="document.getElementById('proDD').classList.remove('hidden')" onmouseleave="document.getElementById('proDD').classList.add('hidden')">
          <button class="border text-[13px] 2xl:text-[14px] font-medium uppercase tracking-[0.1em] px-2.5 2xl:px-3 py-2.5 transition-colors whitespace-nowrap" style="border-color: var(--green-primary); color: var(--green-primary);" onmouseenter="this.style.backgroundColor='var(--green-primary)';this.style.color='white'" onmouseleave="this.style.backgroundColor='';this.style.color='var(--green-primary)'">For Institutions &#9662;</button>
          <div id="proDD" class="hidden absolute right-0 top-full pt-2 min-w-[240px]">
            <div class="border shadow-lg" style="background-color: var(--ivory); border-color: rgba(11,65,49,0.15);">
              <a href="/for-professionals/" class="block px-5 py-3 text-[15px] font-medium uppercase tracking-[0.16em] transition-colors" style="color: var(--green-primary);" onmouseenter="this.style.backgroundColor='var(--green-primary)';this.style.color='white'" onmouseleave="this.style.backgroundColor='';this.style.color='var(--green-primary)'">School Certification</a>
              <a href="/for-professionals/" class="block px-5 py-3 text-[15px] font-medium uppercase tracking-[0.16em] transition-colors" style="color: var(--green-primary);" onmouseenter="this.style.backgroundColor='var(--green-primary)';this.style.color='white'" onmouseleave="this.style.backgroundColor='';this.style.color='var(--green-primary)'">For Professionals</a>
            </div>
          </div>
        </div>
      </div>
      <button class="xl:hidden p-1" style="color: var(--green-primary);" onclick="document.getElementById('mobileMenu').classList.toggle('hidden')" aria-label="Toggle menu">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
      </button>
    </div>
    <div id="mobileMenu" class="hidden xl:hidden border-t" style="border-color: rgba(11,65,49,0.1); background-color: var(--ivory);">
      <div class="px-6 py-8 flex flex-col gap-5">
        <a href="#enrol" class="text-white text-[16px] font-medium uppercase tracking-[0.18em] px-5 py-3.5 text-center" style="background-color: var(--green-primary);">Begin Your Training</a>
        <a href="/programs/" class="text-[16px] font-medium uppercase tracking-[0.18em]" style="color: var(--green-primary);">All Programs</a>
        <div class="flex flex-col gap-2">
          <p class="text-[14px] uppercase tracking-[0.2em] px-1" style="color: var(--soft-sage);">Masterclasses</p>
          <a href="/master-natural-perfumery/" class="text-[16px] font-medium uppercase tracking-[0.18em] pl-3" style="color: var(--green-primary);">Master Natural Perfumery</a>
          <a href="/teaching-methodology/" class="text-[16px] font-medium uppercase tracking-[0.18em] pl-3" style="color: var(--green-primary);">Teaching Methodology</a>
        </div>
        <a href="/teachers/" class="text-[16px] font-medium uppercase tracking-[0.18em]" style="color: var(--green-primary);">Teachers</a>
        <a href="https://www.perfumefoundation.org" target="_blank" class="text-[16px] font-medium uppercase tracking-[0.18em]" style="color: var(--green-primary);">IPF Certification</a>
        <a href="/why-choose-us/" class="text-[16px] font-medium uppercase tracking-[0.18em]" style="color: var(--green-primary);">Why Choose Us</a>
        <a href="/questions-answers/" class="text-[16px] font-medium uppercase tracking-[0.18em]" style="color: var(--green-primary);">Q&amp;A</a>
        <a href="/contact/" class="text-[16px] font-medium uppercase tracking-[0.18em]" style="color: var(--green-primary);">Contact</a>
        <a href="/for-professionals/" class="border text-[16px] font-medium uppercase tracking-[0.18em] px-5 py-3.5 text-center" style="border-color: var(--green-primary); color: var(--green-primary);">For Institutions</a>
      </div>
    </div>
  </header>
