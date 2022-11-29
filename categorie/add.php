<?php
require_once('../config.php');
// Vérifie si le champ de la requête post n'est pas vide
if (!empty($_POST["libelle"])){
    // Extraire toutes les données du $_POST
    extract($_POST);
    // Preparation de la requête
    $sql = $dbConnexion->prepare("INSERT INTO categories(libelle) VALUES(?)");
    $sql->bindParam(1, $libelle);
    $sql->execute();
}else{
    echo "Le champ est vide";
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADD CATEGORIE</title>
</head>

<body>
    <form method="POST">
        <label for="libelle">Libelle</label>
        <input type="text" name="libelle" value="">
        <button type="submit">Envoyer</button>
    </form>
<!-- <?php var_dump($_POST) ?> -->
</body>

</html>