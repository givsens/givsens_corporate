<?php if(is_tax('areacat')): //特定のタクソノミー一覧 ?>
  <h1 class="page_ttl"><?php the_archive_title(); ?>テキスト</h1>
<?php elseif (is_archive()): ?>
  <h1 class="page_ttl"><?php the_archive_title(); ?></h1>
<?php elseif (is_search()): ?>
  <h1 class="page_ttl">検索結果</h1>
<?php else:?>
  <h1 class="page_ttl"<?php if(get_field('page_ttl_bg')): ?> style="background-image: url(<?php the_field('page_ttl_bg'); ?>);"<?php endif; ?>><?php the_title(); ?></h1>
<?php endif; ?>