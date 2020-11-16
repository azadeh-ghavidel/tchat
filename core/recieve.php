<?php

  try {
        $requet="SELECT * FROM `message`";
        $reponse = $base->query($requet);
        $msg_list = $reponse->fetchAll(PDO::FETCH_ASSOC);
        $json_str = json_encode($msg_list);
        echo $json_str;
      } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
   }
 ?>

