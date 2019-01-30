<?php
/*
  Template Name: New Homepage with queries
*/
get_header();?>

<!-- This template displays the last three most recent posts, -->
<!-- the first as a full width post and the next two underneath alongside the sidebar -->

<div class="row">

    <div id="antagonist-carousel" class="carousel slide col-12" data-ride="carousel">
      <div class="carousel-inner">
        <!-- The looped array goes inside the carousel inner -->
        <?php

          $args_cat = array(
            'include' => '14, 15, 16'
          );

          $categories = get_categories($args_cat);
          $count = 0;
          $bullets = '';
          foreach($categories as $category):

            $args = array(
              'type' => 'post',
              'posts_per_page' => 3,
              'category__in' => $category->term_id,
            );
            $lastBlog = new WP_Query($args);

            if( $lastBlog->have_posts() ):
                while( $lastBlog->have_posts() ): $lastBlog->the_post(); ?>

                <div class="carousel-item <?php if($count == 0): echo 'active'; endif; ?>">
                  <?php the_post_thumbnail('full'); ?>
                  <div class="carousel-caption">
                    <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
                    <small><?php the_category(' '); ?></small>
                  </div>
                </div>

                <?php $bullets .= '<li data-target="#antagonist-carousel" data-slide-to="'.$count.'" class="'; ?>
                <?php if($count == 0): $bullets .='active'; endif; ?>
                <?php $bullets .= '"></li>' ?>

            <?php endwhile; ?>
            <?php endif;

            wp_reset_postdata();
            $count++;
          endforeach;
        ?>

        <ol class="carousel-indicators">
          <?php echo $bullets; ?>
        </ol>

      </div>
      <a class="carousel-control-prev" href="#antagonist-carousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#antagonist-carousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

</div>

<div class="row">

  <div class="col-12 col-sm-8">

  </div>

  <div class="col-12 col-sm-4">
    <?php get_sidebar();?>
  </div>

</div>

<?php get_footer();?>
