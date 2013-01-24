<?php /* Smarty version Smarty-3.1.12, created on 2013-01-25 00:24:04
         compiled from "sm\templates\contents-links-access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2902550fda8db1223e7-18536199%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '997e633207ead53bec613ae35a4a65e4b140af53' => 
    array (
      0 => 'sm\\templates\\contents-links-access.tpl',
      1 => 1359066242,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2902550fda8db1223e7-18536199',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50fda8db124093_12231386',
  'variables' => 
  array (
    'links' => 0,
    'value' => 0,
    'id' => 0,
    'key' => 0,
    'tbl' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50fda8db124093_12231386')) {function content_50fda8db124093_12231386($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['value'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['value']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['links']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['value']->key => $_smarty_tpl->tpl_vars['value']->value){
$_smarty_tpl->tpl_vars['value']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['value']->key;
?>
	<?php if ($_smarty_tpl->tpl_vars['value']->value['name']!==''){?>
	<a class="access-link" onclick="return $.fn.active('parseclick', '<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
|<?php echo $_smarty_tpl->tpl_vars['tbl']->value;?>
');" href="#">
		<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>

		<?php if ($_smarty_tpl->tpl_vars['value']->value['free']==1){?>
		<span>(Не требуется регистрация)</span>
		<?php }else{ ?>
		<span>(Требуется регистрация)</span>
		<?php }?> 	
	</a>
	<?php }?>
<?php } ?>
<div class="clear"></div><?php }} ?>