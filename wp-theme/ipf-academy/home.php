<?php get_header(); ?>
  <main>
    <section class="py-10 lg:py-14" style="background:var(--ivory);">
      <div class="mx-auto max-w-[1100px] px-6 lg:px-12 text-center">
        <p class="text-[15px] uppercase tracking-[0.32em] font-medium" style="color:var(--soft-sage);">Journal</p>
        <h1 class="mt-4 font-serif text-5xl lg:text-[3.5rem] leading-[1.05]" style="color:var(--green-primary);">Blog</h1>
      </div>
    </section>
    <div class="mx-auto max-w-[1320px] px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 py-10 lg:py-14">
      <div class="lg:col-span-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
          <a href="<?php the_permalink(); ?>" class="block border p-8 hover:border-[rgba(11,65,49,.4)] transition-colors" style="border-color:rgba(11,65,49,.15);background:#fff;text-decoration:none;">
            <p class="text-[13px] uppercase tracking-[0.28em] font-medium" style="color:var(--soft-sage);"><?php echo esc_html( get_the_date() ); ?></p>
            <h2 class="mt-3 font-serif text-2xl leading-snug" style="color:var(--green-primary);"><?php the_title(); ?></h2>
          </a>
        <?php endwhile; ?>
        </div>
        <div class="blog-pagination mt-10"><?php the_posts_pagination( array( 'mid_size' => 2, 'prev_text' => '&larr;', 'next_text' => '&rarr;' ) ); ?></div>
        <?php else : ?>
          <p class="text-[18px]" style="color:var(--text-dark);">No articles yet.</p>
        <?php endif; ?>
      </div>
      <?php get_sidebar(); ?>
    </div>
  </main>
<?php get_footer(); ?>
