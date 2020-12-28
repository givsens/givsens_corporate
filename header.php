<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php wp_head(); ?>
  <!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
</head>

<body <?php body_class(); ?>>
  <?php if(get_field('site_googleanalytics', 'option')): ?><?php the_field('site_googleanalytics', 'option'); ?><?php endif; ?>
  <header class="header">
    <div class="header_in">
      <p class="header_logo"><a href="<?php echo home_url(); ?>/" rel="home">
          <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
            y="0px" width="722px" height="152px" viewBox="0 0 722.3 152.1" widt xml:space="preserve">
            <g>
              <g>
                <title>株式会社ギブセンス</title>
                <desc>東京都新宿区のホームページ制作会社</desc>
                <polygon class="st0" points="369.2,98 338.5,30.5 327.6,30.5 369.2,122 410.8,30.5 399.9,30.5" />
                <rect x="299.8" y="30.5" class="st0" width="9.9" height="91.1" />
                <polygon class="st0" points="544.8,40.5 544.8,30.5 495.1,30.5 495.1,121.6 544.8,121.6 544.8,111.7 505,111.7 505,81 544.8,81
              544.8,71.1 505,71.1 505,40.5    " />
                <path class="st0" d="M447.6,122.4c-16.4,0-29.8-12.2-29.8-27.3h9.9c0,9.6,8.9,17.3,19.9,17.3s19.9-7.8,19.9-17.3
              c0-11.2-10.5-16.3-20.4-17.4H447c-15.5-2.2-25.6-11.6-25.6-24c0-13.3,11.8-24.1,26.3-24.1S474,40.4,474,53.7h-10
              c0-7.8-7.3-14.1-16.3-14.1s-16.3,6.3-16.3,14.1c0,8.7,8.7,13,16.9,14.2c17.7,2,29.2,12.6,29.2,27.2
              C477.5,110.2,464.1,122.4,447.6,122.4z" />
                <path class="st0" d="M692.5,122.4c-16.4,0-29.8-12.2-29.8-27.3h9.9c0,9.6,8.9,17.3,19.9,17.3s19.9-7.8,19.9-17.3
              c0-11.2-10.5-16.3-20.4-17.4h-0.1c-15.5-2.2-25.6-11.6-25.6-24c0-13.3,11.8-24.1,26.3-24.1s26.3,10.8,26.3,24.1H709
              c0-7.8-7.3-14.1-16.3-14.1s-16.3,6.3-16.3,14.1c0,8.7,8.7,13,16.9,14.2c17.7,2,29.2,12.6,29.2,27.2
              C722.3,110.2,709,122.4,692.5,122.4z" />
                <polygon class="st0"
                  points="634,30.5 634,96.8 569.4,30.5 569.4,121.6 579.3,121.6 579.3,55.4 643.9,121.6 643.9,30.5     " />
                <path class="st0" d="M241.7,76v9.9H272c-4.4,17.2-20,29.9-38.5,29.9c-21.9,0-39.7-17.8-39.7-39.7s17.8-39.7,39.7-39.7
              c14.4,0,27.1,7.7,34.1,19.3l8.6-5c-8.7-14.5-24.5-24.2-42.7-24.2c-27.4,0-49.7,22.2-49.7,49.7s22.2,49.7,49.7,49.7
              c24.1,0,44.1-17.1,48.7-39.8c0.4-2.1,0.7-4.2,0.9-6.4v-0.4V76H241.7z" />
              </g>
              <g>
                <path class="st0"
                  d="M99.2,23.2L76.1,0L52.7,23.3c7.2-3.2,15.1-5,23.4-5C84.4,18.4,92.2,20.1,99.2,23.2z" />
                <path class="st0" d="M133.7,80.1c-0.2,2.5-0.5,5-1,7.4c-0.8,4.1-2.1,8-3.7,11.7l23.1-23.1l-28.4-28.4l-8,4.6
              c-8.1-13.4-22.8-22.4-39.5-22.4C50.7,29.9,30,50.6,30,76.1s20.7,46.2,46.2,46.2c21.5,0,39.6-14.8,44.7-34.7H85.6V75.9h48.1v3.7
              V80.1z" />
                <path class="st0" d="M0,76.1l23.4,23.4c-3.2-7.2-5-15.1-5-23.4s1.8-16.2,5-23.4L0,76.1z" />
                <path class="st0"
                  d="M52.7,128.8L76,152.1l23.2-23.2c-7.1,3.1-14.9,4.8-23.1,4.8C67.8,133.8,59.9,132,52.7,128.8z" />
              </g>
            </g>
          </svg>
        </a></p>
      <?php wp_nav_menu( array(
      'theme_location'  =>  'gnav',
      'menu_class'      =>  'header_nav_list',
      'container'       =>  'nav',
      'container_class' =>  'header_nav',
      'container_id'    =>  'header_nav',
      'items_wrap'      =>  '<ul class="%2$s">%3$s</ul>',));
    ?>
    </div>

    <div class="hd_menu_btn" id="js_btn">
      <p class="hd_menu_text">menu</p>
      <a class="menu_trigger" href="#modal"><span></span><span></span><span></span></a>
    </div>
    <div id="js_nav" class="hd_menu">
      <?php wp_nav_menu( array(
        'theme_location'  =>  'spnav',
        'menu_class'      =>  'hd_menu_list pc',
        'container'       =>  '',
        'items_wrap'      =>  '<ul class="%2$s">%3$s</ul>',));
      ?>
      <div class="sp_nav_sub sp">
        <ul class="hd_menu_list">
          <li><a href="<?php echo home_url(); ?>/">Home</a></li>
          <li><a href="<?php echo home_url(); ?>/concept/" aria-current="page">Concept</a></li>
          <li><a href="<?php echo home_url(); ?>/create/">Create</a></li>
          <li><a href="<?php echo home_url(); ?>/planning/">Planning</a></li>
          <li><a href="<?php echo home_url(); ?>/promortion/">Promortion</a></li>
          <li><a title="新着情報" href="<?php echo home_url(); ?>/news/">NEWS</a></li>
          <li><a title="コンセプト" href="<?php echo home_url(); ?>/concept/">CONCEPT</a></li>
          <li><a title="事業内容" href="<?php echo home_url(); ?>/solution/">SOLUTION</a></li>
          <li><a title="制作実績" href="<?php echo home_url(); ?>/works/">WORKS</a></li>
          <li><a title="採用情報" href="<?php echo home_url(); ?>/recruit-2/">RECRUIT</a></li>
          <li><a title="会社情報" href="<?php echo home_url(); ?>/company/">COMPANY</a></li>
          <li><a title="お問い合わせ" href="<?php echo home_url(); ?>/contact/">CONTACT</a></li>
        </ul>
      </div>
    </div>

  </header><!-- /header -->
  <main>
    <!-- /main -->