<?
require_once 'lib/config.php';
require_once 'lib/class.Constructor.php';
require_once 'lib/class.Content.php';
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';



$const = new Constructor();
$tpl = new Template(tpl_path);
$db = new DB(dbhost, dbase, dbuser, dbpass);
$content = new Content($db, $tpl);

  switch($id) {
    case 'view':
		$const->checksession();
		$content->view();
		$tpl->parse('CONTENT', 'design');
		$tpl->prnt();
	break;

    case 'add':
		$const->checksession();
		$content->add();
		$tpl->parse('CONTENT', 'design');
		$tpl->prnt();
	break;

    case 'edit':
        $const->checksession();
        $content->edit();
        $tpl->parse('CONTENT', 'design');
        $tpl->prnt();
    break;

    case 'status':
        $const->checksession();
        $content->status();
    break;

    case 'delete_entry':
        $const->checksession();
        $content->delete_entry();
    break;
}
?>
