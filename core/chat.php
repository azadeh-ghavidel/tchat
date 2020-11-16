<body>
    <div class='all'>
        <h1>Bienvenue sur Chat en Ligne <?php echo $_SESSION['user']; ?></h1>
        <div class="msgtext" id="msg">
        </div>
          <input type="text" name="msg" placeholder="Votre Message..." id="mesg">
          <button type="submit" name="envoyer" onclick="sendmsg()">Envoyer</button>
          <a href="index.php?page=logout" id ="logout">Sortir</a>
    </div>
    <script>
    // Création d'une fonctionne à fin de récuperer les messages depuis la base de données
    function getmsg(){
      var xhr = new XMLHttpRequest();
      xhr.open('GET','index.php?page=recieve',false);
      xhr.send(null);
      //Lire la reponseText avec le format JSON
      var response = JSON.parse(xhr.responseText);
      var chat = '';
      for (var i = 0; i < response.length; i++) {
        chat+='<div id="inside"><span id="ch">'+response[i].name+'</span>'+response[i].message+'</div>';
        }
      document.getElementById("msg").innerHTML = chat;
      //Ici j'ai créé un variable elem pour contrôler la barre de défilement dans la partie de messages
      var elem = document.getElementById('msg');
      elem.scrollTop = elem.scrollHeight;
      }
      // J'ai appellé ma fonctionne getmsg() pour récuperation les messages qu'ils existent déjà dans ma base de données
      getmsg();
      // J'ai fixé un intervale de 2 secondes, pour ma fonctionne getmsg à fin de vérifier et récuperer les nouveaux messages
      setInterval(getmsg,2000);

      //Création d'une fonction pour envoyer un message à fichier send.php àfin d'insertion le message dans la base de données
      function sendmsg(){
        var message =document.getElementById("mesg").value;
        var sendxhr = new XMLHttpRequest();
        sendxhr.open('POST','index.php?page=send',true);
        sendxhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        sendxhr.addEventListener('readystatechange',function(){
        if (sendxhr.readyState === XMLHttpRequest.DONE){
          document.getElementById("mesg").value = "";
        }
      });
        sendxhr.send('message='+message);
    }



        </script>
    </body>

    </html>
