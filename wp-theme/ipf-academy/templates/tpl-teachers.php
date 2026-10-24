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
          <img src="/assets/teachers/general-picture-16-teachers.jpg" alt="The 16 teachers of the Natural Perfumery Teacher's Academy" class="w-full h-auto" loading="eager">
        </div>
      </div>
    </section>

    <!-- FACULTY GRID -->
    <section class="bg-white py-16 lg:py-20">
      <div class="mx-auto max-w-[1560px] px-6 lg:px-12">
        <div class="text-center max-w-[1080px] mx-auto">
          <p class="text-[15px] sm:text-[16px] uppercase tracking-[0.32em] font-medium" style="color:var(--soft-sage);">12 Lead Teachers</p>
          <h2 class="mt-5 font-serif text-4xl lg:text-[3.1rem] leading-[1.1]" style="color:var(--green-primary);">Natural Perfumery Teacher's Academy <em class="font-normal">Lead Teachers</em></h2>
        </div>
        <div id="facultyGrid" class="mt-12 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"></div>
        <div class="mt-20 text-center max-w-[1080px] mx-auto">
          <p class="text-[15px] sm:text-[16px] uppercase tracking-[0.32em] font-medium" style="color:var(--soft-sage);">Teachers</p>
          <h2 class="mt-5 font-serif text-4xl lg:text-[3.1rem] leading-[1.1]" style="color:var(--green-primary);">Our <em class="font-normal">Teachers</em></h2>
        </div>
        <div id="teachersGrid" class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-8 max-w-[1100px] mx-auto"></div>
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
    const P='/assets/teachers/';
    const FACULTY=[
      {name:"Creezy Courtoy",photo:"creezy-courtoy.jpg",role:"Founder, Director and Teacher",fields:["Natural Olfaction Training","Perfumotherapy","World Perfume History","Anthropology of Perfume","Sustainable Oud","Natural Perfumery Teaching Methodology","Olfaction Training for Children"]},
      {name:"Andrej Babicky",photo:"andrej-babicky.jpg",role:"Teacher",fields:["Natural Perfumery","Olfaction Training (Impara l'Olfazione)","Natural Raw Material Extraction Methods","Accords Chypre","Accords Fougeres and Herbs","Accords White Florals","Natural Candle Making"]},
      {name:"Pinar Lacroix",photo:"pinar-lacroix.jpg",role:"Teacher",fields:["Fragrance Brand Design","Building Visual Legacy Systems for your Fragrance"]},
      {name:"Rodney Hughes",photo:"rodney-hughes.jpg",role:"Teacher",fields:["Packaging"]},
      {name:"Vennie Chou",photo:"vennie-chou.jpg",role:"Teacher",fields:["Natural Skin Care"]},
      {name:"Dr Danica-Lea Larcombe",photo:"danica-lea-larcombe.jpg",role:"Teacher",fields:["Healing Gardening"]},
      {name:"Terry Johnson",photo:"terry-johnson.jpg",role:"Teacher",fields:["Business and Marketing","Supply Chain Sustainability","Sustainable Luxury: The New Luxury Code"]},
      {name:"Chen Li Morisset",photo:"chen-li-morisset.jpg",role:"Teacher",fields:["Aromatherapy","Olfaction Training","Market Entry and Regulatory (China)","Marketing in China"]},
      {name:"Kristin Chen",photo:"kristin-chen.jpg",role:"Teacher",fields:["Aromatherapy","Olfaction Training"]},
      {name:"Ana-Elena Sastrias",photo:"ana-elena-sastrias.jpg",role:"Teacher",fields:["Aromatherapy","Olfaction Training","Natural Perfumery (Perfumeria Natural)"]},
      {name:"Jennifer Jones",photo:"jennifer-jones.jpg",role:"Teacher",fields:["Scent Design and Formula Building","Training Horses with Scents"]},
      {name:"Rachel Binder",photo:"rachel-binder.jpg",role:"Teacher",fields:["Wine and Fragrance Expert","Fermentation and Microbiology Expert"]},
    ];
    const TEACHERS=[
      {name:"Roxana Villa",photo:"/assets/photos14teachersandlecturers/Roxana.jpg",fields:["Botanical Perfumery"]},
      {name:"Lili",photo:"/assets/photos14teachersandlecturers/lili.jpg",fields:[]},
      {name:"Naziha",photo:"/assets/photos14teachersandlecturers/Naziha.JPG",fields:[]},
      {name:"Sabrina Zidane",photo:"/assets/photos14teachersandlecturers/Sabrina Zidane.jpg",fields:[]},
    ];
    document.getElementById('facultyGrid').innerHTML=FACULTY.map(t=>`
      <article class="flex flex-col h-full border p-8 text-left" style="border-color:rgba(11,65,49,.18);background:#fff;">
        <div class="flex items-center gap-5">
          <img src="${P+t.photo}" alt="${t.name}" class="shrink-0 w-24 h-24 object-contain" loading="lazy">
          <div>
            <h3 class="font-serif text-2xl leading-tight" style="color:var(--green-primary);">${t.name}</h3>
            <p class="mt-1 text-[13px] uppercase tracking-[0.18em]" style="color:var(--soft-sage);">${t.role}</p>
          </div>
        </div>
        <div class="mt-6 flex flex-wrap gap-2">
          ${t.fields.map(f=>`<span class="tag">${f}</span>`).join('')}
        </div>
      </article>`).join('');
    document.getElementById('teachersGrid').innerHTML=TEACHERS.map(t=>`
      <article class="text-center">
        <img src="${t.photo}" alt="${t.name}" class="mx-auto w-32 h-32 rounded-full object-cover object-top" loading="lazy">
        <h3 class="mt-4 font-serif text-xl leading-tight" style="color:var(--green-primary);">${t.name}</h3>
        ${t.fields.length?`<p class="mt-1 text-[14px]" style="color:var(--text-dark);">${t.fields.join(', ')}</p>`:''}
      </article>`).join('');
  </script>

<?php get_footer(); ?>
