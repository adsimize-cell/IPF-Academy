<?php get_header(); ?>
<main class="mx-auto max-w-[1080px] px-6 lg:px-12 py-16 lg:py-20">
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
  <article class="mb-14">
    <h1 class="font-serif text-4xl lg:text-5xl leading-tight" style="color:var(--green-primary);"><?php the_title(); ?></h1>
    <div class="mt-6 text-[18px] leading-[1.8]" style="color:var(--text-dark);"><?php the_content(); ?></div>
  </article>
<?php endwhile; else : ?>
  <p class="text-[18px]" style="color:var(--text-dark);">Nothing to display yet.</p>
<?php endif; ?>
</main>
<?php get_footer(); ?>
