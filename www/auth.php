<?
require_once 'lib/config.php';
require_once 'lib/class.Constructor.php';
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';


$const = new Constructor();
$tpl = new Template(tpl_path);
$db = new DB(dbhost, dbase, dbuser, dbpass);

$id = $_REQUEST['id'];

//var_export ($_SESSION);
//echo $id;


	if(!isset($id)) {
		$const->destroy_session();
		$tpl->define_dynamic('login_form', 'login_form.tpl');
		$tpl->define_dynamic('null', 'login_form');
		$tpl->parse('LOGIN_FORM', 'login_form');
		$tpl->prnt('LOGIN_FORM');
	} else {
		switch($id) {
			case 'login':
			    $result = $db->queryAllRecords("SELECT * FROM _users WHERE login='".$_POST['_login']."'");
				$__login = array();
				$__passw = array();
				for($i=0; $i<sizeof($result); $i++) {
// 					
					//die;
						if($result[$i]['status'] == '0') {
							print 'bar';
							$tpl->define_dynamic('auth_error', 'msges/failed.tpl');
							$tpl->define_dynamic('null', 'auth_error');
							$tpl->parse('CONTENT', 'auth_error');
							$tpl->prnt();
							exit();
						}




				    if($_POST['_login'] == $result[$i]['login'] && $_POST['pass'] == $result[$i]['password']) {
				        $_SESSION['sid'] = "true";
				        $_SESSION['MySkin'] = $result[$i]['skins'];
				        $_SESSION['uid'] = $_POST['_login'];
				        $_SESSION['usr_id'] = $result[$i]['id'];
                        $_SESSION['system_code'] = $result[$i]['system_code'];
				        if(!isset($_SESSION['sid'])) {unset ($_SESSION['sid']);header("Location: ". domain);return 0;}
						if(!empty($_POST['_login'])) {
                    		if($result[$i]['permission'] == '1') { $_SESSION['PERMISS'] = md5('global'); }
//							print $result[$i]['access_level'] . ' '.$_SESSION['PERMISS'];
                    		header("Location: ". domain ."logon");
							//print '<script>document.location.href="'. domain .'logon"</script>';					
                  		} else {
							$const->destroy_session();						
							$tpl->define_dynamic('denied', 'msges/denied.tpl');
							$tpl->parse('DENIED', 'denied');
							$tpl->prnt('DENIED');
						}
						return 1;
						exit;
					}
					if($_POST['_login'] == $result[$i]['login'] && $_POST['pass'] == $result[$i]['password']) {
						$const->destroy_session();					
						$tpl->define_dynamic('auth_err', 'msges/error.tpl');
						$tpl->define_dynamic('auth_err', 'msges/error.tpl');
                        $tpl->assign(array('DOMAIN' => domain));
						$tpl->parse('AUTH_ERR', 'auth_err');
						$tpl->prnt('AUTH_ERR');
					}
				}
				$tpl->define_dynamic('auth_err', 'msges/error.tpl');
				$tpl->define_dynamic('null', 'page');
                $tpl->assign(array('DOMAIN' => domain));
				$tpl->parse('AUTH_ERR', 'auth_err');
				$tpl->prnt('AUTH_ERR');
								
			break;
			case 'logon':
				$const->checksession();
				if($_SESSION['PERMISS'] == md5('global')) {$___interface = tpl_path . 'global';$_SESSION['INTERFACE'] = 'global';include($___interface ."/_structure/_index.php");}
				else { print '<br><br><center><font color="red"><h4>ньхайю: бмхлемхе!!!</h4><h5>ме нопедекем хмрептееия!!!</h5></font></center>';}
			break;
			case 'logout':
				$const->destroy_session();
				header("Location: ".domain);
  break;
		}
	}
?>