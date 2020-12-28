<?php get_header(); ?>

  <?php get_template_part("lib/parts/parts-h1"); ?>
  <?php get_template_part("lib/parts/parts-breadcrumb"); ?>

  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <section>
    <div class="inner post_box single_box">
      <?php if( get_field('page_cont_img') ): ?>
        <div class="page_top_img_wrapper">
          <figure class="page_top_img">
            <img src="<?php the_field('page_cont_img'); ?>" />
          </figure>
        </div>
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