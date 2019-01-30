<?php

// Functions to call the custom stylesheet and javascript folders and files

function antagonist_script_enqueue() {
  // CSS
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '4.2.1', 'all' );
  wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/antagonist.css', array(), '1.1', 'all' );
  // JS
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.min.js', array(), '4.2.1', true );
  wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/antagonist.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'antagonist_script_enqueue');

// Functions to add menu support and register the custom menus

function antagonist_theme_setup() {
  add_theme_support( 'menus' );
  register_nav_menu( 'primary', 'Primary Header Navigation' );
  register_nav_menu( 'secondary', 'Footer Navigation' );
}

add_action( 'init', 'antagonist_theme_setup' );

// Add more theme supports

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array('aside','image','video','gallery') );

// Add Sidebar Function

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
