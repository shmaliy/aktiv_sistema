<?


function microtime_float_()
{
    list($usec, $sec) = explode(" ", microtime());
    return ((float)$usec + (float)$sec);
}
$time_start = microtime_float_();


require_once 'lib/config.php';
require_once 'lib/class.Constructor.php';
require_once 'lib/class.Structure.php';
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';


$const = new Constructor();
$tpl = new Template(tpl_path);
$db = new DB(dbhost, dbase, dbuser, dbpass);
$content = new Structure($db, $tpl);

  switch($id) {
    case 'view':
		$const->checksession();
		$content->view();
		$tpl->parse('CONTENT', 'design');
		$tpl->prnt();
	break;

    case 'add_menu':
		$const->checksession();
		$content->add_menu();
		$tpl->parse('CONTENT', 'design');
		$tpl->prnt();
	break;

    case 'add_sub':
        $const->checksession();
        $content->add_sub();
        $tpl->parse('CONTENT', 'design');
        $tpl->prnt();
    break;

    case 'add_submenu':
        $const->checksession();
        $content->add_submenu();
        $tpl->parse('CONTENT', 'design');
        $tpl->prnt();
    break;

    case 'edit_menu':
        $const->checksession();
        $content->edit_menu();
        $tpl->parse('CONTENT', 'design');
        $tpl->prnt();
    break;

    case 'edit_submenu':
        $const->checksession();
        $content->edit_submenu();
        $tpl->parse('CONTENT', 'design');
        $tpl->prnt();
    break;

    case 'delete_menu':
		$const->checksession();
		$content->delete_menu();
	break;

     case 'delete_submenu':
        $const->checksession();
        $content->delete_submenu();
    break;
}

$time_end = microtime_float_();
$time = $time_end - $time_start;
AppendDebugInfo("<hr>Общее время: ".(round($time, 5))." секунд<br>\n");
AppendDebugInfo("База данных -> Запросы: ".$db->queryCount." Время: ".$db->queryTime." сек)\n");
//echo GetDebugInfo(); 
?>
