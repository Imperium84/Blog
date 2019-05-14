<?php

class Autoloader
{
	
	 public static function autoload($classe)
	{
		require 'class/'.$classe.'.php';
	}
	
	public static function register()
	{
		spl_autoload_register([__CLASS__, 'autoload']);
	}
}