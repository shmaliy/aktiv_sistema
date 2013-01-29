<?php /* Smarty version Smarty-3.1.12, created on 2013-01-29 11:14:03
         compiled from "sm\templates\main-menu.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1142250f8874582d751-80503664%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3d03f055f88873126f553544bcd47483dd169072' => 
    array (
      0 => 'sm\\templates\\main-menu.tpl',
      1 => 1359445949,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1142250f8874582d751-80503664',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f8874582f698_34268304',
  'variables' => 
  array (
    'menu' => 0,
    'i' => 0,
    'item' => 0,
    'k' => 0,
    'child' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f8874582f698_34268304')) {function content_50f8874582f698_34268304($_smarty_tpl) {?><div class="mainmenu">
	<ul class="main">
		<!-- <?php $_smarty_tpl->tpl_vars['i'] = new Smarty_variable(0, null, 0);?> -->
		<?php  $_smarty_tpl->tpl_vars['item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['menu']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['item']->key => $_smarty_tpl->tpl_vars['item']->value){
$_smarty_tpl->tpl_vars['item']->_loop = true;
?>
		<!-- <?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
 -->
		<li>
			<a href="/<?php echo $_smarty_tpl->tpl_vars['item']->value['href'];?>
">
			<?php if ($_smarty_tpl->tpl_vars['item']->value['current']==0){?>
			<img src="/images/design/menu_<?php echo $_smarty_tpl->tpl_vars['item']->value['alias'];?>
.jpg">
			<?php }else{ ?>
			<img src="/images/design/menu_<?php echo $_smarty_tpl->tpl_vars['item']->value['alias'];?>
_open.jpg">
			<?php }?>
			</a>
			<?php if (!empty($_smarty_tpl->tpl_vars['item']->value['childs'])){?>
			<?php if ($_smarty_tpl->tpl_vars['item']->value['current']==1){?>
			<ul class="sub">
			<?php }else{ ?>
			<ul class="sub hidden">
			<?php }?>
				<!-- <?php $_smarty_tpl->tpl_vars['k'] = new Smarty_variable(0, null, 0);?> -->
				<?php  $_smarty_tpl->tpl_vars['child'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['child']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['item']->value['childs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['child']->key => $_smarty_tpl->tpl_vars['child']->value){
$_smarty_tpl->tpl_vars['child']->_loop = true;
?>
				<!-- <?php echo $_smarty_tpl->tpl_vars['k']->value++;?>
 -->
				<li>
					<?php if ($_smarty_tpl->tpl_vars['child']->value['current']==1){?>
					<a class="active" href="/<?php echo $_smarty_tpl->tpl_vars['child']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['title'];?>
</a>
					<?php }else{ ?>
					<a class="inactive" href="/<?php echo $_smarty_tpl->tpl_vars['child']->value['href'];?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
.<?php echo $_smarty_tpl->tpl_vars['k']->value;?>
 <?php echo $_smarty_tpl->tpl_vars['child']->value['title'];?>
</a>
					<?php }?>
				</li>
				<?php } ?>
			</ul>
			<?php }?>
		</li>
		<?php } ?>
	</ul>
</div><?php }} ?>