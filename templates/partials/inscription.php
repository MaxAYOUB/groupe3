
<div class="container" style="background-color: #f2f2f2">

<h1 id="h1Inscription" class="col-sm-offset-1">INSCRIPTION</h1>

    <form class="form-horizontal" method="POST" action="">
    <!-- <form class="form-horizontal" method="POST" action="ctrlGeneral/enregForm"> -->
<div id="divInscription1" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">


        <div class="form-group">
            <label for="select" class="col-sm-3 control-label">Civilité</label>
            <div class="col-sm-9">
                <select id="Civilite" class="form-control" name="civilite">
                    <option>Monsieur</option>
                    <option>Madame</option>
                    <option>Mademoiselle</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label for="nom" class="col-sm-3 control-label">Nom</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="nom" id="Nom" placeholder="Entrer votre nom"
                       />
            </div>
        </div>
        <div class="form-group">
            <label for="prenom" class="col-sm-3 control-label">Prénom</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="prenom" id="Prenom"
                       placeholder="Entrer votre prénom">
            </div>
        </div>

        <div class="form-group">
            <label for="email" class="col-sm-3 control-label">Email</label>
            <div class="col-sm-9">
                <input type="email" class="form-control" name="email" id="Email"
                       placeholder="Entrer votre email">
            </div>
        </div>

        <div class="form-group">
            <label for="adresse" class="col-sm-3 control-label">Adresse</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="adresse" id="Adresse"
                       placeholder="Entrer votre adresse (facultatif)">
            </div>
        </div>

        <div class="form-group">
            <label for="codepostal" class="col-sm-3 control-label">Code Postal</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="codePostal" id="CodePostal"
                       placeholder="Entrer votre code postal (facultatif)">
            </div>
        </div>

        <div class="form-group">
            <label for="ville" class="col-sm-3 control-label">Ville</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="ville" id="Ville"
                       placeholder="Entrer votre ville (facultatif)">
            </div>
        </div>
    <!-- </form> -->

</div>

<div id="divInscription2" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

    <!-- <form class="form-horizontal"> -->

        <div class="form-group">
            <label name="labelRadio" for="inlineRadio1" class="col-sm-3 control-label">Type mobile</label>
            <div class="col-sm-9">
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="appareil" id="inlineRadio1" value="Android" checked> Android
                </label>
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="appareil" id="inlineRadio2" value="iOS"> iOS
                </label>
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="appareil" id="inlineRadio3" value="Windows"> Windows
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="tel" class="col-sm-3 control-label">Téléphone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="telephone" id="Telephone"
                       placeholder="Entrer votre téléphone">
            </div>
        </div>


        <div class="form-group">
            <label for="pseudo" class="col-sm-3 control-label">Pseudonyme</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pseudo" id="Pseudo" placeholder="Entrer votre pseudo"
                       value=""/>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-sm-3 control-label">Mot de passe</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="Motdepasse" name="motdepasse"
                       placeholder="Entrer votre mot de passe">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword2" class="col-sm-3 control-label">Confirmation</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="Confirmationmotdepasse"
                       placeholder="Confirmer votre mot de passe">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-3 control-label">Avatar</label>
            <div class="col-sm-9">
               <!-- bouton choisir avatars -->
                <input type="button" value="Choisir avatar" id="exampleInputFile" data-toggle="modal" data-target="#myModal" name="avatar">
                <div><p id="textAvatar">Avatar obligatoire</p></div>
            </div>
        </div>
                <!-- pop up choisir avatars -->
                
      <!-- Modal avatar -->
      <div class="modal fade" id="myModal" role="dialog">
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
                        $avatar = ($database['avatar']);
                        for ($i = 0; $i < count($avatar); $i++) {
                            $slug = $avatar[$i]['slug_avatar'];
                            // var_dump($slug);
                            echo "<img name='avatar' id='{$slug}' onclick='enrgAvatar(\"{$slug}\")'style='cursor:pointer; margin:3px ' src='{$avatar[$i]['avatar']}'</br>";
                        }
                    ?>
                    <!-- Fin de la boucle Php -->

                </div>
                
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annulez</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Valider</button>
                </div>
              </div>
              
            </div>
          </div>



          

        <div class="form-group">
            <div class="col-sm-offset-3 col-sm-9">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" id ="ConditionsGenerales" > <label id="labelCG" for="ConditionsGenerales" >J'accepte les conditions générales d'utilisation.</label>
                    </label>
                </div>
            </div>
        </div>

        <br>
        <br>

        <button id="btn2" type="reset" class="btn btn-default col-sm-3 col-sm-offset-3">Annuler</button>
        <button id="boutonFormulaire" type="button" class="btn btn-success col-sm-3" style="float: right">Valider</button>
        <!-- <button type="submit" class="btn btn-success col-sm-3" style="float: right">Valider</button> -->
</div>

    </form>
</div>



      <!--pop up  Modal Succes -->
      <div class="modal fade" id="confirmation" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                      
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Succès</h4>
                    </div>
                    
                    <div class="modal-body">
                            <p>Votre compte a été bien crée.</p>
                              
                          </div>
                    
                    <div class="modal-footer">
                     
                      <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                  </div>
                  
                </div>
              </div>  


              
      <!--pop up Modal Erreur -->
      <div class="modal fade" id="confirmation" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                    <div class="modal-header">
                      
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Erreur</h4>
                    </div>
                    
                    <div class="modal-body">
                            <p>Raison de l'erreur.</p>
                              
                          </div>
                    
                    <div class="modal-footer">
                     
                      <button type="button" class="btn btn-default" data-dismiss="modal">OK</button>
                    </div>
                  </div>
                  
                </div>
              </div>
              <script src="javaScript/jsFormulaire.js"></script>