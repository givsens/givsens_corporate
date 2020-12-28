</main>
<footer class="footer">
  <p class="pageTop">
    <a href="#"></a>
  </p>
  <?php wp_nav_menu(array(
    'theme_location' => 'fnav',
    'container'       => 'div',
    'container_class' => 'footer_nav_list',
    'menu_class'    => '',
    'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
  ));
  ?>
  <p class="copyright"><small>Copyright &copy; <?php echo current_time("Y"); ?> <a href="<?php echo esc_url(home_url()); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> All Rights Reserved.</small></p>
</footer>
<script src="//cdnjs.cloudflare.com/ajax/libs/gsap/latest/TweenMax.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/ScrollMagic.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.5/plugins/animation.gsap.min.js"></script>
<?php if (!is_home() && !is_front_page()) : ?>
  <script>
    (function($) {
      // $(function() {
      //   var h = $(window).height();
      //   $('header,footer').css('display','none');
      //   $('#loader_bg ,#loader').height(h).css('display','block');
      TweenMax.set('.header_logo', {
        y: '-20%',
        scale: 1.2,
        opacity: 0
      });
      TweenMax.set("#header_nav ul li", {
        y: '-20%',
        opacity: 0
      });
      // TweenMax.set(".archive_box .archive_box_inner" , {y: '-10%',opacity:0});
      // });
      $(window).load(function() {
        // $('#loader').delay(600).fadeOut(300);
        // $('header,footer').css('display', 'block');
        // $('#loader_bg').delay(900).fadeOut(800, function() {
        TweenMax.to('.header_logo', 1, {
          y: '0%',
          scale: 1,
          opacity: 1
        });
        TweenMax.staggerTo("#header_nav ul li", .5, {
          y: '0%',
          opacity: 1
        }, 0.2);
        TweenMax.staggerTo(".archive_box .archive_box_inner", .5, {
          y: '0%',
          opacity: 1,
          delay: .5
        }, 0.2);

        // });
      });
    })(jQuery)
  </script>
<?php else : ?>
  <script type='text/javascript' src='<?php echo get_template_directory_uri(); ?>/lib/js/jquery.drawsvg.js'></script>
<?php endif; ?>
<?php wp_footer(); ?>
</body>

</html>