// <?php

// include "autoload.php";

// $email = $_POST["email"];
// $nickname = $_POST["nickname"];
// $password = $_POST["motDePasse"];
// $passwordConfirm= $_POST["motDePasseConfirm"];

// if ($password!=$passwordConfirm)
// {
	// return;
// }


// $sexe = $_POST["sexe"];
// $passwordCrypt = password_hash($password, PASSWORD_DEFAULT);

// /*Ici nous avons notre requête SQL de prête, mais avant de l'envoyer il nous faut vérifer que
// l'email et le pseudo ne soit pas déjà présent*/
// $sql = "SELECT Email, Nickname FROM user
// WHERE Email = ?
// OR Nickname = ?";

// $pm = new PostModel();
// $pm->setSql($sql);
// $pm->setParams([$email, $nickname]);
// $doublons = $pm->queryAll();

// $trouver = false;
// $erreur;

// foreach ($doublons as $doublon)
// {
	// if ($doublon['Email'] == $email)
	// {
		// $trouver = true;
	// }
	
	// else if($doublon['Nickname'] == $nickname)
	// {
		// $trouver = true;
	// }
// }

// if (!$trouver)
// {
	// $sql = "INSERT INTO user (Email, Password, Gender, Nickname)
	// VALUE (?, ?, ?, ?)";

	// $params = [$email, $passwordCrypt, $sexe, $nickname];
	// $pm = new PostModel();
	// $pm->setSql($sql);
	// $pm->setParams($params);

	// $pm->getAction($sql, $params);

	// $page="signup";

	// include 'views/template.phtml';
	// exit;
// }

// else
// {
	// $erreur = 	"L'adresse email est déjà prise !";
	$page = "signup_form.php";
	// header("Location: signup_form.php");
	// exit;
// }

