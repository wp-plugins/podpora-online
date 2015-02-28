<h2>Poslední novinky</h2>
<a href='http://wick.cz/'>
<img src='http://wick.cz/wp-content/uploads/2014/07/logo.png' alt='Wick.cz' title='Tvorba stránek a podpora pro WordPress' />
</a>
  
<div class="postbox gdrgrid frontleft">
        <small style="float: right; margin-right:6px; margin-top:6px;">
            <a target="_blank" href="http://wpguru.eu/blog/">Zobrazit vše</a> | <a href="http://wpguru.eu/feed/" target="_blank">RSS</a>
        </small>
  <h3 class="hndle"><span>Poslední novinky a články</span></h3>
        <div class="gdsrclear"></div>
    <div class="inside">
        <?php

        if ($options['news_feed_active'] == 0) {
            $feed = fetch_feed('http://wick.cz/feed/');
                if (!is_wp_error( $feed )) {
                    $items = $feed->get_items(0, 7);
                    if (! empty($items)) {
                        echo '<ul>';
                        foreach ($items as $item) {
                        ?>
                                <li>
                                    <div class="rssTitle">
                                        <a target="_blank" class="rsswidget" title='' href='<?php echo wp_filter_kses($item->get_link()); ?>'><?php echo esc_html($item->get_title()); ?></a>
                                        <span class="rss-date"><?php echo human_time_diff($item->get_date('U'), time()); ?></span>
                                        <div class="gdsrclear"></div>
                                    </div>
                                    <div class="rssSummary"><?php echo '<strong>', $item->get_date("F, jS"), '</strong> - ', $item->get_description(); ?></div>
                                </li>
                        <?php
                        }
                        echo '</ul>';
                    } else {
                        ?>
                        <p>No news items found, possibly due to an error. Go to the %sfront page%s to check for updates.</p>
                        <?php
                    }
                } else {
                ?>
                  <p>An error occured while loading newsfeed: %s. Go to the %sfront page%s to check for updates.</p>
                <?php
              }
          } else {
            ?>
                <p>Newsfeed update is disabled. You can enable it on settings page.</p>
            <?php
          }

        ?>
    </div>
</div>

