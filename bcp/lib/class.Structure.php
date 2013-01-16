<?

//print 'INTERFACE: ' . $_SESSION['INTERFACE'];
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';
require_once 'lib/function.php';

class Structure {
    function __construct($db,$tpl) {
        $this->db = $db;
        $this->tpl = $tpl;

       	$this->tpl->define_dynamic('design', $_SESSION['INTERFACE'] . '/header.tpl');
		$this->tpl->assign(array('SKIN' => $_SESSION['MySkin']));
    }

    function view() {
        $this->tpl->define_dynamic('index', $_SESSION['INTERFACE'] . '/structure/view.tpl');
        $this->tpl->define_dynamic('empty', $_SESSION['INTERFACE'] . '/structure/empty.tpl');
        $this->tpl->define_dynamic('menu', 'index');
        $sql_sitemap = $this->db->queryAllRecords("SELECT * FROM str_menu");
        $_numrow1 = 0;        
        $r = '<table cellspacing="1" cellpadding="1" bgcolor="#cccccc" border="0" width="100%">';
        foreach($sql_sitemap AS $map) {
            if($map['status'] == '0') {$__bgstatus = '#ff0000';} else {$__bgstatus = '#f0f0f0';}
            $_numrow1++;
            $_numrow2 = 0;
            $_numrow3 = 0;
            $r .= '<tr bgcolor="'.$__bgstatus.'">            
                       <td width="70%" colspan="2">
                           <table width="100%" cellspacing="0" bgcolor="#dedede" border="0">
                                <tr>
                                    <td valign="middle" colspan="2"><b>'.$map['title'].'</b></td>
                                    <td width="30" align="center" valign="middle">
                                        <a href="/structure.php?id=edit_menu&ssid='.$map['id'].'" target="settings"><img src="/images/folder_2.gif" width="10" height="10" border="0"></a>
                                        <a href="/structure.php?id=delete_menu&ssid='.$map['id'].'" onclick="if (confirm(\'¬ы действительно хотите удалить раздел '.$map['title'].'?\')) {return true} else {return false};"><img src="/images/delete.gif" width="10" height="10" border="0"></a>
                                    </td>
                                </tr>
                           </table>
                       </td>
                   </tr>
            ';            
            $sql_sitemap_sub = $this->db->queryAllRecords("SELECT * FROM sub_menu WHERE str_menu='".$map['href']."'");
            foreach($sql_sitemap_sub AS $map_sub) {
                if($map_sub['status'] == '0') {$__bgstatus = '#ff0000';} else {$__bgstatus = '#ffffff';}
                if(!empty($map_sub['img_s'])) {$__issetImage2 = '<img src="/images/isset_images.gif" border="0">';} else {$__issetImage2 = '';}
                $_numrow2++;
                $r .= '<tr bgcolor="'.$__bgstatus.'">
                           <td colspan="2">
                                   <table width="100%" cellspacing="1" cellpadding="2" border="0" bgcolor="#eeeeee">
                                       <tr bgcolor="#f6f6f6">
                                            <td width="10" align="right" valign="middle"><img src="/images/t_fill.gif" width="35" height="1" border="0"></td>
                                            <td>'.$map_sub['title'].'</td>                                            
                                            <td width="25" align="center">
                                                <a href="/structure.php?id=edit_submenu&ssid='.$map_sub['id'].'" target="settings"><img src="/images/folder_2.gif" width="10" height="10" border="0"></a>
                                                <a href="/structure.php?id=delete_submenu&ssid='.$map_sub['id'].'"  onclick="if(confirm(\'¬ы действительно хотите удалить подраздел '.$map_sub['title'].'?\')) {return true} else {return false};"><img src="/images/delete.gif" width="10" height="10" border="0"></a>
                                            </td>
                                        </tr>
                                    </table>
                            </td>
                        </tr>
                ';
            }            
        }
        $r .='</table>';
        $this->tpl->assign(array('CONTENT_BODY' => $r));
        $this->tpl->parse('MENU', '.menu');
        $this->tpl->parse('CONTENT', 'index');
        return true;
    }

    function add_sub() {
        $this->tpl->define_dynamic('add_menu', $_SESSION['INTERFACE'] . '/structure/add_sub.tpl');
        $this->tpl->parse('CONTENT', 'add_menu');
        if(isset($_POST['save'])) {
            if(isset($_POST['_status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("INSERT INTO sub_menu SET 
                                                        `str_menu`='".$_POST['_part']."',
                                                        `title`='".htmlspecialchars($_POST['_title'])."',
                                                        `href`='".encodestring(strtolower($_POST['_title']))."',
                                                        `status`='".$_status."'
            ");
            
            header("Location: /structure.php?id=view");
        }
        return true;
    }


	function edit_menu() {
        $this->tpl->define_dynamic('edit_menu', $_SESSION['INTERFACE'] . '/structure/edit_menu.tpl');
        if(isset($_POST['save'])) {
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("UPDATE str_menu SET 
                                                        `title`='".htmlspecialchars($_POST['name'])."',
                                                        `href`='".$_POST['key']."',
                                                        `status`='".$_status."'
                              WHERE id='".$_GET['ssid']."'
            ");
            
            header("Location: /structure.php?id=view");
        } else {
            $sql = $this->db->queryOneRecord("SELECT * FROM str_menu WHERE id='".$_GET['ssid']."'");
            if($sql['status'] == '1') {$_status = 'checked="checked"';} else {$_status = '';}
            $this->tpl->assign(array(
                                        'ID' => $sql['id'],
                                        'TITLE' => $sql['title'],
                                        'HREF' => $sql['href'],
                                        'STATUS' => $_status
            ));
            $this->tpl->parse('CONTENT', 'edit_menu');
        }
        return true;
    }

    function edit_submenu() {
        $this->tpl->define_dynamic('edit_submenu', $_SESSION['INTERFACE'] . '/structure/edit_submenu.tpl');
        if(isset($_POST['save'])) {
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("UPDATE sub_menu SET 
                                                        `title`='".htmlspecialchars($_POST['name'])."',
                                                        `href`='".$_POST['key']."',
                                                        `status`='".$_status."'
                              WHERE id='".$_GET['ssid']."'
            ");
            
            header("Location: /structure.php?id=view");
        } else {
            $sql = $this->db->queryOneRecord("SELECT * FROM sub_menu WHERE id='".$_GET['ssid']."'");
            if($sql['status'] == '1') {$_status = 'checked="checked"';} else {$_status = '';}
            $this->tpl->assign(array(
                                        'ID' => $sql['id'],
                                        'TITLE' => $sql['title'],
                                        'HREF' => $sql['href'],
                                        'STATUS' => $_status
            ));
            $this->tpl->parse('CONTENT', 'edit_submenu');
        }
        return true;
    }



    function delete_menu() {
        $this->db->query("DELETE FROM str_menu WHERE id='".$_GET['ssid']."'");
        header("Location: /structure.php?id=view");
    }

    function delete_submenu() {
        $this->db->query("DELETE FROM sub_menu WHERE id='".$_GET['ssid']."'");
        header("Location: /structure.php?id=view");
    }
}
?>
