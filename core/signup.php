<?php
  try {
        $nom=$_POST['username'];
        $pwd=$_POST['password'];
        $requet="INSERT INTO `USERS` (username,password) VALUES ('$nom','$pwd')";
        $reponse = $base->exec($requet);
      } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
   }
 ?>