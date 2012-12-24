<?php get_header(); ?>

  <div id="content">
  
  <div class="xboxcontent">

  
  <?php if (have_posts()) : ?>
  	<?php while (have_posts()) : the_post(); ?>
  
    <div class="post" id="post-<?php the_ID(); ?>">

		<div class="entry">
        <h2 style="margin-left:0;">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>


		<div class="post-content">
			<?php the_content('Читать полностью &raquo;'); ?>
		</div>


	  </div>
	</div>
	
	<?php endwhile; ?>
	
	<div class="navigation">
	  <span class="previous-entries"><?php next_posts_link('Раньше') ?></span> <span class="next-entries"><?php previous_posts_link('Позже') ?></span>
	</div>
	
	<?php else : ?>
	
		<h2 class="center">Не найдено</h2>
		<p class="center">К сожалению, по вашему запросу ничего не найдено.</p>
		
  <?php endif; ?>
  
  </div>
	
  </div><!--/content -->
  
<?php include (TEMPLATEPATH . "/sidebar1.php"); ?>
<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

<?php get_footer(); ?>



		
