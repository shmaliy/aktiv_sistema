<?php
require_once 'models/abstract.php';



class Models_Content extends Models_Abstract
{
	public $_tbl;
	public $_relTbl;
	public $_menuTbl;
	public $_subMenuTbl;
	public $_activityTbl;
	public $_baseTbl;
	public $_subscribersTbl;
	public $_actionsTbl;

	public function __construct()
	{
		$this->_tbl = 'content';
		$this->_relTbl = 'content_id';
		$this->_menuTbl = 'str_menu';
		$this->_subMenuTbl = 'sub_menu';
		$this->_activityTbl = 'subscribers_activity';
		$this->_baseTbl = 'base';
		$this->_subscribersTbl = 'subscribers';
		$this->_actionsTbl = 'actions';
		parent::__construct();
	}
	
	public function testSelect()
	{
		$select = $this->_db->select();
		
		$select->from(
			array('part' => 'parts'),
			array('man_id', 'p_name' => 'name')
		);
		
		$select->joinLeft(
			array('man' => 'manufacturers'),
			"part.man_id = man.id",
			array(
				'id', 'name'		
			) 		
		);
 		$select->orWhere("man.name = ?", 'Dell Ltd');
 		$select->orWhere("man.name = ?", 'JDF Ltd');
		
		echo $select;
	}
	
	public function getMenuTree($str = 0, $submenu = 0) {
		
		$select = $this->_db->select();
		$select->from(
				array("sub_menu" => $this->_subMenuTbl),
				array(
						'sub_menu.title',
						'sub_menu.href'		
				)
		);
		$select->where("sub_menu.status = 1");
		
		
		$select->joinLeft(
			array("menu" => $this->_menuTbl),
			"sub_menu.str_menu = menu.href",
			array(
					"menu_title" => "menu.title",
					"menu_href" => "menu.href"
			)		
		);
		$select->order('menu.id');
		$select->order('sub_menu.id');
		$select->where("menu.status = 1");
		
		$return = $this->_db->fetchAll($select);
		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
		
		$menu = array();
		foreach ($return as $value) {
			$current = 0;
			if ($str == $value['menu_href'] && $str !== 0) {
				$current = 1;
			}
			$menu[$value['menu_href']] = array(
					'title' => $value['menu_title'], 
					'href' => $value['menu_href'],
					'current' => $current,
					'alias'		=> $value['menu_href']
			);
		}
		
		foreach ($menu as $key=>$value) {
			$childs = array();
			foreach ($return as $item) {
				$current = 0;
				if ($submenu == $item['href'] && $submenu !== 0) {
					$current = 1;
				}
				if ($item['menu_href'] == $key) {
					$childs[] = array(
							'title' => $item['title'],
							'href'	=> $key . '/' . $item['href'],
							'current' => $current
					);
				}
			}
			
			$menu[$key]['childs'] = $childs;
			 
		}
		
		foreach ($menu as &$item) {
			if (!empty($item['childs']) && count($item['childs']) == 1) {
				$item['href'] = $item['childs'][0]['href'];
			}
		}
		
// 		echo '<pre>';
// 		var_export($menu);
// 		echo '</pre>';
		
		return $menu;
	}

	public function getContentListNew($menu, $submenu)
	{
		
		if(is_numeric($menu)) {
			return array();
		}
		
		$select = $this->_db->select();

		$select->from(
				array("content" => $this->_tbl),
				array(
						'content.id',
						'content.title',
						'content.body',
						'content.page_title',
						'content.keywords',
						'content.description',
						'content.public_date',
						'content.fileslist',
						'content.linkslist'
				)
		);

		$select->where("content.status = 1");

		$select->joinLeft(
				array("relations" => $this->_relTbl),
				"content.id = relations.content_id",
				array(
						"rel_str_id" 		=> "relations.str_id",
						"rel_sub_id"		=> "relations.sub_id",
						"rel_content_id"	=> "relations.content_id"
				)
		);

		$select->joinLeft(
				array("menu" => $this->_menuTbl),
				"relations.str_id = menu.id",
				array(
						"menu_title" 	=> "menu.title",
						"menu_href"		=> "menu.href",
						"menu_type"		=> "menu.type",
						"menu_status"	=> "menu.status",
						"menu_index"	=> "menu._index"
				)
		);
		
		$select->where("menu.href = ?", $menu);

		$select->joinLeft(
				array("sub_menu" => $this->_subMenuTbl),
				"sub_menu.str_menu = menu.href and relations.sub_id = sub_menu.id",
				array(
						"sub_str_menu" 	=> "sub_menu.str_menu",
						"sub_menu_title"		=> "sub_menu.title",
						"sub_menu_href"		=> "sub_menu.href",
						"sub_menu_status"	=> "sub_menu.status"
				)
		);
		
		if(!is_numeric($submenu)) {
			$select->where("sub_menu.href = ?", $submenu);
		}
		
		$return = $this->_db->fetchAll($select);
		
		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
		foreach ($return as &$item) {
			if(!empty($item['fileslist']))
			{
				$item['fileslist'] = json_decode($item['fileslist'], true);
				array_walk_recursive($item['fileslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
				
			}
			
			if(!empty($item['linkslist']))
			{
				$item['linkslist'] = json_decode($item['linkslist'], true);
				array_walk_recursive($item['linkslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
			
			}
			$item['body'] = str_replace('"images/', '"/images/',$item['body']);
			$item['body'] = str_replace("'images/", '"/images/',$item['body']);
		}
		
		return $return;		
	}
	
	public function getKnowledgeBaseList($limit = null)
	{
		$select = $this->_db->select();
		
		$select->from(array('base' => $this->_baseTbl));
		$select->where('base.status != 1');
		$select->order('base.id desc');
		if (!is_null($limit)) {
			$select->limit($limit);
		}
		
		//echo $select;
		
		$return = $this->_db->fetchAll($select);
		
		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
		
		foreach ($return as &$item) {
			if(!empty($item['fileslist']))
			{
				//$item['fileslist'] = unserialize($item['fileslist']);
				//array_walk_recursive($item['fileslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
				
			}
			
			if(!empty($item['linkslist']))
			{
				$item['linkslist'] = json_decode($item['linkslist'], true);
				array_walk_recursive($item['linkslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
					
			}
			$item['body'] = str_replace('"images/', '"/images/',$item['body']);
			$item['body'] = str_replace("'images/", '"/images/',$item['body']);
		}
		
		return $return;
	}
	
	public function getActionsList($limit = null)
	{
		$select = $this->_db->select();
	
		$select->from(array('base' => $this->_actionsTbl));
		$select->where('base.status != 1');
		$select->order('id desc');
		if (!is_null($limit)) {
			$select->limit($limit);
		}
	
		//echo $select;
	
		$return = $this->_db->fetchAll($select);
	
		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
		
		foreach ($return as &$item) {
			if(!empty($item['fileslist']))
			{
				$item['fileslist'] = unserialize($item['fileslist']);
				array_walk_recursive($item['fileslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
				
			}
			$item['body'] = str_replace('"images/', '"/images/',$item['body']);
			$item['body'] = str_replace("'images/", '"/images/',$item['body']);
		}
		
		return $return;
	}

	public function getContentItem($id = null)
	{
		if (null === $id) {
			return false;
		}

		$select = $this->_db->select();
		$select->from(array("content" => $this->_tbl));
		$select->where('content.id = ?', $id);
		$return = $this->_db->fetchRow($select);
		
		if ($return !== false) {
			array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
			
			if(!empty($return['fileslist']))
			{
				$return['fileslist'] = json_decode($return['fileslist'], true);
				array_walk_recursive($return['fileslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
			
			}
				
			if(!empty($return['linkslist']))
			{
				$return['linkslist'] = json_decode($return['linkslist'], true);
				array_walk_recursive($return['linkslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
					
			}
		}
			
		return $return;
	}

	public function getBaseItem($id = null)
	{
		if (null === $id) {
			return array();
		}

		$select = $this->_db->select();
		$select->from(array("content" => $this->_baseTbl));
		$select->where('content.id = ?', $id);
		$return = $this->_db->fetchRow($select);

		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
		
		if(!empty($return['fileslist']))
		{
			$return['fileslist'] = json_decode($return['fileslist'], true);
			if(is_array($return['fileslist']) && !empty($return['fileslist'])) {
				array_walk_recursive($return['fileslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
			}
		
		}
			
		if(!empty($return['linkslist']))
		{
			$return['linkslist'] = json_decode($return['linkslist'], true);
			array_walk_recursive($return['linkslist'], array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
				
		}
		
		$return['body'] = str_replace('"images/', '"/images/',$return['body']);
		$return['body'] = str_replace("'images/", '"/images/',$return['body']);
		
		return $return;
	}

	public function getActivityList()
	{
		$select = $this->_db->select();

		$select->from(array('act' => $this->_activityTbl));
		$select->order('id desc');

		$select->joinLeft(
				array('users' => $this->_subscribersTbl),
				"users.id = act.subscribers_id",
				array(
						'users.f',
						'users.i',
						'users.o',
						'users.email',
						'users.phone',
						'users.company',
						'users.post'
				)
		);

		$return = $this->_db->fetchAll($select);
		foreach ($return as &$item) {
			$item['ts'] = date("h:i:s d-m-Y", $item['ts']);
		}

		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));

		return $return;

	}

	public function getSpamList()
	{
		$select = $this->_db->select();
		$select->from(
				array('list' => $this->_subscribersTbl),
				array(
						'list.email',
						'list.f',
						'list.i',
						'list.o',
				)
		);
		$select->where('list.send_spam = ?', 'YES');

		$return = $this->_db->fetchAll($select);

		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));


		return $return;
	}

	public function getContentList($href, $param)
	{
		if ($href === 0) {
			return array();
		}

		$select = $this->_db->select();
		$select->from(array("content" => $this->_tbl));
		$select->where("content.status = ?", 1);

		$select->joinLeft(
				array("content_id" => $this->_relTbl),
				'content.id = content_id.content_id'
		);
		$select->where('content_id.sub_id = 0');

		$select->joinLeft(
				array("menu" => $this->_menuTbl),
				'content_id.str_id = menu.id'
		);
		$select->where('menu.href = ?', $href);

		if	($param !== 0) {
			$select->joinLeft(
					array("sub_menu" => $this->_subMenuTbl),
					''
			);
			$select->where('sub_menu.href = ?', $param);
		}


		echo $select;
	}

}
