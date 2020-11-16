<?php
  if(isset($_POST['login']) and $_POST['username'] and $_POST['pwd']) {
    try {
        $uname = trim($_POST['username']);
        $pass = trim($_POST['pwd']);
        $query = "SELECT * FROM `USERS` WHERE username='$uname' AND password='$pass'";
        $reponse = $base->query($query);
        if($ligne = $reponse->fetch()){
            $_SESSION['user'] = $uname;
            header('location:index.php?page=chat');
        }
    } catch (PDOException $e) {
        echo "Error : ".$e->getMessage();
    }
}?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="./core/style.css">
</head>

<body>
  <div class='all'>
      <h1>Login</h1>
      <form action="" method="POST">
          <input type="text" name="username" placeholder="Nom d'Utilisateur" id="uname">
          <input type="password" name="pwd" placeholder="Mots de pass" id="pass">
          <button type="submit" name="login">Entrer</button>
          <button onclick="signup()">S'inscrire</button>
      </form>
  </div>
  <script>
      // Ici j'ai créé une fontionne pour pouvoir ajouter nouveaux utilisateur et mots de pass dans ma table USERS dans ma base de données en utilisant ajax
      function signup(){
          var uname =document.getElementById("uname").value;
          var pass=document.getElementById("pass").value;
          var data ="username="+uname+"&password="+pass;
          var signxhr = new XMLHttpRequest();
          signxhr.open('POST','index.php?page=signup',true);
          signxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
          signxhr.addEventListener('readystatechange',function(){
          if (signxhr.readyState === XMLHttpRequest.DONE){
           document.getElementById("uname").value = "";
           document.getElementById("pass").value = "";
          }
      });
      signxhr.send(data);
  }
  </script>
</body>

</html>

