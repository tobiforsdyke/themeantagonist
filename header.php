<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Antagonist Theme</title>
    <?php wp_head(); ?>
  </head>

  <!-- Adds specific class if on front page only otherwise different class -->
  <!-- Remember Wordpress classes 'home' as the one with blogroll on it -->
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
        <div class="col-lg-12">
          <!-- Adds the custom header defined under theme options -->
          <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">

          <!-- Test jumbotron which includes the custom header image -->
          <div class="jumbotron" style="margin-bottom: 0px; background-image: url(<?php header_image(); ?>); background-size: 100%; background-repeat: no-repeat;">
            <h1>Header</h1>
            <p>Paragraph</p>
          </div>

          <!-- Adds the menu -->


          <nav class="navbar navbar-expand-md navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <!-- Add the toggle button -->
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuItemsCollapsed1" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            <!-- Add the collapsable part -->
            <!-- The line below is not needed now as the class and id are in the array -->
            <!-- <div class="collapse navbar-collapse" id="menuItemsCollapsed1"> -->
            <!-- Add the wordpress menu -->
            <?php wp_nav_menu( array(
              'theme_location'=>'primary',
              'container'=>'nav',
              'container_class'=>'collapse navbar-collapse',
              'container_id'=>'menuItemsCollapsed1',
              'menu_class'=>'nav navbar-nav ml-auto navbar nav-item',
              'items_wrap'=>'<ul id="%1$s" class="%2$s">%3$s</ul>'
              // 'items_wrap'=>'%3$s'
              // 'menu_id'=>''
              // 'fallback_cb'=>false
            ) ); ?>
            <!-- </div> -->
          </nav>

<hr />

          <!-- Alternate Navbar testing -->
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Navbar</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ml-auto">
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

          <hr />
          
        </div>
      </div>
