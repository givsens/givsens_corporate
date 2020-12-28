<section class="top_kiji_box">
  <div class="custom_content">
    <h2 class="style_ttl">最新の投稿</h2>
  </div>
  <?php query_posts('posts_per_page=4'); ?>
  <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <div class="top_kiji_box_in">
      <figure class="top_kiji_img">
        <a href="<?php the_permalink(); ?>" >
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
        </a>
      </figure>
      <h2 class="top_kiji_ttl"><?php if(mb_strlen($post->post_title)>27) { $title= mb_substr($post->post_title,0,27) ; echo $title. ･･･ ;} else {echo $post->post_title;}?></h2>
      <div class="top_kiji_txt"><?PHP print mb_substr(get_the_excerpt(), 0, 60)."…"; ?></div>
      <p class="btn_more"><a href="<?php the_permalink(); ?>" class="more">続きを読む</a></p>
    </div>
  <?php endwhile; endif; ?>
  <?php wp_reset_query(); ?>
</section>