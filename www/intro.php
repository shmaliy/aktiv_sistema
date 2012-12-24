<?
session_start();
require_once 'lib/config.php';
require_once 'lib/class.Constructor.php';
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';
require_once 'lib/class.mod_Content.php';

function microtime_float_(){ list($usec, $sec) = explode(" ", microtime()); return ((float)$usec + (float)$sec);} $time_start = microtime_float_();

$const = new Constructor();
$tpl = new Template(tpl_path);
$db = new DB(dbhost, dbase, dbuser, dbpass);
$content = new mod_Content($db, $tpl);

$content->intro();
$tpl->prnt('INDEX');

$time_end = microtime_float_();
$time = $time_end - $time_start;
AppendDebugInfo("<hr>Общее время: ".(round($time, 5))." секунд<br>\n");
AppendDebugInfo("База данных -> Запросы: ".$db->queryCount." Время: ".$db->queryTime." сек)\n");
//echo GetDebugInfo(); 

?>
