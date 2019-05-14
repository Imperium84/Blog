<?php
include_once "autoload.php";

Session::signout();
$flash = new FlashBag();
$flash->add("Vous êtes déconnecté !");



header("Location:index.php");
exit;