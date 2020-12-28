// TweenMax.from('.header_logo',1,{y: '-20%',scale: 1.2, opacity:0,delay: 1.5});
// TweenMax.staggerFrom("#header_nav ul li" , .5 , {y: '-20%',opacity:0,delay: 1.5},0.2);

// let isPageLoader = document.querySelector(".page-load-anime") != null;
//
// let pageLoaderSecond;
// let pageLoader;
// let firstViewContent = $("#scroll-container > div:first-child");
// let jsSlideUpContent = firstViewContent.find(".js-slideup");
//
// if (isPageLoader) {
//   pageLoader = document.querySelector(".page-load-anime");
//   pageLoaderFirst = pageLoader.querySelector(".second");
//
//   document.addEventListener("DOMContentLoaded", function() {
//     setTimeout(function() {
//       pageLoader.classList.add("load-complete");
//       jsSlideUpContent.removeClass("js-slideup");
//     }, 100);
//   });
//
//   pageLoaderFirst.addEventListener("animationstart", function(evt) {
//     firstViewContent.addClass("js-load-end-first-view");
//     jsSlideUpContent.addClass("js-slideup");
//   });
// }
//
// // HTMLの構造が組み立てられたあとすぐに処理を実行（jQuery用）
// jQuery(document).ready(function() {
//   // .page-load-animeが存在したら
//   if (isPageLoader) {
//     // .js-ready-completeを付与
//     pageLoader.classList.add("js-ready-complete");
//   }
// );
//
// console.log(isPageLoader);


(function($){
  $(function(){
    //page top
    var topBtn = $('.pageTop');
    topBtn.hide();
    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
             topBtn.fadeIn();
        } else {
             topBtn.fadeOut();
        }
    });
    //スクロールしてトップ
    topBtn.click(function () {
      $('body,html').animate({
           scrollTop: 0
      }, 500);
      return false;
    });


  //バガーメニュー
  var $body = $('body');
  //開閉用ボタンをクリックでクラスの切替え
  $('#js_btn').on('click', function () {
      $body.toggleClass('open');
      $('#js_btn a').toggleClass('active' );
  });
  //メニュー名以外の部分をクリックで閉じる
  $('#js_nav').on('click', function () {
      $body.removeClass('open');
      $('#js_btn a').toggleClass('active');
  });

// $(function(){
//   var flg = "default";
//   $('#js_btn').click(function(){
//     if(flg == "default"){
//       $('#js_btn .hd_menu_text').hide().text("close").fadeIn('slow');
//       flg = "changed";
//     }else{
//       $('#js_btn .hd_menu_text').hide().text("menu").fadeIn('slow');
//       flg = "default";
//     }
//   });
// });

// $(function(){
//   var flg = "default";
//   $('#js_nav').click(function(){
//     if(flg == "default"){
//       $('#js_btn .hd_menu_text').hide().text("menu").fadeIn('slow');
//       flg = "changed";
//     }else{
//       $('#js_btn .hd_menu_text').hide().text("close").fadeIn('slow');
//       flg = "default";
//     }
//   });
// });


    $('a[href^=#]').click(function(){
        var speed = 500;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;
    });

    //スマートフォン表示時のみ電話番号にリンクを貼る設定JS
    if(!navigator.userAgent.match(/(iPhone|iPad|Android)/)){
      $("a.tel-link").each(function(){
        $(this).replaceWith("<span>" + $(this).html() + "</span>");
      });
    }

    //PCナビのドロップダウン
    $('.header_nav_list li').hover(function(){
      $("ul:not(:animated)", this).slideDown(200);
    }, function(){
      $("ul.sub-menu",this).slideUp(200);
    });

    //最新の投稿
    $('.top_kiji_ttl').matchHeight();
    $('.top_kiji_txt').matchHeight();
    $('.archive_txt_wrap .archive_ttl').matchHeight();

    //デバイスの横幅で画像を切り替える
    // 置換の対象とするclass属性。
    var $elem = $('.js-image-switch');
    // 置換の対象とするsrc属性の末尾の文字列。
    var sp = '_sp.';
    var pc = '_pc.';
    // 画像を切り替えるウィンドウサイズ。
    var replaceWidth = 768;
    function imageSwitch() {
      // ウィンドウサイズを取得する。
      var windowWidth = parseInt($(window).width());
      // ページ内にあるすべての`.js-image-switch`に適応される。
      $elem.each(function() {
        var $this = $(this);
        // ウィンドウサイズが768px以上であれば_spを_pcに置換する。
        if(windowWidth >= replaceWidth) {
          $this.attr('src', $this.attr('src').replace(sp, pc));
        // ウィンドウサイズが768px未満であれば_pcを_spに置換する。
        } else {
          $this.attr('src', $this.attr('src').replace(pc, sp));
        }
      });
    }
    imageSwitch();
    // 動的なリサイズは操作後0.2秒経ってから処理を実行する。
    var resizeTimer;
    $(window).on('resize', function() {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(function() {
        imageSwitch();
      }, 200);
    });

    // $('#main_visual .main_visual_in').slick({
    //   autoplaySpeed: 3000,
    //   slidesToShow: 1, //スライドが見える数
    //   slidesToScroll: 1, //スライドがスクロールする数
    //   speed: 1600, //スライドアニメーションの時間(ms)
    //   infinite: true, //無限スクロール
    //   draggable: false, //マウスドラッグでのスクロール
    //   autoplay:true, //自動再生
    //   fade:true
    // });

    //PCナビのドロップダウン
    // $('.h_nav_list li').hover(function(){
    //   $("ul:not(:animated)", this).slideDown(200);
    // }, function(){
    //   $("ul.sub-menu",this).slideUp(200);
    // });

  $(".custom_gallery").colorbox({
    rel:'slideshow',
    //slideshow:true,
    //slideshowSpeed:3000,
    maxWidth:"90%",
    maxHeight:"90%",
    opacity: 0.7
  });



  });
})(jQuery)


// new WOW().init();

//ドロワーメニューPushbar.js
// var pushbar = new Pushbar({
//   blur:true,
//   overlay:true,
// });
//使用しない時は非表示に
// $(function() {
//     $(".gallery_box li a").colorbox({
//     maxWidth:"90%",
//     maxHeight:"90%",
//     opacity: 0.7
//   });
// });

// $(window).load(function() {
//   $('.main_visual_in').fadeIn(200); //ここのIDはさっきのと同じ
// });
// $(function($) {
//     $('.main_visual_in').slidewide({
//         touch         : true,
//         touchDistance : '80',
//         autoSlide     : true,
//         repeat        : true,
//         interval      : 6000,
//         duration      : 500,
//         easing        : 'swing',
//         imgHoverStop  : true,
//         navHoverStop  : true,
//         prevPosition  : 70,
//         nextPosition  : 70,
//         filter        : false,
//         filterNav     : true,
//         viewSlide     : 1,
//         baseWidth     : 1000,
//         navImg        : false,
//         navImgCustom  : false,
//         navImgSuffix  : ''
//     });
// });
