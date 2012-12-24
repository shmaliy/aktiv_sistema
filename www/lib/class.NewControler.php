<?php
require_once 'class.Form.php';
require_once 'sm/Setup.php';
require_once 'models/subscribers.php';

class NewController 
{
	protected $_form;
	protected $_tpl;
	
	public function __construct()
	{
		$this->_form = new Form();
		$this->_tpl = new Smarty_Tpl();
		$this->_subscribersModel = new Models_Subscribers();
	}
	
	public function parseFilesList($id)
	{
		
	}
	
	public function downloadRegisterFormGenerator()
	{
		return $this->_tpl->fetch('form.register.tpl');
	}
	
	public function downloadRegister()
	{
		
	}
	
	public function eventsRegister()
	{
	
	}
	
	public function webminarsRegister()
	{
	
	}
}
