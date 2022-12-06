<?php
require_once('../config.php');
// Verifie si id n'est pas vide dans l'URL avec la requête _GET
if (isset($_GET) && !empty($_GET)){
    extract($_GET);
    $sql=$dbConnexion->prepare("DELETE FROM categories WHERE id=$id");
    $sql->execute();
    $supprimer=$sql->execute();
    // var_dump($supprimer);
    if ($supprimer) {
        header('location: liste.php');
    }else{
        echo "Echec de suppression";
    }
}

?>