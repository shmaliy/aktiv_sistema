<?php
require_once 'models/content.php';
require_once 'sm/Setup.php';
 
 
class Controller_Abstract
{
	protected $_model;
	protected $_tpl;
	
	public function __construct()
	{
		$this->_tpl = new Smarty_Tpl();
		$this->_model = new Models_Content();
	}
	
	protected function valitadeTitle($str = null)
	{
		if (null === $str || empty(strip_tags($str))) {
			return false;
		}
		else return true;
	}
	
	protected function validatePageTitle($str = null)
	{
		if (null === $str || empty(strip_tags($str))) {
			return false;
		}
		else return true;
	}
} 
 