<?php

include "autoload.php";

$id;

if (!empty($_GET))
{
	$id =$_GET["id"];
}



$sql = "SELECT post.Id, Title, Content, Image, CreatedAt, CategoryId, Name, Auteur
FROM post 
INNER JOIN category
ON post.CategoryId = category.Id
WHERE post.Id=?";

$pm = new PostModel();
$pm->setSql($sql);
$pm->setParams([$id]);
$post=$pm->getOnePost();


$sql = "SELECT Nickname, comment.CreatedAt, comment.Content, PostId
FROM comment
WHERE comment.PostId=?
ORDER BY CreatedAt DESC";

$pm->setSql($sql);
$pm->setParams([$id]);
$comments =$pm->getAllPosts();

$page = "article";


include 'views/template.phtml';