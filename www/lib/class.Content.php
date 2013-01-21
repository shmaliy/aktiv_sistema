<?

//print 'INTERFACE: ' . $_SESSION['INTERFACE'];
require_once 'lib/class.ControllerAbstract.php';
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';
require_once 'lib/function.php'; 



class Content extends Controller_Abstract {
    
	function __construct($db,$tpl) {
        $this->db = $db;
        $this->tpl = $tpl;
        $this->tpl->define_dynamic('design', $_SESSION['INTERFACE'] . '/header.tpl');
		$this->tpl->assign(array('SKIN' => $_SESSION['MySkin']));
		
		parent::__construct();
    }

    function view() {
        
    	$this->tpl->define_dynamic('index', $_SESSION['INTERFACE'] . '/content/view.tpl');
        $this->tpl->define_dynamic('empty', $_SESSION['INTERFACE'] . '/content/empty.tpl');
        $this->tpl->define_dynamic('table_build', 'index');

        $r = '';

        $sql_sitemap = $this->db->queryAllRecords("SELECT * FROM str_menu ORDER BY `order`");
        foreach($sql_sitemap AS $map) {
/* Подсветка статусов */            
            if($map['status'] == '0') {$__bgstatus0 = '#f3f3f3';$__bgstatus1 = '#f3f3f3';$__bgstatus2 = '#f3f3f3';$_icon = '<img src="/images/status_offline.png" border="0" title="Статус не активный">';} else {$__bgstatus0 = '#ffffff';$__bgstatus1 = '#E9F4E8';$__bgstatus2 = '#F1F7FA';$_icon = '<img src="/images/status_online.png" border="0" title="Статус активный">';}

/* Построение первого уровня */            
            $r .= '<tr><td valign="middle" bgcolor="'.$__bgstatus0.'"><b>'.$map['title'].'</b></td><td width="57" align="right" valign="middle" bgcolor="'.$__bgstatus0.'"><div align="right" style="padding-right:1px;"><a href="/content.php?id=add&ssid='.$map['id'].'" target="settings"><img src="/images/page_white_add.png" border="0"></a></div></td></tr>';

/* Построение контента первого уровня */
            $sql_sitemap_ssub0 = $this->db->queryAllRecords("SELECT *, content.id AS c_id FROM content, content_id WHERE content.id=content_id.content_id AND content_id.str_id='".$map['id']."' AND content_id.sub_id='0'");
            foreach($sql_sitemap_ssub0 AS $map_ssub0) {
                if($map_ssub0['status'] == '0') {$__bgstatus1 = '#f3f3f3';$_icon = '<img src="/images/status_offline.png" border="0" title="Статус не активный">';} else {$__bgstatus = '#ffffff'; $_icon = '<img src="/images/status_online.png" border="0" title="Статус активный">';}
                $r .= '<tr bgcolor="#fefefe"><td valign="middle" bgcolor="'.$__bgstatus1.'" style="padding-left:40px;color:#3D9CB8">
                <b>'.$map_ssub0['title'].'</b></td><td width="57" bgcolor="'.$__bgstatus1.'" align="right" valign="middle"><div align="right" style="padding-right:1px;"><a href="/content.php?id=status&ssid='.$map_ssub0['id'].'" onclick="if (confirm(\'Вы действительно хотите изменить статус записи '.$map_ssub0['title'].'?\')) {return true} else {return false};">'.$_icon.'</a>&nbsp;<a href="/content.php?id=edit&ssid='.$map_ssub0['id'].'" target="main"><img src="/images/page_white_edit.png" width="16" height="16" border="0"></a>&nbsp;<a href="/content.php?id=delete_entry&ssid='.$map_ssub0['id'].'" onclick="if (confirm(\'Вы действительно хотите удалить запись '.$map_ssub0['title'].'?\')) {return true} else {return false};"><img src="/images/page_white_delete.png" width="16" height="16" border="0"></a></div></td></tr>';
            }

/* Построение меню второго уровня */
            $sql_sitemap_ssub = $this->db->queryAllRecords("SELECT * FROM sub_menu WHERE str_menu='".$map['href']."'");
            foreach($sql_sitemap_ssub AS $map_ssub) {
                if($map_ssub['status'] == '0') {$__bgstatus = '#f3f3f3';$_icon = '<img src="/images/status_offline.png" border="0" title="Статус не активный">';} else {$__bgstatus = '#ffffff'; $_icon = '<img src="/images/status_online.png" border="0" title="Статус активный">';}
                $r .= '<tr><td valign="middle" bgcolor="'.$__bgstatus2.'" style="padding-left:20px;"><b>'.$map_ssub['title'].'</b></td><td align="right" valign="middle" bgcolor="'.$__bgstatus2.'"><div align="right" style="padding-right:1px;"><a href="/content.php?id=add&ssid='.$map['id'].'&usid='.$map_ssub['id'].'" target="settings"><img src="/images/page_white_add.png" border="0"></a></div></td></tr>';

/* Построение контента второго уровня */
                $sql_sitemap_ssub1 = $this->db->queryAllRecords("SELECT *, content.id AS c_id FROM content, content_id WHERE content.id=content_id.content_id AND content_id.sub_id='".$map_ssub['id']."' AND content_id.str_id='".$map['id']."'");
                foreach($sql_sitemap_ssub1 AS $map_ssub1) {
                    if($map_ssub1['status'] == '0') {$__bgstatus1 = '#f3f3f3';$_icon = '<img src="/images/status_offline.png" border="0" title="Статус не активный">';} else {$_icon = '<img src="/images/status_online.png" border="0" title="Статус активный">';}
                    $r .= '<tr><td valign="middle" bgcolor="'.$__bgstatus1.'" style="padding-left:40px;color:#3D9CB8"><b>'.$map_ssub1['title'].'</b></td><td width="57" bgcolor="#ffffff" align="right" valign="middle"><div align="right" style="padding-right:1px;"><a href="/content.php?id=status&ssid='.$map_ssub1['id'].'" onclick="if (confirm(\'Вы действительно хотите изменить статус записи '.$map_ssub1['title'].'?\')) {return true} else {return false};">'.$_icon.'</a>&nbsp;<a href="/content.php?id=edit&ssid='.$map_ssub1['id'].'" target="_main"><img src="/images/page_white_edit.png" width="16" height="16" border="0"></a>&nbsp;<a href="/content.php?id=delete_entry&ssid='.$map_ssub1['id'].'" onclick="if (confirm(\'Вы действительно хотите удалить запись '.$map_ssub1['title'].'?\')) {return true} else {return false};"><img src="/images/page_white_delete.png" width="16" height="16" border="0"></a></div></td></tr>';
                }            
            } 
        }
   
        $r .='</table>';
        $this->tpl->assign(array('CONTENT_BODY' => $r));

        $this->tpl->parse('MENU', '.menu');
        $this->tpl->parse('CONTENT', 'index');
        return true;
    }



    
    function add() {
        $this->tpl->define_dynamic('add_content', $_SESSION['INTERFACE'] . '/content/add.tpl');
        $this->tpl->assign(array('ID' => $_GET['ssid']));
        if(isset($_GET['usid'])) {$this->tpl->assign(array('PATH' => '/content.php?id=add&ssid='.$_GET['ssid'].'&usid='.$_GET['usid']));} else {$this->tpl->assign(array('PATH' => '/content.php?id=add&ssid='.$_GET['ssid']));}
        if(isset($_POST['save'])) {
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("INSERT INTO content SET
                                                        `title`='".htmlspecialchars($_POST['name'])."',
                                                        `page_title`='".htmlspecialchars($_POST['title'])."',
                                                        `keywords`='".htmlspecialchars($_POST['keywords'])."',
                                                        `description`='".htmlspecialchars($_POST['description'])."',
                                                        `status`='".$_status."'
            ");
            if(isset($_GET['ssid']) && !isset($_GET['usid'])) {
                $this->db->query("INSERT INTO content_id SET
                                                            `str_id`='".$_GET['ssid']."',
                                                            `content_id`=LAST_INSERT_ID()
                ");
            } 
            if(isset($_GET['ssid']) && isset($_GET['usid'])) {
                $this->db->query("INSERT INTO content_id SET
                                                            `str_id`='".$_GET['ssid']."',
                                                            `sub_id`='".$_GET['usid']."',
                                                            `content_id`=LAST_INSERT_ID()
                ");
            } 
            header("Location: /content.php?id=view");
        }
        $this->tpl->parse('CONTENT', 'add_content');
        return true;
    }

    function edit() {
    	/**
    	 * Этот кусок кода является маленьким островком нормального кода среди огроммной массы ужаса, что я узрел в этом сайте...			
    	 */
    	
    	$content = $this->_model->getContentItem($_REQUEST['ssid']);
    	if (!empty($_POST)) {
    		
    		$status = 0;
    		if ($_POST['status'] == 'on') {
    			$status = 1;
    		}
    		
    		$free_file = 0;
    		if (isset ($_POST['free_file']) && $_POST['free_file'] == 'on') {
    			$free_file = 1;
    		}
    		
    		
    		$filestore = array();
    		if ($_FILES['fileslist']['size'] > 0) {
				if(move_uploaded_file($_FILES['fileslist']['tmp_name'], "uploads/" . $_FILES['fileslist']['name'])) {
					$filestore = array(
						'title' => iconv('windows-1251', 'UTF-8', htmlspecialchars($_REQUEST['files-name'])),
						'path' => "uploads/" . $_FILES['fileslist']['name'],
						'free' => $free_file
					);
				}
    		}
    		
    		
    		$update = array(
    			'title' 		=> iconv('windows-1251', 'UTF-8', htmlspecialchars($_REQUEST['title'])),
    			'body' 			=> iconv('windows-1251', 'UTF-8', str_replace('images/', 'images/', $_REQUEST['body'])),
    			'page_title' 	=> iconv('windows-1251', 'UTF-8', $_REQUEST['page_title']),
    			'keywords' 		=> iconv('windows-1251', 'UTF-8', $_REQUEST['keywords']),
    			'description' 	=> iconv('windows-1251', 'UTF-8', $_REQUEST['description']),
    			'public_date' 	=> time(),
    			'status' 		=> iconv('windows-1251', 'UTF-8', $status),
    			
    		);
    		
    		if (!empty($filestore)) {
    			$update['fileslist'] = json_encode($filestore);
    		}
    		
     		if(isset($_POST['remove_file']) && $_POST['remove_file'] === 'on' ) {
     			$update['fileslist'] = '';
     		}
    		
//     		echo '<pre>';
//     		var_export($_FILES);
//     		echo '</pre>';
//     		echo '<pre>';
//     		var_export($_REQUEST);
//     		echo '</pre>';

     		
     		$links = array();
     		if (!empty($_POST['links-name'])) {
     			foreach ($_POST['links-name'] as $key=>$value) {
     				if (!isset($_POST['links-free'][$key])) {
     					$_POST['links-free'][$key] = 0;
     				} else {
     					$_POST['links-free'][$key] = 1;
     				}
     				
     				$links[] = array(
     					"name" =>  iconv('windows-1251', 'UTF-8', $value),
     					"href" => iconv('windows-1251', 'UTF-8', $_POST['links-href'][$key]),
     					"free" => iconv('windows-1251', 'UTF-8', $_POST['links-free'][$key])
     				);
     			}
     			$update['linkslist'] = json_encode($links);
     		} else {
     			$update['linkslist'] = '';
     		}
     		
    		$this->_model->update($_REQUEST['ssid'], $this->_model->_tbl, $update);
    		@header("Location: /logon");
    		
    	} else {
    		
    		$this->_tpl->assign('item', $content);
    		$this->_tpl->assign('filestore', json_decode($content['fileslist'], true));
    		$this->_tpl->assign('linkslist', json_decode($content['linkslist'], true));
    		$tpl = $this->_tpl->fetch('content.edit.tpl');
	    	$this->tpl->assign('CONTENT', $tpl);
    	}
    	
    	return true;
    	
    	/*------------------------------------------------------*/
    	
    	
    	
    	$this->tpl->define_dynamic('edit', $_SESSION['INTERFACE'] . '/content/edit.tpl');
        if(isset($_POST['save'])) {
            if(isset($_POST['status'])) {$_status = '1';} else {$_status = '0';}
            $this->db->query("UPDATE content SET 
                                                        `title`='".htmlspecialchars($_POST['name'])."',
                                                        `body`='".eregi_replace('"images/', '"/images/', $_POST['content'])."',
                                                        `page_title`='".htmlspecialchars($_POST['title'])."',
                                                        `keywords`='".htmlspecialchars($_POST['keywords'])."',
                                                        `description`='".htmlspecialchars($_POST['description'])."',
                                                        `public_date`=NOW(),
                                                        `status`='".$_status."',
                                                        `fileslist` ='" . 12 . "'
                              WHERE id='".$_GET['ssid']."'
            ");
            @header("Location: /content.php?id=view");
        } else {
            $sql = $this->db->queryOneRecord("SELECT * FROM content WHERE id='".$_GET['ssid']."'");
            if($sql['status'] == '1') {$_status = 'checked="checked"';} else {$_status = '';}
            $this->tpl->assign(array(
                                        'ID' => $sql['id'],
                                        'NAME' => $sql['title'],
                                        'TITLE' => $sql['page_title'],
                                        'KEYWORDS' => $sql['keywords'],
                                        'DESCRIPTION' => $sql['description'],
                                        'BODY' => $sql['body'],
                                        'STATUS' => $_status
            ));
            $this->tpl->parse('CONTENT', 'edit');
        }
        return true;
    }
               
    function status() {
        $sql = $this->db->queryAllRecords("SELECT * FROM content WHERE id='".$_GET['ssid']."'");
        foreach($sql AS $s) {
            if($s['status'] == 0) {$this->db->query("UPDATE content SET `status`='1' WHERE id='".$_GET['ssid']."'");}
            if($s['status'] == 1) {$this->db->query("UPDATE content SET `status`='0' WHERE id='".$_GET['ssid']."'");}
        }        
        header("Location: /content.php?id=view");
    }
                 
    function delete_entry() {
        $this->db->query("DELETE FROM content WHERE id='".$_GET['ssid']."'");
        $this->db->query("DELETE FROM content_id WHERE content_id='".$_GET['ssid']."'");
        header("Location: /content.php?id=view");
    }
}
?>
