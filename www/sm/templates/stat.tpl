<!-- /tpl/des_tools.tpl -->
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<!-- header block -->
<head>
<title>Статистика</title>
<meta http-equiv="Content-Type"
	content="text/html; charset=windows-1251">
<meta http-equiv="Pragma" content="no-cache">
<meta name="Revizit-after" content="1 days">
<meta name="Robots" content="all">
<link href="/styles/styles.css" rel="stylesheet" type="text/css" />
<link href="/styles/sunny.css" type="text/css" rel=stylesheet>
<script src="/lib/js/AC_RunActiveContent.js" type="text/javascript"></script>
<script src="/lib/js/jquery-1.8.3.min.js" type="text/javascript"></script>
<script src="/lib/js/sunny.js" type="text/javascript"></script>


</head>
<!-- /header block -->

<body>

	<table class="stat_tbl" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<td>Эл. почта</td>
				<td>Фамилия</td>
				<td>Имя</td>
				<td>Компания</td>
				<td>Должность</td>
				<td>Действие</td>
				<td>Дата действия</td>
			</tr>
		</thead>
		<tbody>
		{foreach $grid as $row}	
			<tr>
				<td>{$row.email}</td>
				<td>{$row.f}</td>
				<td>{$row.i}</td>
				<td>{$row.company}</td>
				<td>{$row.post}</td>
				<td>{$row.activity_type}</td>
				<td>{$row.ts}</td>
			</tr>
		{/foreach}
		</tbody>
	</table>

</body>
</html>
