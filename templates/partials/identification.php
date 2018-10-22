<form class="form-horizontal ;" style="padding:10%;" action="index.php?c=ctrlGeneral&m=verifierAuthentification" method="POST">
        <div class="form-group">
          <h1 style="text-align: center;">Connexion</h1>
          <br>
          <br>
          <label for="inputEmail3" class="col-sm-2 control-label">Identifiant</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="inputEmail3" name="identifiant" placeholder="Email">
          </div>
        </div>
        <div class="form-group">
          <label for="inputPassword3" class="col-sm-2 control-label">Mot de passe</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword3" name="motdepasse" placeholder="Mot de passe">
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <div class="checkbox">
              <label>
                <input type="checkbox"> Restez connecter
              </label>
            </div>
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-default">Se connecter</button>
          </div>
        </div>
      </form>