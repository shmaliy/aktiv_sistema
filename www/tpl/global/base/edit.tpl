<!-- /tpl/global/base/edit.tpl -->
<script language="javascript" type="text/javascript" src="lib/jscripts/tiny_mce/tiny_mce.js"></script>
<script language="javascript" type="text/javascript" src="lib/jscripts/tiny_mce_init.js"></script> 



<table cellpadding='17' cellspacing='1' width="100%" height="99%" bgcolor="#cecece" border="0">
    <tr>
        <td width="50%" bgcolor="#ffffff" align="center" valign="top">

<form action="/base.php?id=edit&ssid={ID}" method="POST" target="main">
<table cellpadding='0' cellspacing='1' width="99%" bgcolor="#dedede">
<tr bgcolor="#ffffff">
      <td align="left"><table><tr bgcolor="#ffffff"><td width="15" align="left"><img src="/images/settings.gif" border="0"></td><td align="left"><strong>Редактировать  базу знаний</strong></td></tr></table></td>
</tr>
</table>
<table cellpadding='3' cellspacing='1' width="99%" bgcolor="#dedede">
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="150">Заголовок  базы знаний*</td>
      <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="_title" type="text" value="{TITLE}" /></td>
    </tr>
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="150">Дата*</td>
      <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="_date" type="text" value="{DATE}" /></td>
    </tr>
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="150">Анонс  базы знаний*</td>
      <td align=left style="background-color: #F7F7F7;"><textarea name="anonce" style="height:100px;background-color: #F7F7F7; width:100%;margin:0px;padding:0px;">{ANONCE}</textarea></td>
    </tr>
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="150">Текст  базы знаний</td>
      <td align=left style="background-color: #F7F7F7;"><textarea id="ajaxfilemanageri" name="content" style="height:450px;background-color: #F7F7F7; width:100%;margin:0px;padding:0px;">{BODY}</textarea></td>
    </tr>
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left">Статус  базы знаний</td>
      <td align=left style="background-color: #F7F7F7;"><input style="padding:0;margin:0;" name="status" type="checkbox"  {STATUS} /></td>
    </tr>
    <tr bgcolor="#ffffff">
        <td colspan="2" class='t1' align="center" bgcolor="#ffffff"><input name="save" type="submit" value="Сохранить"></td>
    </tr>
</table>
</form>

</td>
    </tr>
</table>
