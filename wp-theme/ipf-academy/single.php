<?php get_header(); ?>
  <main>
    <div class="border-b" style="background:var(--ivory);border-color:rgba(11,65,49,.1);">
      <div class="mx-auto max-w-[1320px] px-6 lg:px-12 py-5 text-[15px] uppercase tracking-[0.22em]" style="color:var(--green-primary);"><a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="hover:opacity-80">Blog</a><span class="mx-3">&rarr;</span> <span><?php the_title(); ?></span></div>
    </div>
    <div class="mx-auto max-w-[1320px] px-6 lg:px-12 grid grid-cols-1 lg:grid-cols-12 gap-10 lg:gap-16 py-10 lg:py-14">
      <article class="lg:col-span-8">
        <?php while ( have_posts() ) : the_post(); ?>
        <p class="text-[14px] uppercase tracking-[0.28em] font-medium" style="color:var(--soft-sage);"><?php echo esc_html( get_the_date() ); ?></p>
        <h1 class="mt-4 font-serif text-4xl lg:text-[3rem] leading-[1.1]" style="color:var(--green-primary);"><?php the_title(); ?></h1>
        <div class="post-body mt-8"><?php the_content(); ?></div>
        <?php if ( comments_open() || get_comments_number() ) { echo '<div class="mt-14">'; comments_template(); echo '</div>'; } ?>
        <?php endwhile; ?>
      </article>
      <?php get_sidebar(); ?>
    </div>
  </main>
<?php get_footer(); ?>
