<?php
// load Smarty library
require('lib/smarty/libs/Smarty.class.php');

// The setup.php file is a good place to load
// required application library files, and you
// can do that right here. An example:
// require('guestbook/guestbook.lib.php');

class Smarty_Tpl extends Smarty {

	function __construct()
	{

		// Class Constructor.
		// These automatically get set with each new instance.

		parent::__construct();

		$this->setTemplateDir('sm/templates/');
		$this->setCompileDir('sm/templates_c/');
		$this->setConfigDir('sm/configs/');
		$this->setCacheDir('sm/cache/');

		//$this->caching = Smarty::CACHING_LIFETIME_CURRENT;
		//$this->assign('app_name', 'Guest Book');
	}

}