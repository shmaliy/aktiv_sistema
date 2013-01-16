<?php

//Ñâÿçü ñ ÁÄ
require_once 'lib/config.php';
require_once 'Zend/Db.php';

class Models_Abstract
{
	protected  $_db;
	public static $charsetDb = 'UTF-8';
	public static $charsetFrontend = 'windows-1251';
	
	
	public function __construct()
	{
		$this->_db = Zend_Db::factory('Pdo_Mysql', array(
		      'host'     => 'localhost',
		      'username' => 'aktivsis_user',
		      'password' => '456852',
		      'dbname'   => 'aktivsis_db',
		      'driver_options' => array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8')
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
	
	public function iconvCallback(&$item, $key, $options)
	{
		$item = iconv($options['from'], $options['to'], $item);
	}
}