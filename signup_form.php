<?php
include_once "autoload.php";
session_start();

if (!empty ($_POST))
{
	$email = $_POST["email"];
	$nickname = $_POST["nickname"];
	$password = $_POST["motDePasse"];
	$passwordConfirm= $_POST["motDePasseConfirm"];
	
	$flash = new FlashBag();
	

	if ($password!=$passwordConfirm)
	{
		return;
	}


	$sexe = $_POST["sexe"];
	$passwordCrypt = password_hash($password, PASSWORD_DEFAULT);

	/*Ici nous avons notre requête SQL de prête, mais avant de l'envoyer il nous faut vérifer que
	l'email et le pseudo ne soit pas déjà présent*/
	$sql = "SELECT Email, Nickname FROM user
	WHERE Email = ?
	OR Nickname = ?";

	$pm = new PostModel();
	$pm->setSql($sql);
	$pm->setParams([$email, $nickname]);
	$doublons = $pm->getAllPosts();

	$trouverEmail = false;
	$trouverPseudo = false;

	foreach ($doublons as $doublon)
	{
		if ($doublon['Email'] == $email)
		{
			$trouverEmail = true;
		}
		
		else if($doublon['Nickname'] == $nickname)
		{
			$trouverPseudo = true;
		}
	}
	
	//Si on a tout trouvé on peut ajouter a la bdd et rediriger vers l'index
	if (!$trouverEmail && !$trouverPseudo)
	{
		$sql = "INSERT INTO user (Email, Password, Gender, Nickname)
		VALUE (?, ?, ?, ?)";

		$params = [$email, $passwordCrypt, $sexe, $nickname];
		$pm = new PostModel();
		$pm->setSql($sql);
		$pm->setParams($params);

		$pm->getAction($sql, $params);
		
		$flash = new FlashBag();
		$flash->add("Merci pour votre inscription !");

		include 'index.php';
		exit;
	}

	else if($trouverEmail)
	{
		$flash->add("L'adresse email est déjà utilisée !");
		$page = "signup_form";
		include 'views/template.phtml';
	}
	
	else if($trouverPseudo)
	{
		$flash->add("Le pseudo est déjà utilisé !");
		$page = "signup_form";
		include 'views/template.phtml';
	}
}

else
{
	$page = "signup_form";
	include 'views/template.phtml';
}

