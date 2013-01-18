<?php /* Smarty version Smarty-3.1.12, created on 2013-01-18 04:45:59
         compiled from "sm\templates\_actions-layout.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1725050f89bf91424b8-75233702%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '07a29cc7442f4e210d7cc98d33d52086cb6769b4' => 
    array (
      0 => 'sm\\templates\\_actions-layout.tpl',
      1 => 1358477030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1725050f89bf91424b8-75233702',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f89bf91f5db0_61427027',
  'variables' => 
  array (
    'data' => 0,
    'forms' => 0,
    'mainmenu' => 0,
    'panel' => 0,
    'knowledgebase' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f89bf91f5db0_61427027')) {function content_50f89bf91f5db0_61427027($_smarty_tpl) {?><!-- /tpl/des_tools.tpl -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<!-- header block -->
<head>
<title>События — консалтинговая компания «Актив-Система»</title>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1251">
<meta http-equiv="Pragma" content="no-cache">
<meta name="Generator" content="Amiweb Design Studio">
<meta name="Author-corporate" content="Amiweb Design Studio">
<meta name="Publisher" content="Amiweb Design Studio">
<meta name="Revizit-after" content="1 days">
<meta name="Robots" content="all">
<meta name="Keywords" content="<?php echo $_smarty_tpl->tpl_vars['data']->value['keywords'];?>
">
<meta name="Description" content="<?php echo $_smarty_tpl->tpl_vars['data']->value['description'];?>
">
<link href="/styles/styles.css" rel="stylesheet" type="text/css" />
<link href="/styles/sunny.css" type="text/css" rel=stylesheet>
<script src="/lib/js/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="/lib/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/lib/js/sunny.js" type="text/javascript"></script>

<script>
	var _gaq = _gaq || []; _gaq.push(['_setAccount', 'UA-27653780-1']);
	_gaq.push(['_trackPageview']); (function() { var ga =
	document.createElement('script'); ga.type = 'text/javascript'; ga.async
	= true; ga.src = ('https:' == document.location.protocol ? 'https://ssl'
	: 'http://www') + '.google-analytics.com/ga.js'; var s =
	document.getElementsByTagName('script')[0];
	s.parentNode.insertBefore(ga, s); })();

</script>
</head>
<!-- /header block -->

<body>
	<?php echo $_smarty_tpl->tpl_vars['forms']->value;?>

	<table width="100%" border="0" cellpadding="0" cellspacing="0"
		bgcolor="#FFFFFF">
		<tr>
			<td width="103" rowspan="7">&nbsp;</td>
			<td width="981" bgcolor="#B2DEF7"><table width="100%" border="0"
					cellspacing="0" cellpadding="0">
					<tr>
						<td width="214" bgcolor="#FFFFFF"><a href="/"><img
								src="/images/design/active_system_LOGO.jpg" width="214"
								height="73" border="0"> </a></td>
						<td width="20" bgcolor="#FFFFFF"><img src="/images/t_fill.gif"
							width="20" height="1"></td>
						<td width="27"><img src="/images/design/header_ugol.jpg"
							width="27" height="121"></td>
						<td height="121" align="left" valign="bottom" bgcolor="#B2DEF7"
							class="menu_title"><table width="100%" border="0" cellpadding="0"
								cellspacing="0" bgcolor="#B2DEF7">
								<tr>
									<td valign="top" bgcolor="#B2DEF7" class="menu_title"><h1
											class="seoh1"><?php echo $_smarty_tpl->tpl_vars['data']->value['title'];?>
</h1></td>
									<td width="20" valign="middle" bgcolor="#B2DEF7">&nbsp;</td>
									<td width="20" valign="middle" bgcolor="#B2DEF7"><a href="/"
										title="На главную"><img src="/images/home_disabled.gif"
											width="11" height="10" border="0" /> </a></td>
									<td width="20" valign="middle" bgcolor="#B2DEF7"><a
										href="/sitemap" title="Карта сайта"><img
											src="/images/map_disabled.gif" width="9" height="9"
											border="0" /> </a></td>
									<td width="20" valign="middle" bgcolor="#B2DEF7"><a
										href="mailto:info@aktiv-sistema.com?subject=Сообщение с сайта aktiv-sistema.com.ua"
										title="Обратная связь"><img src="/images/mail.gif" width="12"
											height="10" border="0" /> </a></td>
								</tr>
								<tr>
									<td height="17" colspan="5" valign="top" bgcolor="#B2DEF7"
										class="menu_title"><img src="../images/t_fill.gif" width="1"
										height="18"></td>
								</tr>
							</table></td>
					</tr>
				</table></td>
			<td bgcolor="#B2DEF7">&nbsp;</td>
		</tr>
		<tr>
			<td height="49"><img src="/images/t_fill.gif" width="1" height="49">
			</td>
			<td rowspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td><table width="981" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="218" valign="top"><?php echo $_smarty_tpl->tpl_vars['mainmenu']->value;?>
<?php echo $_smarty_tpl->tpl_vars['panel']->value;?>
 </td>
						<td width="23"><img src="/images/t_fill.gif" width="23" height="1">
						</td>
						<td width="531" valign="top">
							<img width="530" height="175" border="0" src="/images/design/event_intro.jpg">
							<?php echo $_smarty_tpl->tpl_vars['data']->value['body'];?>

							<a href="#" onclick="return $.fn.active('signtoaction', '/signToAction/<?php echo $_smarty_tpl->tpl_vars['data']->value['id'];?>
');">Принять участие</a>
						</td>
						<td width="23"><img src="/images/t_fill.gif" width="23" height="1">
						</td>
						<td width="186" valign="top"><table width="100%" border="0"
								cellspacing="0" cellpadding="0">
								<tr>
									<td><?php echo $_smarty_tpl->tpl_vars['knowledgebase']->value;?>
</td>
								</tr>
								
								
							</table></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td><img src="../images/t_fill.gif" width="1" height="10"></td>
		</tr>
		<tr>
			<td height="2"><table height="2" border="0" cellspacing="0"
					cellpadding="0">
					<tr>
						<td width="240" height="2"><img src="/images/t_fill.gif"
							width="240" height="2"></td>
						<td width="750" height="2" align="center" valign="top"
							background="/images/design/h_menu_lines.jpg"><img
							src="/images/t_fill.gif" width="1" height="1"></td>
					</tr>
				</table></td>
		</tr>
		<tr>
			<td><img src="../images/t_fill.gif" width="1" height="7"></td>
		</tr>
		<tr>
			<td><table border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="1"><img src="/images/t_fiil.png" width="1" height="1" />
						</td>
						<td width="240" align="center" valign="top">
						
						<td width="530" align="center" valign="top"><div align="left">
								<span class="footer_copyright">Актив-Система, &copy; 2008-2011<br>
									Дизайн: АТМА Brand Development<br> Программирование: Студия web
									дизайна АМИВЕБ
								</span><br />
							</div>
							<div>
								<div align="left">
									<a href="/news" class="menu_bottom">Новости</a>&nbsp;&nbsp; <a
										href="/company" class="menu_bottom">Компания</a>&nbsp;&nbsp; <a
										href="/services" class="menu_bottom">Услуги</a>&nbsp;&nbsp; <a
										href="/tools/business_studio" class="menu_bottom">Инструменты</a>&nbsp;&nbsp;<a
										href="/base" class="menu_bottom">База знаний</a> &nbsp;&nbsp;<a
										href="/actions" class="menu_bottom">События</a> &nbsp;&nbsp;<a
										href="http://blog.aktiv-sistema.com" class="menu_bottom_blog">Блог</a>
								</div>
								<td width="1" class="style5"><img src="/images/t_fiil.png"
									width="1" height="1" /></td>
								<td valign="top" class="style5"><table width="240" border="0"
										cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top"><span class="style6"><img
													src="/images/design/hren.jpg" width="14" height="14" /> </span>
											</td>
											<td align="left" valign="top">
												<div class="footer_copyright">Компания
													&quot;Актив-Система&quot;</div>
												<div class="footer_copyright">Днепропетровск, Украина</div>
												<div class="footer_copyright">
													<a href="mailto:info@aktiv-sistema.com"
														class="menu_bottom_mail">info@aktiv-sistema.com</a>
												</div>
												<div>
													<img src="/images/t_fill.gif" width="1" height="7">
												</div> <span class="footer_phone">+38 050 361 94 27</span>
												<div>
													<img src="/images/t_fill.gif" width="1" height="10">
												</div>
											</td>
										</tr>
									</table></td>
					
					</tr>
				</table></td>
		</tr>
	</table>
</body>
</html>
<?php }} ?>