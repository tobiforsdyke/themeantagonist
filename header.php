<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Antagonist Theme</title>
    <?php wp_head(); ?>
  </head>

  <!-- Adds specific class if on front page only otherwise different class -->
  <!-- Remember Wordpress classes home as the one with blogroll on it -->
  <!-- Use if( is_home() ) instead if wanting to change the blog -->
  <?php
    if( is_front_page() ):
      $antagonist_classes = array('antagonist-class', 'my-class');
    else:
      $antagonist_classes = array('no-antagonist-class');
    endif;
  ?>

  <!-- Adds dynamic classes to the body tag -->
  <body <?php body_class( $antagonist_classes ); ?>>

    <?php wp_nav_menu( array('theme_location'=>'primary') ); ?>

    <!-- Adds the custom header defined under theme options -->
    <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">
