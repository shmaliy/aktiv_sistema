<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">
	<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	
	<title><?php bloginfo('name'); ?> - Блог о том, как сделать свой бизнес системным: Система сбалансированных показателей, Бизнес-процессы, Ключевые показатели эффективности, KPI, ISO 9001, Business Studio, BPM, Improvement - <?php if ( is_single() ) { ?> &raquo; Архив сайта <?php } ?> <?php wp_title(); ?></title>
	
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->
	<meta name="author" content="MSRCS WordPress CR" /> <!-- leave this for stats -->

        <meta name="Revizit-after" content="1 days">
        <meta name="Robots" content="all">
        <meta name="Keywords" content="business studio, business studio 3, демо-день business studio, бизнес-студио, моделирование бизнес-процессов, оптимизация бизнес-процессов, бизнес-процессы, бизнес процессы, система сбалансированных показателей, balanced scorecard, kpi, консалтинговые услуги, стратегия, стратегическое планирование, автоматизация предприятия, системный бизнес, как сделать бизнес системным, kpi, best practice, improvement">

<meta name="Description" content="внедрение Balanced Scorecard, Моделирование и оптимизация бизнес-процессов, Поставка и внедрение системы бизнес-моделирования Business Studio, Демо-дни Business Studio 3, бизнес-процессы, бизнес процессы, системное управления, системный бизнес, процессное управление, KPI, kpi, best practice, improvement">

	
	<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
	
	<!--[if IE]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style_ie.css" />
	<![endif]-->
	
	<!--[if lt IE 7]>
		<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/style_ie6.css" />
	<![endif]-->
	
<?php wp_head(); ?>
</head>

<body>

<!-- Page -->
<div id="page"><div id="page-top"><div id="page-bottom">

	<!-- Header -->
	<div id="header">
	
		<!-- Title -->
		<div id="header-info">
			<h1><a href="<?php echo get_option('home'); ?>/" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a></h1>
			<div class="description"><?php bloginfo('description'); ?></div>
		</div>
		<!-- /Title -->
		
		<!-- Menu -->
		<div id="header-menu">
			<ul>
				<?php if (is_home()) { ?>
				<li class="current_page_item"><a href="<?php echo get_option('home'); ?>/">Главная</a></li>
				<?php } else { ?>
				<li><a href="<?php echo get_option('home'); ?>/">Главная</a></li>
				<?php } ?>
				<?php wp_list_pages('title_li=&depth=-1'); ?>
			</ul>
		</div>
		<!-- /Menu -->
		
		<!-- Search -->
		<div id="header-search">
			<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
				<input type="text" value="Поиск..." onfocus="if (this.value == 'Поиск...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Поиск...';}" name="s" id="s" />
				<input type="submit" id="searchsubmit" value="" />
			</form>
		</div>
		<!-- /Search -->
		
		<!-- Date -->
		<div id="header-date">Сегодня: <?php echo date("d.m.Y"); ?></div>
		
		<!-- RSS -->
		<div id="header-rss"><a href="<?php bloginfo('rss2_url'); ?>">Подписка на RSS</a></div>
		<div id="header-comments"><a href="<?php bloginfo('comments_rss2_url'); ?>">Комментарии RSS</a></div>
		
		<!-- Categories -->
		<div id="header-cats">
			<ul>
				<?php wp_list_categories('title_li=&depth=-1'); ?>
			</ul>
		</div>
		<!-- /Categories -->
	
	</div>
	<!-- /Header -->
	
	<!-- Main -->
	<div id="main">
	
