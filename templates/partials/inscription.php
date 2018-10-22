<div class="container" style="background-color: #f2f2f2">

    <h1 id="h1Inscription" class="col-sm-offset-1">INSCRIPTION</h1>

        <form class="form-horizontal" method="POST" action="index.php?c=ctrlGeneral&m=enregForm">
    <div id="divInscription1" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">


            <div class="form-group">
                <label for="select" class="col-sm-3 control-label">Civilité</label>
                <div class="col-sm-9">
                    <select id="select" class="form-control" name="civilite">
                        <option>Monsieur</option>
                        <option>Madame</option>
                        <option>Mademoiselle</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="nom" class="col-sm-3 control-label">Nom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="nom" id="nom" placeholder="Entrer votre nom"
                           value=""/>
                </div>
            </div>
            <div class="form-group">
                <label for="prenom" class="col-sm-3 control-label">Prénom</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="prenom" id="prenom"
                           placeholder="Entrer votre prénom">
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-sm-3 control-label">Email</label>
                <div class="col-sm-9">
                    <input type="email" class="form-control" name="email" id="email"
                           placeholder="Entrer votre email">
                </div>
            </div>

            <div class="form-group">
                <label for="adresse" class="col-sm-3 control-label">Adresse</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="adresse" id="adresse"
                           placeholder="Entrer votre adresse (facultatif)">
                </div>
            </div>

            <div class="form-group">
                <label for="codepostal" class="col-sm-3 control-label">Code Postal</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="codePostal" id="codepostal"
                           placeholder="Entrer votre code postal (facultatif)">
                </div>
            </div>

            <div class="form-group">
                <label for="ville" class="col-sm-3 control-label">Ville</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="ville" id="ville"
                           placeholder="Entrer votre ville (facultatif)">
                </div>
            </div>
        <!-- </form> -->

    </div>

    <div id="divInscription2" class="col-xs-12 col-sm-12 col-md-6 col-lg-6">

        <!-- <form class="form-horizontal"> -->

            <div class="form-group">
                <label for="inlineRadio1" class="col-sm-3 control-label">Type mobile</label>
                <div class="col-sm-9">
                    <label class="radio-inline col-sm-3">
                        <input type="radio" name="appareil" id="inlineRadio1" value="samsung"> Android
                    </label>
                    <label class="radio-inline col-sm-3">
                        <input type="radio" name="appareil" id="inlineRadio2" value="apple"> iOS
                    </label>
                    <label class="radio-inline col-sm-3">
                        <input type="radio" name="appareil" id="inlineRadio3" value="huawei"> Autres
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label for="tel" class="col-sm-3 control-label">Telephone</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="telephone" id="tel"
                           placeholder="Entrer votre téléphone">
                </div>
            </div>


            <div class="form-group">
                <label for="pseudo" class="col-sm-3 control-label">Pseudo User</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Entrer votre pseudo"
                           value=""/>
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword" class="col-sm-3 control-label">Mot de passe</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword" name="motdepasse"
                           placeholder="Entrer votre mot de passe">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword2" class="col-sm-3 control-label">Confirmation</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword2"
                           placeholder="Confirmer votre mot de passe">
                </div>
            </div>

            <div class="form-group">
                <label for="exampleInputFile" class="col-sm-3 control-label">Avatar</label>
                <div class="col-sm-9">
                   <!-- bouton choisir avatars -->
                    <input type="button" value="Choisir avatar" id="exampleInputFile" data-toggle="modal" data-target="#myModal" name="avatar">
                    <div><p>Aucun fichier sélectionner</p></div>
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
                     
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">
                            <img  src="images\logo.png" alt="">

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
                            <input type="checkbox"> J'accepte les conditions générales d'utilisation.
                        </label>
                    </div>
                </div>
            </div>

            <br>
            <br>

            <button id="btn2" type="reset" class="btn btn-default col-sm-3 col-sm-offset-3">Annuler</button>
            <button id="btn1" type="submit" class="btn btn-success col-sm-3" style="float: right">Valider</button>

    </div>

        </form>
</div>