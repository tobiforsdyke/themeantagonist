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

  <!-- Adds the above dynamic classes to the body tag -->
  <body <?php body_class( $antagonist_classes ); ?>>

    <div class="container">

      <div class="row">
        <div class="col-xs-12">
          <!-- Adds the custom header defined under theme options -->
          <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">
          <!-- Adds the menu -->

          <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#!">Navbar</a>
            <?php wp_nav_menu( array('theme_location'=>'primary') ); ?>
          </nav>


          <!-- Alternate Navbar testing -->
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                  <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link disabled" href="#">Disabled</a>
                </li>
              </ul>
            </div>
          </nav>





        </div>
      </div>
