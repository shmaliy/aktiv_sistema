<?php
require_once 'class.Form.php';
require_once 'class.ControllerAbstract.php';
require_once 'sm/Setup.php';
require_once 'models/subscribers.php';

class NewController extends Controller_Abstract
{
	//protected $_form;
	protected $_tpl;
	protected $_subscribersModel;
	
	public function __construct()
	{
		//$this->_form = new Form();
		$this->_tpl = new Smarty_Tpl();
		$this->_subscribersModel = new Models_Subscribers();
	}
	
	public function topPanelAction()
	{
		if(!isset($_SESSION['frontEndLogin']['userId']) || empty($_SESSION['frontEndLogin']['userId'])) {
			return $this->_tpl->fetch('top.panel.guest.tpl');
		}
		else {
			$user = $this->_subscribersModel->parseLogin(array('id' => $_SESSION['frontEndLogin']['userId']));
			$this->_tpl->assign('name', $user['email']);
			return $this->_tpl->fetch('top.panel.user.tpl');
		}
	}
	
	/**
	 * ���������� � ����������� �������� �������� ����, ��� �� ����� �����������
	 * ��� �� �������� ���������� �������� ������ ��������������
	 */
	
	public function frontendLoginAction()
	{
		//var_export($_POST);
		$sid = $_POST['sid'];
		unset($_POST['url']);
		unset($_POST['sid']);
		$formData = $_POST;
		
		$result = array();
		$result['errors'] = array();
		
		if ($this->_validateEmail($formData['email']) === false) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", '��. ����� ������� �������!');
		}
		
		if ($formData['password'] == '') {
			$result['errors'][] = iconv("windows-1251", "UTF-8", '������ �� ����� ���� ������!');
		}
		
		if(count($result['errors']) > 0) {
			echo json_encode($result);
			return;
		}
		
		$formData['password'] = md5($formData['password']);
		
		
		
		if($this->_subscribersModel->parseLogin($formData) == false) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", '�� ��� �� ���������������� ��� �������� ��� ���������� ������.');
		} else {
			$user = $this->_subscribersModel->parseLogin($formData);
		}
		
		if(count($result['errors']) > 0) {
			echo json_encode($result);
			return;
		}
		
		$result['success'] = 1;
		echo json_encode($result);
		
		session_id($sid);
		
		
		$_SESSION['frontEndLogin']['userId'] = $user['id'];
		
		
	}
	
	public function frontendUnLoginAction()
	{
		unset($_SESSION['frontEndLogin']);
		$result['errors'] = array();
		echo json_encode($result);
	}
	
	public function frontendRegisterAction() 
	{
		$sid = $_POST['sid'];
		unset($_POST['url']);
		unset($_POST['sid']);
		$formData = $_POST;
		
		$result = array();
		$result['errors'] = array();
		
		//var_export($formData);
		
		// ��������� �������� �� ������ ��������
		foreach ($formData as $key=>$field) {
			if(empty($field) && $key != 'send_spam') {
				$result['errors'][] = iconv("windows-1251", "UTF-8", '��� ���� ������ ���� ���������!');
				echo json_encode($result);
				return;
			}
		}
		
		// �������� �� ������������� ��. �����
		if($this->_subscribersModel->parseLogin(array('email' => $formData['email'])) !== false) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", '����� ������������ ��� ���������������!');
			echo json_encode($result);
			return;
		}
		
		// ��������� �������
		
		if ($formData['password'] !== $formData['password_']) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", '������ �� ���������!');
		}
		
		// ��������� ��������
		
		// ��������� ���
		
		// ��������� �������� �������� � ���������
		
		if(count($result['errors']) > 0) {
			echo json_encode($result);
			return;
		}
		
		echo json_encode($result);
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
