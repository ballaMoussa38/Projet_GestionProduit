<?php
require_once('../config.php');
if (!empty($_GET)){
    extract($_GET);
    // var_dump($_GET);
    $sql= $dbConnexion->prepare("SELECT * FROM users WHERE id=$id");
    $sql->execute();
    $selectUser = $sql->fetch();
    // var_dump($selectUser);

    // Recuperation de la liste des profils
    $sql = $dbConnexion->prepare('select * from profils');
    $sql->execute();
    // var_dump($sql->fetchAll());
    $profils = $sql->fetchAll(PDO::FETCH_ASSOC);
// var_dump($profils);


}

if (!empty($_POST)){
    extract($_POST);
    // var_dump($_POST);
    $sql=$dbConnexion->prepare(" UPDATE users SET nom=:nom, prenom=:prenom, adresse=:adresse, date_de_naissance=:date_de_naissance, telephone=:telephone, profil_id=:profil_id, mail=:mail, mot_de_passe=:mot_de_passe WHERE id=:id ");
    $sql->bindParam(':nom', $nom);
    $sql->bindParam(':prenom', $prenom);
    $sql->bindParam(':adresse', $adresse);
    $sql->bindParam(':date_de_naissance', $date_de_naissance);
    $sql->bindParam(':telephone', $telephone);
    $sql->bindParam(':profil_id', $profil_id);
    $sql->bindParam(':mail', $mail);
    $sql->bindParam(':mot_de_passe', $mot_de_passe);
    $sql->bindParam(':id', $id);
    $newUpdateLibelle=$sql->execute();
    var_dump($newUpdateLibelle);
    if ($newUpdateLibelle) {
        header('location: liste.php');
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
    <title>Ajouter d'utilisateur</title>
</head>

<body>
    <form action="" method="POST">
        <div><label for="nom">Nom</label>
            <input type="text" name="nom" value="<?= $selectUser["nom"] ?>">
        </div>
        <div>
            <label for="prenom">Prenom</label>
            <input type="text" name="prenom" value="<?= $selectUser["prenom"] ?>">
        </div>
        <div>
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" value="<?= $selectUser["adresse"] ?>">
        </div>
        <div>
            <label for="date_de_naissance">Date de naissance</label>
            <input type="date" name="date_de_naissance" value="<?= $selectUser["date_de_naissance"] ?>">
        </div>
        <div>
            <label for="telephone">Telephone</label>
            <input type="text" name="telephone" value="<?= $selectUser["telephone"] ?>">
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
            <input type="email" name="mail" value="<?= $selectUser["mail"] ?>">
        </div>
        <div>
            <label for="mot_de_passe">mot de passe</label>
            <input type="password" name="mot_de_passe" value="">
        </div>
        <button type="submit">Envoyer</button>
    </form>
</body>

</html>