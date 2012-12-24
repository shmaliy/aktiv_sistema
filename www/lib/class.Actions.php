<?

//print 'INTERFACE: ' . $_SESSION['INTERFACE'];
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';
require_once 'lib/function.php';

class class_Actions {
    function __construct($db,$tpl) {
        $this->db = $db;
        $this->tpl = $tpl;

       	$this->tpl->define_dynamic('design', $_SESSION['INTERFACE'] . '/header.tpl');
		$this->tpl->assign(array('SKIN' => $_SESSION['MySkin']));
    }

    function view() {
        $this->tpl->define_dynamic('index', $_SESSION['INTERFACE'] . '/actions/view.tpl');
        $this->tpl->define_dynamic('empty', $_SESSION['INTERFACE'] . '/actions/empty.tpl');
        $this->tpl->define_dynamic('menu', 'index');
        $sql_sitemap = $this->db->queryAllRecords("SELECT * FROM actions WHERE id<>'1'");
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
                                    <td width="20" valign="middle">'.$_numrow1.' - </td>
                                    <td valign="middle"><b>'.$map['title'].'</b></td>
                                    <td width="41" align="center" valign="middle">
                                        <a href="/actions.php?id=add" target="settings"><img src="/images/add.gif" width="10" height="10" border="0"></a>
                                        <a href="/actions.php?id=edit&ssid='.$map['id'].'" target="main"><img src="/images/folder_2.gif" width="10" height="10" border="0"></a>
                                        <a href="/actions.php?id=delete&ssid='.$map['id'].'" onclick="if (confirm(\'¬ы действительно хотите удалить новость '.$map['title'].'?\')) {return true} else {return false};"><img src="/images/delete.gif" width="10" height="10" border="0"></a>
                                    </td>
                                </tr>
                           </table>
                       </td>
                   </tr>
            ';            
        }
        $r .='</table>';
        $this->tpl->assign(array('CONTENT_BODY' => $r));
        $this->tpl->parse('MENU', '.menu');
        $this->tpl->parse('CONTENT', 'index');
        return true;
    }

    function add() {
        $this->tpl->define_dynamic('add_menu', $_SESSION['INTERFACE'] . '/actions/add.tpl');
        $this->tpl->parse('CONTENT', 'add_menu');
        if(isset($_POST['save'])) {
            $_date = explode('.', $_POST['_date']);
            $dd = $_date[2] . '-' . $_date[1] . '-' . $_date[0];
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("INSERT INTO actions SET 
                                                        `title`='".$_POST['_title']."',
                                                        `public_date`='".$dd."',
                                                        `description`='".$_POST['anonce']."',
                                                        `status`='".$_status."'
            ");
            
            header("Location: /actions.php?id=view");
        }
        return true;
    }

    function edit() {
        $this->tpl->define_dynamic('edit_menu', $_SESSION['INTERFACE'] . '/actions/edit.tpl');
        if(isset($_POST['save'])) {
            $_date = explode('.', $_POST['_date']);
            $dd1 = $_date[2] . '-' . $_date[1] . '-' . $_date[0];
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("UPDATE actions SET 
                                                        `title`='".$_POST['_title']."',
                                                        `public_date`='".$dd1."',
                                                        `description`='".$_POST['anonce']."',
                                                        `body`='".$_POST['content']."',
                                                        `status`='".$_status."'
                              WHERE id='".$_GET['ssid']."'
            ");
            
            header("Location: /actions.php?id=view");
        } else {
            $sql = $this->db->queryOneRecord("SELECT * FROM actions WHERE id='".$_GET['ssid']."'");
            $_date = explode('-', $sql['public_date']);
            $dd = $_date[2] . '.' . $_date[1] . '.' . substr($_date[0], -2);
            if($sql['status'] == '1') {$_status = 'checked="checked"';} else {$_status = '';}
            $this->tpl->assign(array(
                                        'ID' => $sql['id'],
                                        'TITLE' => $sql['title'],
                                        'DATE' => $dd,
                                        'ANONCE' => $sql['description'],
                                        'BODY' => $sql['body'],
                                        'STATUS' => $_status
            ));
            $this->tpl->parse('CONTENT', 'edit_menu');
        }
        return true;
    }


    function delete() {
        $this->db->query("DELETE FROM actions WHERE id='".$_GET['ssid']."'");
        header("Location: /actions.php?id=view");
    }
}
?>
