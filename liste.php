<?php
require_once('config.php');
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
    <title>liste</title>
</head>

<body>
    <div>
        <h1>Listes des profils</h1>
        <table>
            <thead>
                <th>Id</th>
                <th>Libelle</th>
                <th colspan="2">Action</th>
            </thead>
            <tbody>
                <?php foreach ($profils as $value) { ?>
                    <tr>
                        <td><?php echo $value['id']; ?></td>
                        <td><?php echo $value['libelle']; ?></td>
                        <td><a onclick="return confirm('Vous voulez vraiment supprimer ?')" href="deleteprofile.php?id=<?php echo $value['id']; ?>">Supprimer</a></td>
                        <td><a href="editProfil.php?id=<?php echo $value['id']; ?>">Modifier</a></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>

</html>