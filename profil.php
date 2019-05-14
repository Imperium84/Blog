<?php
include "autoload.php";

if (!Session::isAuthenticated())
{
	return;
}

$sql = "SELECT * FROM user
WHERE Nickname = ?";

$pm = new PostModel();
$pm->setSql($sql);
$pm->setParams([$_SESSION["nick"]]);

$profil = $pm->getOnePost();

$pseudo = $profil["Nickname"];
$email = $profil["Email"];

for ($i=0; $i<strlen($email); $i++)
{
	if ($email[$i]!="@" && $i < strlen($email)-4)	
		$email[$i]="*";	
}

$prenom = $profil["FirstName"];
$nom = $profil["LastName"];
$birth = $profil["Birthdate"];
$adresse = $profil["Address"];
$zipCode = $profil["ZipCode"];
$ville = $profil["City"];
$genre = $profil["Gender"];



$page="profil";

include 'views/template.phtml';