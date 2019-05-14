<?php
include 'requetes.php';



$sql = 'SELECT ville_nom, ville_code_postal FROM villes_france_free
WHERE ville_code_postal LIKE ?';

$cp = $_GET['cp'];
$villes = queryAll($sql, ['%'.$cp.'%']);

echo json_encode($villes);
exit;