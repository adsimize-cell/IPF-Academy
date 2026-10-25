<footer id="footer" class="text-white" style="background-color: var(--green-primary);">
    <div class="mx-auto max-w-[1680px] px-6 lg:px-12 py-16 grid grid-cols-1 lg:grid-cols-12 gap-14">
      <div class="lg:col-span-5">
        <img src="/assets/teachers-academy-logo_57.png" alt="IPF Teacher's Academy" class="h-28 w-auto mb-6" style="border-radius: 50%;">
        <p class="mt-3 font-serif text-4xl text-white leading-tight">IPF Natural Perfumery<br><em class="italic">Teacher's Academy</em></p>
        <p class="mt-6 text-[17px] leading-[1.8] max-w-xl" style="color: var(--ivory);">A Paris-based academy preserving and transmitting the heritage of natural perfumery to perfumers, teachers and schools across the world. IPF Certification since 2017.</p>
      </div>
      <div class="lg:col-span-3">
        <p class="text-[16px] uppercase tracking-[0.22em]" style="color: var(--light-sage);">Explore</p>
        <ul class="mt-6 space-y-3 text-[17px] text-white">
          <li><a href="/programs/" class="hover:opacity-70 transition-colors">Programs</a></li>
          <li><a href="/teachers/" class="hover:opacity-70 transition-colors">Teachers</a></li>
          <li><a href="https://www.perfumefoundation.org" target="_blank" class="hover:opacity-70 transition-colors">IPF Certification</a></li>
          <li><a href="/why-choose-us/" class="hover:opacity-70 transition-colors">Why Choose Us</a></li>
          <li><a href="/contact/" class="hover:opacity-70 transition-colors">Contact</a></li>
        </ul>
      </div>
      <div class="lg:col-span-4">
        <p class="text-[16px] uppercase tracking-[0.22em]" style="color: var(--light-sage);">Newsletter</p>
        <p class="mt-5 text-[17px] leading-relaxed text-white">Monthly insights on natural perfumery, certifications and new programs.</p>
        <form class="mt-6 flex flex-col gap-3 max-w-sm" onsubmit="event.preventDefault()">
          <input type="email" placeholder="Your email" class="bg-transparent border px-4 py-3 text-[17px] text-white placeholder:text-white/50 focus:outline-none transition-colors" style="border-color: rgba(247,243,236,0.3);">
          <button type="submit" class="border px-6 py-3 text-[16px] font-medium uppercase tracking-[0.18em] text-white hover:bg-white hover:text-[var(--green-primary)] transition-all self-start" style="border-color: white;">Subscribe</button>
        </form>
        <address class="not-italic mt-10 text-[16px] leading-[1.8] text-white">49 Quai des Grands Augustins<br>75006 Paris, France<br><a href="tel:+33659764466" class="hover:opacity-70 transition-colors">+33 6 5976 4466</a></address>
        <a href="https://wa.me/33659764466" target="_blank" class="mt-5 inline-flex items-center gap-3 border px-5 py-3 text-[15px] font-medium uppercase tracking-[0.14em] text-white hover:bg-white hover:text-[var(--green-primary)] transition-all" style="border-color: white;">
          <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
          WhatsApp
        </a>
      </div>
    </div>
    <div class="border-t" style="border-color: rgba(247,243,236,0.15);">
      <div class="mx-auto max-w-[1680px] px-6 lg:px-12 py-6 flex flex-col sm:flex-row justify-between items-center gap-3 text-[15px] uppercase tracking-[0.18em] text-white">
        <p>&copy; 1995-2026 IPF Natural Perfumery Teacher's Academy</p>
        <p>Certified by the International Perfume Foundation</p>
      </div>
    </div>
  </footer>
<script>
    // Sticky header shadow
    window.addEventListener('scroll',()=>{const h=document.getElementById('nav-header');if(!h)return;if(window.scrollY>12){h.style.boxShadow='0 1px 20px rgba(11,65,49,.06)';h.style.backdropFilter='blur(12px)';h.style.backgroundColor='rgba(247,243,236,0.95)'}else{h.style.boxShadow='none';h.style.backdropFilter='none';h.style.backgroundColor='var(--ivory)'}});
    // Nav "Begin Your Training": scroll to the enrol block on course pages, otherwise go to the Master training page
    if(!document.getElementById('enrol')){document.querySelectorAll('#nav-header a[href="#enrol"]').forEach(a=>{a.href='/master-natural-perfumery/'});}
  </script>
<?php wp_footer(); ?>
</body>
</html>
