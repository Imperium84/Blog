<?php
/***********SESSION*************/
if(session_status() == PHP_SESSION_NONE)
{
	session_start();
}

class Session
{
	static public function isAuthenticated()
	{
		
		if (array_key_exists('nick', $_SESSION) && isset($_SESSION['nick']))
		{
			return true;
		}
		
		else
		{
			return false;
		}
	}

	static public function signout()
	{
		unset($_SESSION['nick'] );
		session_destroy();
	}
}
