<?php get_header(); ?>
  <div id="content">
      
    <div class="post">
        <h2>Ошибка 404 - Не найдено</h2>
		
		<div class="entry">
		<p>К сожалению, вы запросили то, чего здесь нет.</p>	
		</div><!--/entry -->
	
	</div><!--/post -->
	
  </div><!--/content -->
  
		<div id="footer">
		  	<span class="mangoorange">дизайн <a href="http://www.ndesign-studio.com">N.Design Studio</a>, адаптация <a href="http://www.mangoorange.com/">MangoOrange&trade;</a>, <a href="http://www.qnd.ru/">Продвижение сайта</a>.</span>
		</div>
		
	</div><!--/left-col -->

<?php 
$current_page = $post->ID; // Hack to prevent the no sidebar error
include_once("sidebar-right.php"); 
?>
  
<?php get_footer(); ?>