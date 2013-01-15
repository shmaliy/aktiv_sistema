<script language="javascript" type="text/javascript"
	src="lib/jscripts/tiny_mce/tiny_mce.js"></script>
<script
	language="javascript" type="text/javascript"
	src="lib/jscripts/tiny_mce_init.js"></script>
<script
	language="javascript" type="text/javascript"
	src="lib/js/jquery-1.8.3.min.js"></script>

<table cellpadding='17' cellspacing='0' width="100%" height="100%"
	bgcolor="#cecece" border="0">
	<tr>
		<td bgcolor="#ffffff" align="center" valign="top"><script
				language="javascript" type="text/javascript"
				src="/lib/tiny_mce/tiny_mce_init.js"></script>
			<form action="/content.php?id=edit&ssid={$item.id}" method="POST"
				target="_self" ENCTYPE="multipart/form-data">
				<input type="hidden" name="action1" value="image" />
				<table cellpadding='0' cellspacing='1' width="99%" bgcolor="#dedede">
					<tr bgcolor="#ffffff">
						<td align="left"><table>
								<tr bgcolor="#ffffff">
									<td width="15" align="left"><img
										src="/images/page_white_edit.png" border="0"></td>
									<td align="left"><strong>Редактировать страницу</strong></td>
								</tr>
							</table></td>
					</tr>
				</table>
				<table cellpadding='3' cellspacing='1' width="99%" border="0"
					bgcolor="#dedede">
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left" width="20%">Название страницы (content)*</td>
						<td align=left style="background-color: #F7F7F7;" width="80%"><input
							style="width: 100%;" name="page_title" type="text"
							value="{$item.page_title}" /></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left">Заголовок страницы (title)*</td>
						<td align=left style="background-color: #F7F7F7;"><input
							style="width: 100%;" name="title" type="text"
							value="{$item.title}" /></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left">Ключевые слова (keywords)*</td>
						<td align=left style="background-color: #F7F7F7;"><input
							style="width: 100%;" name="keywords" type="text"
							value="{$item.keywords}" /></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left">Описание (description)*</td>
						<td align=left style="background-color: #F7F7F7;"><input
							style="width: 100%;" name="description" type="text"
							value="{$item.description}" /></td>
					</tr>
					<tr>
						<td style="background-color: #EBEBEB;" class="tsimple"
							align="left">Статус страницы</td>
						<td align=left style="background-color: #F7F7F7;">{if
							($item.status == 1) } <input style="padding: 0; margin: 0;"
							name="status" type="checkbox" checked /> {else} <input
							style="padding: 0; margin: 0;" name="status" type="checkbox" />
							{/if}
					
					</tr>

					<tr>
						<td colspan="2" align=left
							style="background-color: #F7F7F7; height: 100 px;"><textarea
								id="ajaxfilemanageri" name="body"
								style="width: 100%; height: 550px; font-size: 20pt;">{$item.body}</textarea>
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
									<span>{$filestore.title}</span>
									<div class="clr"></div>
									
									<span>Путь к файлу: </span>
									<span>{$filestore.path}</span>
									<div class="clr"></div>
									
									<span>Доступен без регистрации: </span>
									<span>{$filestore.free}</span>
								</div>
								<div class="clr"></div>
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
{literal}
<script>
var files = [];

function makeFilesListForm()
{
	
}

</script>
{/literal}
