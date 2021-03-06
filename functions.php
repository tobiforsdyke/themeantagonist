<?php

// ==============================
// Functions to call the custom stylesheet and javascript folders and files
// ==============================

function antagonist_script_enqueue() {
  // CSS
  wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '4.2.1', 'all' );
  wp_enqueue_style( 'customstyle', get_template_directory_uri() . '/css/antagonist.css', array(), '1.2.4', 'all' );
  // JS
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'bootstrapjs', get_template_directory_uri() . '/js/bootstrap.js', array(), '4.2.1', true );
  wp_enqueue_script( 'customjs', get_template_directory_uri() . '/js/antagonist.js', array(), '1.1.3', true );
  // FONTAWESOME
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

// ==============================
// Custom Post Types
// ==============================

function antagonist_custom_post_type() {
  // Creates the labels and arguments for the Portfolio custom post type
  $portfoliolabels = array(
    'name' => 'Portfolio',
    'singular_name' => 'Portfolio',
    'add_new' => 'Add Portfolio Item',
    'all_items' => 'All Items',
    'add_new_item' => 'Add Item',
    'edit_item' => 'Edit Item',
    'new_item' => 'New Item',
    'view_item' => 'View Item',
    'search_item' => 'Search Portfolio',
    'not_found' => 'No Items Found',
    'not_found_in_trash' => 'No items found in trash',
    'parent_item_colon' => 'Parent Item',
  );
  $portfolioargs = array(
    'labels' => $portfoliolabels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array(
      'title',
      'editor',
      'excerpt',
      'thumbnail',
      'revision'
    ),
    'menu_position' => 5,
    'exclude_from_search' => false,
    'menu_icon' => 'dashicons-portfolio',
  );
  // Creates the labels and arguments for the Clients custom post type
  $clientlabels = array(
    'name' => 'Clients',
    'singular_name' => 'Client',
    'add_new' => 'Add Client',
    'all_items' => 'All Clients',
    'add_new_item' => 'Add Client',
    'edit_item' => 'Edit Client',
    'new_item' => 'New Client',
    'view_item' => 'View Client',
    'search_item' => 'Search Clients',
    'not_found' => 'No Clients Found',
    'not_found_in_trash' => 'No clients found in trash',
    'parent_item_colon' => 'Parent Client',
  );
  $clientargs = array(
    'labels' => $clientlabels,
    'public' => true,
    'has_archive' => true,
    'publicly_queryable' => true,
    'query_var' => true,
    'rewrite' => true,
    'capability_type' => 'post',
    'hierarchical' => false,
    'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revision' ),
    'menu_position' => 5,
    'exclude_from_search' => false,
    'menu_icon' => 'dashicons-groups',
  );
  // Registers both of the custom post types above
  register_post_type( 'portfolio', $portfolioargs );
  register_post_type( 'clients', $clientargs );
}

add_action( 'init', 'antagonist_custom_post_type' );

// ==============================
// Custom Taxonomies
// ==============================

function antagonist_custom_taxonomies() {

  // Add new Hierarchical taxonomy (CATEGORIES)

  $portfoliolabels = array(
    'name' => 'Kinds',
    'singular_name' => 'Kind',
    'search_items' => 'Search Kinds',
    'all_items' => 'All Kinds',
    'parent_item' => 'Parent Kind',
    'parent_item_colon' => 'Parent Kind',
    'edit_item' => 'Edit Kind',
    'update_item' => 'Update Kind',
    'add_new_item' => 'Add New Kind',
    'new_item_name' => 'New Kind Name',
    'menu_name' => 'Kind'
  );
  $portfolioargs = array(
    'hierarchical' => true,
    'labels' => $portfoliolabels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'kind' )
  );
  $clientlabels = array(
    'name' => 'Companies',
    'singular_name' => 'Company',
    'search_items' => 'Search Companies',
    'all_items' => 'All Companies',
    'parent_item' => 'Parent Companies',
    'parent_item_colon' => 'Parent Companies',
    'edit_item' => 'Edit Companies',
    'update_item' => 'Update Companies',
    'add_new_item' => 'Add New Company',
    'new_item_name' => 'New Company Name',
    'menu_name' => 'Company'
  );
  $clientargs = array(
    'hierarchical' => true,
    'labels' => $clientlabels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'company' )
  );

  register_taxonomy( 'kind', array('portfolio'), $portfolioargs );
  register_taxonomy( 'company', array('clients'), $clientargs );

  // Add new non-hierarchical taxonomy (TAGS)

  register_taxonomy( 'software', 'portfolio', array(
    'label' => 'Software',
    'rewrite' => array( 'slug' => 'software' ),
    'hierarchical' => false
  ) );
  register_taxonomy( 'coding', 'portfolio', array(
    'label' => 'Programming Languages',
    'rewrite' => array( 'slug' => 'coding' ),
    'hierarchical' => false
  ) );
  register_taxonomy( 'clienttype', 'clients', array(
    'label' => 'Client Types',
    'rewrite' => array( 'slug' => 'client-type' ),
    'hierarchical' => false
  ) );
}

add_action( 'init', 'antagonist_custom_taxonomies' );

// ==============================
// Function to get custom terms (to add the taxonomies)
// e.g. Used in single-portfolio.php to call the custom taxonomies
// ==============================

function antagonist_get_terms( $postID, $term ){
  $terms_list = wp_get_post_terms($postID, $term);
  $output = '';

  $i = 0;
  foreach( $terms_list as $term ){ $i++;
    if( $i > 1 ){ $output .= ', '; }
    $output .= '<a href="' . get_term_link( $term ) . '">'. $term->name .'</a>';
  }

  return $output;
}
