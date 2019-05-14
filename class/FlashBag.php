<?php

class FlashBag
{
	
	public function __construct()
	{
		if(session_status() == PHP_SESSION_NONE)
		{
			session_start();
		}
		
		if (!array_key_exists("Messages", $_SESSION))
		{
			$_SESSION["Messages"]  = [];
		}
		
	}
	
	public function add(string $message)
	{
		$_SESSION["Messages"] = [$message];
	}
	
	public function hasMessages()
	{
		$contientMessage;
		
		if (!array_key_exists("Messages", $_SESSION) || !isset($_SESSION["Messages"]))
			$contientMessage = false;
		else
			$contientMessage = true;
		
		return $contientMessage;
	}
	
	public function fetch()
	{
		$message =end($_SESSION["Message"]);
		array_pop($_SESSION["Messages"]);
		
		return $message;
	}
	
	public function fetchAll()
	{
		if (array_key_exists("Messages", $_SESSION))
		{
			$tableau =  $_SESSION["Messages"];
			unset($_SESSION["Messages"]);
			
			return $tableau;
		}
		
	}
}