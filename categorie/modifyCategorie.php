<?php
require_once('../config.php');

if (!empty($_GET["id"])) {
    // var_dump($_GET);
    extract($_GET);
    $sql=$dbConnexion->prepare("SELECT * FROM categories WHERE id=$id");
    $sql->execute();
    $recupereTableau=$sql->fetch();
    // var_dump($recupereTableau);
    
}else {
    echo "l'id est invalide ";
}

// Vérifie si le POST n'est pas vide on envoie, 
if (!empty($_POST)) {
    // var_dump($_POST);
    extract($_POST);
    $sql=$dbConnexion->prepare("UPDATE categories SET libelle=:libelle WHERE id=:id ");
    $sql->bindParam(':libelle', $libelle);
    $sql->bindParam(':id', $id);
    $newUpdateLibelle=$sql->execute();
    if ($newUpdateLibelle) {
        header('location: liste.php');
    }else {
        echo "echec";
    }
}
?>

<!-- <pre> <?php var_dump($_SERVER) ?> </pre> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edition</title>
</head>

<body>
    <form action="" method="POST">
        <label for="id">Id</label>
        <input type="text" name="id" value="<?= $recupereTableau["id"]; ?>">
        <label for="libelle">Libelle</label>
        <input type="text" name="libelle" value="<?= $recupereTableau["libelle"]; ?>">
        <button type="submit">Envoyer</button>
    </form>
    <!-- <?php var_dump($recupereTableau) ;?> -->
</body>

</html>