<!-- <?php echo __FILE__; ?> -->
<?session_start();?>
<html>
<head>
<meta  http-equiv="nocache">
<link rel="stylesheet" href="/Skins/<?=$_SESSION['MySkin'];?>/style.css">
<link rel="stylesheet" href="/Skins/<?=$_SESSION['MySkin'];?>/styles/treee.css">
<link rel="stylesheet" href="/Skins/<?=$_SESSION['MySkin'];?>/styles/scroll.css">
<link rel="stylesheet" href="/styles/dtree.css" type="text/css">
<script type="text/javascript" src="/lib/js/dtree.js"></script>
</head>                              

<BODY class="menu-body" LEFTMARGIN=0 TOPMARGIN=0 MARGINWIDTH=0 MARGINHEIGHT=0>

<div class="dtree">

<p>
    <script type="text/javascript">
        <!--

        d = new dTree('d');

        d.add(0,-1,'������� ���������� ������');
        d.add(2,0,'��������� �����','');
                d.add(1,2,'�������','/structure.php?id=view','','main');
        d.add(4,0,'����������','');
                d.add(5,4,'��������','/content.php?id=view','','main');
                d.add(6,4,'�������','/news.php?id=view','','main');
                d.add(7,4,'���� ������','/base.php?id=view','','main');
                d.add(8,4,'�������','/actions.php?id=view','','main');
        d.add(50,0,'������������','');
                d.add(60,50,'������ �������������','/users.php?id=view','','main');
        d.add(10,0,'������������ �������','/info.php','','main');
        document.write(d);

        //-->
    </script>

</p>
</div>


    <p></p>
<!-- Level 4 -->
<table width=100% cellspacing=0 cellpadding=0 border=0 height=21>
<tr>
<td width=28><img src="/Skins/<?=$_SESSION['MySkin'];?>/pics/menu_l_exit.gif" width=28 height=21 border=0></td>
<td background="/Skins/<?=$_SESSION['MySkin'];?>/pics/menu_bg_button.gif" align=center>
<a href="/logout" target=_parent class="link-main-title" style="width:100%;height:100%;padding-top:3px;">
<div class="b_main_title">
�����
</div>
</a>
</td>
<td width=3><img src="/Skins/<?=$_SESSION['MySkin'];?>/pics/menu_r.gif" width=3 height=21 border=0></td>
</tr>
</table>





<!-- Version -->

<table width=100% cellspacing=0 cellpadding=0 border=0 height=21>
<tr>
<td width=28></td>
<td align=center>
<div class='tit1' style="font-family:tahoma;font-size:10px;color:#545454; margin-bottom: 0px;">������ <b>2.0</b>
<br>
Copyright &copy; <a href="http://www.amiweb.dp.ua" target=new>AMIWEB</a> 2004-<?=date("Y")?>

<br>
��� ����� ��������
<br>
<a href="#" onClick="javascript: window.open('http://cms.amiweb.dp.ua/license/license.html', null, 'height=600,width=550,status=no,toolbar=no,menubar=no,resizable=yes,scrollbars=yes'); return false;">������������ ����������</a>
</div>
</td>
<td width=3></td>
</tr>
</table>


</td>
<td width=1 bgcolor=#D0DBE2><img src="/Skins/<?=$_SESSION['MySkin'];?>/pics/spacer.gif" width=1 height=1 border=0></td></tr>
</table>

</BODY>
</html>
