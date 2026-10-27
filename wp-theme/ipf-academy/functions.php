<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
register_nav_menus(array('primary' => 'Primary Menu'));

// Optional widget area for the blog sidebar (falls back to Archives + Categories if empty)
add_action('widgets_init', function () {
    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        'before_widget' => '<div class="blog-widget mb-10">',
        'after_widget'  => '</div>',
        'before_title'  => '<p class="blog-aside-title">',
        'after_title'   => '</p><div class="mt-3"></div>',
    ));
});

/**
 * One-time blog setup. Runs on a normal page load after the theme files are
 * updated (file replace does NOT fire after_switch_theme), guarded by a flag.
 * Creates the "Blog" posts page, points posts at /blog/<slug> and enables it.
 */
add_action('init', 'ipf_blog_setup', 20);
function ipf_blog_setup() {
    if (get_option('ipf_blog_setup_v1')) { return; }
    $blog = get_page_by_path('blog');
    if (!$blog) {
        $pid = wp_insert_post(array(
            'post_title'  => 'Blog',
            'post_name'   => 'blog',
            'post_status' => 'publish',
            'post_type'   => 'page',
            'post_content'=> '',
        ));
    } else {
        $pid = $blog->ID;
    }
    if ($pid && !is_wp_error($pid)) {
        update_option('show_on_front', 'page');
        update_option('page_for_posts', $pid);
    }
    update_option('permalink_structure', '/blog/%postname%/');
    flush_rewrite_rules();
    update_option('ipf_blog_setup_v1', 1);
}

/**
 * Auto-create one page per template on theme activation.
 * Each page gets the matching template, the slug from the file name,
 * and the "index" page becomes the static front page.
 */
add_action('after_switch_theme', 'ipf_auto_create_pages');
function ipf_auto_create_pages() {
    $dir = get_template_directory() . '/templates';
    foreach (glob($dir . '/tpl-*.php') as $file) {
        $base = basename($file);                      // tpl-about.php
        $slug = preg_replace('/^tpl-|\.php$/', '', $base);
        if (get_page_by_path($slug)) { continue; }    // already exists, skip
        $data  = get_file_data($file, array('name' => 'Template Name'));
        $title = $data['name'] ? preg_replace('/\s*\[.*\]$/', '', $data['name']) : $slug;
        $pid = wp_insert_post(array(
            'post_title'   => $title,
            'post_name'    => $slug,
            'post_status'  => 'publish',
            'post_type'    => 'page',
            'post_content' => '',
        ));
        if ($pid && !is_wp_error($pid)) {
            update_post_meta($pid, '_wp_page_template', 'templates/' . $base);
        }
    }
    // Set the "index" page as the static front page
    $front = get_page_by_path('index');
    if ($front) {
        update_option('show_on_front', 'page');
        update_option('page_on_front', $front->ID);
    }
    // Posts live at /blog/<slug> (matches the old Weebly URLs for SEO); pages keep /slug/
    update_option('permalink_structure', '/blog/%postname%/');
    flush_rewrite_rules();
}
