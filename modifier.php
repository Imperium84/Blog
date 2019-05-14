<?php

if (!empty($_POST))
{
	$sql = "INSERT INTO user(Email, Gender, FirstName, LastName, Birthdate, Address, ZipCode, City) 
	VALUES (?,?,?,?,?,?,?,?) ";

	// $params = [$_POST["email"], $_POST['sexe'], $_POST|"prenom"], $_POST["nom"], $_POST["birth"],
	// $_POST["adresse"], $_POST["zip"], $_POST["city"]];

	// queryAction($sql, $params);
}

