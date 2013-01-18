<?php /* Smarty version Smarty-3.1.12, created on 2013-01-18 05:00:32
         compiled from "sm\templates\stat.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1835050f635d79e4f55-26541711%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ccc00427c54a9bf6f6ce1aee1a7fd6347f3b47af' => 
    array (
      0 => 'sm\\templates\\stat.tpl',
      1 => 1358477977,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1835050f635d79e4f55-26541711',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f635d79e7652_92421305',
  'variables' => 
  array (
    'grid' => 0,
    'row' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f635d79e7652_92421305')) {function content_50f635d79e7652_92421305($_smarty_tpl) {?><!-- /tpl/des_tools.tpl -->
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
<a href="list/receivers.csv">Скачать базу подписчиков рассылки</a>
	<table class="stat_tbl" cellpadding="5" cellspacing="0">
		<thead>
			<tr>
				<td>Эл. почта</td>
				<td>Фамилия</td>
				<td>Имя</td>
				<td>Компания</td>
				<td>Должность</td>
				<td>Телефон</td>
				<td>Действие</td>
				<td>Дата действия</td>
			</tr>
		</thead>
		<tbody>
		<?php  $_smarty_tpl->tpl_vars['row'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['row']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['grid']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['row']->key => $_smarty_tpl->tpl_vars['row']->value){
$_smarty_tpl->tpl_vars['row']->_loop = true;
?>	
			<tr>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['email'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['f'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['i'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['company'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['post'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['phone'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['activity_type'];?>
</td>
				<td><?php echo $_smarty_tpl->tpl_vars['row']->value['ts'];?>
</td>
			</tr>
		<?php } ?>
		</tbody>
	</table>

</body>
</html>
<?php }} ?>