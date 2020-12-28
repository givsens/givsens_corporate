<article class="content-footer">
  <div class="content-footer_in">
    <div class="custom_content">
      <div class="float-4-6">
        <?php if (get_field('site_shopimg', 'option')) : ?>
          <div class="left">
            <figure><img src="<?php the_field('site_shopimg', 'option'); ?>" alt=""></figure>
          </div>
        <?php endif; ?>
        <div class="right">
          <?php if (get_field('site_address', 'option')) : ?><p><?php if (get_field('site_postcode', 'option')) : ?>〒<?php the_field('site_postcode', 'option'); ?> <?php endif; ?><?php the_field('site_address', 'option'); ?></p><?php endif; ?>
          <?php if (get_field('site_tel', 'option')) : ?><p class="ft_cont_tel"><a href="tel:<?php if (get_field('site_sptel', 'option')) : ?><?php the_field('site_sptel', 'option'); ?><?php endif; ?>" class="tel-link"><?php the_field('site_tel', 'option'); ?></a></p><?php endif; ?>
          <?php if (get_field('site_time', 'option')) : ?><p><?php the_field('site_time', 'option'); ?></p><?php endif; ?>
          <?php if (get_field('site_holiday', 'option')) : ?><p>定休日： <?php the_field('site_holiday', 'option'); ?></p><?php endif; ?>
          <?php if (get_field('site_access', 'option')) : ?><p class="ft_cont_access"><?php the_field('site_access', 'option'); ?></p><?php endif; ?>
          <table class="table_schedule">
            <thead>
              <tr>
                <th>診療時間</th>
                <th>月</th>
                <th>火</th>
                <th>水</th>
                <th>木</th>
                <th>金</th>
                <th>土</th>
                <th>日・祝</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th>9：30～13：00</th>
                <td>○</td>
                <td>○</td>
                <td>○</td>
                <td>○</td>
                <td>○</td>
                <td>○</td>
                <td>／</td>
              </tr>
              <tr>
                <th>14：30～18：00</th>
                <td>○</td>
                <td>○</td>
                <td>○</td>
                <td>／</td>
                <td>○</td>
                <td>／</td>
                <td>／</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div><!-- /.float-4-6 -->
      <div class="g_map">
        <?php if (get_field('site_googlemapiframe', 'option')) : ?><?php the_field('site_googlemapiframe', 'option'); ?><?php endif; ?>
      </div>
    </div>
  </div>
</article>