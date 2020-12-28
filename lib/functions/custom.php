<?php
/*--------------------------------------------------------------------------
------------------------------ カスタムメニュー -----------------------------
--------------------------------------------------------------------------*/
//カスタムメニューの機能を有効化。
register_nav_menu( 'gnav', 'ヘッダーのナビゲーション' );
register_nav_menu( 'fnav', 'フッターのナビゲーション' );
register_nav_menu( 'spnav', 'スマホのナビゲーション' );
//register_nav_menu( 'sitemap_nav', 'サイトマップ用のナビゲーション' );

//wp_nav_menuにサブタイトル追加
add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);
function description_in_nav_menu($item_output, $item){
    return preg_replace('/(<a.*?>[^<]*?)</', '$1' . "<span>{$item->attr_title}</span><", $item_output);
}

/*--------------------------------------------------------------------------
------------------------------ アイキャッチ -----------------------------
--------------------------------------------------------------------------*/

// アイキャッチ画像を有効にする。
add_theme_support('post-thumbnails'); 

//アイキャッチ画像の定義と切り抜き
add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
    add_image_size('640_tmb',640,2000,false );
}

//記事内の最初の画像を表示
//http://emplace.jp/blog/web/20160405-em2488/
function catch_that_image() {
    global $post, $posts;
    $first_img = '';
    ob_start();
    ob_end_clean();
    $output = preg_match_all("/<img[^>]+src=[\"'](s?https?:\/\/[\-_\.!~\*'()a-z0-9;\/\?:@&=\+\$,%#]+\.(jpg|jpeg|png|gif))[\"'][^>]+>/i", $post->post_content, $matches);
    $first_img = $matches [1] [0];
  
if(empty($first_img)){ //Defines a default image
        $first_img = get_template_directory_uri()."/lib/img/share/noimg.png";
    }
    return $first_img;
}
/*--------------------------------------------------------------------------
-------------------------- 独自でクラスを指定する --------------------------
--------------------------------------------------------------------------*/

//固定ページに独自クラスを付ける
add_filter('body_class','my_class_names');
function my_class_names($classes){
	if (is_front_page()){ $classes[] = 'body_top';}
	//elseif (is_page('company')){$classes[] = 'body-company';}
	return $classes;
}
/*--------------------------------------------------------------------------
-------------------------- タイトルを自動でいれる --------------------------
--------------------------------------------------------------------------*/
add_theme_support ('title-tag');


/*--------------------------------------------------------------------------
-------------------------- 管理者以外のユーザーの管理バーを削除する -----------------
--------------------------------------------------------------------------*/
function my_function_admin_bar($content) {
  return ( current_user_can( 'administrator' ) ) ? $content : false;
}
add_filter( 'show_admin_bar' , 'my_function_admin_bar');

/*--------------------------------------------------------------------------
-------------------------- 投稿スラッグを自動的に生成する（新着情報）　--------------------------
--------------------------------------------------------------------------*/
// function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
//     if( $post_type == 'news' ){//新着情報
//         if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
//         $slug = 'news' . $post_ID ;
//         }
//     }
//     return $slug;
// }
// add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );

/*--------------------------------------------------------------------------
-------------------------- 投稿記事　--------------------------
--------------------------------------------------------------------------*/
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        $slug = utf8_uri_encode( $post_type ) . '-' . $post_ID;
    }
    return $slug;
}
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4  );


/*--------------------------------------------------------------------------
-------------------------- テキストのクイックタグのデフォルト非表示　---------------------
--------------------------------------------------------------------------*/

function default_quicktags($qtInit) {
$qtInit['buttons'] = 'link';//表示するボタンのIDを羅列
return $qtInit;
}
add_filter('quicktags_settings', 'default_quicktags', 10, 1);

//テキストがエディタにクイックタグボタン追加
//http://webtukuru.com/web/wordpress-quicktag/
//https://wpdocs.osdn.jp/%E3%82%AF%E3%82%A4%E3%83%83%E3%82%AF%E3%82%BF%E3%82%B0API
if ( !function_exists( 'add_quicktags_to_text_editor' ) ):
function add_quicktags_to_text_editor() {
  //スクリプトキューにquicktagsが保存されているかチェック
  if (wp_script_is('quicktags')){?>
    <script>
      QTags.addButton('qt_bold','太字','<span class="bold">','</span>');
      QTags.addButton('qt_red','赤字','<span class="red">','</span>');
      QTags.addButton('qt_btn01','ボタン01','<p class="btn01"><a href="#" class="q_button">','</a></p>');
    </script>
  <?php
  }
}
endif;
add_action( 'admin_print_footer_scripts', 'add_quicktags_to_text_editor' );


/*--------------------------------------------------------------------------
-------------------------- 抜粋表示する文字数　--------------------------
--------------------------------------------------------------------------*/
function new_excerpt_more($more) {
  return ' ...';
} 
add_filter('excerpt_more', 'new_excerpt_more');
// function custom_excerpt_length( $length ) {
//   return 40; 
// }
// add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
// //概要（抜粋）の省略文字
// function new_excerpt_more($more) {
//   return '…';
// }
// add_filter('excerpt_more', 'new_excerpt_more');
/*--------------------------------------------------------------------------
------------------- 検索結果 0か未入力で検索した場合でもsearch.phpを使う-------------
---------------------------------------------------------------------------*/
//http://webdesign.practice.jp/wordpress-theme15-search-php
// function search_template_redirect() {
//   global $wp_query;
//   $wp_query->is_search = true;
//   $wp_query->is_home = false;
//   if (file_exists(TEMPLATEPATH . '/search.php')) { 
//     include(TEMPLATEPATH . '/search.php');
//   }
//   exit;
// }
// if (isset($_GET['s']) && $_GET['s'] == false) {
//   add_action('template_redirect', 'search_template_redirect');
// }

/*--------------------------------------------------------------------------
------------------- 条件分岐でスマートフォン以外PCとタブレットで同じ------------
---------------------------------------------------------------------------*/
//スマホ表示分岐
function is_mobile(){
  $useragents = array(
    'iPhone', // iPhone
    'iPod', // iPod touch
    'Android.*Mobile', // 1.5+ Android *** Only mobile
    'Windows.*Phone', // *** Windows Phone
    'dream', // Pre 1.5 Android
    'CUPCAKE', // 1.5+ Android
    'blackberry9500', // Storm
    'blackberry9530', // Storm
    'blackberry9520', // Storm v2
    'blackberry9550', // Storm v2
    'blackberry9800', // Torch
    'webOS', // Palm Pre Experimental
    'incognito', // Other iPhone browser
    'webmate' // Other iPhone browser
  );
  $pattern = '/'.implode('|', $useragents).'/i';
  return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
}
/*
//サンプル
<?php if (is_mobile()) : ?>
  // スマートフォン用コンテンツ
<?php else: ?>
  // PC・タブレット用コンテンツ
<?php endif; ?>
*/

/*--------------------------------------------------------------------------
------------------------------ ページネーション-------------------------------
---------------------------------------------------------------------------*/
//参考：http://web-ashibi.net/archives/971
function pagination($pages = '', $range = 1) {
  $showitems = ($range * 2)+1;  
  global $paged;
  if(empty($paged)) $paged = 1;
  if($pages == '') {
    global $wp_query;
    $pages = $wp_query->max_num_pages;
    if(!$pages) {
      $pages = 1;
    }
  }
  if(1 != $pages) {
    echo "<div class=\"pagination\"><div class=\"pagination-box\"><span class=\"page-of\">Page ".$paged." of ".$pages."</span>";
    if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo;</a>";
    if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo;</a>";

    for ($i=1; $i <= $pages; $i++) {
      if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )) {
      echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
      }
    }

    if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">&rsaquo;</a>";
    if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>&raquo;</a>";
    echo "</div></div>\n";
  }
}

/*--------------------------------------------------------------------------
----------カテゴリページのタイトルから「カテゴリー:」や「タグ:」の文字を削除する----------------
--------------------------------------------------------------------------*/

//https://akamist.com/blog/archives/1658
add_filter( 'get_the_archive_title', function ($title) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    }
    return $title;
});


/*--------------------------------------------------------------------------
---------------------- お知らせ ------------------------
--------------------------------------------------------------------------*/
add_action( 'init', 'create_post_type' );
function create_post_type() {
  register_post_type( 'news',
    array(
      'labels' => array(
      'name' => __( 'お知らせ' ),
      'singular_name' => __( '投稿' ),
      'all_items'=> __( 'お知らせ一覧' )
      ),
      'public' => true,
      'has_archive' => true,
      "menu_icon" => "dashicons-format-aside",
    )
  );
  register_post_type( 'works',
    array(
      'labels' => array(
      'name' => __( '制作実績' ),
      'singular_name' => __( '投稿' ),
      'all_items'=> __( '制作実績一覧' )
      ),
      'public' => true,
      'has_archive' => true,
      "menu_icon" => "dashicons-format-aside",
      'supports' => array('title','editor','excerpt','thumbnail','page-attributes'),
    )
  );
  register_post_type( 'column',
    array(
      'labels' => array(
      'name' => __( 'コラム' ),
      'singular_name' => __( '投稿' ),
      'all_items'=> __( 'コラム一覧' )
      ),
      'public' => true,
      'has_archive' => true,
      "menu_icon" => "dashicons-format-aside",
      'supports' => array('title','editor','excerpt','thumbnail','page-attributes'),
    )
  );
}

if( function_exists('acf_add_options_page') ) {
    
    acf_add_options_page(array(
        'page_title'    => 'サイト情報設定',
        'menu_title'    => 'サイト設定',
        'menu_slug'     => 'theme-general-settings',
        'capability'    => 'edit_posts',
        //'position' => 2,
        'redirect'      => false
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'スライダー画像設定',
        'menu_title'    => 'スライダー画像設定',
        'menu_slug'     => 'slider',
        'parent_slug'   => 'theme-general-settings',
    ));

    acf_add_options_sub_page(array(
        'page_title'    => 'トップメイン画像',
        'menu_title'    => 'トップメイン画像',
        'menu_slug'     => 'top_mv',
        'parent_slug'   => 'theme-general-settings',
    ));
    

}