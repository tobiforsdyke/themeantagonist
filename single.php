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
            <small><?php the_category(' '); ?> || <?php the_tags(); ?> || <?php edit_post_link(); ?></small>
            <?php the_content(); ?>
          </article>

    <?php endwhile; ?>
    <?php endif; ?>
  </div>

  <div class="col-12 col-lg-4">
    <?php get_sidebar('sidebar-1');?>
  </div>

</div>

<?php get_footer();?>
