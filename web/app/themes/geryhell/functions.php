<?php


if (!function_exists('geryhell_setup')) {
  function geryhell_setup()
  {

    load_theme_textdomain('geryhell', get_template_directory() . '/languages');

    add_theme_support('automatic-feed-links');

    add_theme_support('title-tag');

    add_theme_support('post-thumbnails');

    add_theme_support('custom-background', apply_filters('geryhell_custom_background_args', array(
      'default-color' => 'fff',
      'default-image' => '',
    )));

    add_theme_support('html5', [
      ' search-form',
      ' comment-form',
      ' comment-list',
      'gallery',
      'caption'
    ]);

    add_theme_support('customize-selective-refresh-widgets');

    add_theme_support('custom-logo', [
      'height' => 250,
      'width' => 250,
      'flex-width' => true,
      'flex-height' => true,
    ]);

    // add_theme_support('post-formats', [
    //   'aside',
    //   'gallery',
    //   'link',
    //   'image',
    //   'quote',
    //   'video',
    //   'audio'
    // ]);

    register_nav_menus(array (
      'primary' => esc_html__('Primary', 'geryhell'),
      'footer' => esc_html__('Footer Menü', 'geryhell')
    ));
  }
}
add_action('after_setup_theme', 'geryhell_setup');


function geryhell_sidebar_widgets_init() {
  register_sidebar([
    'name' => esc_html__('Sidebar', 'geryhell'),
    'id' => 'default-sidebar',
    'description' => esc_html__('Add widgets here.', 'geryhell'),
    'before_widget' => '<section id="%1$s" class="widget %2$s">',
    'after_widget' => '</section>',
    'before_title' => '<h4 class="widget-title">',
    'after_title' => '</h4>',
  ]);
}
add_action('widgets_init', 'geryhell_sidebar_widgets_init');

function geryhell_public_scripts() {
  // Styles.
  wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css', [], wp_rand(), 'all');
  wp_enqueue_style( 'main', get_template_directory_uri() . '/assets/css/main.css', [], wp_rand(), 'all');

  // Scripts.
wp_enqueue_script( 'main', get_template_directory_uri() . '/assets/js/main.js', ['jquery'], wp_rand(), true);
}
add_action('wp_enqueue_scripts', 'geryhell_public_scripts');

function geryhell_admin_scripts() {

}
add_action('admin_enqueue_scripts', 'geryhell_admin_scripts');
