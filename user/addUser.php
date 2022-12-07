<?php
require_once('../config.php');
if (!empty($_POST)) {
    // var_dump($_POST);
    extract($_POST);
    $sql = $dbConnexion->prepare('INSERT INTO users(nom,prenom,adresse,date_de_naissance,telephone,profil_id,mail,mot_de_passe) VALUES((?),(?),(?),(?),(?),(?),(?),(?))');
    $sql->bindParam(1, $nom);
    $sql->bindParam(2, $prenom);
    $sql->bindParam(3, $adresse);
    $sql->bindParam(4, $date_de_naissance);
    $sql->bindParam(5, $telephone);
    $sql->bindParam(6, $profil_id);
    $sql->bindParam(7, $mail);
    $sql->bindParam(8, $mot_de_passe);
    $userProfile = $sql->execute();
    // var_dump($userProfile);
} else {
    echo "Le champ est vide";
}

// Recuperation de la liste des profils
$sql = $dbConnexion->prepare('select * from profils');
$sql->execute();
// var_dump($sql->fetchAll());
$profils = $sql->fetchAll(PDO::FETCH_ASSOC);
// var_dump($profils);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter d'utilisateur</title>
</head>

<body>
    <form action="" method="POST">
        <div><label for="nom">Nom</label>
            <input type="text" name="nom" value="">
        </div>
        <div>
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" value="">
        </div>
        <div>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" value="">
        </div>
        <div>
            <label for="date_de_naissance">Date de naissance</label>
            <input type="date" name="date_de_naissance" value="">
        </div>
        <div>
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" value="">
        </div>
        <div>
            <label for="pet-select">Profil</label>

            <select name="profil_id" id="pet-select">
                <option value="">-- SVP choisir un profil--</option>
                <?php foreach ($profils as $profile) { ?>
                <option value="<?= $profile["id"]; ?>"><?= $profile["libelle"]; ?></option>
                <?php } ?>
            </select>
        </div>
        <div>
            <label for="mail">Mail</label>
            <input type="email" name="mail" value="">
        </div>
        <div>
            <label for="mot_de_passe">mot de passe</label>
            <input type="password" name="mot_de_passe" value="">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>