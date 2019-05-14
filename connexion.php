<?php

include "autoload.php";
session_start();


$id = $_POST['identifiant'];
$pwd = $_POST['pwd'];

$pm = new PostModel();


//On va commencer par récupérer le nickname et l'email de l'utilisateur
$sql = "SELECT Email, Nickname
FROM user
WHERE Nickname = ?
OR Email = ?";

$pm->setSql($sql);
$pm->setParams([$id, $id]);
$user=$pm->getOnePost();

$flash = new FlashBag();

if (empty($user))
{
	$flash->add("Mauvais nom d'utilisateur !");
}

else
{
	//Ensuite le mot de passe
	$sql="SELECT Password
		FROM USER	
		WHERE Nickname = ?
		OR Email = ?";
		
	$pm->setSql($sql);
	$pm->setParams([$id, $id]);
	$password=$pm->getOnePost();

	if (!password_verify($pwd, $password['Password']))
	{	
		echo "test";
		$flash->add("Mauvais mot de passe !");
	}

	else
	{
		$flash->add("Vous êtes connecté !");
		$_SESSION['nick'] = $user['Nickname'];
	}
}


header('Location: index.php');
exit;