<?php
 try {
   $base = new PDO('mysql:host=172.28.100.121;port=3306;dbname=tchat','azad','886622');
 } catch (\Exception $e) {
   die('Erreur : ' . $e->getMessage());
 }
?>
