<?php get_header();?>

<div class="row">

  <div class="col-12 col-sm-8">

    <div class="row text-center">

    <?php if( have_posts() ): $i = 0;
        while( have_posts() ): the_post(); ?>

          <?php
            if($i==0): $column = 12;
            elseif($i > 0 && $i <= 2): $column = 6;
            elseif($i > 2): $column = 4;
            endif;
          ?>
            <div class="col-<?php echo $column; ?>">
              <?php if( has_post_thumbnail() ): ?>
                  <div class="thumbnail"><?php the_post_thumbnail('thumbnail'); ?></div>
              <?php endif; ?>
              <?php the_title( sprintf('<h1 class="entry-title"><a href="%s">', esc_url( get_permalink() ) ),'</a></h1>' ); ?>
              <small><?php the_category(' '); ?></small>
            </div>

    <?php $i++; endwhile;
    endif; ?>

    </div>

  </div>

  <div class="col-12 col-sm-4">
    <?php get_sidebar();?>
  </div>

</div>

<?php get_footer();?>
