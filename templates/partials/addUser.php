    <h1 id="h1Add" class="col-lg-offset-1">Ajout utilisateur</h1>
    <br>
    <form class="form-horizontal">

        <div class="form-group">
            <label for="select" class="col-sm-3 control-label">Civilité</label>
            <div class="col-sm-9">
                <select id="Civilite" class="form-control">
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
                <input type="text" class="form-control" name="codepostal" id="codePostal"
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

        <div class="form-group">
            <label for="inlineRadio1" class="col-sm-3 control-label">Type mobile</label>
            <div class="col-sm-9">
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="appareil" id="InlineRadio1" value="Android"> Android
                </label>
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="appareil" id="InlineRadio2" value="iOS"> iOS
                </label>
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="appareil" id="InlineRadio3" value="Windows"> Windows
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="tel" class="col-sm-3 control-label">Téléphone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tel" id="telephone"
                       placeholder="Entrer votre téléphone">
            </div>
        </div>


        <div class="form-group">
            <label for="pseudo" class="col-sm-3 control-label">Pseudonyme</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pseudo" id="pseudo"
                       placeholder="Entrer votre pseudo"
                       value=""/>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-sm-3 control-label">Mot de passe</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="motdepasse"
                       placeholder="Entrer votre mot de passe">
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword2" class="col-sm-3 control-label">Confirmation</label>
            <div class="col-sm-9">
                <input type="password" class="form-control" id="confirmationmotdepasse"
                       placeholder="Confirmer votre mot de passe">
            </div>
        </div>

        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-3 control-label">Avatar</label>
            <div class="col-sm-9">
               <!-- bouton choisir avatars -->
                <input type="button" value="Choisir avatar" id="ExampleInputFile" data-toggle="modal" data-target="#myModal" name="avatar">
                <div><p id="TextAvatar">Avatar obligatoire</p></div>
            </div>
        </div>

        <br>
        <br>

        <button id="btn2" type="reset" class="btn btn-default col-sm-3 col-sm-offset-3">Annuler</button>
        <button id="BoutonFormulaire" type="button" class="btn btn-success col-sm-3" style="float: right">Ajouter
        </button>

    </form>

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
                    // var_dump($_SESSION['listeAvatar']);
                        $avatar = ($_SESSION['listeAvatar']);
                        for ($i = 0; $i < count($avatar); $i++) {
                            $slug = $avatar[$i]['slug_avatar'];
                            var_dump($slug);
                            echo "<img name='avatar' id='admin{$slug}' onclick='enrgAvatarAjoutAvatar(\'{$slug}\')' style='cursor:pointer; margin:3px' src='{$avatar[$i]['avatar']}' </br>";
                        }
                    ?>
                    <!-- Fin de la boucle Php -->

                </div>
                <script src="javaScript/jsAjoutAdmin.js"></script>
                <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annulez</button>
                  <button type="button" class="btn btn-default" data-dismiss="modal">Valider</button>
                </div>
              </div>
              
            </div>
</div>


          