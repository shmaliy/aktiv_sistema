<?
require_once 'lib/class.Template.php';
require_once 'lib/class.Mysql.php';
require_once 'lib/function.php';
require_once 'lib/config.php';

class mod_Content{

	private $_controller;

	function __construct($db,$tpl) {
		$this->db = $db;
		$this->tpl = $tpl;
		$SQL = $this->db->queryAllRecords("SELECT * FROM str_menu WHERE _index='1'");
		foreach($SQL AS $start) {
			if(!isset($_GET['id']) && $start['href'] == 'main'){
				header("Location:/");
			}
		}

		$this->_controller = new NewController();
	}

	function view() {

		/**
		 * Определяем переменные навигации
		*/
		$route = 0;
		if (isset($_GET['id'])) {
			$route = $_GET['id'];
		}

		$rParam = 0;
		if (isset($_GET['ssid'])) {
			$rParam = $_GET['ssid'];
		}
		
		/**
		 * Передаем в шаблон регулярные панели
		 */
		$this->tpl->assign(array(
				'SESSION_ID' 		=> session_id(),
				'HEAD_INCLUDES'		=> $this->_controller->headIncludesAction(),
				'PANEL' 			=> $this->_controller->topPanelAction(),
				'FORMS'				=> $this->_controller->formsAction(),
				'MENU'				=> $this->_controller->mainMenuAction($route, $rParam)
		));
		
		

				/**
		 * Регистрация неаяксовых маршрутов
		 */
		$nonAjaxRoutes = array(
				'0' 		=> array('main.tpl'),
				'main' 		=> array('main.tpl'),
				'company'	=> array('des_company.tpl'),
				'services'	=> array('des_services.tpl'),
				'tools'		=> array('des_tools.tpl'),
				'sitemap'	=> array('sitemap.tpl'),
				'news'		=> array('news.tpl', 'news_detail.tpl'),
				'actions'	=> array('actions.tpl', 'actions_detail.tpl'),
				'base'		=> array('base.tpl', 'base_detail.tpl')
		);
		
		/**
		 * Сначала проверяем маршрут на аякс обращение
		*/
		if (!isset($nonAjaxRoutes[$route])) {
			switch ($route) {
				case 'frontendLogin':
					$this->_controller->frontendLoginAction();
					return;
						
				case 'frontendUnLogin':
					$this->_controller->frontendUnLoginAction();
					return;
						
				case 'frontendRegister':
					$this->_controller->frontendRegisterAction();
					return;
					
				case 'load':
					$this->_controller->getFileAction($rParam);
					return;
					
				case 'signToAction':
					$this->_controller->signToAction($rParam);
					return;
			}
		}
		
		
		/**
		 * Перехват отдельных страниц в мой контроллер
		 */
		$myRoutes = array(
				'tools' => 1,
				'base' => 1,
				'actions' => 1
		);
		
		if(isset($myRoutes[$route])) {
			switch ($route) {
				case 'tools':
					if (is_numeric($rParam)) {
						echo $this->_controller->contentListAction($route, $rParam);
					} else {
						echo $this->_controller->contentItemAction($route, $rParam);
					}
					return;
					
				case 'base':
					if ($rParam == 0) {
						echo $rParam;
						echo $this->_controller->knowledgeBaseListAction($route, $rParam);
						return;
					} else {
						continue;
					}
					
				case 'actions':
					echo $this->_controller->actionViewAction($route, $rParam);
					return;
					
			}
		}
		
		/**
		 * Тут Амивэб какую то хуйню творит, 
		 * пока делаем вид, что не видим
		 */
		if (isset($nonAjaxRoutes[$route])) {
			if ($rParam == 0) {
				$this->tpl->define_dynamic('index', $nonAjaxRoutes[$route][0]);
			} else {
				$this->tpl->define_dynamic('index',$nonAjaxRoutes[$route][1]);
			}
		} else {
			if($route == 'stat' && isset($_SESSION['frontEndLogin']['userId']) && !empty($_SESSION['frontEndLogin']['userId'])) {
				$this->_controller->statAction();
				return;
			}
			$sql_checkhref = $this->db->queryOneRecord("SELECT * FROM str_menu WHERE href='".@$_GET['id']."' AND status='1'");
			if(!$this->db->numRows($sql_checkhref)) {
				redirect("/404.html");
			}
		}

		$this->tpl->define_dynamic('menu', 'index');
		$this->tpl->define_dynamic('menu_bottom', 'index');
		$this->tpl->define_dynamic('menu_top', 'index');
		$this->tpl->define_dynamic('submenu', 'index');
		$this->tpl->define_dynamic('submenu_top', 'index');
		$this->tpl->define_dynamic('articles_href', 'index');
		$this->tpl->define_dynamic('show_content_body', 'index');
		$this->tpl->define_dynamic('show_content_news', 'index');
		$this->tpl->define_dynamic('show_news_body', 'index');
		$this->tpl->define_dynamic('show_news_anonce', 'index');
		$this->tpl->define_dynamic('show_actions_body', 'index');
		$this->tpl->define_dynamic('show_bases_body', 'index');
		$this->tpl->define_dynamic('show_base_detail_body', 'index');

		$sql_news = $this->db->queryAllRecords("SELECT * FROM news WHERE status='1' ORDER BY public_date DESC LIMIT 2");
		foreach($sql_news AS $AS_news) {
			$dd = @explode('-', $AS_news['public_date']);
			$d = @$dd[2] . '.' . @$dd[1] . '.' . @substr($dd[0], -2);
			$this->tpl->assign(array(
					'NEWS_ANONCE_ID' => $AS_news['id'],
					'NEWS_ANONCE_DATE' => $d,
					'NEWS_ANONCE_TITLE' => $AS_news['title'],
					'NEWS_ANONCE_BODY' => $AS_news['description'],
			));
			$this->tpl->parse('SHOW_NEWS_ANONCE', '.show_news_anonce');
		}

		$sql_actions = $this->db->queryAllRecords("SELECT * FROM actions WHERE status='1' ORDER BY id DESC LIMIT 1");
		foreach($sql_actions AS $AS_action) {
			$dd1 = @explode('-', $AS_action['public_date']);
			$d1 = @$dd1[2] . '.' . @$dd1[1] . '.' . @substr($dd1[0], 0);
			$this->tpl->assign(array(
					'ID' => $AS_action['id'],
					'ACTIONS_DATE' => $d1,
					'ACTIONS_TITLE' => $AS_action['title'],
					'ACTIONS_BODY_DESC' => $AS_action['description'],
			));
			$this->tpl->parse('SHOW_ACTIONS_BODY', '.show_actions_body');
		}

		$sql_base111111111 = $this->db->queryAllRecords("SELECT * FROM base WHERE status='1' ORDER BY id DESC LIMIT 1");
		if($this->db->numRows($sql_base111111111) != 0) {
			foreach($sql_base111111111 AS $AS_base11111) {
				$dd2 = @explode('-', $AS_base11111['public_date']);
				$d2 = @$dd2[2] . '.' . @$dd2[1] . '.' . @substr($dd2[0], -2);

				if(!empty($AS_base11111['img_small'])) {
					$this->tpl->assign(array(

							'ID' => $AS_base11111['id'],
							'ACBID' => $AS_base11111['id'],
							'BASE_DATE' => $d2,
							'IMAGES' => '<a href="/base/'.$AS_base11111['id'].'"><img src="/images/design/bases/'.$AS_base11111['img_small'].'" border="0"></a>',
							'BASE_TITLE' => $AS_base11111['title'],
							'BASE_BODY_DESC' => $AS_base11111['description'],
					));
				} else {
					$this->tpl->assign(array(
							'ACBID' => $AS_base11111['id'],
							'ID' => $AS_base11111['id'],
							'BASE_DATE' => $d2,
							'IMAGES' => '<a href="/base/'.$AS_base11111['id'].'"><img src="/images/design/bases/baza_znabiy.jpg" border="0"></a>',
							'BASE_TITLE' => $AS_base11111['title'],
							'BASE_BODY_DESC' => $AS_base11111['description'],
					));
				}
				$this->tpl->parse('SHOW_BASE_BODY', '.show_base_body');
			}
		} else {
			foreach($sql_base111111111 AS $AS_base11111111) {
				$dd3 = @explode('-', $AS_base11111111['public_date']);
				$d3 = @$dd3[2] . '.' . @$dd3[1] . '.' . @substr($dd3[0], -2);

				if(!empty($AS_base11111111['img_small'])) {
					$this->tpl->assign(array(
							'ACBID' => $AS_base11111['id'],
							'ID' => $AS_base11111111['id'],
							'BASE_DATE' => $d3,
							'IMAGES' => '<a href="/base/'.$AS_base11111111['id'].'"><img src="/images/design/bases/'.$AS_base11111111['img_small'].'" border="0"></a>',
							'BASE_TITLE' => $AS_base11111111['title'],
							'BASE_BODY_DESC' => $AS_base11111111['description'],
					));
				} else {
					$this->tpl->assign(array(
							'ACBID' => $AS_base11111['id'],
							'ID' => $AS_base11111111['id'],
							'BASE_DATE' => $d3,
							'IMAGES' => '<a href="/base/'.$AS_base11111111['id'].'"><img src="/images/design/bases/baza_znabiy.jpg" border="0"></a>',
							'BASE_TITLE' => $AS_base11111111['title'],
							'BASE_BODY_DESC' => $AS_base11111111['description'],
					));
				}
				$this->tpl->parse('SHOW_BASE_BODY', '.show_base_body');
			}
		}



		$sql_actions = $this->db->queryAllRecords("SELECT * FROM actions WHERE status='1' AND id<>1 ORDER BY id DESC LIMIT 1");
		foreach($sql_actions AS $AS_action) {
			$ddd2 = @explode('-', $AS_action['public_date']);
			$dd2 = @$ddd2[2] . '.' . @$ddd2[1] . '.' . @substr($ddd2[0], -2);

			$this->tpl->assign(array(
					'ID' => $AS_action['id'],
					'ACTIONS_DATE' => $dd2,
					'ACTIONS_TITLE' => $AS_action['title'],
					'ACTIONS_BODY_DESC' => $AS_action['description'],
			));
			$this->tpl->parse('SHOW_CONTENT_BODY', '.show_content_body');
		}

		$sql_baseAC = $this->db->queryAllRecords("SELECT * FROM base WHERE status='1' AND id<>1 ORDER BY id DESC LIMIT 1");
		if($this->db->numRows($sql_baseAC) != 0) {
			foreach($sql_baseAC AS $AS_base111) {
				$dddd2 = explode('-', $AS_base111['public_date']);
				$ddd2 = @$dddd2[2] . '.' . @$dddd2[1] . '.' . @substr($dddd2[0], -2);
				if(!empty($AS_base111['img_small'])) {
					$this->tpl->assign(array(
							'ACBID' => $AS_base111['id'],
							'BASE_DATE' => $ddd2,
							'IMAGES' => '<a href="/base/'.$AS_base111['id'].'"><img src="/images/design/bases/'.$AS_base111['img_small'].'" border="0"></a>',
							'BASE_TITLE' => $AS_base111['title'],
							'BASE_BODY_DESC' => $AS_base111['description'],
					));
				} else {
					$this->tpl->assign(array(
							'ACBID' => $AS_base111['id'],
							'ID' => $AS_base111['id'],
							'BASE_DATE' => $ddd2,
							'IMAGES' => '<a href="/base/'.$AS_base111['id'].'"><img src="/images/design/bases/baza_znabiy.jpg" border="0"></a>',
							'BASE_TITLE' => $AS_base111['title'],
							'BASE_BODY_DESC' => $AS_base111['description'],
					));
				}
				$this->tpl->parse('SHOW_BASE_BODY', '.show_base_body');
			}
		} else {
			foreach($sql_baseAC AS $AS_base111) {
				if(!empty($AS_base111['img_small'])) {
					$dddd3 = explode('-', $AS_base111['public_date']);
					$ddd3 = @$dddd3[2] . '.' . @$dddd3[1] . '.' . @substr($dddd3[0], -2);

					$this->tpl->assign(array(
							'ACBID' => $AS_base111['id'],
							'ID' => $AS_base111['id'],
							'BASE_DATE' => $ddd3,
							'IMAGES' => '<a href="/base/'.$AS_base111['id'].'"><img src="/images/design/bases/'.$AS_base111['img_small'].'" border="0"></a>',
							'BASE_TITLE' => $AS_base111['title'],
							'BASE_BODY_DESC' => $AS_base111['description'],
					));
				} else {
					$this->tpl->assign(array(
							'ACBID' => $AS_base111['id'],
							'ID' => $AS_base111['id'],
							'BASE_DATE' => $ddd3,
							'IMAGES' => '<a href="/base/'.$AS_base111['id'].'"><img src="/images/design/bases/baza_znabiy.jpg" border="0"></a>',
							'BASE_TITLE' => $AS_base111['title'],
							'BASE_BODY_DESC' => $AS_base111['description'],
					));
				}
				$this->tpl->parse('SHOW_BASE_BODY', '.show_base_body');
			}
		}

		$npp = 0;

		/**
		 * Как я понимаю, это формировалка меню
		 */
		$sql_menu = $this->db->queryAllRecords("SELECT * FROM str_menu WHERE href='". @$_GET['id'] ."' AND status='1'");
		foreach($sql_menu AS $str_menu) {
			$sql_sub1 = $this->db->queryAllRecords("SELECT * FROM sub_menu WHERE str_menu='". $str_menu['href'] ."' AND status='1'");
			foreach($sql_sub1 AS $str_sub) {
				$npp++;
				if(isset($_GET['ssid'])){
					if($_GET['ssid'] == $str_sub['href']) {
						$s_menu = '<a class="sub_menu_active">'.$str_menu['id'].'.'.$npp.' ' .$str_sub['title'].'</a>';
						$this->tpl->assign(array('LINK' => $s_menu));
					} else {
						$s_menu = '<a class="sub_menu" href="/'.$str_menu['href'].'/'.$str_sub['href'].'">'.$str_menu['id'].'.'.$npp.' ' .$str_sub['title'].'</a>';
						$this->tpl->assign(array('LINK' => $s_menu));
					}
				} else {
					$s_menu = '<a class="sub_menu" href="/'.$str_menu['href'].'/'.$str_sub['href'].'">'.$str_menu['id'].'.'.$npp.' ' .$str_sub['title'].'</a>';
					$this->tpl->assign(array('LINK' => $s_menu));
				}
				$this->tpl->parse('MENU_TOP', '.menu_top');
			}
		}


		/**
		 * Как я понимаю, это выборка контента для страниц
		 */

		if(isset($_GET['id']) && !isset($_GET['ssid'])) {
			$sql_content = $this->db->queryAllRecords("
					SELECT * , content.title AS content_title, content.body AS content_body, content.id AS cont_id
					FROM content_id, content, str_menu
					WHERE content.id = content_id.content_id
					AND content_id.str_id = str_menu.id
					AND content_id.sub_id='0'
					AND str_menu.href='".$_GET['id']."'
					AND content.status='1'
					");
		} if(isset($_GET['id']) && isset($_GET['ssid'])) {
			$sql_content = $this->db->queryAllRecords("
					SELECT *, content.title AS content_title, content.body AS content_body, content.id AS cont_id, content.fileslist AS files
					FROM content_id, content, str_menu, sub_menu
					WHERE content.id=content_id.content_id
					AND content_id.str_id=str_menu.id
					AND content_id.sub_id=sub_menu.id
					AND str_menu.href='".$_GET['id']."'
					AND sub_menu.href='".$_GET['ssid']."'
					AND content.status='1'
					");
		}

		

		if(!$this->db->numRows(@$sql_content)) {
			@$sql_default = $this->db->queryOneRecord("SELECT * FROM meta_default");

			if(@$_GET['id'] == 'news') {
				$def_txt = ' - Новости';
			}
			if(@$_GET['id'] == 'feedback') {
				$def_txt = ' - Форма обратной связи';
			}
			if(@$_GET['id'] == 'catalog') {
				$def_txt = ' - Каталог продукции';
			}
			$this->tpl->assign(array('PAGE_TITLE' => 'Идут работы',
					'CONTENT_TITLE_IMAGE' => '<img src="/images/t_fill.gif" border="0">',
					'CONTENT_TITLE' => 'Идут работы',
					'CONTENT_BODY' => '<div style="margin-top:30px;margin-left:130px;font-size:9pt;color:red"><span class="under">Раздел находится в стадии наполнения</span></div>',
					'PAGE_TITLE' => $sql_default['site_name'] . @$def_txt,
					'CONTENT_KEYWORDS' => $sql_default['keywords'],
					'CONTENT_DESC' => $sql_default['description']
			));
		} else { /*var_dump($sql_content);*/
			foreach($sql_content AS $str_content) {
				$content = str_replace('font-size: smaller', 'font-size: 8pt',$str_content['body']);
				$content = str_replace('font-size: larger', 'font-size: 14pt',$content);
				$content = str_replace('font-size: xx-small', 'font-size: 9pt',$content);
				$content = str_replace('font-size: x-small', 'font-size: 10pt',$content);
				$content = str_replace('font-size: small', 'font-size: 12pt',$content);
				$content = str_replace('font-size: medium', 'font-size: 17pt',$content);
				$content = str_replace('font-size: large', 'font-size: 18pt',$content);
				$content = str_replace('font-size: x-large', 'font-size: 24pt',$content);
				$content = str_replace('font-size: xx-large', 'font-size: 30pt',$content);
				$content = str_replace('"images/', '"/images/',$content);
				$content = str_replace("'images/", '"/images/',$content);

				//В этом месте нужно вызвать обработчик, который вставит форму
				

				//-----------------------------------------------------------

				$arr=explode('/',$str_content['content_title']);
				if(!empty($arr[count($arr)-1])) $title=$arr[count($arr)-1]; else $title=$str_content['title'];

				/**
				 * Где то тут нужно перехватить и отдать данные
				 * в контроллер, а может и выше,
				 * чтобы убрать отсюда запросы!
				 */
				
				if(!isset($str_content['files']) || empty ($str_content['files'])) {
					$str_content['files'] = '';
				}
				
				$this->tpl->assign(
						array(
								'ID' => $str_content['cont_id'],
								//'PAGE_TITLE' => $str_content['page_title'],
								'PAGE_TITLE' => $title.' — консалтинговая компания «Актив-Система»',
								//'CONTENT_TITLE' => $str_content['content_title'],
								'CONTENT_TITLE' => $title,
								'CONTENT_BODY' => $content,
								'CONTENT_FILES' => $this->_controller->filesAccessAction($str_content['files'], $str_content['cont_id'], 'content'),
								'CONTENT_KEYWORDS' => $str_content['keywords'],
								//'CONTENT_DESC' => $str_content['description']
								'CONTENT_DESC' => $title.' — «Актив-Система» - консалтинг в области развития и оптимизации бизнеса: стратегическое планирование, описание и оптимизация бизнес-процессов, внедрение системы сбалансированных показателей и ключевых показателей оценки эффективности бизнес-процессов.'
						));
				$this->tpl->parse('SHOW_CONTENT_BODY', '.show_content_body');
			}
		}

		if(@$_GET['id'] == 'sitemap') {
			$map = '
					<ol>
					<a class="sitemap" href="/"><li>Главная</li></a>
					<a class="sitemap" href="/company"><li>Компания</li></a>
					<ul>
					<a href="/company/clients"><li>Клиенты</li></a>
					<a href="/company/partners"><li>Партнеры</li></a>
					<a href="/company/contacts"><li>Контакты</li></a>
					</ul>
					<a class="sitemap" href="/services"><li>Услуги</li></a>
					<ul>
					<a href="/services/strategy"><li>Стратегия</li></a>
					<a href="/services/buis-process"><li>Бизнес-Процессы</li></a>
					<a href="/services/organization"><li>Организационная структура</li></a>
					<a href="/services/reglament"><li>Регламентирующая документация</li></a>
					<a href="/services/information"><li>Информационные системы</li></a>
					</ul>
					<a class="sitemap" href="/tools"><li>Инструменты</li></a>
					<a href="/tools"><li>Business Studio</li></a>
					<a class="sitemap" href="/news"><li>Новости</li></a>
					<a class="sitemap" href="/base"><li>База знаний</li></a>
					<a class="sitemap" href="/actions"><li>События</li></a>
					<a class="sitemap" href="mailto:info@aktiv-sistema.com.ua"><li>Обратная связь</li></a>
					</ol>
					';
			$this->tpl->assign(array(
					'SITEMAP' => $map
			));
			$this->tpl->parse('SHOW_CONTENT_BODY', '.show_content_body');
		}



		if(@$_GET['id'] == 'news' && !isset($_GET['ssid'])) {
			$sql_newscontent = $this->db->queryAllRecords("SELECT * FROM news WHERE status='1' AND id<>1 ORDER BY public_date DESC");
			foreach($sql_newscontent AS $AS_news1) {

				$dd4 = @explode('-', $AS_news1['public_date']);
				$d4 = @$dd4[2] . '.' . @$dd4[1] . '.' . @substr($dd4[0], -2);

				if(!empty($AS_news1['body'])) {
					$this->tpl->assign(array(
							'ID' => $AS_news1['id'],
							'TITLE' => '<a href="/news/'.$AS_news1['id'].'" class="news_title_content">'.$AS_news1['title'].'</a>',
							'DATE' => $d4,
							'PAGE_TITLE' => $AS_news1['title'].' — консалтинговая компания «Актив-Система»',
							'CONTENT_DESC' => $AS_news1['title'].' — «Актив-Система» - консалтинг в области развития и оптимизации бизнеса: стратегическое планирование, описание и оптимизация бизнес-процессов, внедрение системы сбалансированных показателей и ключевых показателей оценки эффективности бизнес-процессов.',
							'CONTENT_TITLE' => '<h1 class="seoh1">'.$AS_news1['title'].'</h1>',
							'NEWS_BODY' => $AS_news1['description'],
					));
				} else {
					$this->tpl->assign(array(
							'ID' => $AS_news1['id'],
							'TITLE' => '<a class="news_title_content">'.$AS_news1['title'].'</a>',
							'DATE' => $d4,
							'PAGE_TITLE' => $AS_news1['title'].' — консалтинговая компания «Актив-Система»',
							'CONTENT_DESC' => $AS_news1['title'].' — «Актив-Система» - консалтинг в области развития и оптимизации бизнеса: стратегическое планирование, описание и оптимизация бизнес-процессов, внедрение системы сбалансированных показателей и ключевых показателей оценки эффективности бизнес-процессов.',
							'CONTENT_TITLE' => '<h1 class="seoh1">'.$AS_news1['title'].'</h1>',
							'NEWS_BODY' => $AS_news1['description'],
					));
				}

				$this->tpl->parse('SHOW_CONTENT_NEWS', '.show_content_news');
			}
		}

		if(@$_GET['id'] == 'news' && isset($_GET['ssid'])) {
			$sql_newscontent1 = $this->db->queryAllRecords("SELECT * FROM news WHERE status='1' AND id<>1 AND id='".$_GET['ssid']."'");
			foreach($sql_newscontent1 AS $AS_news2) {
				$dd5 = @explode('-', $AS_news2['public_date']);
				$d5 = @$dd5[2] . '.' . @$dd5[1] . '.' . @substr($dd5[0], -2);

				$this->tpl->assign(array(
						'ID' => $AS_news2['id'],
						'TITLE' => $AS_news2['title'],
						'DATE' => $d5,
						'PAGE_TITLE' => $AS_news2['title'].' — консалтинговая компания «Актив-Система»',
						'CONTENT_DESC' => $AS_news2['title'].' — «Актив-Система» - консалтинг в области развития и оптимизации бизнеса: стратегическое планирование, описание и оптимизация бизнес-процессов, внедрение системы сбалансированных показателей и ключевых показателей оценки эффективности бизнес-процессов.',
						'CONTENT_TITLE' => '<h1 class="seoh1">'.$AS_news2['title'].'</h1>',
						'NEWS_BODY_DETAIL' => $AS_news2['body'],
				));
				$this->tpl->parse('SHOW_CONTENT_BODY', '.show_content_body');
			}
		}


		if(@$_GET['id'] == 'actions' && !isset($_GET['ssid'])) {
			$sql_newsactions = $this->db->queryAllRecords("SELECT * FROM actions WHERE status='1' AND id<>1");
			foreach($sql_newsactions AS $AS_action) {
				$dd6 = @explode('-', $AS_action['public_date']);
				$d6 = @$dd6[2] . '.' . @$dd6[1] . '.' . @substr($dd6[0], -2);
				$content11 = str_replace('"images/', '"/images/',$AS_action['body']);

				$this->tpl->assign(array(
						'AC_ID' => $AS_action['id'],
						'AC_TITLE' => $AS_action['title'],
						'AC_DATE' => $d6,
						'AC_BODY' => $content11,
				));
				$this->tpl->parse('SHOW_ACTIONS_BODY', '.show_actions_body');
			}
		}








		if(@$_GET['id'] == 'base' && !isset($_GET['ssid'])) {
			$sql_base000000 = $this->db->queryAllRecords("SELECT * FROM base WHERE status='1' AND id<>1 ORDER BY id");
			if($this->db->numRows($sql_base000000) != 0) {
				foreach($sql_base000000 AS $AS_base0000000) {
					$dd7 = @explode('-', $AS_base0000000['public_date']);
					$d7 = @$dd7[2] . '.' . @$dd7[1] . '.' . @$dd7[0];

					if(!empty($AS_base0000000['img_small'])) {
						$this->tpl->assign(array(
								'ACBID' => $AS_base0000000['id'],
								'ID' => $AS_base0000000['id'],
								'BASE_DATE' => $d7,
								'PAGE_TITLE' => $AS_base0000000['title'].' — консалтинговая компания «Актив-Система»',
								'CONTENT_DESC' => $AS_base0000000['title'].' — «Актив-Система» - консалтинг в области развития и оптимизации бизнеса: стратегическое планирование, описание и оптимизация бизнес-процессов, внедрение системы сбалансированных показателей и ключевых показателей оценки эффективности бизнес-процессов.',
								'CONTENT_TITLE' => '<h1 class="seoh1">'.$AS_base0000000['title'].'</h1>',
								'IMAGES' => '<a href="/base/'.$AS_base0000000['id'].'"><img src="/images/design/bases/'.$AS_base0000000['img_small'].'" border="0"></a>',
								'ACB_TITLE' => $AS_base0000000['title'],
								'ACB_BODY' => $AS_base0000000['description'],
						));
					} else {
						$this->tpl->assign(array(
								'ACBID' => $AS_base0000000['id'],
								'ID' => $AS_base0000000['id'],
								'PAGE_TITLE' => $AS_base0000000['title'].' — консалтинговая компания «Актив-Система»',
								'CONTENT_DESC' => $AS_base0000000['title'].' — «Актив-Система» - консалтинг в области развития и оптимизации бизнеса: стратегическое планирование, описание и оптимизация бизнес-процессов, внедрение системы сбалансированных показателей и ключевых показателей оценки эффективности бизнес-процессов.',
								'CONTENT_TITLE' => '<h1 class="seoh1">'.$AS_base0000000['title'].'</h1>',
								'BASE_DATE' => $d7,
								'IMAGES' => '<a href="/base/'.$AS_base0000000['id'].'"><img src="/images/design/bases/baza_znabiy.jpg" border="0"></a>',
								'ACB_TITLE' => $AS_base0000000['title'],
								'ACB_BODY' => $AS_base0000000['description'],
						));
					}
					$this->tpl->parse('SHOW_BASES_BODY', '.show_bases_body');
				}
			} else {
				foreach($sql_base000000 AS $AS_base0000000) {
					$dd8 = @explode('-', $AS_base0000000['public_date']);
					$d8 = @$dd8[2] . '.' . @$dd8[1] . '.' . @substr($dd8[0], -2);

					if(!empty($AS_base0000000['img_small'])) {
						$this->tpl->assign(array(
								'ACBID' => $AS_base0000000['id'],
								'BASE_DATE' => $d8,
								'IMAGES' => '<a href="/base/'.$AS_base0000000['id'].'"><img src="/images/design/bases/'.$AS_base0000000['img_small'].'" border="0"></a>',
								'ACB_TITLE' => $AS_base0000000['title'],
								'ACB_BODY' => $AS_base0000000['description'],
						));
					} else {
						$this->tpl->assign(array(
								'ACBID' => $AS_base0000000['id'],
								'ID' => $AS_base0000000['id'],
								'BASE_DATE' => $d8,
								'IMAGES' => '<a href="/base/'.$AS_base0000000['id'].'"><img src="/images/design/bases/baza_znabiy.jpg" border="0"></a>',
								'ACB_TITLE' => $AS_base0000000['title'],
								'ACB_BODY' => $AS_base0000000['description'],
						));
					}
					$this->tpl->parse('SHOW_BASE_BODY', '.show_base_body');
				}
			}
		}

		if(@$_GET['id'] == 'base' && isset($_GET['ssid'])) {
			$AS_bases1 = $this->db->queryAllRecords("SELECT * FROM base WHERE status='1' AND id='".$_GET['ssid']."' AND id<>1");
			foreach($AS_bases1 AS $AS_base) {
				$dd9 = @explode('-', $AS_base['public_date']);
				$d9 = @$dd9[2] . '.' . @$dd9[1] . '.' . @substr($dd9[0], -2);
				$content1q1 = str_replace('"images/', '"/images/',$AS_base['body']);
				
				$this->tpl->assign(array(
						'ACBID' => $AS_base['id'],
						'ID' => $AS_base['id'],
						'TITLE' => $AS_base['title'],
						'PAGE_TITLE' => $AS_base['title'].' — консалтинговая компания «Актив-Система»',
						'CONTENT_DESC' => $AS_base['title'].' — «Актив-Система» - консалтинг в области развития и оптимизации бизнеса: стратегическое планирование, описание и оптимизация бизнес-процессов, внедрение системы сбалансированных показателей и ключевых показателей оценки эффективности бизнес-процессов.',
						'CONTENT_TITLE' => '<h1 class="seoh1">'.$AS_base['title'].'</h1>',
						'CONTENT_FILES' => $this->_controller->filesAccessAction($AS_base['fileslist'],$AS_base['id'], 'base'),
						'DATE' => $d9,
						'NEWS_BODY_DETAIL' => $content1q1,
				));
				$this->tpl->parse('SHOW_BASE_DETAIL_BODY', '.show_base_detail_body');
			}
		}


		include('seo.php');
		if(isset($seo_title)) $this->tpl->assign(array('PAGE_TITLE' => $seo_title));
		if(isset($seo_desc)) $this->tpl->assign(array('CONTENT_DESC' =>$seo_desc));
		if(isset($seo_h1)) $this->tpl->assign(array('CONTENT_TITLE' =>$seo_h1));
		$this->tpl->parse('INDEX', 'index');
		return true;
	}

}
?>
