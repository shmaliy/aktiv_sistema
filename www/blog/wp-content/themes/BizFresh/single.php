<?php get_header(); ?>

  <div id="content">
  
<div class="xboxcontent">
  
  <?php if (have_posts()) : ?>
  	<?php while (have_posts()) : the_post(); ?>
  
    <div class="post" id="post-<?php the_ID(); ?>">
		<div class="postedby">
     <span class="post-day"><?php the_time('d') ?></span> <br />
	 <span class="post-month"><?php the_time('M') ?></span> 
	</div>
	
		<div class="entry">
        <h2>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<span class="post-author">Автор: <a href="#"><strong><?php the_author() ?></strong></a></span>
		  


		<div class="post-content">
			<?php the_content('Читать полностью &raquo;'); ?>
		</div>
        
      <!--Rateing-->
     <?php if(function_exists('the_ratings')) { the_ratings(); } ?>
       <!--Rateing end-->

       <div class="post-footer cleafix">
		<p class="post-comments"><?php comments_popup_link('Ваш отзыв', '1 отзыв', 'Отзывов: %'); ?></p>
		<p class="post-cat"><?php the_category(', ') ?></p> 
       </div>

	  </div>
	</div>
	
	<!--Related post start -->
	
	 
	
		<?php comments_template(); ?>
	
	<?php endwhile; ?>
	
	
	
	<div class="navigation">
	  <span class="previous-entries"><?php next_posts_link('Раньше') ?></span> <span class="next-entries"><?php previous_posts_link('Позже') ?></span>
	</div>
	
	<?php else : ?>
	
		<h3>К сожалению, по вашему запросу ничего не найдено.</h3>
    <p>Попробуете по другому запросу?</p>
        <div class="search404"> 
         <?php include(TEMPLATEPATH."/searchform.php");?>
    </div>
    <p class="clear"><strong>Или посмотрите в ежемесячных архивах и рубриках</strong></p>
     
    <div class="category">
    	<h2><?php _e('Рубрики'); ?></h2>
    	<ul>
        <?php wp_list_categories('orderby=name&title_li'); ?>
      </ul>
    </div>
    
    <div class="archives"> 
     <h2 class="sidebartitle">
      <?php _e('Архивы'); ?>
    </h2>
    <ul>
      <?php wp_get_archives('type=monthly'); ?>
    </ul>
     </div> 
		
  <?php endif; ?>
  
</div>

  </div><!--/content -->
  
<?php include (TEMPLATEPATH . "/sidebar1.php"); ?>
<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

<?php get_footer(); ?>



		
