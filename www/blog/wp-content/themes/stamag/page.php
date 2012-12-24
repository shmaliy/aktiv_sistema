<?php get_header(); ?>
		
		<!-- Content -->
		<div id="content">
		
			<?php if (have_posts()) : ?>
			<?php while (have_posts()) : the_post(); ?>
			<!-- Post -->
			<div class="post" id="post-<?php the_ID(); ?>">
				<div class="post-title">
					<h2><?php the_title(); ?></h2>
				</div>

				<div class="post-entry">

					<?php the_content('Читать <span>полностью...</span>'); ?>
					<?php edit_post_link('Править', '<p>', '</p>'); ?>
				</div>
			</div>
			<!-- /Post -->
			<?php endwhile; ?>
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