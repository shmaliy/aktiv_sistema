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
	
	public function __construct()
	{
		$this->_tbl = 'content';
		$this->_relTbl = 'content_id';
		$this->_menuTbl = 'str_menu';
		$this->_subMenuTbl = 'sub_menu';
		$this->_activityTbl = 'subscribers_activity';
		$this->_baseTbl = 'base';
		$this->_subscribersTbl = 'subscribers';
		parent::__construct();
	}
	
	public function getContentItem($id = null)
	{
		if (null === $id) {
			return array();
		}
		
		$select = $this->_db->select();
		$select->from(array("content" => $this->_tbl));
		$select->where('content.id = ?', $id);
		$return = $this->_db->fetchRow($select);
		
		array_walk_recursive($return, array($this, 'iconvCallback'), array('from' => self::$charsetDb, 'to' => self::$charsetFrontend));
		
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
