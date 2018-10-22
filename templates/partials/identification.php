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
          <p data-toggle="modal" data-target="#myModal1" style="text-align: center;">Identifiant ou mot de passe oublié</p>
        </div>
      </form>
      
      
      
      <div class="modal fade" id="myModal1" role="dialog">
            <div class="modal-dialog">
            
              <!-- Modal content-->
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Modifier le mot de passe ou identifiant</h4>
                </div>
                
                <div class="modal-body">
                  <p>Entrez l'adresse courriel associée à votre compte pour recevoir les instructions de réinitialisation de votre mot de passe.</p>
                    <input type="text" id="fname" name="firstname" placeholder="Email">
                </div>
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                  <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#confirmation">valider</button>
                </div>
              </div>
              
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