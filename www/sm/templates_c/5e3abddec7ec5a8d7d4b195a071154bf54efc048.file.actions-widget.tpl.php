<?php /* Smarty version Smarty-3.1.12, created on 2013-01-29 11:22:17
         compiled from "sm\templates\actions-widget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1916150f8731976ae69-39520543%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '5e3abddec7ec5a8d7d4b195a071154bf54efc048' => 
    array (
      0 => 'sm\\templates\\actions-widget.tpl',
      1 => 1359445949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1916150f8731976ae69-39520543',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f873197fb011_08361388',
  'variables' => 
  array (
    'kdata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f873197fb011_08361388')) {function content_50f873197fb011_08361388($_smarty_tpl) {?><div class="actions">
	<div class="thumbnail">
		<a href="/actions"><img src="/images/design/company/club.jpg"></a>
	</div>
	<div class="title">
		<div class="main-title">События</div>
		<div class="main-title"><?php echo $_smarty_tpl->tpl_vars['kdata']->value['public_date'];?>
</div>
		<div class="content-title"><a href="/actions"><?php echo $_smarty_tpl->tpl_vars['kdata']->value['title'];?>
</a></div>
	</div>
	<div class="clr"></div>
	<div><?php echo $_smarty_tpl->tpl_vars['kdata']->value['description'];?>
</div>
</div><?php }} ?>