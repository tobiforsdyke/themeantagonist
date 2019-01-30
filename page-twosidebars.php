<?php
/*
  Template Name: Page with Two Sidebars
*/
get_header();?>

<div class="row">

  <div class="col-xs-12 col-sm-6">
    <?php if( have_posts() ):
        while( have_posts() ): the_post(); ?>

          <!-- Calls the standard post format from content.php -->
          <!-- Otherwise calls the get_post_format page (aside, image etc) -->
          <?php get_template_part('content',get_post_format() ); ?>

          <!-- Could also change the name to create other content pages -->
          <!-- <?php get_template_part('test',get_post_format() ); ?> -->

    <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <div class="col-xs-12 col-sm-3">
    <?php get_sidebar('sidebar-1');?>
  </div>

  <div class="col-xs-12 col-sm-3">
    <?php include('sidebar2.php');?>
  </div>

</div>

<?php get_footer();?>
