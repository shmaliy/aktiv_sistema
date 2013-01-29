<?php /* Smarty version Smarty-3.1.12, created on 2013-01-29 11:22:17
         compiled from "sm\templates\base-knowledge-widget.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2533550f86e0ee818d2-08203127%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b429eed7f16264e39771244f3a3e406b0cf08d7' => 
    array (
      0 => 'sm\\templates\\base-knowledge-widget.tpl',
      1 => 1359445949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2533550f86e0ee818d2-08203127',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f86e0eebfd65_06703130',
  'variables' => 
  array (
    'kdata' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f86e0eebfd65_06703130')) {function content_50f86e0eebfd65_06703130($_smarty_tpl) {?><div class="knowledgebase">
	<div class="thumbnail">
		<a href="/base/<?php echo $_smarty_tpl->tpl_vars['kdata']->value['id'];?>
">
		<?php if (!empty($_smarty_tpl->tpl_vars['kdata']->value['img_small'])){?>
			<img src="/images/design/bases/<?php echo $_smarty_tpl->tpl_vars['kdata']->value['img_small'];?>
">
		<?php }else{ ?>
			<img src="/images/design/bases/baza_znabiy.jpg">
		<?php }?> 
		</a>
	</div>
	<div class="title">
		<div class="main-title">База знаний <br />
		Новое поступление</div>
		
		<div class="content-title"><a href="/base/<?php echo $_smarty_tpl->tpl_vars['kdata']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['kdata']->value['title'];?>
</a></div>
	</div>
	<div class="clr"></div>
	<div><?php echo $_smarty_tpl->tpl_vars['kdata']->value['description'];?>
</div>
</div><?php }} ?>