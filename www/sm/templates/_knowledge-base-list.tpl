<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<!-- header block -->
<head>
<title>���� ������ � �������������� �������� ������-�������</title>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1251">
<meta http-equiv="Pragma" content="no-cache">
<meta name="Generator" content="Amiweb Design Studio">
<meta name="Author-corporate" content="Amiweb Design Studio">
<meta name="Publisher" content="Amiweb Design Studio">
<meta name="Revizit-after" content="1 days">
<meta name="Robots" content="all">
<meta name="Description" content="���� ������ � ������-������� - ���������� � ������� �������� � ����������� �������: �������������� ������������, �������� � ����������� ������-���������, ��������� ������� ���������������� ����������� � �������� ����������� ������ ������������� ������-���������.">
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
	{$forms}
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
						<td width="20" bgcolor="#FFFFFF"><img
							src="/images/t_fill.gif" width="20" height="1"></td>
						<td width="27"><img src="/images/design/header_ugol.jpg"
							width="27" height="121"></td>
						<td height="121" align="left" valign="bottom" bgcolor="#B2DEF7"
							class="menu_title"><table width="100%" border="0"
								cellpadding="0" cellspacing="0" bgcolor="#B2DEF7">
								<tr>
									<td valign="top" bgcolor="#B2DEF7" class="menu_title"><h1
											class="seoh1">���� ������</h1></td>
									<td width="20" valign="middle" bgcolor="#B2DEF7">&nbsp;</td>
									<td width="20" valign="middle" bgcolor="#B2DEF7"><a
										href="/" title="�� �������"><img
											src="/images/home_disabled.gif" width="11" height="10"
											border="0" /> </a></td>
									<td width="20" valign="middle" bgcolor="#B2DEF7"><a
										href="/sitemap" title="����� �����"><img
											src="/images/map_disabled.gif" width="9" height="9"
											border="0" /> </a></td>
									<td width="20" valign="middle" bgcolor="#B2DEF7"><a
										href="mailto:info@aktiv-sistema.com?subject=��������� � ����� aktiv-sistema.com.ua"
										title="�������� �����"><img src="/images/mail.gif"
											width="12" height="10" border="0" /> </a></td>
								</tr>
								<tr>
									<td height="17" colspan="5" valign="top" bgcolor="#B2DEF7"
										class="menu_title"><img src="../images/t_fill.gif"
										width="1" height="18"></td>
								</tr>
							</table></td>
					</tr>
				</table></td>
			<td bgcolor="#B2DEF7">&nbsp;</td>
		</tr>
		<tr>
			<td height="49"><img src="/images/t_fill.gif" width="1"
				height="49"></td>
			<td rowspan="6">&nbsp;</td>
		</tr>
		<tr>
			<td><table width="981" border="0" cellpadding="0"
					cellspacing="0">
					<tr>
						<td width="218" valign="top">{$mainmenu}{$panel} </td>
						<td width="23"><img src="/images/t_fill.gif" width="23"
							height="1"></td>
						<td width="531" valign="top">
							<div class="kb-list">
							{foreach $data as $item}		
								<div class="kb-item">
									<!-- {$fileinfo = '<span class="nan">(�� �������� ���������� ��� ��������)</span>'} -->
									{if !empty($item.fileslist) && $item.fileslist.free == 0}
									<!-- {$fileinfo = '<span class="pay">(������� �����������)</span>'} -->
									{elseif !empty($item.fileslist) && $item.fileslist.free == 1}
									<!-- {$fileinfo = '<span class="free">(�� ������� �����������)</span>'} -->
									{/if}
								
									<a class="kb-title" href="/base/{$item.id}">{$item.title} {$fileinfo}</a>
									<div>{$item.description}</div>
								</div>
							{/foreach}
							</div>
						</td>
						<td width="23"><img src="/images/t_fill.gif" width="23"
							height="1"></td>
						<td width="186" valign="top"><table width="100%" border="0"
								cellspacing="0" cellpadding="0">
								<tr>
									<td>{$actions}</td>
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
						<td width="1"><img src="/images/t_fiil.png" width="1"
							height="1" /></td>
						<td width="240" align="center" valign="top">
						<td width="530" align="center" valign="top"><div align="left">
								<span class="footer_copyright">�����-�������, &copy;
									2008-2011<br> ������: ���� Brand Development<br>
									����������������: ������ web ������� ������
								</span><br />
							</div>
							<div>
								<div align="left">
									<a href="/news" class="menu_bottom">�������</a>&nbsp;&nbsp; <a
										href="/company" class="menu_bottom">��������</a>&nbsp;&nbsp; <a
										href="/services" class="menu_bottom">������</a>&nbsp;&nbsp; <a
										href="/tools/business_studio" class="menu_bottom">�����������</a>&nbsp;&nbsp;<a
										href="/base" class="menu_bottom">���� ������</a> &nbsp;&nbsp;<a
										href="/actions" class="menu_bottom">�������</a> &nbsp;&nbsp;<a
										href="http://blog.aktiv-sistema.com" class="menu_bottom_blog">����</a>
								</div>
								<td width="1" class="style5"><img src="/images/t_fiil.png"
									width="1" height="1" /></td>
								<td valign="top" class="style5"><table width="240"
										border="0" cellspacing="0" cellpadding="0">
										<tr>
											<td align="left" valign="top"><span class="style6"><img
													src="/images/design/hren.jpg" width="14" height="14" /> </span></td>
											<td align="left" valign="top">
												<div class="footer_copyright">��������
													&quot;�����-�������&quot;</div>
												<div class="footer_copyright">��������������, �������</div>
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
