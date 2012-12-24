<?
error_reporting(1);
session_start();
require_once 'config.php';
require_once 'class.Template.php';
while (list($name, $value)=each($HTTP_GET_VARS)) {if(isset($$name)) continue; $$name=$value;} 



class Constructor {
	function destroy_session() {
	    unset($_SESSION['PERMISS']);
	    unset($_SESSION['sid']);
	    unset($_SESSION['uid']);
//	    unset($_SESSION['MySkin']);
	    @session_destroy();
	}
	
	function checksession() {
	    if(!isset($_SESSION['sid'])) {
			unset($_SESSION['sid']);
			header("Location: ".domain);
			exit;
		} if(!isset($_POST)) {
			include('tpl/msges/auth_error.tpl');
			unset($_SESSION['sid']);
			exit; 
		}
	}
}

?>