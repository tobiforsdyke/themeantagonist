<!DOCTYPE html>
<html <?php language_attributes(); ?>>
  <head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <title><?php bloginfo('name'); ?><?php wp_title('|'); ?></title>
    <meta name="description" content="<?php bloginfo('description'); ?>">
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
        <div class="col-12">
          <!-- Adds the custom header defined under theme options -->
          <img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="">

          <!-- Test jumbotron which includes the custom header image -->
          <!-- <div class="jumbotron" style="margin-bottom: 0px; background-image: url(<?php header_image(); ?>); background-size: 100%; background-repeat: no-repeat;">
            <h1>Header</h1>
            <p>Paragraph</p>
          </div> -->

          <!-- Adds the menu -->
          <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
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
              'theme_location' => 'primary',
              'container' => 'nav',
              'container_class' => 'collapse navbar-collapse',
              'container_id' => 'menuItemsCollapsed1',
              'menu_class' => 'nav navbar-nav ml-auto navbar nav-item nav-link',
              'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'link_class' => 'nav-link',
              'walker' => new Walker_Nav_Primary()
              // 'items_wrap'=>'%3$s'
              // 'menu_id'=>''
              // 'fallback_cb' => '__return_false'
            ) ); ?>
            <!-- </div> -->
          </nav>

          <div class="col-12">
            <div class="search-form-container">
              <div class="container">
                <?php get_search_form(); ?>
              </div>
            </div>
          </div>

          <hr>

        </div>
      </div>
