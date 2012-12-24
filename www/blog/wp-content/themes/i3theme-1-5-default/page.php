<?php get_header(); ?>
  <div id="content">
  
  <?php if (function_exists('wp_snap')) { echo wp_snap(ALL); } ?>
    
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  	
    <div class="post" id="post-<?php the_ID(); ?>">
        <h2><?php the_title(); ?></h2>
				
    <div class="entry">
		<?php the_content('<p>Читать полностью &raquo;</p>'); ?>
		<?php link_pages('<p><strong>Страницы:</strong> ', '</p>', 'number'); ?>
		<?php edit_post_link('Править', '<p>', '</p>'); ?>
		</div><!--/entry -->
	
	<?php comments_template(); ?>
	
	</div><!--/post -->
	
		<?php endwhile; endif; ?>

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