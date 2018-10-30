<style>
        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        </style>
        <div class="container">
<?php 
if ($passe=="passe"){
  echo "<h1>Vos changements ont été effectués</h1>";
}else if ($passe=="PasPasse"){
  echo "<h1>Vos changements n'ont pas pu être effectués</h1>";
}else{
  echo "";
} ?>
<div id="divCompteAvatar" class="col-xs-5 col-sm-4 col-md-4 col-lg-3">
      <img id="compteAvatar" class="col-xs-6 col-sm-offset-3 col-sm-5 col-md-offset-5 col-md-4 col-lg-7 col-lg-offset-5"
           src="<?php  echo ($_SESSION['avatar']); ?>">
  </div>

<div  class=" col-xs-7 col-sm-6 col-md-6 col-lg-8">
      <h1 id ="nomID"><?php echo ($_SESSION['nom']);echo " ".($_SESSION['prenom']);?></h1>
      <h3 id ="pseudoID"><?php echo ($_SESSION['pseudo']);?></h3>
  </div>
</div>

<div id="divMoncompte" class="container-fluid" style="margin: 5% 5% 0 5%; background-color: #f2f2f2">

          <h1>Paramètres</h1>
          <h2>Details du compte</h2>

          <table style="font-size: 23px"><ul ><tr><td><li style="cursor: pointer;" data-toggle="modal" data-target="#myModal">Changer d'avatar</li></td></tr>
          <tr><td><li style="cursor: pointer;" data-toggle="modal" data-target="#myModal1">Modifier le mot de passe</li></td></tr>
          <tr><td><li style="cursor: pointer;" data-toggle="modal" data-target="">Autres</li></td></tr></ul></table>

          <!-- Modal avatar -->
          <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Changer d'avatar</h4>
                    </div>

                    <div class="modal-body">
                            <div><img src="<?php echo $_SESSION['avatar']?>" alt=""></div>
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#myModalgalerie">Voir la galerie</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">valider</button>
                    </div>
                  </div>

                </div>
              </div>

          <!-- Modal mot de passe-->
          <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">

              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modifier le mot de passe</h4>
                </div>

                <div class="modal-body">
                  <p>Ancien mot de passe</p>
                    <input type="text" id="motdepasse" name="motdepasse" placeholder="************">
                </div>
                <div class="modal-body">
                    <p>Nouveau mot de passe</p>
                     <input type="text" id="motdepasse1" name="motdepasse1" placeholder="************">
                </div>
                <div class="modal-body">
                        <p>confimation mot de passe</p>
                         <input type="text" id="motdepasse2" name="motdepasse2" placeholder="************">
                    </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal" id="validerPassword">valider</button>
                </div>
              </div>

            </div>
          </div>
          <script src="javaScript/jsPassword.js"></script>

                   <!-- Modal mail-->
                   <div class="modal fade" id="myModal2" role="dialog">
                        <div class="modal-dialog">

                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Modifier email</h4>
                            </div>

                            <div class="modal-body">
                              <p>adresse email actuelle</p>
                              <p>adresse@actuelle.com</p>

                            </div>

                            <div class="modal-body">
                                    <p>Nouvelle adresse email</p>
                                     <input type="text" id="fname5" name="firstname" placeholder="************">
                                </div>

                            <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Modifier email</button>
                            </div>
                          </div>

                        </div>
                      </div>

                      <!-- Modal galerie avatar -->
              <div class="modal fade" id="myModalgalerie" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">

                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Galerie d'avatars</h4>
                    </div>

                    <div class="modal-body" style="padding-left:10%;">
                     <!-- Boucle Php qui récupère les avatars dans la BDD locale -->
                     <?php
                      $avatar = ($_SESSION['listeAvatar']);
                      for ($i = 0; $i < count($avatar); $i++) {
                        echo "<img style='cursor:pointer' style='cursor:pointer; margin:3px ' id=\"{$avatar[$i]['slug_avatar']}\" onclick='modifAvatar(\"{$avatar[$i]['slug_avatar']}\")' src='{$avatar[$i]['avatar']}'</br>";
                      }
                    ?>
                    <!-- Fin de la boucle Php -->
                    </div>

                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">Valider</button>
                    </div>
                  </div>

                </div>
              </div>
              <script src="javaScript/modifierAvatar.js"></script>
</div>
