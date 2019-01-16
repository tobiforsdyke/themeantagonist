<?php get_header();?>

  <?php if( have_posts() ):
      while( have_posts() ): the_post(); ?>

        <!-- Calls the standard post format from content.php -->
        <!-- Otherwise calls the get_post_format page (aside, image etc) -->
        <?php get_template_part('content',get_post_format() ); ?>

        <!-- Could also change the name to create other content pages -->
        <!-- <?php get_template_part('test',get_post_format() ); ?> -->

  <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();?>
