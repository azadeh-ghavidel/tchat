<?php
  try {
        $nom=$_SESSION['user'];
        $msg=$_POST['message'];
        $requet="INSERT INTO `message` (name, message) VALUES ('$nom', '$msg')";
        $reponse = $base->exec($requet);
      } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
   }
 ?>
