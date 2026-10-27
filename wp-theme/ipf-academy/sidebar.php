<aside class="lg:col-span-4 lg:pl-8 lg:border-l blog-aside" style="border-color:rgba(11,65,49,.12);">
  <div class="lg:sticky lg:top-28">
    <?php if ( is_active_sidebar( 'blog-sidebar' ) ) : ?>
      <?php dynamic_sidebar( 'blog-sidebar' ); ?>
    <?php else : ?>
      <p class="blog-aside-title">Archives</p>
      <div class="mt-3"><ul><?php wp_get_archives( array( 'type' => 'monthly' ) ); ?></ul></div>
      <p class="blog-aside-title mt-10">Categories</p>
      <div class="mt-3"><ul><?php wp_list_categories( array( 'title_li' => '', 'show_count' => 1, 'hierarchical' => 0 ) ); ?></ul></div>
    <?php endif; ?>
  </div>
</aside>
