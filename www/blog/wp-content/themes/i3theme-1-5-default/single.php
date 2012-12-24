<?php get_header(); ?>
  <div id="content">
  
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  
      <div class="post-nav"> 
        <span class="previous"><?php previous_post_link('%link') ?></span> 
        <span class="next"><?php next_post_link('%link') ?></span>
      </div>  

        <div class="post" id="post-<?php the_ID(); ?>">
		  <div class="date"><span><?php the_time('M') ?></span> <?php the_time('d') ?></div>
		  <div class="title">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
          <div class="postdata"><span class="category"><?php the_category(', ') ?></span><span class="right mini-add-comment"><a href="#respond">Комментировать</a></span></div>
		  </div>
          <div class="entry">
            <?php the_content('Читать полностью &raquo;'); ?>
						<?php link_pages('<p><strong>Страницы:</strong> ', '</p>', 'number'); ?>
			
			<p class="submeta">автор: <strong><?php the_author(); ?></strong> 
			<?php 
				if(function_exists("the_tags"))
					the_tags('\\\\ теги: ', ', ', '<br />'); 					
			?>
         </p>
			<?php edit_post_link('Править', '', ''); ?>
          </div><!--/entry -->
		
		<?php comments_template(); ?>
		
			<?php endwhile; else: ?>

		<p>К сожалению, по вашему запросу ничего не найдено.</p>

<?php endif; ?>

	</div><!--/post -->

  </div><!--/content -->
  
  		<div id="footer">
		  	<span class="mangoorange">дизайн <a href="http://www.ndesign-studio.com">N.Design Studio</a>, адаптация <a href="http://www.mangoorange.com/">MangoOrange&trade;</a>, <a href="http://www.qnd.ru/">Продвижение сайта</a>.
</span>
		</div>
		
</div><!--/left-col -->

<?php 
$current_page = $post->ID; // Hack to prevent the no sidebar error
include_once("sidebar-right.php"); 
?>

  
<?php get_footer(); ?>

