<?php /* Smarty version Smarty-3.1.12, created on 2013-01-14 03:21:25
         compiled from "sm\templates\top.panel.user.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2486250f35aeba5e7c4-71741944%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c96cefb82d6e559ef5d79f11447e13ad440b259a' => 
    array (
      0 => 'sm\\templates\\top.panel.user.tpl',
      1 => 1358126482,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2486250f35aeba5e7c4-71741944',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f35aebc788a9_70722397',
  'variables' => 
  array (
    'name' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f35aebc788a9_70722397')) {function content_50f35aebc788a9_70722397($_smarty_tpl) {?><div class="login-buttons">
		<!-- 	/tpl/main.tpl -->
		<a class="login-buttons-login via_ajax" href="#" onclick="$.fn.active('showmodal', 'modal-container', 'tabs-list-login');"><?php echo $_smarty_tpl->tpl_vars['name']->value;?>
</a>
		<a class="login-buttons-register via_ajax" href="#" onclick="$.fn.active('request', '/frontendUnLogin', '{}');">Выйти</a>
		<div class="clr"></div>
</div><?php }} ?>