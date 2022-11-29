<?php
   //Nous avons besoins de trois chose pour se connecter à la database avec PDO
   $servername="localhost";
   $username="root";
   $password="";
   try {
       //ici nous allons instancier la classe pdo
       $dbConnexion = new PDO("mysql:host=$servername;dbname=gestionprodui",$username,$password);
       //Capture
      $dbConnexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
       //ATTR_ERRMODE cree un rapport d'errur
    //    ERRMODE_EXCEPTION emet une execption
      $sql=$dbConnexion->prepare(" select * from profils");
    //   $sql->execute();
    //     $frofils=$sql->fetchAll();
        // var_dump($frofils);
    //  echo "Connexion reussie";
   } catch (PDOException $e) {
       echo $e->getMessage();
   }
   //Pour fermer la connexion on a
   // $dbConnexion=null;
   // var_dump($dbConnexion);

?>