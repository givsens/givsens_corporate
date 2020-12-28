<?php get_header(); ?>

  <h2 class="page_ttl">よくある質問一覧</h2>
  <div class="breadcrumbBox">
    <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
  </div>



      <div class="pageBox archiveBox">
        <section>
          <div class="customContent">
            <ol>
              <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
              <li><a href="<?php the_permalink(); ?>" ><?php the_title(); ?></a></li>
              <?php endwhile; endif; ?>
            </ol>
          </div>
        </section>
      </div><!-- /.post -->


  <?php get_template_part("lib/parts/content-footer"); ?>


<?php get_footer(); ?>
