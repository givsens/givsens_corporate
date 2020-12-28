<?php get_header(); ?>

  <h1 class="page_ttl"<?php if(get_field('page_ttl_bg')): ?> style="background-image: url(<?php the_field('page_ttl_bg'); ?>);"<?php endif; ?>><?php post_type_archive_title(); ?></h1>
  <div class="breadcrumbBox">
    <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
  </div>

  <div class="inner post_box archive_box">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <article class="archive_box_inner custom_content">
      <h2 class="archive_ttl"><?php the_title(); ?></h2>
      <p class="archive_data"><?php the_time('Y/m/d'); ?></p>
      <div class="archive_txt_box"><?php the_excerpt(); ?></div>
      <p class="btn_more"><a href="<?php the_permalink(); ?>" >続きを読む</a></p>
    </article>
  <?php endwhile; endif; ?>
  </div><!-- /.inner -->

  <?php if (function_exists("pagination")) {
      pagination($additional_loop->max_num_pages);
  } ?>

<?php get_footer(); ?>
