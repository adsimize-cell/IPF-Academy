<?php /* Template Name: Q&amp;A [questions-answers] */ get_header(); ?>


  <div class="border-b" style="background:var(--ivory);border-color:rgba(11,65,49,.1);">
    <div class="mx-auto max-w-[1680px] px-6 lg:px-12 py-5 text-[15px] sm:text-[16px] uppercase tracking-[0.22em]" style="color:var(--green-primary);"><a href="/about/" class="hover:opacity-80">About</a><span class="mx-3">&rarr;</span> <span>Q&amp;A</span></div>
  </div>

  <main>
    <!-- HERO -->
    <section style="background:var(--ivory);">
      <div class="mx-auto max-w-[1080px] px-6 lg:px-12 py-16 lg:py-20 text-center">
        <p class="text-[15px] sm:text-[16px] uppercase tracking-[0.32em] font-medium" style="color:var(--soft-sage);">Questions &amp; Answers</p>
        <h1 class="mt-6 font-serif text-[2.5rem] sm:text-5xl lg:text-[3.7rem] leading-[1.1]" style="color:var(--green-primary);">Everything You Need to <em class="font-normal">Know</em></h1>
        <p class="mt-6 text-[18px] leading-[1.75] max-w-[640px] mx-auto" style="color:var(--text-dark);">Answers to the questions we are asked most often about studying natural perfumery with us.</p>
      </div>
    </section>

    <!-- FAQ -->
    <section class="bg-white py-16 lg:py-20">
      <div class="mx-auto max-w-[900px] px-6 lg:px-12">
        <div id="accordion"></div>
      </div>
    </section>

    <!-- CTA -->
    <section class="text-white py-16 lg:py-20" style="background:var(--green-primary);">
      <div class="mx-auto max-w-[900px] px-6 lg:px-12 text-center">
        <h2 class="font-serif text-4xl lg:text-[3.3rem] leading-[1.1]">Still Have a Question?</h2>
        <p class="mt-6 text-[18px] leading-[1.85]" style="color:var(--ivory);">If you can't find your answer here, we are happy to help. Reach out and we will get back to you.</p>
        <div class="mt-8 flex flex-wrap justify-center gap-4">
          <a href="/contact/" class="inline-flex items-center px-8 py-3.5 text-[14px] font-medium uppercase tracking-[0.22em]" style="background:var(--ivory);color:var(--green-primary);">Contact Us</a>
          <a href="https://wa.me/33659764466" target="_blank" rel="noopener" class="inline-flex items-center px-8 py-3.5 text-[14px] font-medium uppercase tracking-[0.22em] border text-white" style="border-color:var(--ivory);">WhatsApp</a>
        </div>
      </div>
    </section>
  </main>

<script>
    const FAQ=[
      {q:"Could you please tell me more about the process of learning?",a:"All of our courses are online, meaning: 'study from home' with the support of a personal teacher. They will send you 2 modules a week on Mondays and tests on Friday or Zoom sessions at your own convenience (depending on the teacher)."},
      {q:"I understand that it is an online course? How do I learn about aroma without smelling?",a:"You will need to purchase some essential oils. Regarding learning how to smell properly, we have another course called Olfaction Training. This course does not require a purchase as the scents you need are all around you: in the kitchen, nature, city, and so on."},
      {q:"When do they start?",a:"We have Courses and Master Classes starting every first Monday of the month."},
      {q:"What is the schedule?",a:"As they are 'study from home' courses, you can study when you want and from where you want. Some Zoom meetings are organised at a time convenient for both you, and your teacher."},
      {q:"Do you think I can take the course even if I'm working full time?",a:"Most of our students are working full time. Our courses are made to allow our students to study at their own pace."},
      {q:"Is the course completely self-study based or do I need to attend regular classes?",a:"You will have a personal Zoom meeting at the start of the course as we want to meet you, and you will receive modules and tests every week by email, and we will stay in contact by email."},
      {q:"When is the last day to register and pay?",a:"If you want to start on Monday, the last day to enrol is Thursday, then we can plan our Zoom meeting on Friday."},
      {q:"How long is the course?",a:"Depending on the course, our courses are intensive. Most of the course's lengths are one month with 2 modules a week. The Natural Perfumery Course length is 3 months."},
      {q:"What is the intensity - how many days and hours per week are the classes?",a:"It depends on the students and on their passion for perfumery. Most of our students are busy during the day and study in the evening or on the weekend. It is up to you."},
      {q:"What about the payment - is it possible to pay in installments?",a:"Yes, you have the possibility to pay in installments by Stripe choosing Klarna (black button on the page) or by PayPal, depending on your country. If that does not work for you, you can always contact us and we can provide other solutions."},
    ];
    let openIdx=0;
    function renderAcc(){
      document.getElementById('accordion').innerHTML=FAQ.map((m,i)=>`
        <div class="border-b" style="border-color:rgba(11,65,49,.15);">
          <button onclick="openIdx=${openIdx===i?-1:i};renderAcc();" class="w-full flex items-center justify-between gap-4 px-2 sm:px-4 py-5 text-left" style="color:var(--green-primary);">
            <span class="font-serif text-xl sm:text-2xl">${m.q}</span>
            <svg class="shrink-0" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" style="transition:transform .3s;transform:rotate(${openIdx===i?180:0}deg)"><path d="M6 9l6 6 6-6"/></svg>
          </button>
          ${openIdx===i?`<div class="px-2 sm:px-4 pb-7"><p class="text-[17px] sm:text-[18px] leading-[1.8]" style="color:var(--text-dark);">${m.a}</p></div>`:''}
        </div>`).join('');
    }
    renderAcc();
    
  </script>

<?php get_footer(); ?>
