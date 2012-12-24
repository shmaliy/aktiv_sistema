<?php get_header(); ?>
		
		<!-- Content -->
		<div id="content">
		
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<!-- Post -->
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
					<div class="post-title-info">
						<div class="post-date">Опубликовано: <?php the_time('d M Y') ?></div>
						<div class="post-comments"><?php comments_popup_link('Ваш отзыв', '1 отзыв', 'Отзывов: %'); ?></div>
					</div>
				</div>
				<div class="post-entry">
					<?php the_content('Читать полностью...'); ?>
				</div>
				<div class="post-category">
					Рубрика: <?php the_category(', ') ?>
				</div>
			</div>
			<!-- /Post -->
			<?php endwhile; ?>
			<!-- Navigation -->
			<div class="navigation">
				<div class="navigation-previous"><?php next_posts_link('&laquo; Раньше') ?></div>
				<div class="navigation-next"><?php previous_posts_link('Позже &raquo;') ?></div>
				<div class="clear"></div>
			</div>
			<!-- /Navigation -->
			<?php else : ?>
			<!-- Post -->
			<div class="post">
				<div class="post-title">
					<h2>Не найдено</h2>
				</div>
				<div class="post-entry">
					<p>К сожалению, по вашему запросу ничего не найдено.</p>
				</div>
			</div>
			<!-- /Post -->
			<?php endif; ?>
		
		</div>
		<!-- /Content -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>