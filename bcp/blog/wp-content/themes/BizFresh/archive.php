 <?php get_header(); ?>
<div id="content">
  <!--the loop-->
  
  <?php if (have_posts()) : ?>
       <h4>
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <?php echo single_cat_title(); ?>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        Архив за
        <?php the_time('d M Y'); ?>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        Архив за
        <?php the_time('F Y'); ?>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        Архив за
        <?php the_time('Y'); ?>
        <?php /* If this is a search */ } elseif (is_search()) { ?>
        Результаты поиска
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        Архив автора
        <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
          Архив сайта
          <!--do not delete-->
          <?php } ?>
      </h4>
  
  <!--loop article begin-->
  <?php while (have_posts()) : the_post(); ?>
  <!--post title as a link-->
  
  
  <div class="xboxcontent">
  
  <div class="post" id="post-<?php the_ID(); ?>">
	<div class="postedby">
     <span class="post-day"><?php the_time('d') ?></span> <br />
	 <span class="post-month"><?php the_time('M') ?></span> 
	</div>

		<div class="entry">
        <h2>
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title(); ?>"><?php the_title(); ?></a>
		</h2>
		<span class="post-author">Автор: <?php the_author_posts_link(); ?> </span>
		


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
    
      </div>
    
  <!--one post end-->
  <?php endwhile; ?>
  <!-- Previous/Next page navigation -->
  <div class="pagenavi">
    <?php if(function_exists('wp_pagenavi')) { ?>
    <div class="wp-pagenavi">
      <?php wp_pagenavi();  ?>
    </div>
    <?php } 
 
 else {?>
    <div class="page-nav">
      <div class="nav-previous">
        <?php previous_posts_link('Раньше') ?>
      </div>
      <div class="nav-next">
        <?php next_posts_link('Позже') ?>
      </div>
    </div>
    <? } ?>
  </div>
  <!-- do not delete-->
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
    
    
  <!--do not delete-->
  <?php endif; ?>
  <!--archive.php end-->
  

  
</div>
<!--include sidebar-->
<?php include (TEMPLATEPATH . "/sidebar1.php"); ?>
<?php include (TEMPLATEPATH . "/sidebar2.php"); ?>

<?php get_footer(); ?>