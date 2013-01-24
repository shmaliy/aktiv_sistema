<?php /* Smarty version Smarty-3.1.12, created on 2013-01-24 23:08:31
         compiled from "sm\templates\base.edit.tpl" */ ?>
<?php /*%%SmartyHeaderCode:758650f5fa39ef2b10-17768073%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'bb1cbb55969d6350fcf84f29663d75246f875b18' => 
    array (
      0 => 'sm\\templates\\base.edit.tpl',
      1 => 1359059278,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '758650f5fa39ef2b10-17768073',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.12',
  'unifunc' => 'content_50f5fa3a04a581_08948481',
  'variables' => 
  array (
    'item' => 0,
    'filestore' => 0,
    'linkslist' => 0,
    'link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_50f5fa3a04a581_08948481')) {function content_50f5fa3a04a581_08948481($_smarty_tpl) {?><!-- /sm/templates/base.edit.tpl -->
<script language="javascript" type="text/javascript"
	src="lib/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript"
	src="lib/jscripts/tiny_mce_init.js"></script>



<table cellpadding='17' cellspacing='1' width="100%" height="99%"
	bgcolor="#cecece" border="0">
	<tr>
		<td width="50%" bgcolor="#ffffff" align="center" valign="top">

			<form action="/base.php?id=edit&ssid=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" method="POST"
				target="main" ENCTYPE="multipart/form-data">
				<table cellpadding='0' cellspacing='1' width="99%" bgcolor="#dedede">
					<tr bgcolor="#ffffff">
						<td align="left"><table>
								<tr bgcolor="#ffffff">
									<td width="15" align="left"><img
										src="/images/settings.gif" border="0"></td>
									<td align="left"><strong>Редактировать базу
											знаний</strong></td>
								</tr>
							</table></td>
					</tr>
				</table>
				<table cellpadding='3' cellspacing='1' width="99%" bgcolor="#dedede">
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left" width="150">Заголовок базы знаний*</td>
						<td align=left style="background-color: #F7F7F7;"><input
							style="width: 100%;" name="title" type="text"
							value="<?php echo $_smarty_tpl->tpl_vars['item']->value['title'];?>
" /></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left" width="150">Дата*</td>
						<td align=left style="background-color: #F7F7F7;"><input
							style="width: 100%;" name="public_date" type="text"
							value="<?php echo $_smarty_tpl->tpl_vars['item']->value['public_date'];?>
" /></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left" width="150">Анонс базы знаний*</td>
						<td align=left style="background-color: #F7F7F7;"><textarea
								name="description"
								style="height: 100px; background-color: #F7F7F7; width: 100%; margin: 0px; padding: 0px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>
</textarea></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left" width="150">Текст базы знаний</td>
						<td align=left style="background-color: #F7F7F7;"><textarea
								id="ajaxfilemanageri" name="body"
								style="height: 450px; background-color: #F7F7F7; width: 100%; margin: 0px; padding: 0px;"><?php echo $_smarty_tpl->tpl_vars['item']->value['body'];?>
</textarea></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left">Статус базы знаний</td>
						<td align=left style="background-color: #F7F7F7;"><?php if (($_smarty_tpl->tpl_vars['item']->value['status']==1)){?> <input style="padding: 0; margin: 0;"
							name="status" type="checkbox" checked /> <?php }else{ ?> <input
							style="padding: 0; margin: 0;" name="status" type="checkbox" />
							<?php }?>
						</td>
					</tr>
					
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left">Прикрепленный файл</td>
						<td align=left style="background-color: #F7F7F7;">
							<div class="sunny-filemanager">
								<div class="sunny-fileuploader">
									<div class="file-name">
										<span>Название файла</span>
										<input type="text" name="files-name">	
										<div class="clr"></div>								
									</div>
									<div class="file">
										<span>Путь</span>
										<input type="file" name="fileslist">
										<div class="clr"></div>
									</div>
									<div class="file-info"><input type="checkbox" name="free_file"> <span>доступен без регистрации</span></div>
								</div> 
								<div class="uploaded-file">
									<span>Название файла: </span>
									<span><?php echo $_smarty_tpl->tpl_vars['filestore']->value['title'];?>
</span>
									<div class="clr"></div>
									
									<span>Путь к файлу: </span>
									<span><?php echo $_smarty_tpl->tpl_vars['filestore']->value['path'];?>
</span>
									<div class="clr"></div>
									
									<span>Доступен без регистрации: </span>
									<span><?php echo $_smarty_tpl->tpl_vars['filestore']->value['free'];?>
</span>
									<div class="clr"></div>
									<div class="file-info">
										<input type="hidden" name="remove_file" value="0"> 
										<input type="checkbox" name="remove_file"><span>удалить файл</span>
									</div>
								</div>
								<div class="clr"></div>
							</div>
						</td>
					</tr>
					
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left">Ссылки</td>
						<td align=left style="background-color: #F7F7F7;">
							<a class="add-links-box" href="#" onclick="return makeLinksListForm();">Добавить ссылку</a>
							<div id="links-box">
								<?php if (!empty($_smarty_tpl->tpl_vars['linkslist']->value)&&count($_smarty_tpl->tpl_vars['linkslist']->value)>0){?>
									<?php  $_smarty_tpl->tpl_vars['link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['link']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['linkslist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['link']->key => $_smarty_tpl->tpl_vars['link']->value){
$_smarty_tpl->tpl_vars['link']->_loop = true;
?>
									<div class="links-element">
										<div class="label">Название ссылки: </div>
										<div class="element"><input type="text" name="links-name[]" class="text" value="<?php echo iconv('UTF-8','windows-1251',$_smarty_tpl->tpl_vars['link']->value['name']);?>
"></div>
										<div class="clr"></div>
										<div class="label">Адрес: </div>
										<div class="element"><input type="text" name="links-href[]" class="text" value="<?php echo iconv('UTF-8','windows-1251',$_smarty_tpl->tpl_vars['link']->value['href']);?>
"></div>
										<div class="clr"></div>
										<div class="label">Доступна без регистрации: </div>
										<div class="element">
											<?php if ($_smarty_tpl->tpl_vars['link']->value['free']==1){?>
												<input type="checkbox" name="links-free[]" checked>
											<?php }else{ ?>
												<input type="checkbox" name="links-free[]">
											<?php }?>
										</div>
										<div class="clr"></div>
									</div>
									<div class="clr"></div>
									<?php } ?>
								<?php }else{ ?>
								<div class="links-element">
									<div class="label">Название ссылки: </div>
									<div class="element"><input type="text" name="links-name[]" class="text"></div>
									<div class="clr"></div>
									<div class="label">Адрес: </div>
									<div class="element"><input type="text" name="links-href[]" class="text"></div>
									<div class="clr"></div>
									<div class="label">Доступна без регистрации: </div>
									<div class="element">
										<input type="checkbox" name="links-free[]">
									</div>
									<div class="clr"></div>
								</div>
								<div class="clr"></div>
								<?php }?>
							</div>
						</td>
					</tr>
					
					<tr bgcolor="#ffffff">
						<td colspan="2" class='t1' align="center" bgcolor="#ffffff"><input
							name="save" type="submit" value="Сохранить"></td>
					</tr>
				</table>
			</form>

		</td>
	</tr>
</table>

<div id="links-src">
	<div class="links-element">
		<div class="label">Название ссылки:</div>
		<div class="element">
			<input type="text" name="links-name[]" class="text">
		</div>
		<div class="clr"></div>
		<div class="label">Адрес:</div>
		<div class="element">
			<input type="text" name="links-href[]" class="text">
		</div>
		<div class="clr"></div>
		<div class="label">Доступна без регистрации:</div>
		<div class="element">
			<input type="checkbox" name="links-free[]">
		</div>
		<div class="clr"></div>
	</div>
	<div class="clr"></div>
</div>


<script>


function makeLinksListForm()
{
	var data = $('#links-src').html();
	$('#links-box').append(data);
	return false;
}

</script>

<?php }} ?>