<?php /* Smarty version Smarty-3.1.12, created on 2012-12-14 16:24:29
         compiled from "sm\templates\form.register.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1447150cb288d4feac3-29236140%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f11633c2467bd68826c6eaf712bc12630c976158' => 
    array (
      0 => 'sm\\templates\\form.register.tpl',
      1 => 1355486318,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1447150cb288d4feac3-29236140',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'register_from' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cb288d53e1e4_82008646',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cb288d53e1e4_82008646')) {function content_50cb288d53e1e4_82008646($_smarty_tpl) {?><form name="form_register" enctype="multypart/form-data">
	<input type="hidden" name="register_from" value="<?php echo $_smarty_tpl->tpl_vars['register_from']->value;?>
" />
	<input type="text" name="email" />
	<input type="text" name="password" /> 
	<input type="text" name="_password" />
	<input type="text" name="phone" />
	<input type="text" name="f" />
	<input type="text" name="i" />
	<input type="text" name="o" />
	<input type="text" name="company" />
	<input type="text" name="post" />
	<input type="hidden" name="send_spam" value="NO" />
	<input type="checkbox" name="send_spam" value="YES" />
</form><?php }} ?>