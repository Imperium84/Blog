<?php

class DataBase
{
	protected $pdo;
	private $host;
	private $dbName;
	private $user;
	private $pwd;
	private $options = array();
	
	public function __construct($host, $dbName, $user, $pwd, $options = [])
	{
		$this->host = $host;
		$this->dbName = $dbName;
		$this->user = $user;
		$this->pwd = $pwd;
		$this->options = $options;
				
		$this->pdo = $this->getPDOConnection();
		
	}
	
	protected function getPDOConnection()
	{
		$pdo = new PDO('mysql:host='.$this->host.';dbname='.$this->dbName, $this->user, 
		$this->pwd, $this->options);
		
		$pdo-> exec ('SET NAMES UTF8');
		
		return $pdo;
	}
	
	public function queryAll($sql, array $params=[])
	{
		$query = $this->pdo -> prepare($sql);
		$query->execute($params);
		return $query -> fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function queryOne($sql, array $params=[])
	{
		$query = $this->pdo -> prepare($sql);
		$query->execute($params);
		return $query -> fetch(PDO::FETCH_ASSOC);
	}
	
	public function queryAction($sql, array $params=[])
	{
		$query =$this->pdo-> prepare($sql);
		$res = $query->execute($params);
	}	
	
}