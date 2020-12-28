<?php get_header(); ?>

  <h1 class="page_ttl"<?php if(get_field('page_ttl_bg')): ?> style="background-image: url(<?php the_field('page_ttl_bg'); ?>);"<?php endif; ?>><?php post_type_archive_title(); ?></h1>
  <div class="breadcrumbBox">
    <?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
  </div>

  <div class="container gutters archive-works">
    <div class="row">
      <?php $count= 1; if (have_posts()) : while (have_posts()) : the_post(); ?>
        <article class="col span_4<?php if ($count % 3 == 0) {echo ' break';}?>">
          <figure class="archive_img">
            <?php
            //アイキャッチの取得
            if (has_post_thumbnail()){
              $image_id = get_post_thumbnail_id();
              $image = wp_get_attachment_image_src( $image_id, 'full');
              echo '<img src="'.$image[0].'" alt="'.get_the_title().'">';
              //記事本文の最初の画像を取得+アイキャッチも記事本文にも画像がない場合の処理
            } else {?>
              <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>">
            <?php } ?>
          </figure>
          <div class="archive_txt_wrap">
            <h2 class="archive_ttl"><?php the_title(); ?></h2>
            <p class="more">
              <a href="<?php the_permalink(); ?>">More</a>
            </p>
          </div>
        </article>
      <?php $count++; endwhile; ?>
			<?php endif; ?>
      <?php if (function_exists("pagination")) {
        pagination($additional_loop->max_num_pages);
      } ?>
    </div>
  </div><!-- /container -->

<?php get_template_part("lib/parts/content-info"); ?>
<?php get_footer(); ?>
