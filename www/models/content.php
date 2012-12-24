<?php
require_once 'models/abstract.php';



class Models_Content extends Models_Abstract
{
	public $_tbl;
	
	public function __construct()
	{
		$this->_tbl = 'content';
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
		
		return $this->_db->fetchRow($select);
	}
}
