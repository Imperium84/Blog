<?php
include_once "autoload.php";



$sql = 'SELECT post.Id, Title, Content, CreatedAt, Name, CategoryId, Auteur 
FROM post 
INNER JOIN category 
ON post.CategoryId = Category.Id
ORDER BY CreatedAt DESC';

$pm = new PostModel();
$pm->setSql($sql);
$posts=$pm->getAllPosts();

$flash = new FlashBag;

$page = 'index';


include 'views/template.phtml';