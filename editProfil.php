<?php
require_once('config.php');
// if(!empty($_POST['libelle'])){
//     var_dump($_POST['libelle']);
// }else{
//     echo "Le champ est obligatoire";
// }

// $sql=$dbConnexion->prepare("SELECT * FROM profils WHERE id=$id");
// $sql->execute();
// $profil=$sql->execute();
// var_dump($profil);

// Recupération d'un seul enregistrement de la table profils
if (!empty($_GET['id'])) {
    extract($_GET);
    $sql = $dbConnexion->prepare("SELECT * FROM profils WHERE id=$id");
    $sql->execute();
    $profil = $sql->fetch();
    var_dump($profil);

    // if($sql){
    //     // Si l'insertion reussie il nous redirige vers la page liste.php
    //     header('location: liste.php');
    //     echo "Insertion reussie";
    // }else{
    //     echo "Echec d'insertion";
    // }
} else {
    echo "Le champ est obligatoire";
}

// Update de l'enregistrement recupéré
if (!empty($_POST)){
    // var_dump($_POST);
    extract($_POST);
    $sql=$dbConnexion->prepare("UPDATE profils SET libelle=:libelle WHERE id=:id");
    $sql->bindParam(':libelle',$libelle);
    $sql->bindParam(':id',$id);
    $profil=$sql->execute();
    // var_dump($profil);
    if ($profil){
        // header('location: liste.php');
    }else {
        echo "echec";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="" method="POST">
        <div>
            <label for="">Id</label>
            <input type="text" name="id" value="<?php echo $profil['id']; ?>">
        </div>
        <div>
            <label for="">libelle</label>
            <input type="text" name="libelle" value="<?php echo $profil['libelle']; ?>">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>