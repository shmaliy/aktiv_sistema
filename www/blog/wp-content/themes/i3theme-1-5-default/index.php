<?php get_header(); ?>

    <div id="content">

	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>

        <div class="post" id="post-<?php the_ID(); ?>">
		  <div class="date"><span><?php the_time('M') ?></span> <?php the_time('d') ?></div>
		  <div class="title">
          <h2><a href="<?php the_permalink() ?>" rel="bookmark" title="Постоянная ссылка: <?php the_title(); ?>"><?php the_title(); ?></a></h2>
          <div class="postdata"><span class="category"><?php the_category(', ') ?></span> <span class="comments"><?php comments_popup_link('Комментариев нет &#187;', '1 комментарий &#187;', 'Комментариев (%) &#187;'); ?></span></div>
		  </div>
          <div class="entry">
            <?php the_content('Читать полностью &raquo;'); ?>
            
            <p class="submeta">автор: <strong><?php the_author(); ?></strong> 
			<?php 
				if(function_exists("the_tags"))
					the_tags('\\\\ теги: ', ', ', '<br />'); 					
			?>
            </p>
          </div><!--/entry -->
          
        </div><!--/post -->

		<?php endwhile; ?>
		
        <div class="page-nav"> <span class="previous-entries"><?php next_posts_link('Назад') ?></span> <span class="next-entries"><?php previous_posts_link('Вперед') ?></span></div><!-- /page nav -->

	<?php else : ?>

		<h2>Не найдено</h2>
		<p>К сожалению, вы запросили то, чего здесь нет.</p>

	<?php endif; ?>

      </div><!--/content -->

      <div id="footer">
		  	<span class="mangoorange">дизайн <a href="http://www.ndesign-studio.com">N.Design Studio</a>, адаптация <a href="http://www.mangoorange.com/">MangoOrange&trade;</a>, <a href="http://www.qnd.ru/">Продвижение сайта</a>.</span>
		</div>
		
    </div><!--/left-col -->

<?php 
$current_page = $post->ID; // Hack to prevent the no sidebar error
include_once("sidebar-right.php"); 
//get_sidebar();
?>

<?php get_footer(); ?>