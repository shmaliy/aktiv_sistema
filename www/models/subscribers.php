<?php
require_once 'models/abstract.php';

class Models_Subscribers extends Models_Abstract
{
	private $_tbl;
		
	public function __construct()
	{
		$this->_tbl = 'subscribers';
		
		parent::__construct();
	}
	
	public function setTbl($name)
	{
		$this->_tbl = $name;
	}
	
	public function getTbl()
	{
		return $this->_tbl;
	}
	
	public function parseLogin ($data)
	{
		$select = $this->_db->select();
		$select->from(
			array('users' => $this->_tbl)		
		);
		
		foreach ($data as $key=>$value) {
			$select->where('users.' . $key . ' = ?', $value);
		}
		
		return $this->_db->fetchRow($select);
		
	}
	
}
