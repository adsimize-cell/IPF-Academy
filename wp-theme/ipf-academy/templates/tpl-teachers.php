<?php /* Template Name: Teachers [teachers] */ get_header(); ?>
<div class="border-b" style="background:var(--ivory);border-color:rgba(11,65,49,.1);">
    <div class="mx-auto max-w-[1680px] px-6 lg:px-12 py-5 text-[15px] sm:text-[16px] uppercase tracking-[0.22em]" style="color:var(--green-primary);"><a href="/" class="hover:opacity-80">Home</a><span class="mx-3">&rarr;</span> <span>Teachers</span></div>
  </div>

  <main>
    <!-- HERO -->
    <section style="background:var(--ivory);">
      <div class="mx-auto max-w-[1680px] grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-16 px-6 lg:px-12 py-16 lg:py-20 items-center">
        <div class="lg:col-span-7">
          <p class="text-[15px] sm:text-[16px] uppercase tracking-[0.32em] font-medium" style="color:var(--soft-sage);">Our Academicians</p>
          <h1 class="mt-6 font-serif text-[2.5rem] sm:text-5xl lg:text-[3.9rem] leading-[1.06]" style="color:var(--green-primary);">Our Teachers &amp; Their <em class="font-normal">Expertise</em></h1>
          <p class="mt-7 text-[17px] sm:text-[18px] leading-[1.75] max-w-[680px]" style="color:var(--text-dark);">All of our Academicians are certified by the International Perfume Foundation and selected by a Committee of Experts. Each brings a distinct field of mastery to the Natural Perfumery Teacher's Academy.</p>
        </div>
        <div class="lg:col-span-5">
          <img src="https://adsimize-cell.github.io/IPF-Academy/assets/16.png" alt="The Academicians of the Teacher's Academy" class="w-full h-[360px] sm:h-[440px] lg:h-[520px] object-cover" loading="eager">
        </div>
      </div>
    </section>

    <!-- FACULTY GRID -->
    <section class="bg-white py-16 lg:py-20">
      <div class="mx-auto max-w-[1560px] px-6 lg:px-12">
        <div id="facultyGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"></div>
      </div>
    </section>

    <!-- CLOSING -->
    <section class="py-16 lg:py-20" style="background:var(--ivory);">
      <div class="mx-auto max-w-[900px] px-6 lg:px-12 text-center">
        <h2 class="font-serif text-4xl lg:text-[3.1rem] leading-[1.1] text-center" style="color:var(--green-primary);">Sharing Knowledge Worldwide</h2>
        <p class="mt-6 text-[18px] leading-[1.85]" style="color:var(--text-dark);">The Teacher's Academy is happy to transmit such important knowledge with institutions and corporations through individual consultancy, school curriculum, conferences, workshops and exhibitions.</p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
          <a href="/programs/" class="inline-flex items-center px-8 py-3.5 text-[14px] font-medium uppercase tracking-[0.22em] text-white" style="background:var(--green-primary);">Explore Programs</a>
          <a href="/contact/" class="inline-flex items-center px-8 py-3.5 text-[14px] font-medium uppercase tracking-[0.22em] border" style="border-color:var(--green-primary);color:var(--green-primary);">Book a Teacher</a>
        </div>
      </div>
    </section>
  </main>
<script>
    const FACULTY=[
      {name:"Creezy Courtoy",role:"Founder, Director and Teacher",fields:["Natural Olfaction Training","Perfumotherapy","World Perfume History","Anthropology of Perfume","Sustainable Oud","Natural Perfumery Teaching Methodology","Olfaction Training for Children"]},
      {name:"Andrej Babicky",role:"Teacher",fields:["Natural Perfumery","Olfaction Training (Impara l'Olfazione)","Natural Raw Material Extraction Methods","Accords Chypre","Accords Fougeres and Herbs","Accords White Florals","Natural Candle Making"]},
      {name:"Pinar Lacroix",role:"Teacher",fields:["Fragrance Brand Design","Building Visual Legacy Systems for your Fragrance"]},
      {name:"Rodney Hughes",role:"Teacher",fields:["Packaging"]},
      {name:"Vennie Chou",role:"Teacher",fields:["Natural Skin Care"]},
      {name:"Dr Danica-Lea Larcombe",role:"Teacher",fields:["Healing Gardening"]},
      {name:"Terry Johnson",role:"Teacher",fields:["Business and Marketing","Supply Chain Sustainability","Sustainable Luxury: The New Luxury Code"]},
      {name:"Chen Li Morisset",role:"Teacher",fields:["Aromatherapy","Olfaction Training","Market Entry and Regulatory (China)","Marketing in China"]},
      {name:"Kristin Chen",role:"Teacher",fields:["Aromatherapy","Olfaction Training"]},
      {name:"Ana-Elena Sastrias",role:"Teacher",fields:["Aromatherapy","Olfaction Training","Natural Perfumery (Perfumeria Natural)"]},
      {name:"Roxana Villa",role:"Teacher",fields:["Botanical Perfumery"]},
      {name:"Rachel Binder",role:"Teacher",fields:["Wine and Fragrance Expert","Fermentation and Microbiology Expert"]},
    ];
    function initials(n){return n.replace(/^Dr\s+/,'').split(/\s+/).slice(0,2).map(w=>w[0]).join('').toUpperCase();}
    document.getElementById('facultyGrid').innerHTML=FACULTY.map(t=>`
      <article class="flex flex-col h-full border p-8 text-left" style="border-color:rgba(11,65,49,.18);background:#fff;">
        <div class="flex items-center gap-4">
          <div class="avatar shrink-0" style="width:64px;height:64px;border-radius:50%;font-size:22px;">${initials(t.name)}</div>
          <div>
            <h3 class="font-serif text-2xl leading-tight" style="color:var(--green-primary);">${t.name}</h3>
            <p class="mt-1 text-[13px] uppercase tracking-[0.18em]" style="color:var(--soft-sage);">${t.role}</p>
          </div>
        </div>
        <div class="mt-6 flex flex-wrap gap-2">
          ${t.fields.map(f=>`<span class="tag">${f}</span>`).join('')}
        </div>
      </article>`).join('');
  </script>
<?php get_footer(); ?>
