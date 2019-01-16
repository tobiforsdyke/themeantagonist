<?php

// Functions to call the custom stylesheet and javascript files

function antagonist_script_enqueue() {
  wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/antagonist.css', array(), '1.0.0', 'all' );
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

// Add more them supports

add_theme_support( 'custom-background' );
add_theme_support( 'custom-header' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'post-formats', array('aside','image','video','gallery') );
