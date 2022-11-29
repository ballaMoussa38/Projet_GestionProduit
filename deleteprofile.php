<?php
require_once('config.php');


if (!empty($_GET['id'])) {
    // Extraire les données du $_GET
    extract($_GET);
    $sql = $dbConnexion->prepare("delete from profils where id=$id");
    $sql->execute();
    $deleted = $sql->execute();
    if ($deleted){
        header('location: liste.php');
        // echo "Profil supprimer avec succes";
    } else{
        echo "echec de supprission";
    }
}

?>