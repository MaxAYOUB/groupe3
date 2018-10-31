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

<!--Modifié par Babacar et Jade-->

<div class="container" style="background-color: #f2f2f2">
    <div class="container col-lg-7 col-lg-offset-2">

        <form class="form-horizontal" id="identification" style="padding:10%" action="" method="POST">
            <div class="form-group">
                <h1 style="text-align: center;">Connexion</h1>
                <br>
                <br>
                <label for="inputEmail3" class="col-sm-3 control-label">Identifiant</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="inputEmail3" name="identifiant" placeholder="Email ou pseudo">
                </div>
            </div>

            <div class="form-group">
                <label for="inputPassword3" class="col-sm-3 control-label">Mot de passe</label>
                <div class="col-sm-9">
                    <input type="password" class="form-control" id="inputPassword3" name="motdepasse"
                           placeholder="Mot de passe">
                </div>
            </div>

            <!-- <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Rester connecté
                        </label>
                    </div>
                </div>
            </div> -->

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <button type="button" id="Seconnecter" class="btn btn-default">Se connecter</button>
                </div>
                <br><br><br>
                <a data-toggle="modal" data-target="#myModal1" class="col-sm-offset-2 col-md-offset-5 col-lg-offset-5"
                   style="cursor: pointer;">Identifiant
                    ou mot de passe
                    oublié</a>
            </div>
        </form>
    </div>
</div>











<div class="modal fade" id="myModal1" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <form method="POST" action="ctrlGeneral/gererPassword">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Modifier le mot de passe ou l'identifiant</h4>
                </div>

                <div class="modal-body">
                    <p>Entrez l'adresse courriel associée à votre compte pour recevoir les instructions de réinitialisation
                        de votre mot de passe.</p>
                    <input type="text" id="fname" name="identifiant" placeholder="Email">
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-default" data-toggle="modal">valider
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>

<!-- Modal confirmation de demande -->
<div class="modal fade" id="confirmation" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Confirmation de demande</h4>
            </div>

            <div class="modal-body">
                <p>Un email vous a bien été envoyé pour repondre à votre demande.</p>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">valider</button>
            </div>
        </div>
    </div>
</div>
<script src="javaScript/verifierAuthentification.js"></script>
