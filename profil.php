<?php
require_once('config.php');
// if(!empty($_POST['libelle'])){
//     var_dump($_POST['libelle']);
// }else{
//     echo "Le champ est obligatoire";
// }


if(!empty($_POST['libelle'])){
    extract($_POST);
    // var_dump($_POST['libelle']);
    $sql=$dbConnexion->prepare("insert into profils(libelle) values(?)");
    $sql->bindParam(1,$libelle);
    $sql->execute();
    if($sql){
        // Si l'insertion reussie il nous redirige vers la page liste.php
        header('location: liste.php');
        echo "Insertion reussie";
    }else{
        echo "Echec d'insertion";
    }
}else{
    echo "Le champ est obligatoire";
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
            <label for="">libelle</label>
            <input type="text" name="libelle" value="">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>