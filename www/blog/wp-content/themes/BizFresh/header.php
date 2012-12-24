<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php bloginfo('name'); ?>
<?php if ( is_single() ) { ?>
&raquo; Архив сайта
<?php } ?>
<?php wp_title(); ?>
</title>
<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
</head>
<body>
<div id="page">
<div id="headerbg">
  <div id="header">
    <div class="logo-text"><a href="<?php echo get_settings('home'); ?>/">
      <?php bloginfo('name'); ?>
      </a></div>
    <h3>
      <?php bloginfo('description'); ?>
    </h3>
    <!--  <a href="feed:<?php bloginfo('rss2_url'); ?>" id="rssmaster"><img src="<?php bloginfo('template_url'); ?>/images/masterRSS.png" alt="" border="0" /></a> -->
    <div id="navi" class="clear">
      <ul id="nav">
        <li class="page_item"><a href="<?php echo get_settings('home'); ?>/" title="Home">Главная</a></li>
        <?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
      </ul>
    </div>
    <div id="search">
      <?php include (TEMPLATEPATH . '/searchform.php'); ?>
    </div>
  </div>
</div>
<div id="postbg" class="clear">
  <div id="post-width">
    <div id="aboutus">
      <h2>О нас</h2>
      <p>Тут пару строк о вашем проекте. Редактируется в файле header.php</p>
      <p><a href="#">Подробнее >> </a> </p>
    </div>
    <div id="mostpop-Post">
      <h2>Рекомендуем</h2>
      <ul>
        <li><a href="#">Статья номер один</a></li>
        <li><a href="#">Статья номер два</a></li>
        <li><a href="#">Статья номер три</a></li>
        <li><a href="#">Статья номер четыре</a></li>
        <li><a href="#">Статья номер пять</a></li>
        <li><a href="#">Статья номер шесть</a></li>
      </ul>
    </div>
    <div id="subscribe">
      <h2>Подписка на RSS-ленту</h2>
      <a href="feed:<?php bloginfo('rss2_url'); ?>" id="rssmaster"><img src="<?php bloginfo('template_url'); ?>/images/rss.png" alt="" border="0" style="float:right; margin-left:8px; " /></a>
      <p class="left"><strong>Тут какой-то текст</strong></p>
      <p>Опять же редактируется в файле header.php</p>
    </div>
  </div>
</div>
<div id="content-bg">
<div id="content-width">
<div id="ctop"> </div>
<div id="cCenter">
