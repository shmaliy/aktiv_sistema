<div id="sidebar2">

<div class="xboxcontent">
<ul>
<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(2) ) : else : ?>
	 <li>
      <h2 class="sidebartitle"><?php _e('Рубрики'); ?></h2>
      <ul class="list-cat">
        <?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
      </ul>
    </li>
	<li>
      <h2 class="sidebartitle"><?php _e('Ссылки'); ?></h2>
      <ul class="list-blogroll">
        <?php get_links('-1', '<li>', '</li>', '<br />', FALSE, 'id', FALSE, FALSE, -1, FALSE); ?>
      </ul>
    </li>
<?php endif; ?>
</ul>
 	<div id="googlepro">
	<?php include (TEMPLATEPATH . "/ads.php"); ?>
	</div> 
 </div>
 </div>
 