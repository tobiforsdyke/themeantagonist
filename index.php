<?php get_header();?>

<div class="row text-center">
  <div class="col-12"> FULL SIZE </div>

  <div class="col-6"> HALF SIZE </div>
  <div class="col-6"> HALF SIZE </div>

  <div class="col-4"> THIRD SIZE </div>
  <div class="col-4"> THIRD SIZE </div>
  <div class="col-4"> THIRD SIZE </div>
</div>

<div class="row">

  <div class="col-12 col-sm-8">
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

  <div class="col-12 col-sm-4">
    <?php get_sidebar();?>
  </div>

</div>

<?php get_footer();?>
