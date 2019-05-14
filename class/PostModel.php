<?php

class PostModel 
{
	private $sql = '';
	private $params=[];
	private $db;
	
	public function __construct()
	{
		$this->db = new DataBase('localhost', 'blog', 'root', '', 
		['PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION']);
	}
	
	public function getAllPosts()
	{
		return $this->db->queryAll($this->sql, $this->params);
	}
	
	public function getOnePost()
	{
		return $this->db->queryOne($this->sql, $this->params);
	}
	
	public function getAction()
	{
		$this->db->queryAction($this->sql, $this->params);
	}
	
	public function setSql($sql)
	{
		$this->sql = $sql;
	}
	
	public function setParams($params)
	{
		$this->params = $params;
	}
	
}