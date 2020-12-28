
<?php /*Template Name: access-print */ ?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">

<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

<style type="text/css">
  .footerContents .btn02,
  .footerContents .btnBox {
    display: none;
  }
  .footerContents {
    padding: 2% 0;
  }

@media print {
  .footerContents .btn02,
  .footerContents .btnBox,
  .footerContents .btn02 {
    display: none;
  }
}

</style>

</head>
<body <?php body_class(); ?>>
<div id="content">

    <?php get_template_part("lib/parts/content-footer"); ?>

    <div class="btn02 mb20 ac mt20">
      <a href="#" onclick="window.print(); return false;"><i class="fa fa-print"></i>印刷する</a>
    </div>

</div><!-- /#content -->
</body>
</html>
