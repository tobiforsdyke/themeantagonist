<?php
/*
  Template Name: Page with No Title and Footer Socials
*/
get_header();?>

  <?php if( have_posts() ):
      while( have_posts() ): the_post(); ?>

        <small>Posted on: <?php the_time('j F Y'); ?> at <?php the_time('g:i a'); ?>, in <?php the_category(); ?></small>
        <p><?php the_content(); ?></p>
        <hr>

      <strong>FOOTER SOCIALS HERE</strong>

  <?php endwhile; ?>
  <?php endif; ?>

<?php get_footer();?>
