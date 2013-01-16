<?

//print 'INTERFACE: ' . $_SESSION['INTERFACE'];
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';
require_once 'lib/function.php';

class class_Base {
    function __construct($db,$tpl) {
        $this->db = $db;
        $this->tpl = $tpl;

       	$this->tpl->define_dynamic('design', $_SESSION['INTERFACE'] . '/header.tpl');
		$this->tpl->assign(array('SKIN' => $_SESSION['MySkin']));
    }

    function view() {
        $this->tpl->define_dynamic('index', $_SESSION['INTERFACE'] . '/base/view.tpl');
        $this->tpl->define_dynamic('empty', $_SESSION['INTERFACE'] . '/base/empty.tpl');
        $this->tpl->define_dynamic('menu', 'index');
        $sql_sitemap = $this->db->queryAllRecords("SELECT * FROM base WHERE id<>'1'");
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
                                        <a href="/base.php?id=add" target="settings"><img src="/images/add.gif" width="10" height="10" border="0"></a>
                                        <a href="/base.php?id=edit&ssid='.$map['id'].'" target="main"><img src="/images/folder_2.gif" width="10" height="10" border="0"></a>
                                        <a href="/base.php?id=delete&ssid='.$map['id'].'" onclick="if (confirm(\'�� ������������� ������ ������� ������� '.$map['title'].'?\')) {return true} else {return false};"><img src="/images/delete.gif" width="10" height="10" border="0"></a>
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
        $this->tpl->define_dynamic('add_menu', $_SESSION['INTERFACE'] . '/base/add.tpl');
        $this->tpl->parse('CONTENT', 'add_menu');
        if(isset($_POST['save'])) {
//			$_date = explode('.', $_POST['_date']);
//			$dd = $_date[2] . '-' . $_date[1] . '-' . $_date[0];
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            if(!empty($_FILES['_images']['tmp_name'])) {
                $extension = explode('.',$_FILES['_images']['name']);
                $filename = $extension[0] . '_'.time().'.' . $extension[1];
                $filename = $_SERVER['DOCUMENT_ROOT'] . '/images/design/bases/'. $filename;
                move_uploaded_file($_FILES['_images']['tmp_name'], $filename);
                $price = $extension[0] . '_'.time().'.' . $extension[1];
                $this->db->query("INSERT INTO base SET 
                                                            `title`='".$_POST['_title']."',
                                                            `public_date`= '".$_POST['_date']."',
                                                            `description`='".$_POST['anonce']."',
                                                            `img_small`='".$price."',
                                                            `status`='".$_status."'
                ");            
            } else {
//				$_date = explode('.', $_POST['_date']);
//				$dd = $_date[2] . '-' . $_date[1] . '-' . $_date[0];
                $this->db->query("INSERT INTO base SET 
                                                            `title`='".$_POST['_title']."',
                                                            `public_date`='".$_POST['_date']."',
                                                            `description`='".$_POST['anonce']."',
                                                            `status`='".$_status."'
                ");
            }            
			header("Location: /base.php?id=view");
        }
        return true;
    }

    function edit() {
        $this->tpl->define_dynamic('edit_menu', $_SESSION['INTERFACE'] . '/base/edit.tpl');
        if(isset($_POST['save'])) {
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("UPDATE base SET 
                                                        `title`='".$_POST['_title']."',
                                                        `description`='".$_POST['anonce']."',
                                                        `body`='".$_POST['content']."',
                                                        `public_date`='".$_POST['_date']."',
                                                        `status`='".$_status."'
                              WHERE id='".$_GET['ssid']."'
            ");
            
            header("Location: /base.php?id=view");
        } else {
            $sql = $this->db->queryOneRecord("SELECT * FROM base WHERE id='".$_GET['ssid']."'");
            if($sql['status'] == '1') {$_status = 'checked="checked"';} else {$_status = '';}
            $this->tpl->assign(array(
                                        'ID' => $sql['id'],
                                        'TITLE' => $sql['title'],
                                        'DATE' => $sql['public_date'],
                                        'ANONCE' => $sql['description'],
                                        'BODY' => $sql['body'],
                                        'STATUS' => $_status
            ));
            $this->tpl->parse('CONTENT', 'edit_menu');
        }
        return true;
    }


    function delete() {
        $this->db->query("DELETE FROM base WHERE id='".$_GET['ssid']."'");
        header("Location: /base.php?id=view");
    }
}
?>