<?php
require_once('../config.php');
$sql=$dbConnexion->prepare("SELECT * FROM users");
$resutal=$sql->execute();
$listUser=$sql->fetchAll(PDO::FETCH_ASSOC);
// var_dump($listUser);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Liste user</title>
</head>

<body>
    <div>
        <a href="addUser.php">Ajouter</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Prenom</th>
            <th scope="col">Adresse</th>
            <th scope="col">Date de naissance</th>
            <th scope="col">Telephone</th>
            <th scope="col">Mail</th>
            <th scope="col" colspan="2" >Action</th>
        </thead>
        <tbody>
            <?php foreach($listUser as $liste) { ?>
            <tr>
                <td><?= $liste["id"] ?></td>
                <td><?= $liste["prenom"] ?></td>
                <td><?= $liste["adresse"] ?></td>
                <td><?= $liste["date_de_naissance"] ?></td>
                <td><?= $liste["telephone"] ?></td>
                <td><?= $liste["mail"] ?></td>
                <td><a href="deleteUser.php?id=<?php echo $liste["id"]  ?>">Supprimer</a></td>
                <td><a href="modifyUser.php?id=<?php echo $liste["id"]  ?>">Modifier</a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>