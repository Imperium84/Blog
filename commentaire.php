<?php
include "autoload.php";
session_start();

$id;

if (!empty($_GET))
{
	$id =$_GET["id"];
}

$commentaire=$_POST['commentaire'];

if (empty($commentaire))
{

	header('Location: article.php?id='.$id);
	exit;
}


$sql = 'INSERT INTO comment (Nickname, Content, PostId) VALUES (?,?,3)';	
$params = [$_SESSION['nick'], $commentaire];

$pm = new PostModel();
$pm->setSql($sql);
$pm->setParams($params);
$pm->getAction();


$sql = 'SELECT * FROM comment';
$pm->setSql($sql);
$res = $pm->getAllPosts();


header('Location: article.php?id='.$id);
exit;
?>

