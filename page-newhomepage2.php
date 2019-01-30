<?php
/*
  Template Name: New Homepage with last 3 featured news
*/
get_header();?>

<div class="row">

  <div class="col-12 col-sm-4">
    <?php
    $args = array(
      'type' => 'post',
      'posts_per_page' => 1,
      'category_name' => 'news-type-1'
    );
    $lastBlog = new WP_Query($args);

    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

          <?php get_template_part('content',get_post_format() ); ?>

    <?php endwhile; ?>
    <?php endif;
    // wp reset postdata to clean the above query and reset the post data
    wp_reset_postdata();
    ?>
  </div>

  <div class="col-12 col-sm-4">
    <?php
    $args = array(
      'type' => 'post',
      'posts_per_page' => 1,
      'category_name' => 'news-type-2'
    );
    $lastBlog = new WP_Query($args);

    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

          <?php get_template_part('content',get_post_format() ); ?>

    <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();
    ?>
  </div>

  <div class="col-12 col-sm-4">
    <?php
    $args = array(
      'type' => 'post',
      'posts_per_page' => 1,
      'category_name' => 'news-type-3'
    );
    $lastBlog = new WP_Query($args);

    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

          <?php get_template_part('content',get_post_format() ); ?>

    <?php endwhile; ?>
    <?php endif;
    wp_reset_postdata();
    ?>
  </div>

</div>

<?php get_footer();?>
