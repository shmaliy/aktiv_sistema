<form name="f1" action="/structure.php?id=add_sub" method="POST" target="main" enctype="multipart/form-data" onsubmit="return checkForm(this)">
<table cellpadding='0' cellspacing='1' width="99%" bgcolor="#dedede">
<tr bgcolor="#ffffff">
      <td align="left"><table><tr bgcolor="#ffffff"><td width="15" align="left"><img src="/images/settings.gif" border="0"></td><td align="left"><strong>�������� ������</strong></td></tr></table></td>
</tr>
</table>
<table cellpadding='3' cellspacing='1' width="99%" bgcolor="#dedede">
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="150">�������� ����������*</td>
      <td align=left style="background-color: #F7F7F7;"><input style="width:100%;" name="_title" type="text"/></td>
    </tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left" width="150">�������� ������</td>
      <td align=left style="background-color: #F7F7F7;"><select name="_part" style="width:65%"><option value="company">��������</option><option value="services">������</option><option value="tools">�����������</option></select></td>
    </tr>
    <tr>
      <td style="background-color: #EBEBEB;" class="tsimple" align="left">������ ������</td>
      <td align=left style="background-color: #F7F7F7;"><input style="padding:0;margin:0;" name="_status" type="checkbox"  checked="checked" /></td>
    </tr>
    <tr bgcolor="#ffffff">
        <td colspan="2" class='t1' align="center" bgcolor="#ffffff"><input name="save" type="submit" value="���������"></td>
    </tr>
</table>
</form>
