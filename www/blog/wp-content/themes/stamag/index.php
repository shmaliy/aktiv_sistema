<?php get_header(); ?>
		
		<!-- Featured Post -->
		<?php $my_query = new WP_Query('showposts=1'); ?>
		<?php while ($my_query->have_posts()) : $my_query->the_post(); ?>
		<div class="featured-post" id="post-<?php the_ID(); ?>">
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
		<?php endwhile; ?>
		<?php rewind_posts(); ?>
		<!-- /Featured Post -->
		
		<?php include (TEMPLATEPATH . '/sidebar-ads.php'); ?>
		
		<div class="clear"></div>
		
		<!-- Top Panel -->
		<div id="top-panel"><div id="top-panel-top"><div id="top-panel-bottom">
			<div class="top-panel-box">
				<h3>Избранные статьи</h3>
				<ul>
					<?php $mynew_query = new WP_Query('showposts=5'); ?>
					<?php while ($mynew_query->have_posts()) : $mynew_query->the_post(); ?>
					<li><a href="<?php the_permalink() ?>"><span><?php the_time('d M Y') ?></span><?php the_title(); ?></a></li>
					<?php endwhile; ?>
					<?php rewind_posts(); ?>
				</ul>
			</div>
			<div class="top-panel-about">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar(2) ) : ?>
      Место для виджета
			<?php endif; ?>	
			</div>
			<div class="top-panel-box">
				<h3>Свежие отзывы</h3>
				<ul>
					<?php
					$sql = "SELECT * FROM $wpdb->comments LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID = $wpdb->posts.ID) WHERE comment_approved = '1' AND comment_type = '' ORDER BY comment_date DESC LIMIT 0 , 4";
					$comments = $wpdb->get_results($sql);
					foreach ($comments as $comment) {
						$data = "<span>" . $comment->comment_author . ":</span>" . substr($comment->comment_content,0,40);
						echo "<li><a href=\"" . get_permalink($comment->comment_post_ID) . "\">" . $data . "...</a></li>\n";   
					}
					?>
				</ul>
			</div>
		</div></div></div>
		<!-- /Top Panel -->
		
		<!-- Content -->
		<div id="content">
		
			<?php query_posts('showposts=10&offset=1'); ?>
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<!-- Post -->
			

		<div class="post-sm" id="post-<?php the_ID(); ?>">
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
<br>
		</div>
		
			<!-- /Post -->
			<?php endwhile; ?>
			<?php endif; ?>
		
		</div>
		<!-- /Content -->
		
<?php get_sidebar(); ?>
<?php get_footer(); ?>