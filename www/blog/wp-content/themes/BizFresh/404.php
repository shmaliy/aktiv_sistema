<?php get_header(); ?>

<!--create your own error 404 page-->
<div id="content">

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

</div>	

<!--include sidebar-->
<?php get_sidebar();?>
<!--include footer-->
<?php get_footer(); ?>

