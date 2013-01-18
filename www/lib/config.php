<?
/*  Инициализация базы данных  */
  define('dbhost', 'localhost');

  
//   define('dbuser', 'aktivsis_user');
//   define('dbpass', '456852');
//   define('dbase',  'aktivsis_db');
  
  define('dbuser', 'root');
  define('dbpass', '');
  define('dbase',  'aktivsis_db');

  define('tpl_path',  'tpl/');
  define('domain', 'http://'.$_SERVER["SERVER_NAME"].'/');
  
/*  Инициализация базы данных  */
  $root_path = $_SERVER['DOCUMENT_ROOT'];
  $skins_path = $root_path . '/Skins/';
  $id = $_REQUEST['id'];
  
//Связь с БД
//   require_once 'Zend/Db.php';
//   $db = Zend_Db::factory('Pdo_Mysql', array(
//       'host'     => dbhost,
//       'username' => dbase,
//       'password' => dbuser,
//       'dbname'   => dbpass,
//       'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES cp1251')
//   ));
?>