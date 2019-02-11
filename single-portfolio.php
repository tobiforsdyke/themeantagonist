<?php get_header();?>

<div class="row">

  <div class="col-12 col-lg-8">
    <?php if( have_posts() ):
        while( have_posts() ): the_post(); ?>

          <article class="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php the_title('<h1 class="entry-title">','</h1>'); ?>
            <?php if( has_post_thumbnail() ): ?>
              <div class="float-right"><?php the_post_thumbnail('thumbnail'); ?></div>
            <?php endif; ?>
            <small><?php
              // Display the custom taxonomies (portfolio kinds)
              $terms_list = wp_get_post_terms($post->ID, 'kind');
              $i = 0;
              foreach( $terms_list as $term ){ $i++;
                if( $i > 1 ){ echo ', '; }
                echo $term->name;
              }

            ?> | <?php

              $terms_list = wp_get_post_terms($post->ID, 'software');
              $i = 0;
              foreach( $terms_list as $term ){ $i++;
                if( $i > 1 ){ echo ', '; }
                echo $term->name;
              }

            ?> | <?php

              $terms_list = wp_get_post_terms($post->ID, 'coding');
              $i = 0;
              foreach( $terms_list as $term ){ $i++;
                if( $i > 1 ){ echo ', '; }
                echo $term->name;
              }

            ?> | <?php edit_post_link(); ?></small>
            <?php the_content(); ?>
            <hr>

            <!-- Pagination -->
            <div class="row">
              <div class="col-6 text-left">
                <?php previous_post_link(); ?>
              </div>
              <div class="col-6 text-right">
                <?php next_post_link(); ?>
              </div>
            </div>

          </article>

    <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <div class="col-12 col-lg-4">
    <?php get_sidebar('sidebar-1');?>
  </div>

</div>

<?php get_footer();?>
