<?php /*Template Name: page-password */ ?>
<?php get_header(); ?>

  <div id="container">
    <div class="breadcrumbBox">
      <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
    </div>
    <div class="inner cf">

        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article>
          <div class="post_box">
            <div><?php the_content(); ?></div>

<?php if ( !post_password_required( $post->ID ) ) : ?>
<?php echo get_post_meta( $post->ID, 'key', true ); ?>
            <?php get_template_part("lib/parts/content-parts"); ?>
<?php endif; ?>

          </div><!-- /.post -->
        </article>
        <?php endwhile; endif; ?>

    </div><!-- /.inner -->
    <?php //get_template_part("lib/parts/content-footer"); ?>
  </div><!-- /#container -->
<?php get_footer(); ?>
