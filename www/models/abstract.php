<?php

//Ñâÿçü ñ ÁÄ
require_once '/lib/config.php';
require_once '/Zend/Db.php';

class Models_Abstract
{
	protected  $_db;
	
	public function __construct()
	{
		$this->_db = Zend_Db::factory('Pdo_Mysql', array(
		      'host'     => 'localhost',
		      'username' => 'root',
		      'password' => '',
		      'dbname'   => 'aktivsis_db',
		      'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES cp1251')
		));
	}
	
	public function insert($tbl, $array)
	{
		$this->_db->insert($tbl, $array);
		return $this->_db->lastInsertId();
	}
	
	public function update($id, $tbl, $array)
	{
		$this->_db->update($tbl, $array, 'id = ' . $id);
	}
	
	public function delete($id, $tbl)
	{
		$this->_db->delete($tbl, 'id = ' . $id);
	}
}