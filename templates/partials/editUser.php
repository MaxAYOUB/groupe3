    <h1 id="h1Add" class="col-lg-offset-1">Modifier utilisateur</h1>
    <br>
    <form class="form-horizontal">

        <div class="form-group">
            <label for="select" class="col-sm-3 control-label">Civilité</label>
            <div class="col-sm-9">
                <select id="select" class="form-control">
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
                       placeholder="Email de l'utilisateur - Non modifiable" disabled>
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
                <input type="text" class="form-control" name="codepostal" id="codepostal"
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
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio1" value="Android"> Android
                </label>
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio2" value="iOS"> iOS
                </label>
                <label class="radio-inline col-sm-3">
                    <input type="radio" name="inlineRadioOptions" id="inlineRadio3" value="Windows"> Windows
                </label>
            </div>
        </div>

        <div class="form-group">
            <label for="tel" class="col-sm-3 control-label">Téléphone</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="tel" id="tel"
                       placeholder="Entrer votre téléphone">
            </div>
        </div>


        <div class="form-group">
            <label for="pseudo" class="col-sm-3 control-label">Pseudonyme</label>
            <div class="col-sm-9">
                <input type="text" class="form-control" name="pseudo" id="pseudo"
                       placeholder="Pseudo de l'utilisateur - Non modifiable"
                       value=""/ disabled>
            </div>
        </div>

        <div class="form-group">
            <label for="inputPassword" class="col-xs-12 col-sm-3 control-label">Mot de passe</label>
            <div class="col-xs-10 col-sm-7">
                <input type="password" class="form-control" id="inputPassword"
                       placeholder="Entrer votre mot de passe">
            </div>
            <button type="button" class="btn btn-default col-xs-1 col-sm-1" style="width: 14%">Edit</button>
        </div>


        <div class="form-group">
            <label for="exampleInputFile" class="col-sm-3 control-label">Avatar</label>
            <div class="col-sm-9">
                <input type="file" id="exampleInputFile">
            </div>
        </div>

        <br>
        <br>

        <button id="btn2" type="reset" class="btn btn-default col-sm-3 col-sm-offset-3">Annuler</button>
        <button id="btn1" type="submit" class="btn btn-success col-sm-3" style="float: right">Ajouter</button>

    </form>
