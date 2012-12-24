<?php /* Smarty version Smarty-3.1.12, created on 2012-12-17 19:14:26
         compiled from "sm\templates\content.edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3042150cf2ddcaff986-01620434%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '16da1a388d46462c440c96cd76565edac39d4332' => 
    array (
      0 => 'sm\\templates\\content.edit.tpl',
      1 => 1355760770,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3042150cf2ddcaff986-01620434',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50cf2ddcc1d4d0_52543017',
  'variables' => 
  array (
    'item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50cf2ddcc1d4d0_52543017')) {function content_50cf2ddcc1d4d0_52543017($_smarty_tpl) {?><script language="javascript" type="text/javascript" src="lib/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" src="lib/jscripts/tiny_mce_init.js"></script> 
<script language="javascript" type="text/javascript" src="lib/js/jquery-1.8.3.min.js"></script>

<table cellpadding='17' cellspacing='0' width="100%" height="100%" bgcolor="#cecece" border="0">
    <tr>
        <td bgcolor="#ffffff" align="center" valign="top">
            <script language="javascript" type="text/javascript" src="/lib/tiny_mce/tiny_mce_init.js"></script>
            <form action="/content.php?id=edit&ssid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" method="POST" target="_self" ENCTYPE="multipart/form-data">
            <input type="hidden" name="action1" value="image" />
            <table cellpadding='0' cellspacing='1' width="99%" bgcolor="#dedede">
            <tr bgcolor="#ffffff">
                  <td align="left"><table><tr bgcolor="#ffffff"><td width="15" align="left"><img src="/images/page_white_edit.png" border="0"></td><td align="left"><strong>Редактировать страницу</strong></td></tr></table></td>
            </tr>
            </table>
            <table cellpadding='3' cellspacing='1' width="99%" border="0" bgcolor="#dedede">
                <tr>
                  <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="20%">Название страницы (content)*</td>
                  <td align=left style="background-color: #F7F7F7;" width="80%"><input style="width:100%;" name="page_title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['page_title'];?>
" /></td>
                </tr>
                <tr>
                  <td style="background-color: #EBEBEB;" class="tsimple" align="left">Заголовок страницы (title)*</td>
                  <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="title" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" /></td>
                </tr>
                <tr>
                  <td style="background-color: #EBEBEB;" class="tsimple" align="left">Ключевые слова (keywords)*</td>
                  <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="keywords" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['keywords'];?>
" /></td>
                </tr>
                <tr>
                  <td style="background-color: #EBEBEB;" class="tsimple" align="left">Описание (description)*</td>
                  <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="description" type="text" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
" /></td>
                </tr>
                <tr>
                  <td style="background-color: #EBEBEB;" class="tsimple" align="left">Статус страницы</td>
                  <td align=left style="background-color: #F7F7F7;">
                  	<?php if (($_smarty_tpl->tpl_vars['item']->value['status']==1)){?>
                  		<input style="padding:0;margin:0;" name="status" type="checkbox" checked />
					<?php }else{ ?>
						<input style="padding:0;margin:0;" name="status" type="checkbox"/>
                  	<?php }?>
                </tr>

                <tr>
                  <td colspan="2" align=left style="background-color: #F7F7F7; height:100 px;"><textarea id="ajaxfilemanageri" name="body" style="width:100%;height:550px;font-size:20pt;"><?php echo $_smarty_tpl->tpl_vars['item']->value['body'];?>
</textarea></td>
                </tr>
                <tr bgcolor="#ffffff">
                  <td colspan="2" class='t1' align="center" bgcolor="#ffffff"><input name="save" type="submit" value="Сохранить"></td>
                </tr>
            </table>
            </form>
        </td>
    </tr>
</table>

<script>
var files = [];

function makeFilesListForm()
{
	
}

</script>
<?php }} ?>