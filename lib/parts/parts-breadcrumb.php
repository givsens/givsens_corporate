<?php if ( !is_home() && !is_front_page() ) : ?>
<div class="breadcrumbBox">
	<?php if ( function_exists( 'bread_crumb' ) ) { bread_crumb(); } ?>
</div>
<?php endif; ?>