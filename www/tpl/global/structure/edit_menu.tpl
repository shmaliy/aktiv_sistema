<form name="f1" action="/structure.php?id=edit_menu&ssid={ID}" method="post" ENCTYPE="multipart/form-data" onsubmit="return ValidateForm(f1)" target="_parent">
<table cellpadding='0' cellspacing='1' width="99%" bgcolor="#dedede">
<tr bgcolor="#ffffff">
      <td align="left"><table><tr bgcolor="#ffffff"><td width="15" align="left"><img src="/images/settings.gif" border="0"></td><td align="left"><strong>Редактировать раздел</strong></td></tr></table></td>
</tr>
</table>
<table cellpadding='3' cellspacing='1' width="99%" bgcolor="#dedede">
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="170">Название раздела *</td>
      <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="name" type="text" value="{TITLE}" /></td>
    </tr>
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="170">Ключ раздела *</td>
      <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="key" type="text" value="{HREF}" /></td>
    </tr>
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left">Статус раздела</td>
      <td align=left style="background-color: #F7F7F7;"><input style="padding:0;margin:0;" name="status" type="checkbox"  {STATUS} /></td>
    </tr>
    <tr bgcolor="#ffffff">
	    <td colspan="2" class='t1' align="center" bgcolor="#ffffff"><input name="save" type="submit" value="Сохранить" onclick="parent.main.document.location.reload();"></td>
    </tr>
</table>
</form>
