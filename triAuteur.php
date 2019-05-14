<?php

include "autoload.php";
$auteur;

if (!empty($_GET))
{
	$auteur =$_GET["auteur"];
}


$sql = "SELECT post.Id, Title, Content, Image, CreatedAt, CategoryId, Name, Auteur
FROM post 
INNER JOIN category
ON post.CategoryId = category.Id
WHERE Auteur=?";

$pm = new PostModel();
$pm->setSql($sql);
$pm->setParams([$auteur]);

$posts = $pm->getAllPosts();

$page="index";

include 'views/template.phtml';