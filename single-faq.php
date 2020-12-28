<?php get_header(); ?>

  <h1 class="page_ttl"<?php if(get_field('page_ttl_bg')): ?> style="background-image: url(<?php the_field('page_ttl_bg'); ?>);"<?php endif; ?>><?php the_title(); ?></h1>
  <div class="breadcrumbBox">
    <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
  </div>

  <article>
    <div class="singleBox post">
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
      <h2 class="singleTtl"><?php the_title(); ?></h2>
      <div class="single_txt_box"><?php the_content(); ?></div>
      <?php endwhile; endif; ?>
    </div><!-- /.post -->
  </article>

<?php get_footer(); ?>
