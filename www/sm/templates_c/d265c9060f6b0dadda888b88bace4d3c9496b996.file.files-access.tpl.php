<?php /* Smarty version Smarty-3.1.12, created on 2013-01-29 11:22:21
         compiled from "sm\templates\files-access.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2483650f5e97b2f9f18-60929534%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd265c9060f6b0dadda888b88bace4d3c9496b996' => 
    array (
      0 => 'sm\\templates\\files-access.tpl',
      1 => 1359445949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2483650f5e97b2f9f18-60929534',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f5e97b3ed281_00810285',
  'variables' => 
  array (
    'id' => 0,
    'tbl' => 0,
    'file' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f5e97b3ed281_00810285')) {function content_50f5e97b3ed281_00810285($_smarty_tpl) {?><div class="front-file">

	Скачать <a href="#" onclick="return $.fn.active('getfile', '/load/<?php echo $_smarty_tpl->tpl_vars['id']->value;?>
_<?php echo $_smarty_tpl->tpl_vars['tbl']->value;?>
');" class="via_load"><?php echo $_smarty_tpl->tpl_vars['file']->value['title'];?>
</a>

</div><?php }} ?>