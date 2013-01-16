
<?php get_header(); ?>	
	<div id="wrapper">
	
		<div id="content-wrapper">
		
			<div id="content">
			
			
			
				<?php if (have_posts()) : ?>

			<?php while (have_posts()) : the_post(); ?>

		
				<div class="post-wrapper">
				

					<div class="date">
						<span class="month"><?php the_time('M') ?></span>
						<span class="day"><?php the_time('j') ?></span>
					</div>

					<div style="float: right; width: 410px; clear: right; margin-top: 15px; margin-bottom: 15px; padding-top: 10px;  margin-left: 5px;">
			<span class="titles"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a></span>
</div>

			<div class="post">

			<?php the_content('Читать полностью &raquo;'); ?>

			</div>
			
			<div class="post-footer">В рубриках: <?php the_category(', ') ?> <strong>|</strong> <?php edit_post_link('Править','','<strong>|</strong>'); ?> <?php comments_popup_link('Комментировать &raquo;', '1 комментарий &raquo;', 'Комментариев (%) &raquo;'); ?></div>

			</div>

			<?php comments_template(); ?>

			<?php endwhile; ?>

			   <p class="pagination"><?php next_posts_link('&laquo; Раньше') ?> <?php previous_posts_link('Позже &raquo;') ?></p>

			<?php else : ?>

			<h2 align="center">Не найдено</h2>

			<p align="center">К сожалению, вы запросили то, чего здесь нет.</p>

			<?php endif; ?>
			
			
	
			</div>
		
		</div>
		<?php get_sidebar(); ?>    
		<?php get_footer(); ?>   
	
</body>
</html>