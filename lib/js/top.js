(function($){

	$('.works_slider').slick({
		infinite: true,
		dots: false,
		slidesToShow: 4,
		//centerMode: true, //要素を中央寄せ
		centerPadding:'100px', //両サイドの見えている部分のサイズ
		autoplay:true, //自動再生
		arrows: false,
		pauseOnHover: false,
		autoplaySpeed: 0,
		cssEase: 'linear',
		speed: 8000,
		responsive: [{
			 breakpoint: 1024,
				settings: {
					slidesToShow: 3,
					slidesToScroll: 1,
			 }
		},
		{
			 breakpoint: 768,
				settings: {
					slidesToShow: 2,
					slidesToScroll: 1,
			 }
		}
		]
	});

// キャッチコピー アニメーション
$(function(){
	$('.main_copy4').children().addBack().contents().each(function() {
		$(this).replaceWith($(this).text().replace(/(\S)/g, '<span class="text-move">$&</span>'));
	});

	$('.main_copy3').on('animationend', function(){
		setTimeout(function(){
			$(".main_copy4").addClass("active");
		});
	})

	$('.main_copy4 .text-move').on('transitionend', function(){
		$(".main_copy_arrowWrap").addClass("wow");
		// setTimeout(function(){
		// });
	})

});


// 制作実績数 カウンター
$(function() {
	var mv_achievements = $('.mv_achievements');
			mv_countElm = $('.mv_achievementsNum'),
			countSpeed = 15;

	mv_achievements.hide();

	$('.main_copy_arrowWrap').on('animationend', function(){
		mv_achievements.fadeIn();
		mv_countElm.each(function(){
			var self = $(this),
			countMax = self.attr('data-num'),
			thisCount = self.text(),
			countTimer;

			timer();

			function timer(){
				countTimer = setInterval(function(){
					var countNext = thisCount++;
					self.text(countNext);

					if(countNext == countMax) {
						clearInterval(countTimer);
					}
				}, countSpeed);
			}

		});
	})
});

// 制作実績数 カウンター
$(function() {
	var achievements = $('.achievements');
			countElm = $('.achievementsNum'),
			countSpeed = 15;

	if (achievements.hasClass('.animated')) {
		achievements.fadeIn();
		countElm.each(function(){
			var self = $(this),
			countMax = self.attr('data-num'),
			thisCount = self.text(),
			countTimer;

			timer();

			function timer(){
				countTimer = setInterval(function(){
					var countNext = thisCount++;
					self.text(countNext);

					if(countNext == countMax) {
						clearInterval(countTimer);
					}
				}, countSpeed);
			}

		});
	}
});




var controller = new ScrollMagic.Controller();

$(function(){
	$('.main_visual,header')
	.mouseover(function(){
		// TweenMax.to('.main_visual_in img',.5,{scale: 1.03,filter: 'blur(3px)'})
		TweenMax.to('.main_visual_in img',.5,{scale: 1.03})
	})
	.mouseout(function(){
		// TweenMax.to('.main_visual_in img',.5,{scale: 1,filter: 'blur(0)'})
		TweenMax.to('.main_visual_in img',.5,{scale: 1})
	})
});



// $(function() {
	// var h = $(window).height(); //ブラウザウィンドウの高さを取得
	// $('header,footer').css('display','none'); //初期状態ではメインコンテンツを非表示
	// $('#loader_bg ,#loader').height(h).css('display','block'); //ウィンドウの高さに合わせでローディング画面を表示
	// $('.main_copy_img').css('opacity','0');
	TweenMax.set('.header_logo',{opacity:0});
	TweenMax.set("#header_nav ul li" , {y: '-20%', opacity:0});
	TweenMax.set(".main_copy_img" , {y: '-20%',scale: 1.5, opacity:0});
	TweenMax.set('.mein_copy_text', {y: '-20%',scale: .3, opacity:0});
	TweenMax.set('.svg2 g',{autoAlpha:0});
// });
// $(window).load(function () {
	// $('#loader').delay(600).fadeOut(300); //$('#loader').fadeOut(300);でも可
	// $('header,footer').css('display', 'block'); // ページ読み込みが終わったらメインコンテンツを表示する
	// $('#loader_bg').delay(900).fadeOut(800, function() {
		TweenMax.to('.header_logo',1,{opacity:1});
		TweenMax.staggerTo("#header_nav ul li" , .5 , {y: '0%',opacity:1,delay:1},0.3);
		TweenMax.to('.main_copy_img',2,{ease: Back.easeOut.config(1.7),y: '0%',scale: 1, opacity:1 , delay:3.4});
		TweenMax.to('.mein_copy_text', 1, {y: '0%',scale: 1, opacity:1, delay:5});

		//ロゴアニメーション
		var $svg = $('.svg1').drawsvg({
			callback: function() {
				var tlsvg = new TimelineMax();
				tlsvg.to('.svg1 g', 3, {stroke: 'none', autoAlpha:0})
				.to('.svg2 g',3,{autoAlpha:1},"-=3");
				// $(".svg1 g").css('fill','#fff');
			}
		});

$svg.drawsvg('animate');


	// });
// });

var tl0 = new TimelineMax();
 tl0.to('.sec01', 1, {backgroundColor: '#ccc'})
		.to('.sec01', 1, {backgroundColor: '#54c0c7'})
		.to('.sec01', 1, {backgroundColor: '#54c2f0'})
		.from('.sec01', .8, {width: '60%',autoAlpha:0,ease: Cubic.easeInOut},"-=3")
		.from(".sec01 h2" , .5 , {bottom:"-30px" , autoAlpha:0,delay: .3},"-=2.9")
		.staggerFrom(".sec01 h3 span" , .5 , {x: '-20%',autoAlpha:0,delay: .6},0.4,"-=2.9")
		.from(".sec01 .parts_btn_type_a" , .5, {y: '-20%',autoAlpha:0,delay: .3},"-=1.8")
   // .staggerFrom(".works_slider div" , .2 , {y: '-20%',autoAlpha:0},0.2,"-=2");
//var scene0 = new ScrollMagic.Scene({triggerElement: ".sec01",triggerHook: "onLeav",offset : 200,reverse: false})
var scene0 = new ScrollMagic.Scene({triggerElement: ".sec01", triggerHook: 'onEnter', offset: 200, reverse: false})
.setTween(tl0)
.addTo(controller);


$('.sec_top_slider_in').on('init',function(){
	$('.slide_content').addClass('on');
});
$('.sec_top_slider_in').slick({
	autoplay:true,
	autoplaySpeed:8000
});
$('.sec_top_slider_in').on('beforeChange',function(){
	$('.slide_content').removeClass('on');
});
$('.sec_top_slider_in').on('afterChange',function(){
	$('.slide_content').addClass('on');

});





	$(function(){

		function ticker(){
			if($('.ticker li').length<=1) return false;
			$('.ticker li:first').slideUp( function() {
				$(this).appendTo($('.ticker')).slideDown(); });
		}
		setInterval(function(){ticker()}, 5000);



		// スライダーフェイド

		$('.main_visual .main_visual_fade').slick({
			autoplaySpeed: 3000,
			slidesToShow: 1, //スライドが見える数
			slidesToScroll: 1, //スライドがスクロールする数
			speed: 1600, //スライドアニメーションの時間(ms)
			infinite: true, //無限スクロール
			draggable: false, //マウスドラッグでのスクロール
			autoplay: true, //自動再生
			//arrows: false,
			fade:true,
			responsive: [{
				breakpoint: 768,
				settings: {
					arrows:false,
				}
			}]
		});
		//▼最初の縦並び対策 cssで最初の画像以外を非表示に設定
		$('.main_visual .main_visual_fade div img').delay(3000).css('display','block');

		// $('.works_slider div a img').delay(3000).css('display','block');


		// スライダー3つ横並び

		$('.main_visual .main_visual_three').slick({
			infinite: true,
			dots: true,
			pauseOnHover:true,
			arrows:true,
			autoplay:true,
			autoplaySpeed: 3000,
			slidesToShow: 1,
			centerMode: true,
			centerPadding: '0px',
			variableWidth : true,
			infinite: true, //無限スクロール
			responsive: [{
				breakpoint: 768,
				settings: {
					variableWidth : false,
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows:false,
				}
			}]
		});





	});
})(jQuery)
