<?php

  session_start();
  if (isset($_POST['login'])) {
    $_SESSION['user']=$_POST['username'];
  }

  require("./BD/bd.php");

  #dir_core est address dans la quelle j'ai mis toutes mes pages (.php)
  $dir_core = './core/';
  #création d'une variable page pour suivre mes pages dans le fichier trader_co>
  $page = $_GET['page'];
  #va chercher dans le fichier core et prend le nom de chaque page avec GET[pag>
  #et téléchargé la.
  include_once('./core/'.$page.".php");
?>
