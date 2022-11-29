<?php
require_once('../config.php');
var_dump($_GET);
extract($_GET);
$sql=$dbConnexion->prepare("DELETE FROM categories WHERE ID=$id ");
$sql->execute();
var_dump($_GET);

?>