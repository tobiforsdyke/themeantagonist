<!-- This is the search results page -->

<?php get_header();?>

<div class="row">

  <div class="col-12 col-lg-8">

    <div class="row">

    <?php if( have_posts() ):
        while( have_posts() ): the_post(); ?>

          <!-- Call the content-search.php template file -->
          <?php get_template_part('content', 'search'); ?>

    <?php endwhile;
    endif; ?>

    </div>

  </div>

  <div class="col-12 col-lg-4">
    <?php get_sidebar();?>
  </div>

</div>

<?php get_footer();?>
