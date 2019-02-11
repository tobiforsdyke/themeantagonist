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
              <!-- Below Uses the 'Function to get custom terms' from functions.php -->
              <small><?php
                echo antagonist_get_terms( $post->ID, 'kind' );
              ?> | <?php
                echo antagonist_get_terms( $post->ID, 'software' );
              ?> | <?php
                echo antagonist_get_terms( $post->ID, 'coding' );
              ?><?php
                if( current_user_can('manage_options') ) {
                echo ' | '; edit_post_link();
                }
              ?></small>
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
