<?php /*Template Name: page-contact */ ?>
<?php get_header(); ?>

  <h1 class="page_ttl"<?php if(get_field('page_ttl_bg')): ?> style="background-image: url(<?php the_field('page_ttl_bg'); ?>);"<?php endif; ?>><?php the_title(); ?></h1>

  <div class="breadcrumbBox">
    <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
  </div>

  <?php //do_shortcode('[mwform_formkey key="12"]'); //MW WP Form ショートコードを反映させるための記述 ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section>
    <div class="inner post_box">
      <?php if( get_field('page_cont_img') ): ?>
        <figure class="page_top_img">
          <img src="<?php the_field('page_cont_img'); ?>" />
        </figure>
      <?php endif; ?>
      <div class="post_box_in">
        <?php the_content(); ?>
        <?php get_template_part("lib/parts/content-parts"); ?>
      </div>
    </div><!-- /.post -->
  </section>
  <?php endwhile; endif; ?>


<?php get_template_part("lib/parts/content-info"); ?>
<?php get_footer(); ?>
