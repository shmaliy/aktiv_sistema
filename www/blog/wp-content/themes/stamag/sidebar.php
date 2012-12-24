		<!-- Sidebar -->
		<div id="sidebar">
		
			<?php
			if (is_single()) {
				include (TEMPLATEPATH . '/sidebar-ads.php');
			}
			?>
			<div class="clear"></div>
			
			<div class="sidebar-box">
				<h3>Страницы</h3>
				<ul>
					<?php wp_list_pages('title_li='); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Рубрики</h3>
				<ul>
					<?php wp_list_categories('title_li='); ?>
				</ul>
			</div>
			
			<div class="sidebar-box">
				<h3>Архивы</h3>
				<ul>
					<?php wp_get_archives('type=monthly'); ?>
				</ul>
			</div>
			
			
			
<div class="sidebar-box" align="center">
<h3 align="Left">Понравился блог? Кликните Like!</h3>
<br>
    <iframe src="http://www.facebook.com/plugins/like.php?href=blog.aktiv-sistema.com"
        scrolling="no" frameborder="0"
        style="border:none; width:278px; height:100px; "></iframe>	

</div>

<div class="sidebar-box" align="center">
<h3 align="Left">Blogosphere & Advertising</h3>
<br>
<iframe width="170" height="200" src="http://adv.blogupp.com/code841007b7-30ea-4dde-9016-7d56c744ff5f1v" scrolling="no" frameborder="0" marginwidth="0" marginheight ="0"></iframe>
<br>

<script type="text/javascript"><!--
google_ad_client = "pub-8692520865867824";
/* 250x250, создано 30.11.09 */
google_ad_slot = "8386784089";
google_ad_width = 250;
google_ad_height = 250;
//-->
</script>
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js">
</script>
	</div>

	
	

		
		</div>
		<!-- Sidebar -->