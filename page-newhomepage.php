<?php
/*
  Template Name: New Homepage with queries
*/
get_header();?>

<!-- This template displays the last three most recent posts, -->
<!-- the first as a full width post and the next two underneath alongside the sidebar -->

<div class="row">

    <?php

      $args_cat = array(
        'include' => '14, 15, 16'
      );

      $categories = get_categories($args_cat);
      foreach($categories as $category):

        $args = array(
          'type' => 'post',
          'posts_per_page' => 1,
          'category__in' => $category->term_id,
        );
        $lastBlog = new WP_Query($args);

        if( $lastBlog->have_posts() ):
            while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

              <div class="col-xs-12 col-sm-4">
                <?php get_template_part('content','featured'); ?>
              </div>

        <?php endwhile; ?>
        <?php endif;

        wp_reset_postdata();

      endforeach;

/*
    ?>
  </div>

  <div class="col-xs-12 col-sm-8">
    <?php if( have_posts() ):
        while( have_posts() ): the_post(); ?>

          <!-- Calls the standard post format from content.php -->
          <!-- Otherwise calls the get_post_format page (aside, image etc) -->
          <?php get_template_part('content',get_post_format() ); ?>

    <?php endwhile; ?>
    <?php endif;
    // PRINT NEXT 2 POSTS BUT NOT THE FIRST ONE USING OFFSET VARIBLE
    $args = array(
      'type' => 'post',
      'posts_per_page' => 2,
      'offset' => 1
    );

    $lastBlog = new WP_Query($args);

    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

          <?php get_template_part('content',get_post_format() ); ?>

    <?php endwhile; ?>
    <?php endif;

    wp_reset_postdata();

    ?>

    <hr />

    <?php
    // PRINT ONLY ALL THE NEWS TYPE 1's, POSTS PER PAGE -1 MEANS INFINITE

    $args = array(
      'type' => 'post',
      'posts_per_page' => -1,
      'category_name' => 'news-type-1'
    );
    $lastBlog = new WP_Query($args);

    if( $lastBlog->have_posts() ):
        while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

          <?php get_template_part('content',get_post_format() ); ?>

    <?php endwhile; ?>
    <?php endif;

    wp_reset_postdata();
*/
    ?>

</div>

<div class="row">

  <div class="col-xs-12 col-sm-8">

  </div>

  <div class="col-xs-12 col-sm-4">
    <?php get_sidebar();?>
  </div>

</div>

<?php get_footer();?>
