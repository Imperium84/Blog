<?php

include "autoload.php";
$categorie;

if (!empty($_GET))
{
	$categorie =$_GET["categorie"];
}


$sql = "SELECT post.Id, Title, Content, Image, CreatedAt, CategoryId, Name, Auteur
FROM post 
INNER JOIN category
ON post.CategoryId = category.Id
WHERE Name=?";

$pm = new PostModel();
$pm->setSql($sql);
$pm->setParams([$categorie]);

$posts = $pm->getAllPosts();


$page="index";

include 'views/template.phtml';