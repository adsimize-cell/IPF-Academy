<?php
add_theme_support('title-tag');
add_theme_support('post-thumbnails');
register_nav_menus(array('primary' => 'Primary Menu'));

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
    // Make permalinks pretty so /slug/ works
    update_option('permalink_structure', '/%postname%/');
    flush_rewrite_rules();
}
