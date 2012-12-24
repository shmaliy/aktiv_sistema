   <div id="sidebar-wrapper">
            
                <div id="sidebar">
<?php if ( !function_exists('dynamic_sidebar')
        || !dynamic_sidebar() ) : ?>                 
              
                    
					<?php

$today = current_time('mysql', 1);

if ( $recentposts = $wpdb->get_results("SELECT ID, post_title FROM $wpdb->posts WHERE post_status = 'publish' AND post_date_gmt < '$today' ORDER BY post_date DESC LIMIT 10")):

?>
      <div class="sideblock">
<h3><?php _e("Недавно"); ?></h3>

<ul>

<?php

foreach ($recentposts as $post) {

if ($post->post_title == '')

$post->post_title = sprintf(__('Публикация #%s'), $post->ID);

echo "<li><a href='".get_permalink($post->ID)."'>";

the_title();

echo '</a></li>';

}

?>

</ul>
</div>

<?php endif; ?>


<?php if (function_exists('wp_theme_switcher')) { ?>
<div class="sideblock">
<h3>Все темы</h3>

<?php wp_theme_switcher(); ?>
</div>
<?php } ?>


  <div class="sideblock">
<h3>Рубрики</h3>

<ul>

<?php wp_list_cats('sort_column=name&hierarchical=0'); ?>

</ul>

</div>
 <div class="sideblock">
 
 <h3>Архивы</h3>

<ul>

<?php wp_get_archives('type=monthly'); ?>

</ul>
</div>
 <div class="sideblock">
 
               
<h3><?php _e('Ссылки'); ?></h3>

<ul>

<?php get_links(-1, '<li>', '</li>', '', FALSE, 'name', FALSE, FALSE, -1, FALSE); ?>

</ul> 

</div>
 <div class="sideblock">
 
<h3>Поиск</h3>

<ul>

<li>

<form method="get" id="searchform" action="<?php echo $_SERVER['PHP_SELF']; ?>">

<input type="text" value="<?php echo wp_specialchars($s, 1); ?>" name="s" id="s" /><input type="submit" id="sidebarsubmit" value="Поиск" />

 </form>

</li> 

</ul> 
</div>

<?php endif; ?>

 <div class="sideblock">
			   
<h3><?php _e('Прочее'); ?></h3>

<ul>

<li><a href="<?php bloginfo('rss2_url'); ?>" title="<?php _e('Синдикация через RSS'); ?>"><?php _e('RSS'); ?></a></li>

<li><a href="<?php bloginfo('comments_rss2_url'); ?>" title="<?php _e('Последние комментарии ко всем публикациям RSS'); ?>"><?php _e('Комментарии RSS'); ?></a></li>

<li><a href="http://www.qnd.ru/">Продвижение сайтов</a>
</li>

<?php wp_meta(); ?>

</ul>

</div>
			               	
                
                </div>
            
            </div>
        
        </div>