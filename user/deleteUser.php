<?php
require_once('../config.php');
if (!empty($_GET["id"])){
    extract($_GET);
    $sql=$dbConnexion->prepare("DELETE FROM users WHERE id=$id ");
    $userDeleted=$sql->execute();
    if ($userDeleted){
        header('location: liste.php');
    } else{
        echo "Echec de suppresion";
    }

}



?>