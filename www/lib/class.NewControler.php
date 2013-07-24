<?php
require_once 'class.ControllerAbstract.php';
require_once 'sm/Setup.php';
require_once 'models/subscribers.php';
require_once 'models/content.php';

class NewController extends Controller_Abstract
{
	protected $_tpl;
	protected $_subscribersModel;
	protected $_contentModel;
	
	public function __construct()
	{
		$this->_tpl = new Smarty_Tpl();
		$this->_subscribersModel = new Models_Subscribers();
		$this->_contentModel = new Models_Content();
	}
	
	public function modelTest($menu, $submenu)
	{
		$this->_contentModel->getContentListNew($menu, $submenu);
	}
	
	public function contentListAction($menu, $submenu) 
	{
		
	}
	
	public function mainMenuAction($menu, $submenu)
	{
		$result = $this->_contentModel->getMenuTree($menu, $submenu);
		$this->_tpl->assign('menu', $result);
		return $this->_tpl->fetch('main-menu.tpl');
	}
	
	public function knowledgeBaseListAction($menu, $submenu) 
	{
		$result = $this->_contentModel->getKnowledgeBaseList();
		
// 		var_export($result);
		
		$this->_tpl->assign('data', $result);
		$this->_tpl->assign('mainmenu', $this->mainMenuAction($menu, $submenu));
		$this->_tpl->assign('panel', $this->topPanelAction());
		$this->_tpl->assign('forms', $this->formsAction());
		$this->_tpl->assign('knowledgebase', $this->baseKnowledgeWidget('1'));
		$this->_tpl->assign('actions', $this->actionsWidget('1'));
		
		return $this->_tpl->fetch('_knowledge-base-list.tpl');
	}
	
	public function actionViewAction($menu, $submenu)
	{
		$result = $this->_contentModel->getActionsList(1);
		$this->_tpl->assign('data', $result[0]);
		$this->_tpl->assign('mainmenu', $this->mainMenuAction($menu, $submenu));
		$this->_tpl->assign('panel', $this->topPanelAction());
		$this->_tpl->assign('forms', $this->formsAction());
		$this->_tpl->assign('knowledgebase', $this->baseKnowledgeWidget('1'));
		$this->_tpl->assign('actions', $this->actionsWidget('1'));
		//var_export($result);
		
		return $this->_tpl->fetch('_actions-layout.tpl');
	}
	
	public function signToAction($id)
	{
		$result = $this->_contentModel->getActionsList();
		foreach ($result as $item) {
			if ($id == $item['id']) {
				$message =  $item['title'] . ' - ' . $item['public_date'];
				break;
			}
		}
		
		if(isset($_SESSION['frontEndLogin']['userId']) && $_SESSION['frontEndLogin']['userId'] > 0) {
						
			$insert = array(
					'subscribers_id' =>	$_SESSION['frontEndLogin']['userId'],
					'activity_type'	=>	iconv("windows-1251", "UTF-8", 'Зарегистрировался на событие "' . $message . '"'),
					'ts'	=> time()
			);
				
			$this->_contentModel->insert($this->_contentModel->_activityTbl, $insert);
			echo iconv("windows-1251", "UTF-8", $item['title'] . ' - ' . $item['public_date']);
		} else {
			$_SESSION['request']['last_request'] = $_SERVER['REQUEST_URI'];
			echo 'error';
		}
	}
	
	public function contentItemAction($menu, $submenu) {
		
		$test = $this->_contentModel->testSelect();
		
		$result = $this->_contentModel->getContentListNew($menu, $submenu);
		//var_export($result);
		$this->_tpl->assign('data', $result[0]);
		$this->_tpl->assign('mainmenu', $this->mainMenuAction($menu, $submenu));
		$this->_tpl->assign('panel', $this->topPanelAction());
		$this->_tpl->assign('forms', $this->formsAction());
		$this->_tpl->assign('knowledgebase', $this->baseKnowledgeWidget('1'));
		$this->_tpl->assign('actions', $this->actionsWidget('1'));
		$this->_tpl->assign('files', $this->filesAccessAction($result[0]['fileslist'], $result[0]['id'], 'content'));
		$this->_tpl->assign('links', $this->contentsLinksAccessAction($result[0]['linkslist'], $result[0]['id'], 'content'));
		
		return $this->_tpl->fetch('_layout.tpl');
	}
	
	public function contentsLinksAccessAction($str, $id, $tbl = 'content') {
		
		if (empty($str)) {
			return '';
		}
		
		if (!is_array($str)) {
			$str = json_decode($str, true);
		}
		$this->_tpl->assign('id', $id);
		$this->_tpl->assign('links', $str);
		$this->_tpl->assign('tbl', $tbl);
		//var_export($str);
		return $this->_tpl->fetch('contents-links-access.tpl');
	}
	
	public function baseItemAction($menu, $id)
	{
		$item = $this->_contentModel->getBaseItem($id);
		$this->_tpl->assign('data', $item);
		$this->_tpl->assign('mainmenu', $this->mainMenuAction($menu, $id));
		$this->_tpl->assign('panel', $this->topPanelAction());
		$this->_tpl->assign('forms', $this->formsAction());
		$this->_tpl->assign('knowledgebase', $this->baseKnowledgeWidget('1'));
		$this->_tpl->assign('actions', $this->actionsWidget('1'));
		$this->_tpl->assign('files', $this->filesAccessAction($item['fileslist'], $item['id'], 'base'));
		$this->_tpl->assign('links', $this->contentsLinksAccessAction($item['linkslist'], $item['id'], 'base'));
// 		echo '<pre>';
// 		var_export($item);
// 		echo '</pre>';
		
		return $this->_tpl->fetch('base.item.tpl');
	}
	
	public function parseClickAction()
	{
		//var_export($_REQUEST);
		
		$params = explode('|', $_REQUEST['ssid']);
		$content_id = $params[0];
		$link_id = $params[1];
		$tbl = $params[2];
		
		
		
		if($tbl == 'content') {
			$content = $this->_contentModel->getContentItem($content_id);
		} elseif ($tbl == 'base') {
			$content = $this->_contentModel->getBaseItem($content_id);
		}
		
		if ($content !== false) {
			//var_export($links);

			$links = $content['linkslist'];
			
			//var_export($content);
			
			if (isset($links[$link_id])) {
				
				if ($links[$link_id]['free'] == '0' && !isset($_SESSION['frontEndLogin']['userId']) || $_SESSION['frontEndLogin']['userId'] === 0) {
					
					$_SESSION['request']['last_request'] = $_SERVER['REQUEST_URI'];
	
					echo 'error';
					return;
				}
				
				$firstChar = str_split($links[$link_id]['href'], 1);
				$firstChar = $firstChar[0];
				
				if ($tbl == 'base') {
					$content['title'] = $content['title'] . ' / База знаний';
				}
				
				if ($firstChar === '#') {
					
					// Тупо добавляем запись из адреса в статистику 
					$insert = array(
							'subscribers_id' =>	$_SESSION['frontEndLogin']['userId'],
							'activity_type'	=>	iconv("windows-1251", "UTF-8", 'Кликнул ссылку  "' . $links[$link_id]['name'] . '" на странице "' . $content['title'] . '".'),
							'ts'	=> time()
					);
					
					$this->_contentModel->insert($this->_contentModel->_activityTbl, $insert);
					
					
					echo 'message';
				} else {
					// В статистику закидываем имя ссылки, в новом окне открываем ссылку
					$insert = array(
							'subscribers_id' =>	$_SESSION['frontEndLogin']['userId'],
							'activity_type'	=>	iconv("windows-1251", "UTF-8", 'Перешел по ссылке "' . $links[$link_id]['name'] . '" на странице "' . $content['title'] . '".'),
							'ts'	=> time()
					);
					
					$this->_contentModel->insert($this->_contentModel->_activityTbl, $insert);
					
					echo $links[$link_id]['href'];
				}
			}
			
		}
	}
	
	public function baseKnowledgeWidget($limit)
	{
		$result = $this->_contentModel->getKnowledgeBaseList($limit);
		//var_export($result[0]);
		$this->_tpl->assign('kdata', $result[0]);
		return $this->_tpl->fetch('base-knowledge-widget.tpl');
	}
	
	public function actionsWidget($limit)
	{
		$result = $this->_contentModel->getActionsList($limit);
		//var_export($result[0]);
		$this->_tpl->assign('kdata', $result[0]);
		return $this->_tpl->fetch('actions-widget.tpl');
	}
	
	
	public function topPanelAction()
	{
		if(!isset($_SESSION['frontEndLogin']['userId']) || empty($_SESSION['frontEndLogin']['userId'])) {
			return $this->_tpl->fetch('top.panel.guest.tpl');
		}
		else {
			$user = $this->_subscribersModel->parseLogin(array('id' => $_SESSION['frontEndLogin']['userId']));
			$this->_tpl->assign('link', 1);
			if ($user['email'] == 'z.vadim@aktiv-sistema.com' || $user['email'] == 'shmaliy@sunny.net.ua') {
				$this->_tpl->assign('link', 1);
			} else {
				$this->_tpl->assign('link', 0);
			}
			$this->_tpl->assign('name', $user['f'] . ' ' . $user['i']);
			return $this->_tpl->fetch('top.panel.user.tpl');
		}
	}
	
	public function statAction()
	{
		$list = $this->_contentModel->getSpamList();
		
		$row = '';
		foreach ($list as $item) {
			$row .= '' . implode('; ', $item) . '' . "\n";
		}
		
		file_put_contents('list/receivers.csv', $row);
		
		$result = $this->_contentModel->getActivityList();
		$this->_tpl->assign('grid', $result);
		
		$this->_tpl->display('stat.tpl');
	}
	
	/**
	 * Необходимо в авторизацию добавить проверку того, что эл адрес подтвержден
	 * Так же добавить функционал отправки письма подтвоерждения
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
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Эл. адрес указан неверно!');
		}
		
		if ($formData['password'] == '') {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Пароль не может быть пустым!');
		}
		
		if(count($result['errors']) > 0) {
			echo json_encode($result);
			return;
		}
		
		$formData['password'] = md5($formData['password']);
		
		
		
		if($this->_subscribersModel->parseLogin($formData) == false) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Вы еще не зарегистрированы или ошиблись при заполнении данных.');
		} else {
			$user = $this->_subscribersModel->parseLogin($formData);
		}
		
		if(count($result['errors']) > 0) {
			echo json_encode($result);
			return;
		}
		
		$result['success'] = iconv("windows-1251", "UTF-8", 'Авторизация прошла успешно!');
		if (isset($_SESSION['request']['last_request']) && !empty($_SESSION['request']['last_request'])) {
			$result['return'] = $_SESSION['request']['last_request'];
			unset($_SESSION['request']['last_request']);
		}
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
		
		//var_export(iconv("UTF-8", "windows-1251", $formData['f']));
		
		// Первичная проверка на пустые значения
		foreach ($formData as $key=>$field) {
			if(empty($field) && $key != 'send_spam' && $key != 'o') {
				$result['errors'][] = iconv("windows-1251", "UTF-8", 'Все поля должны быть заполнены!');
				echo json_encode($result);
				return;
			}
		}
		
		// Валидация эл. почты
		if($this->_validateEmail($formData['email']) == false) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Неверный формат электронного адреса!');
			echo json_encode($result);
			return;
		}
		
		// Проверка на существование эл. почты
		if($this->_subscribersModel->parseLogin(array('email' => $formData['email'])) !== false) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Такой пользователь уже зарегистрирован!');
			echo json_encode($result);
			return;
		}
		
		// Сравнение паролей
		if ($formData['password'] !== $formData['password_']) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Пароли не совпадают!');
		}
		
		// Валидация пароля
		if(!$this->_validatePassword($formData['password'])) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Неверный формат пароля!');
		}
		
		// Валидация телефона
		if(!$this->_validatePhone($formData['phone'])) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Номер телефона должен быть в формате "+ХХХХХХХХХХХХ"!');
		}
		
		// Валидация ФИО
		if(!$this->_validateFio($formData['f'])) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Корректно заполните поле "Фамилия"!');
		}
		
		if(!$this->_validateFio($formData['i'])) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Корректно заполните поле "Имя"!');
		}
		
		// Валидация названия компании и должности
		if(!$this->_validateWork($formData['company'])) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Корректно укажите название компании!');
		}
		
		if(!$this->_validateWork($formData['post'])) {
			$result['errors'][] = iconv("windows-1251", "UTF-8", 'Корректно укажите название должности!');
		}
		
		
		if(count($result['errors']) > 0) {
			echo json_encode($result);
			return;
		}
		
		if ($formData['send_spam'] == 'on') {
			$formData['send_spam'] = 'YES';
		} else {
			$formData['send_spam'] = 'NO';
		}
		
		$insert = array(
			'email' => $formData['email'],
			'password' => md5($formData['password']),
			'phone' => $formData['phone'],
			'f' => $formData['f'],
			'i' => $formData['i'],
			'o' => $formData['o'],
			'company' => $formData['company'],
			'post' => $formData['post'],
			'send_spam' => $formData['send_spam'],
			'verify_code' => md5($formData['password']),
			'verify_ts' => 0,
			'registered_ts' => time()
		);
		
		$_SESSION['frontEndLogin']['userId'] = $this->_subscribersModel->insert($this->_subscribersModel->getTbl(), $insert);
		$result['success'] = iconv("windows-1251", "UTF-8", 'Регистрация прошла успешно!');
		if (isset($_SESSION['request']['last_request']) && !empty($_SESSION['request']['last_request'])) {
			$result['return'] = $_SESSION['request']['last_request'];
			unset($_SESSION['request']['last_request']);
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
	
	public function contentsViewAction($id)
	{
		
	}
	
	public function headIncludesAction()
	{
		return $this->_tpl->fetch('head.includes.tpl');
	}
	
	public function formsAction()
	{
		$this->_tpl->assign('session', session_id());
		return $this->_tpl->fetch('forms.tpl');
	}
	
	public function contentsListAction($href, $param)
	{
		echo $param;
		return $this->_contentModel->getContentList($href, $param);
	}
	
	public function filesAccessAction($str, $id, $tbl)
	{
		if (empty($str)) {
			return '';
		}
		
		$this->_tpl->assign('file', $str);
		$this->_tpl->assign('id', $id);
		$this->_tpl->assign('tbl', $tbl);
		//var_export($file);
		
		$this->_tpl->assign('logged', '0');
		
		if (isset($_SESSION['frontEndLogin']['userId']))
		{
			$this->_tpl->assign('logged', '1');
		}
		return $this->_tpl->fetch('files-access.tpl');
	}
	
	public function getFileAction($url)
	{
		$parse = explode('_', $url);
		$id = $parse[0];
		$tbl = $parse[1];
		
		if ($tbl == 'content') {
			$item = $this->_contentModel->getContentItem($id);
			$file = $item['fileslist'];
			
			if(isset($_SESSION['frontEndLogin']['userId']) && $_SESSION['frontEndLogin']['userId'] > 0) {
				echo $file['path'];
					
				$insert = array(
						'subscribers_id' =>	$_SESSION['frontEndLogin']['userId'],
						'activity_type'	=>	iconv("windows-1251", "UTF-8", 'Загрузка файла из инструментов ' . $file['path']),
						'ts'	=> time()
				);
					
				$this->_contentModel->insert($this->_contentModel->_activityTbl, $insert);
					
			} else {
				if ($file['free'] == 1) {
					echo $file['path'];
				} else {
					echo 'error';
				}
			}
		} else {
			$item = $this->_contentModel->getBaseItem($id);
			$file = $item['fileslist'];
			
			if(isset($_SESSION['frontEndLogin']['userId']) && $_SESSION['frontEndLogin']['userId'] > 0) {
				echo $file['path'];
					
				$insert = array(
						'subscribers_id' =>	$_SESSION['frontEndLogin']['userId'],
						'activity_type'	=>	iconv("windows-1251", "UTF-8", 'Загрузка файла из базы знаний ' . $file['path']),
						'ts'	=> time()
				);
					
				$this->_contentModel->insert($this->_contentModel->_activityTbl, $insert);
					
			} else {
				if ($file['free'] == 1) {
					echo $file['path'];
				} else {
					echo 'error';
				}
			}
		}
		
		
	}
}
