<?php /*Template Name: sample-parts */ ?>
<?php get_header(); ?>
  <div id="container">
    <h1 class="page_ttl"<?php if(get_field('page_ttl_bg')): ?> style="background-image: url(<?php the_field('page_ttl_bg'); ?>);"<?php endif; ?>><?php the_title(); ?></h1>

    <div class="breadcrumbBox">
      <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
    </div>



    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <section>
      <div class="inner post_box">
        <?php the_content(); ?>
        <?php get_template_part("lib/parts/content-parts"); ?>
      </div><!-- /.post -->
    </section>
    <?php endwhile; endif; ?>


    
    <?php get_template_part("lib/parts/content-kiji"); ?>
    <?php get_template_part("lib/parts/content-footer"); ?>
    <?php get_template_part("lib/parts/content-info"); ?>
    <?php get_template_part("lib/parts/content-sns"); ?>
  </div><!-- /#container -->
<?php get_footer(); ?>
