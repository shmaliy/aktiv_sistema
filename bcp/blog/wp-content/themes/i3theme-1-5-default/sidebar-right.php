<div class="dbx-group" id="sidebar-right">

  <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>      

      <!--sidebox start -->
      <div id="links" class="dbx-box">
        <h3 class="dbx-handle"><?php _e('Ссылки'); ?></h3>
        <div class="dbx-content">
          <ul>
            <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'name', FALSE, FALSE, -1, FALSE); ?>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

      <!--sidebox start -->
      <div id="meta" class="dbx-box">
        <h3 class="dbx-handle">Прочее</h3>
        <div class="dbx-content">
          <ul>
              <li class="rss"><a href="<?php bloginfo('rss2_url'); ?>">Публикации (RSS)</a></li>
              <li class="rss"><a href="<?php bloginfo('comments_rss2_url'); ?>">Комментарии (RSS)</a></li>
              <li class="wordpress"><a href="http://www.wordpress.org" title="Работает на WordPress">WordPress</a></li>
              <li class="login"><?php wp_loginout(); ?></li>
          </ul>
        </div>
      </div>
      <!--sidebox end -->

  <?php endif; ?>

</div><!--/sidebar -->