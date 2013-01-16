<?
/*  Инициализация базы данных  */
  define('dbhost', 'localhost');

  
  define('dbuser', 'aktivsis_user');
  define('dbpass', '456852');
  define('dbase',  'aktivsis_db');

  define('tpl_path',  'tpl/');
  define('domain', 'http://'.$_SERVER["SERVER_NAME"].'/');
/*  Инициализация базы данных  */
  $root_path = $_SERVER['DOCUMENT_ROOT'];
  $skins_path = $root_path . '/Skins/';
?>