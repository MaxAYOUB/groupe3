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
          <h2>Details du compte</h2>
          <h3 data-toggle="modal" data-target="#myModal">Changer d'avatar</h3>
          <h3 data-toggle="modal" data-target="#myModal1">Modifier le mot de passe</h3>
          <h3 data-toggle="modal" data-target="#myModal2">Modifier email</h3>
          <h3 data-toggle="modal" data-target="">Autres</h3>
         
            




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
                            <div><img src="images\logo.png" alt=""></div>
                      
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
                    <input type="text" id="fname" name="firstname" placeholder="************">
                </div>
                <div class="modal-body">
                    <p>Nouveau mot de passe</p>
                     <input type="text" id="fname1" name="firstname" placeholder="************">
                </div>
                <div class="modal-body">
                        <p>confimation mot de passe</p>
                         <input type="text" id="fname2" name="firstname" placeholder="************">
                    </div>
                
                
                
                
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">valider</button>
                </div>
              </div>
              
            </div>
          </div>





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
                      <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                      <button type="button" class="btn btn-default" data-dismiss="modal">valider</button>
                    </div>
                  </div>
                  
                </div>
              </div>  

          
        </div>