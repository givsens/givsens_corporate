<div class="top_contact">
  <div class="inner">
    <h2 class="style_ttl">Contact</h2>
    <div class="custom_txt">
      <p>株式会社ギブセンスへのお問い合わせはこちらから</p>
    </div>
    <p class="contact_btn"><a href="<?php echo home_url(); ?>/contact/" title="お問い合わせフォーム"><span>お問い合わせフォーム</span></a></p>
  </div>
 <?php if(get_field('site_googlemapiframe', 'option')): ?>
  <div class="custom_google_map">
    <?php the_field('site_googlemapiframe', 'option'); ?>
  </div>
  <?php endif; ?>
</div>