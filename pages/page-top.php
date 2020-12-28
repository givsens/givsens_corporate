<?php /*Template Name: page-top */ ?>
<?php get_header(); ?>

<div class="page-load-anime js-ready-complete load-complete">
  <div class="first"></div>
  <div class="second"></div>
</div>

<div class="main_visual">
  <!-- <div class="main_visual_in main_visual_fade"></div> -->
  <a href="/solution/">
    <div class="main_visual_in">
      <p class="main_copy_left wow">DIGITAL DESIGN</p>
      <p class="main_copy_left wow">WEB DEVELOPMENT</p>
      <div class="main_copy3_wrap wow">
        <p class="main_copy3">CREATIVE<span>x</span>BUSINESS</p>
      </div>
      <div class="main_copy4_wrap">
        <p class="main_copy4">ビジネスの課題を、クリエイティブで解決。</p>
        <div class="main_copy_arrowWrap">
          <figure class="main_copy_arrow">
            <img src="<?php echo get_template_directory_uri(); ?>/lib/img/top/catchArrow.png" alt="">
          </figure>
        </div>
      </div>
    </div>
  </a>
  <div class="mv_achievements">
    <div class="mv_achievements_head_wrap">
      <p class="mv_achievements_head">2020年実績</p>
      <p class="mv_achievements_head"><span class="mv_achievements_head mv_achievementsNum" data-num="179">0</span>件</p>
    </div>
    <div class="mv_achievements_list">
      <p>サロン・エステ・美容関連</p>
      <!-- <p><span class="mv_achievementsNum" data-num="11">0</span>件</p> -->
      <p>31件</p>
    </div>
    <div class="mv_achievements_list">
      <p>ペットサロン・動物病院</p>
      <!-- <p><span class="mv_achievementsNum" data-num="20">0</span>件</p> -->
      <p>49件</p>
    </div>
    <div class="mv_achievements_list">
      <p>飲食店舗</p>
      <!-- <p><span class="mv_achievementsNum" data-num="17">0</span>件</p> -->
      <p>36件</p>
    </div>
    <div class="mv_achievements_list">
      <p>クリニック・介護関連事業</p>
      <!-- <p><span class="mv_achievementsNum" data-num="5">0</span>件</p> -->
      <p>19件</p>
    </div>
    <div class="mv_achievements_list">
      <p>建設業・運輸業</p>
      <!-- <p><span class="mv_achievementsNum" data-num="4">0</span>件</p> -->
      <p>20件</p>
    </div>
    <div class="mv_achievements_list">
      <p>その他</p>
      <!-- <p><span class="mv_achievementsNum" data-num="2">0</span>件</p> -->
      <p>24件</p>
    </div>
  </div>
</div>

<section class="topics_box">
  <h2 class="ttl">NEWS</h2>
  <div class="topics_box_in">
    <ul class="ticker">
      <?php
      $myposts = get_posts('numberposts=3&post_type=news'); //表示数＆カスタム投稿名
      foreach ($myposts as $post) :
      ?>
        <li><span><?php echo date("Y.m.d", strtotime($post->post_date)); ?> </span>
          <?php
          $days = 14; //Newをつける日数
          $today = date_i18n('U');
          $entry = get_the_time('U');
          $diff1 = date('U', ($today - $entry)) / 86400;
          if ($days > $diff1) {
            echo '<span class="iconNew">New!</span>';
          }
          ?>
          <a href="<?php the_permalink(); ?>">
            <?php //文字制限し、それを超えた場合は「……」を付ける
            if (mb_strlen($post->post_title, 'UTF-8') > 40) {
              $title = mb_substr($post->post_title, 0, 40, 'UTF-8');
              echo $title . '……';
            } else {
              echo $post->post_title;
            }
            ?>
          </a>
        </li>
      <?php endforeach; ?>
      <?php wp_reset_query(); ?>
    </ul>
  </div>
</section>
<section class="achievements_wrap">
  <div class="container gutters" style="margin-bottom: 0;">
    <div class="row">
      <div class="achievements">
        <div class="achievements_head_wrap">
          <p class="achievements_head"><span>2020</span>年実績</p>
          <p class="achievements_head"><span class="achievements_head achievementsNum" data-num="179">179</span>件</p>
        </div>
        <div class="achievements_list">
          <p>サロン・エステ・美容関連</p>
          <!-- <p><span class="achievementsNum" data-num="11">0</span>件</p> -->
          <p>31件</p>
        </div>
        <div class="achievements_list">
          <p>ペットサロン・動物病院</p>
          <!-- <p><span class="achievementsNum" data-num="20">0</span>件</p> -->
          <p>49件</p>
        </div>
        <div class="achievements_list">
          <p>飲食店舗</p>
          <!-- <p><span class="achievementsNum" data-num="17">0</span>件</p> -->
          <p>36件</p>
        </div>
        <div class="achievements_list">
          <p>クリニック・介護関連事業</p>
          <!-- <p><span class="achievementsNum" data-num="5">0</span>件</p> -->
          <p>19件</p>
        </div>
        <div class="achievements_list">
          <p>建設業・運輸業</p>
          <!-- <p><span class="achievementsNum" data-num="4">0</span>件</p> -->
          <p>20件</p>
        </div>
        <div class="achievements_list">
          <p>その他</p>
          <!-- <p><span class="achievementsNum" data-num="2">0</span>件</p> -->
          <p>24件</p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sec01">
  <h2>ABOUT</h2>
  <h3><span>WEBサイト制作やプロモーション</span><br><span>制作をもっとグッと良いモノに</span></h3>
  <p class="more_btn">
    <a href="<?php echo home_url(); ?>/concept/" title="CONCEPT"><span>CONCEPT</span></a>
  </p>
  <div class="sec01_text_box">
    <div class="sec01_text_box_in">
      <p>株式会社ギブセンスでは、様々なモノの制作を行っています。<br>
        WEBサイト・ホームページの制作、ECサイト制作、フライヤーのデザイン、飲食店メニューのデザイン、ロゴデザイン、名刺デザインから映像制作。制作会社として多くの制作に関わっております。<br>制作に関してのプランニングやコンサルティングも行い、制作後のプロモーション提案や実行も行わせていただきます。</p>
      <div class="works_slider">
        <?php $args = array(
          'numberposts' => 12, //表示（取得）する記事の数（-1で全件表示）
          'post_type' => 'works' //投稿タイプの指定
        );
        $posts = get_posts($args);
        if ($posts) : foreach ($posts as $post) : setup_postdata($post); ?>

            <?php if (has_post_thumbnail()) : ?>
              <div><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
            <?php endif; ?>

          <?php endforeach; ?>
        <?php endif;
        wp_reset_postdata(); //クエリのリセット 
        ?>
      </div>
      <p class="more_btn mb0">
        <a href="<?php echo home_url(); ?>/works/" title="WORKS"><span>WORKS</span></a>
      </p>
    </div>
  </div>
</section>
<section class="sec_top_slider">
  <div class="sec_top_slider_in">
    <div class="slide">
      <img src="<?php echo get_template_directory_uri(); ?>/lib/img/top/top_slide001.jpg" alt="Web Create">
      <div class="slide_content_wrap">
        <div class="slide_content">
          <h2 class="slide_title">Web Create</h2>
          <p class="slide_text">
            品質を重要視し、運営の課題に向き合い<br>
            課題の解決を行うための制作を行います
          </p>
          <p class="more_btn mb0">
            <a href="<?php echo home_url(); ?>/web/" title="詳しくはこちら"><span>詳しくはこちら</span></a>
          </p>
        </div>
      </div>
    </div>
    <div class="slide">
      <img src="<?php echo get_template_directory_uri(); ?>/lib/img/top/top_slide002.jpg" alt="Planning">
      <div class="slide_content_wrap">
        <div class="slide_content">
          <h2 class="slide_title">Planning</h2>
          <p class="slide_text">
            WEBサイトのアクセス増加のため、<br>
            サイト解析からのプランニングを行わせていただきます。
          </p>
          <p class="more_btn mb0">
            <a href="<?php echo home_url(); ?>/planning/" title="詳しくはこちら"><span>詳しくはこちら</span></a>
          </p>
        </div>
      </div>
    </div>
    <div class="slide">
      <img src="<?php echo get_template_directory_uri(); ?>/lib/img/top/top_slide003.jpg" alt="Promortion">
      <div class="slide_content_wrap">
        <div class="slide_content">
          <h2 class="slide_title">Promortion</h2>
          <p class="slide_text">
            WEBサイトを利用したプロモーションの<br class="pc">ご提案から実施までをサポートいたします
          </p>
          <p class="more_btn mb0">
            <a href="<?php echo home_url(); ?>/promortion/" title="詳しくはこちら"><span>詳しくはこちら</span></a>
          </p>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="sec02">
  <div class="container">
    <div class="row">
      <div class="col span_6 wow fadeIn">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/lib/img/top/top_img001.jpg" alt="ホームページの制作パッケージサービス「ホームページonline」">
        </figure>
        <div class="text_box">
          <h2>ホームページ制作パッケージ</h2>
          <p>ホームページの制作パッケージサービス「ホームページonline」も株式会社ギブセンスが運営。<br>
            パッケージサービスのため、初期費用・月額費用を抑えての制作が可能となっております。<br>
            リーズナブルなホームページでも更新システム（CMS）といった機能を付与していますので、簡易な修正・変更であればすぐにご対応いただけます。また、構築に関してのサポートも行い、ご希望に寄り添ったサービスを展開しております。
          </p>
          <p class="more_btn mb0">
            <a href="https://xn--yck7ccu3lc.online/" target="_blank" title="詳しくはこちら"><span>詳しくはこちら</span></a>
          </p>
        </div>
      </div>
      <div class="col span_6 wow fadeIn">
        <figure>
          <img src="<?php echo get_template_directory_uri(); ?>/lib/img/top/top_img002.jpg" alt="集客用のアプリ、「集客App」">
        </figure>
        <div class="text_box">
          <h2>集客用のアプリ、「集客App」</h2>
          <p>スマートフォンが普及してから、爆発的な広がりをみせるアプリ。<br>
            株式会社ギブセンスでは、オリジナルアプリを破格の費用にて制作しております。<br>
            お客様へアプローチする機能を豊富に揃えたお客様と繋がるためのアプリ、それが「集客App」です。<br>
            飲食店や美容室サロン・エンターテイメント店舗・アパレル店舗・EC/実店舗の集客用アプリとして、月額9,800円〜の格安アプリです。</p>
          <p class="more_btn mb0">
            <a href="http://givsens.com/" target="_blank" title="詳しくはこちら"><span>詳しくはこちら</span></a>
          </p>
        </div>
      </div>
    </div>
</section>
<section class="top-column">
  <div class="container mb0">
    <h2>Column</h2>
    <div class="article-wrapper">
      <?php
      $args = array(
        'post_type'      => 'column', // スラッグ名
        'order'          => 'DESC', // 表示順
        'post_status' => 'publish', // 公開済の投稿を指定
        'posts_per_page' => 3, // 記事数
      );
      $query = new WP_Query($args); // WP_Queryのオブジェクト（インスタンス）を作成
      if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
      ?>
          <div class="column-article">
            <a href="<?php the_permalink(); ?>">
              <div class="item-image">
                <p class="item-image__inner">
                  <?php if (has_post_thumbnail()) {
                    $image_id = get_post_thumbnail_id();
                    $image = wp_get_attachment_image_src($image_id, 'full');
                    // 記事本文の最初の画像を取得
                    echo '<img src="' . $image[0] . '" alt="' . get_the_title() . '">';
                  } else { // アイキャッチも記事本文にも画像がない場合 
                  ?>
                    <img src="<?php echo catch_that_image(); ?>" alt="<?php the_title(); ?>">
                  <?php } ?>
                </p>
              </div>
              <p class="item-title"><?php the_title(); ?></p>
            </a>
          </div>
      <?php endwhile;
      endif;
      wp_reset_postdata(); ?>
    </div>
  </div>
</section>
<?php get_template_part("lib/parts/content-info"); ?>
<?php get_footer(); ?>