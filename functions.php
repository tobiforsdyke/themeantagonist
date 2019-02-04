<?php

// ==============================
// Functions to call the custom stylesheet and javascript folders and files
// ==============================

function antagonist_script_enqueue() {
  // CSS
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.2.1', 'all' );
  wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/antagonist.css', array(), '1.2.4', 'all' );
  // JS
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.2.1', true );
  wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/antagonist.js', array(), '1.1.3', true );
  // FONTAWESOME?
  wp_enqueue_style( 'fontawesomestyle', get_template_directory_uri() . '/fontawesome/css/all.min.css' );
  wp_enqueue_script( 'fontawesomejs', get_template_directory_uri() . '/fontawesome/js/all.min.js' );
}

add_action( 'wp_enqueue_scripts', 'antagonist_script_enqueue');

// ==============================
// Functions to add menu support and register the custom menus
// ==============================

function antagonist_theme_setup() {
  add_theme_support( 'menus' );
  register_nav_menu( 'primary', 'Primary Header Navigation' );
  register_nav_menu( 'secondary', 'Footer Navigation' );
}

add_action( 'init', 'antagonist_theme_setup' );

// ==============================
// Add more theme supports
// ==============================

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array('aside','image','video','gallery') );
add_theme_support( 'html5', array('search-form') );

// ==============================
// Add Sidebar Function
// ==============================

function antagonist_widget_setup() {
  register_sidebar(
    array(
      'name'=>'Sidebar',
      'id'=>'sidebar-1',
      'class'=>'custom',
      'description'=>'Standard Sidebar',
      'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
      'after_widget'=>'</aside>',
      'before_title'=>'<h1 class="widget-title">',
      'after_title'=>'</h1>'
    )
  );
  register_sidebar(
    array(
      'name'=>'Sidebar 2',
      'id'=>'sidebar-2',
      'class'=>'custom',
      'description'=>'Second Sidebar',
      'before_widget'=>'<aside id="%1$s" class="widget %2$s">',
      'after_widget'=>'</aside>',
      'before_title'=>'<h1 class="widget-title">',
      'after_title'=>'</h1>'
    )
  );
}
add_action('widgets_init','antagonist_widget_setup');

// ==============================
// Trying to fix the nav menu link styling by adding a link_class to the wp_nav_menu array
// ==============================

function add_menu_link_class( $atts, $item, $args ) {
  if (property_exists($args, 'link_class')) {
    $atts['class'] = $args->link_class;
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_class', 1, 3 );

// ==============================
// Include Walker file
// ==============================

require get_template_directory() . '/inc/walker.php';

// ==============================
// Head Function to remove Wordpress version number from generator meta
// ==============================

function antagonsit_remove_wp_version() {
  return '';
}
add_filter('the_generator', 'antagonsit_remove_wp_version');
