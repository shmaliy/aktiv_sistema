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
	
	public function __construct()
	{
		$this->_tbl = 'content';
		$this->_relTbl = 'content_id';
		$this->_menuTbl = 'str_menu';
		$this->_subMenuTbl = 'sub_menu';
		$this->_activityTbl = 'subscribers_activity';
		$this->_baseTbl = 'base';
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
