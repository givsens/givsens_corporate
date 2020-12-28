<?php if( have_rows('parts_set') ): //柔軟コンテンツフィールドの値を持っているかどうかをチェック ?>
<div class="custom_content">
  <?php while ( have_rows('parts_set') ) : the_row(); //値のループ ?>

  <?php if(get_row_layout() == 'm_ttl_set') : ?>
    <h2 class="style_ttl style_ttl_pin">
      <?php the_sub_field('m_ttl'); //中見出し（h2） ?>
    </h2>
  <?php elseif(get_row_layout() == 's_ttl_set') : ?>
    <h3 class="style_ttl style_ttl_pin">
      <?php the_sub_field('s_ttl'); //小見出し（h3） ?>
    </h3>
  <?php elseif(get_row_layout() == 'ss_ttl_set') : ?>
    <h4 class="style_ttl style_ttl_pin">
      <?php the_sub_field('ss_ttl'); //極小見出し（h4） ?>
    </h4>


  <?php elseif(get_row_layout() == 'acf_container'): ?>

    <?php
      $margin = get_sub_field('acf_container_margin'); // 余白
      $class = 'acf_container_class'; // クラス付与
      $reverse = get_sub_field('acf_container_reverse'); // 左右切り替え
      $spCol2 = get_sub_field('acf_container_sp_col'); // スマホ2カラム
      $spCol3 = get_sub_field('acf_container_sp_col'); // スマホ3カラム
      $col = 'acf_container_col'
    ?>

    <div class="container<?php // 余白の有無
      if($margin == 'true') {echo " gutters";}
      else {echo "";}
      ?><?php // クラス付与
        if(get_sub_field($class)) {echo the_sub_field($class);}
        else {echo "";}
      ?>">

      <div class="row<?php // 左右切り替え
        if($reverse == 'true') {echo " reverse";}
        else {echo "";}
        ?><?php // スマホ時のカラム設定
        if($spCol2 == 'col2') {echo " sp_image_cols sp_col2";}        elseif($spCol3 == 'col3') {echo "sp_image_cols sp_col3";}
        else {echo "";}?>">

        <?php if(have_rows($col)): ?>
          <?php while(have_rows($col)): the_row(); ?>

            <?php
              $span = get_sub_field('acf_container_span');
              $offset = get_sub_field('acf_container_offset');
              $break = get_sub_field('acf_container_break');
            ?>

            <div class="col<?php // 列の割合
              if($span == 'span_1') {echo " span_1";}
              elseif($span == 'span_2') {echo " span_2";}
              elseif($span == 'span_3') {echo " span_3";}
              elseif($span == 'span_4') {echo " span_4";}
              elseif($span == 'span_5') {echo " span_5";}
              elseif($span == 'span_6') {echo " span_6";}
              elseif($span == 'span_7') {echo " span_7";}
              elseif($span == 'span_8') {echo " span_8";}
              elseif($span == 'span_9') {echo " span_9";}
              elseif($span == 'span_10') {echo " span_10";}
              elseif($span == 'span_11') {echo " span_11";}
              else {echo "span_12";}
              ?><?php // 列の余白
              if($offset == 'offset_1') {echo " offset_1";}
              elseif($offset == 'offset_2') {echo " offset_2";}
              elseif($offset == 'offset_3') {echo " offset_3";}
              elseif($offset == 'offset_4') {echo " offset_4";}
              elseif($offset == 'offset_5') {echo " offset_5";}
              elseif($offset == 'offset_6') {echo " offset_6";}
              elseif($offset == 'offset_7') {echo " offset_7";}
              elseif($offset == 'offset_8') {echo " offset_8";}
              elseif($offset == 'offset_9') {echo " offset_9";}
              elseif($offset == 'offset_10') {echo " offset_10";}
              elseif($offset == 'offset_11') {echo " offset_11";}
              else {echo "";}
              ?><?php if($break): // 折り返し ?> break<?php endif; ?>">

        <?php if(have_rows('acf_container_parts')): ?>
          <?php while(have_rows('acf_container_parts')) : the_row(); ?>

            <?php
              $h2_set = 'acf_container_h2_set';
              $h2 = the_sub_field('acf_container_h2');
              $h3_set = 'acf_container_h3_set';
              $h3 = get_sub_field('acf_container_h3');
              $h4_set = 'acf_container_h4_set';
              $h4 = the_sub_field('acf_container_h4');
              $text_set = 'acf_container_text_set';
              $text = get_sub_field('acf_container_text');
              $img_set = 'acf_container_img_set';
              $img_position = get_sub_field('acf_container_img_position');
              $img_link = get_sub_field('acf_container_img_link');
            ?>

            <?php if(get_row_layout() == $h2_set): ?>
              <h2 class="style_ttl"><?php echo $h2; ?></h2>
            <?php elseif(get_row_layout() == $h3_set): ?>
              <h3 class="style_ttl"><?php echo $h3; ?></h3>
            <?php elseif(get_row_layout() == $h4_set) : ?>
              <h4 class="style_ttl"><?php echo $h4; ?></h4>
            <?php elseif(get_row_layout() == $text_set): ?>
              <div class="custom_txt"><?php echo $text; ?></div>
            <?php elseif(get_row_layout() == $img_set): // 画像 ?>
              <figure class="custom_img<?php // 画像の位置
                if($img_position == 'left') {echo " text_left";}
                elseif($img_position == 'center') {echo " text_center";}
                else {echo " text_right";}?>">

              <?php if($img_link == 'true'): ?>
              <?php $link = get_sub_field('acf_container_img_url'); ?>
              <?php
                if( $link ):
                  $link_url = $link['url'];
                  $link_target = $link['target'] ? $link['target'] : '_self';
                  ?>
                <?php endif; ?>
                <a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>">
                <?php elseif(get_sub_field('acf_container_img_lightbox')): ?>
                <a class="custom_gallery" href="<?php the_sub_field('acf_container_img'); ?>"<?php if( get_sub_field('acf_container_img_alt')): ?> title="<?php the_sub_field('acf_container_img_alt'); ?>"<?php endif; ?>>
                <?php endif; ?>
                <img src="<?php the_sub_field('acf_container_img'); ?>"<?php if( get_sub_field('acf_container_img_alt')): ?> alt="<?php the_sub_field('acf_container_img_alt'); ?>"<?php endif; ?> />
                <?php if(get_sub_field('acf_container_img_link') == 'true'): ?></a><?php elseif( get_sub_field('acf_container_img_lightbox')): ?></a><?php endif; ?>
              </figure>
            <?php elseif(get_row_layout() == 'acf_container_btn_set'): //ボタン ?>
              <?php $link = get_sub_field('acf_container_btn'); ?>
              <?php if( $link ): $link_url = $link['url']; $link_title = $link['title']; $link_target = $link['target'] ? $link['target'] : '_self'; ?>
              <?php endif; ?>
              <p class="parts_btn_type_a<?php if(get_sub_field('acf_container_btn_position') == 'left'): ?> text_left<?php elseif(get_sub_field('acf_container_btn_position') == 'center'): ?> text_center<?php else: ?> text_right<?php endif; ?>"><a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($link_target); ?>"><span><?php echo esc_html($link_title); ?></span></a></p>

            <?php endif; ?>
          <?php endwhile; ?>
        <?php endif; ?>

        </div>

        <?php endwhile; ?>
        <?php endif; ?>
      </div>
    </div>


  <?php elseif(get_row_layout() == 'txt_set') : //本文 ?>
    <div class="custom_txt">
      <?php the_sub_field('txt_honbun'); ?>
    </div>


  <?php elseif(get_row_layout() == 'img_set'): //画像 ?>

    <?php
      $device = get_sub_field('img_pc_or_sp'); // デバイス判定
      $img_position = get_sub_field('img_position'); // 位置
      $img_link = get_sub_field('img_link'); // リンク
    ?>

    <?php if(wp_is_mobile()): ?>
      <?php if($device == 'sp'): // 画像：スマホ ?>
        <p class="custom_img<?php // 位置
          if($img_position == 'left') {echo "text_left";}
          elseif($img_position == 'center') {echo "text_center";}
          elseif($img_position == 'right') {echo "text_right";}
          else {echo "";}?>">

          <?php if($img_link == 'true'): ?>
            <a href="<?php the_sub_field('img_link_url'); ?>"<?php if(get_sub_field('img_link_target') == 'blank'): ?> target="_blank"<?php endif; ?>>
          <?php elseif( get_sub_field('img_lightbox')): ?>
            <a class="custom_gallery" href="<?php the_sub_field('img_img'); ?>"<?php if( get_sub_field('img_alt')): ?> title="<?php the_sub_field('img_alt'); ?>"<?php endif; ?>>
          <?php endif; ?>
            <img src="<?php the_sub_field('img_img'); ?>"<?php if( get_sub_field('img_alt')): ?> alt="<?php the_sub_field('img_alt'); ?>"<?php endif; ?> />
          <?php if($img_link == 'true'): ?></a><?php elseif( get_sub_field('img_lightbox')): ?></a><?php endif; ?></p>
      <?php endif; ?>
    <?php else: ?>
      <?php if($device == 'pc'): //画像：PC ?>
        <p class="custom_img <?php if($img_position == 'left'): ?>text_left<?php elseif($img_position == 'center'): ?>text_center<?php elseif($img_position == 'right'): ?>text_right<?php endif; ?>">
          <?php if($img_link == 'true'): ?>
            <a href="<?php the_sub_field('img_link_url'); ?>"<?php if(get_sub_field('img_link_target') == 'blank'): ?> target="_blank"<?php endif; ?>>
          <?php elseif( get_sub_field('img_lightbox')): ?>
            <a class="custom_gallery" href="<?php the_sub_field('img_img'); ?>"<?php if( get_sub_field('img_alt')): ?> title="<?php the_sub_field('img_alt'); ?>"<?php endif; ?>>
          <?php endif; ?>
          <img src="<?php the_sub_field('img_img'); ?>"<?php if( get_sub_field('img_alt')): ?> alt="<?php the_sub_field('img_alt'); ?>"<?php endif; ?> />
          <?php if(get_sub_field('img_link') == 'true'): ?></a><?php elseif( get_sub_field('img_lightbox')): ?></a><?php endif; ?></p>
      <?php endif; ?>
    <?php endif; ?>
    <?php if($device == 'pcsp'): //画像：共通 ?>
      <p class="custom_img <?php if($img_position == 'left'): ?>text_left<?php elseif($img_position == 'center'): ?>text_center<?php elseif($img_position == 'right'): ?>text_right<?php endif; ?>">
        <?php if(get_sub_field('img_link') == 'true'): ?>
          <a href="<?php the_sub_field('img_link_url'); ?>"<?php if(get_sub_field('img_link_target') == 'blank'): ?> target="_blank"<?php endif; ?>>
        <?php elseif( get_sub_field('img_lightbox')): ?>
          <a class="custom_gallery" href="<?php the_sub_field('img_img'); ?>"<?php if( get_sub_field('img_alt')): ?> title="<?php the_sub_field('img_alt'); ?>"<?php endif; ?>>
        <?php endif; ?>
        <img src="<?php the_sub_field('img_img'); ?>"<?php if( get_sub_field('img_alt')): ?> alt="<?php the_sub_field('img_alt'); ?>"<?php endif; ?> />
        <?php if(get_sub_field('img_link') == 'true'): ?></a><?php elseif( get_sub_field('img_lightbox')): ?></a><?php endif; ?></p>
    <?php endif; ?>


  <?php elseif(get_row_layout() == 'imgs_set'): //画像（複数） ?>
    <?php
      $imgs_num = get_sub_field('imgs_set_img_num');
      $imgs_display = get_sub_field('imgs_set_img_display');
      $imgs_lightbox = get_sub_field('imgs_set_img_lightbox');
      // 画像1
      $img01 = 'imgs_set_img_01';
      $img01_alt = 'imgs_set_img_01_alt';
      $img01_ttl = 'imgs_set_img_01_ttl';
      $img01_txt = 'imgs_set_img_01_txt';
      $img01_btn = 'imgs_set_img_01_btn';
      $img01_url = 'imgs_set_img_01_url';
      $img01_target = get_sub_field('imgs_set_img_01_target');
      // 画像2
      $img02 = 'imgs_set_img_02';
      $img02_alt = 'imgs_set_img_02_alt';
      $img02_ttl = 'imgs_set_img_02_ttl';
      $img02_txt = 'imgs_set_img_02_txt';
      $img02_btn = 'imgs_set_img_02_btn';
      $img02_url = 'imgs_set_img_02_url';
      $img02_target = get_sub_field('imgs_set_img_02_target');
      // 画像3
      $img03 = 'imgs_set_img_03';
      $img03_alt = 'imgs_set_img_03_alt';
      $img03_ttl = 'imgs_set_img_03_ttl';
      $img03_txt = 'imgs_set_img_03_txt';
      $img03_btn = 'imgs_set_img_03_btn';
      $img03_url = 'imgs_set_img_03_url';
      $img03_target = get_sub_field('imgs_set_img_03_target');
      // 画像4
      $img04 = 'imgs_set_img_04';
      $img04_alt = 'imgs_set_img_04_alt';
      $img04_ttl = 'imgs_set_img_04_ttl';
      $img04_txt = 'imgs_set_img_04_txt';
      $img04_btn = 'imgs_set_img_04_btn';
      $img04_url = 'imgs_set_img_04_url';
      $img04_target = get_sub_field('imgs_set_img_04_target');
    ?>

    <ul class="imgs-block<?php if($imgs_num == '3'): // 3カラム ?> set-3<?php elseif($imgs_num == '4'): // 4カラム ?> set-4<?php endif; ?><?php if($imgs_display == 'tate'): ?> imgs-block-sp-tate<?php elseif($imgs_display == 'tate2'): ?> imgs-block-sp-tate2<?php endif; ?>">

      <?php if(get_sub_field($img01)): // 画像1 ?>
        <li>
          <p class="imgs-block-img">
            <?php if($imgs_lightbox): ?>
            <a class="custom_gallery" href="<?php the_sub_field($img01); ?>"<?php if(get_sub_field($img01_alt)): ?> title="<?php the_sub_field($img01_alt); ?>"<?php endif; ?>>
            <?php endif; ?>
              <img src="<?php the_sub_field($img01); ?>"<?php if( get_sub_field($img01_alt)): ?> alt="<?php the_sub_field($img01_alt); ?>"<?php endif; ?> />
              <?php if( $imgs_lightbox): ?>
            </a>
            <?php endif; ?>
          </p>
        <?php if(get_sub_field($img01_ttl)): ?>
          <p class="imgs-block-ttl"><?php the_sub_field($img01_ttl); ?></p>
        <?php endif; ?>
        <?php if(get_sub_field($img01_txt)): ?>
          <p class="imgs-block-txt"><?php the_sub_field($img01_txt); ?></p>
        <?php endif; ?>
        <?php if(get_sub_field($img01_btn)): ?>
          <p class="imgs-block-btn">
            <a href="<?php the_sub_field($img01_url); ?>" title="<?php the_sub_field($img01_btn); ?>" <?php if($img01_target == 'blank'): ?>target="_blank"<?php endif; ?>><?php the_sub_field($img01_btn); ?>
            </a>
          </p><?php endif; ?>
        </li><?php endif; ?>

      <?php if(get_sub_field($img02)): // 画像2 ?>
        <li>
          <p class="imgs-block-img">
            <?php if($imgs_lightbox): ?>
              <a class="custom_gallery" href="<?php the_sub_field($img02); ?>"<?php if( get_sub_field($img02_alt)): ?> title="<?php the_sub_field($img02_alt); ?>"<?php endif; ?>><?php endif; ?>
                <img src="<?php the_sub_field($img02); ?>"<?php if( get_sub_field($img02_alt)): ?> alt="<?php the_sub_field($img02_alt); ?>"<?php endif; ?> />
              <?php if($imgs_lightbox): ?>
              </a>
            <?php endif; ?>
          </p>
        <?php if(get_sub_field($img02_ttl)): // タイトル追加 ?>
          <p class="imgs-block-ttl"><?php the_sub_field($img02_ttl); ?></p>
        <?php endif; ?>
        <?php if(get_sub_field($img02_txt)): // テキスト追加 ?>
          <p class="imgs-block-txt"><?php the_sub_field($img02_txt); ?></p>
        <?php endif; ?>
        <?php if(get_sub_field($img02_btn)): // ボタン追加 ?>
          <p class="imgs-block-btn">
            <a href="<?php the_sub_field($img02_url); ?>" title="<?php the_sub_field($img02_btn); ?>" <?php if($img02_target == 'blank'): ?>target="_blank"<?php endif; ?>><?php the_sub_field($img02_btn); ?>
            </a>
          </p><?php endif; ?>
        </li><?php endif; ?>

      <?php if(($imgs_num == '3') || ($imgs_num == '4')): ?>
        <?php if(get_sub_field($img03)): // 画像3 ?>
          <li>
            <p class="imgs-block-img">
              <?php if($imgs_lightbox): ?>
              <a class="custom_gallery" href="<?php the_sub_field($img03); ?>"<?php if(get_sub_field($img03_alt)): ?> title="<?php the_sub_field($img03_alt); ?>"<?php endif; ?>><?php endif; ?>
                <img src="<?php the_sub_field($img03); ?>"<?php if( get_sub_field($img03_alt)): ?> alt="<?php the_sub_field($img03_alt); ?>"<?php endif; ?> /><?php if($imgs_lightbox): ?>
              </a><?php endif; ?>
            </p>
            <?php if(get_sub_field($img03_ttl)): // タイトル追加 ?>
              <p class="imgs-block-ttl"><?php the_sub_field($img03_ttl); ?></p>
            <?php endif; ?>
            <?php if(get_sub_field($img03_txt)): // テキスト追加 ?>
              <p class="imgs-block-txt"><?php the_sub_field($img03_txt); ?></p>
            <?php endif; ?>
            <?php if(get_sub_field($img03_btn)): // ボタン追加 ?><p class="imgs-block-btn">
              <a href="<?php the_sub_field($img03_url); ?>" title="<?php the_sub_field($img03_btn); ?>" <?php if($img03_target == 'blank'): ?>target="_blank"<?php endif; ?>><?php the_sub_field($img03_btn); ?>
              </a>
            </p><?php endif; ?>
          </li><?php endif; ?>

        <?php if(get_sub_field($img04)): // 画像4 ?>
          <li>
            <p class="imgs-block-img">
              <?php if($imgs_lightbox): ?>
                <a class="custom_gallery" href="<?php the_sub_field($img04); ?>"<?php if(get_sub_field($img04_alt)): ?> title="<?php the_sub_field($img04_alt); ?>"<?php endif; ?>><?php endif; ?>
                  <img src="<?php the_sub_field($img04); ?>"<?php if( get_sub_field($img04_alt)): ?> alt="<?php the_sub_field($img04_alt); ?>"<?php endif; ?> /><?php if($imgs_lightbox): ?>
                </a>
              <?php endif; ?>
            </p>
            <?php if(get_sub_field($img04_ttl)): // タイトル ?>
              <p class="imgs-block-ttl"><?php the_sub_field($img04_ttl); ?></p>
            <?php endif; ?>
            <?php if(get_sub_field($img04_txt)): // テキスト ?>
              <p class="imgs-block-txt"><?php the_sub_field($img04_txt); ?></p>
            <?php endif; ?>
            <?php if(get_sub_field($img04_btn)): // ボタン ?>
              <p class="imgs-block-btn">
                <a href="<?php the_sub_field($img04_url); ?>" title="<?php the_sub_field($img04_btn); ?>" <?php if($img04_target == 'blank'): ?>target="_blank"<?php endif; ?>><?php the_sub_field($img04_btn); ?>
                </a>
              </p>
            <?php endif; ?>
          </li>
        <?php endif; ?>
      <?php endif; ?>
    </ul>


  <?php elseif(get_row_layout() == 'parts_btn'): // ボタン ?>
    <?php
      $btn_type = get_sub_field('parts_btn_type');
      $btn_size = get_sub_field('parts_btn_size');
      $btn_position = get_sub_field('parts_btn_position');
      $btn_url = 'parts_btn_url';
      $btn_txt = 'parts_btn_txt';
      $btn_target = get_sub_field('parts_btn_link_target');
    ?>

    <p class="<?php // タイプ
      if($btn_type == 'parts_btn_type_a') {echo "parts_btn_type_a";}
      elseif($btn_type == 'parts_btn_type_b') {echo "parts_btn_type_b";}
      else {echo "parts_btn_type_c";}
      ?><?php // サイズ
      if($btn_size == 'small') {echo " btn_sm";}
      elseif($btn_size == 'large') {echo " btn_lg";}
      else {echo "";}
      ?><?php // 位置
      if($btn_position == 'left') {echo " text_left";}
      elseif($btn_position == 'center') {echo " text_center";}
      elseif($btn_position == 'right') {echo " text_right";}
      else {echo "";}
      ?>">

      <a href="<?php the_sub_field($btn_url); ?>" title="<?php the_sub_field($btn_txt); ?>" <?php if($btn_target == 'blank'): ?> target="_blank"<?php endif; ?>><span><?php the_sub_field($btn_txt); ?></span></a>
    </p>


  <?php elseif(get_row_layout() == 'custom_video_set'): // 埋め込み動画 ?>
    <div class="custom_video">
      <?php the_sub_field('custom_video_txt'); ?>
    </div>


  <?php elseif(get_row_layout() == 'custom_google_map_set'): // GoogleMap ?>
    <div class="custom_google_map">
      <?php the_sub_field('custom_google_map_txt'); ?>
    </div>


  <?php elseif(get_row_layout() == 'txt_img_set'): // 本文＋画像 ?>
    <?php
      $txt_img_percent = get_sub_field('txt_img_percent'); // 比率
      $txt_img_position = get_sub_field('txt_img_position'); // 位置
      $txt_img_lightbox = get_sub_field('txt_img_lightbox'); // Lightbox
      $txt_img_img = 'txt_img_img'; // 画像
      $txt_img_alt = 'txt_img_img_alt'; // alt
    ?>

    <div class="<?php // カラム指定
      if($txt_img_percent == '1_9') {echo "float-1-9";}
      elseif($txt_img_percent == '2_8') {echo "float-2-8";}
      elseif($txt_img_percent == '4_6') {echo "float-4-6";}
      elseif($txt_img_percent == '5_5') {echo "float-5-5";}
      elseif($txt_img_percent == '6_4') {echo "float-6-4";}
      elseif($txt_img_percent == '7_3') {echo "float-7-3";}
      elseif($txt_img_percent == '8_2') {echo "float-8-2";}
      elseif($txt_img_percent == '9_1') {echo "float-9-1";}
      else {echo "float-3-7";}?>">

      <div class="<?php // 画像
        if($txt_img_position == 'img_text'){echo 'left';}
        else{echo "right";}?>">

        <?php if($txt_img_lightbox): ?>
        <a class="custom_gallery" href="<?php the_sub_field('txt_img_img'); ?>" title="<?php the_sub_field('txt_img_img_alt'); ?>">
        <?php endif; ?>
          <img src="<?php the_sub_field($txt_img_img); ?>" alt="<?php the_sub_field($txt_img_alt); ?>" /><?php if($txt_img_lightbox): ?>
        </a>
        <?php endif; ?>
      </div>

      <div class="<?php // 本文
        if($txt_img_position == 'text_img'){echo 'left';}
        else{echo 'right';}?>">
        <?php the_sub_field('txt_img_honbun'); ?>
      </div>
    </div>


  <?php elseif(get_row_layout() == 'list_set'): // リスト ?>
    <div class="list-block">
      <?php
        $list_type = get_sub_field('list_set_type');
      ?>
      <?php if($list_type == 'bulletize'): ?><ul>
      <?php elseif($list_type == 'number'): ?><ol>
      <?php elseif($list_type == 'check'): ?><ul class="check">
      <?php endif; ?>
      <?php while(the_repeater_field('list_set_repeater')): ?>
        <?php if(get_sub_field('list_set_repeater_text')!=''): ?>
          <li><?php the_sub_field('list_set_repeater_text'); ?></li>
        <?php endif; ?>
      <?php endwhile; ?>
      <?php if($list_type == 'number'): ?></ol>
      <?php else: ?></ul>
      <?php endif; ?>
    </div>

  <?php elseif(get_row_layout() == 'menu_table_start_set'): //テーブル：デザイン（開始） ?><table class="<?php if(get_sub_field('menu_table_class_set') == 'normal'): ?>normal_table<?php elseif(get_sub_field('menu_table_class_set') == 'menu'): ?>menu_table<?php endif; ?>">


  <?php elseif(get_row_layout() == 'menu_table_set'): //テーブル：行の追加（2列） ?>
    <?php if(get_sub_field('menu_table_set_in')): ?>
      <?php while(the_repeater_field('menu_table_set_in')): ?>
        <tr><?php if(get_sub_field('menu_table_set_left')): ?><th><?php the_sub_field('menu_table_set_left'); ?></th><?php endif; ?><?php if(get_sub_field('menu_table_set_right')): ?><td><?php the_sub_field('menu_table_set_right'); ?></td><?php endif; ?></tr>
      <?php endwhile; ?>
    <?php endif; ?>
  <?php elseif(get_row_layout() == 'menu_table_set_1'): //テーブル：行の追加（1列） ?>
    <tr><td colspan="2" class="td_cp2"><?php the_sub_field('menu_table_set_in_1'); ?></td></tr>
  <?php elseif(get_row_layout() == 'menu_table_end_set'): //テーブル：デザイン（終了） ?></table>

  <?php elseif(get_row_layout() == 'surround_start_set'): //テーブル：デザイン（終了） ?><div<?php if(get_sub_field('surround_start_set_class')): ?> class="<?php the_sub_field('surround_start_set_class'); ?>"<?php endif; ?>>
  <?php elseif(get_row_layout() == 'surround_end_set'): //テーブル：デザイン（終了） ?></div>

  <?php elseif(get_row_layout() == 'table_default_set'): //テーブル複数セル用 ?>
  <?php
  $table = get_sub_field( 'table_default' );
  if ( $table ) {
    echo '<p class="table_notes">← 下記の表は左右にスライドできます →</p>';
    echo '<div class="custom_table_scroll">';
    echo '<table class="normal_table custom_table">';
      if ( $table['header'] ) {
        echo '<thead>';
          echo '<tr>';
            foreach ( $table['header'] as $th ) {
              echo '<th>';
                echo $th['c'];
              echo '</th>';
            }
          echo '</tr>';
        echo '</thead>';
      }
      echo '<tbody>';
        foreach ( $table['body'] as $tr ) {
          echo '<tr>';
            foreach ( $tr as $td ) {
              echo '<td>';
                echo $td['c'];
              echo '</td>';
            }
          echo '</tr>';
        }
      echo '</tbody>';
    echo '</table>';
    echo '</div>';
  }
  ?>
  <?php endif; ?>

<?php endwhile; ?>
</div>
<?php endif; ?>
