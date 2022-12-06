<?php
require_once('../config.php');
// preparation de la requête
$sql = $dbConnexion->prepare('select * from categories');
// Execution de la requête
$sql->execute();
// On stocke le résultat dans un tableau associatif
$resultat = $sql->fetchAll(PDO::FETCH_ASSOC);
// var_dump($resultat);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>categorie</title>
</head>

<body>
    <table>
        <thead>
            <th>id</th>
            <th>libelle</th>
            <th colspan="2">Action</th>
        </thead>
        <?php foreach ($resultat as $categorie) {
        ?>
            <tbody>
                <tr>
                    <td><?php echo $categorie["id"]; ?></td>
                    <td><?php echo $categorie["libelle"]; ?></td>
                    <td><a href="delete.php?id=<?= $categorie["id"]; ?> ">Delete</a></td>
                    <td><a href="modifyCategorie.php?id=<?php echo $categorie["id"]; ?>">Editer</a></td>
                </tr>
            <?php } ?>
            </tbody>
    </table>
</body>

</html>