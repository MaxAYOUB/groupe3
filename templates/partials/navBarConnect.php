<div id="nav">
        <div id= "navresp" class="navbar navbar-inverse navbar-fixed-top" data-spy="affix" data-offset-top="100">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style='padding: 0px 0px;' href="#"><img id ="logo" class="img-responsive logo" src="images/logo.png" alt=""></a>
              </div>
              <div id="navbar" class="collapse navbar-collapse">
                  <ul class="nav navbar-nav navbar-left" ><li id ="home" ><a href="">Home</a>
                  </li> </ul>
               
                <ul class="nav navbar-nav navbar-right" >
                 
                  <li ><a id = "icon" class="lien" href="#" style="padding: 0px;padding-top: 4px;padding-right: 10px;"  ><img src="images\androidicon.png "></a>
                  </li>
                   
                  <li><a id = "icon1" class="lien" href="#" style="padding: 0px;padding-top: 4px;padding-right: 10px; " ><img src="images\appleicon.png "></a>
                  </li>
                  <li><a  id = "inscrire" href="#">S'inscrire</a></li>
                    
                  <li ><a id = "connecter" href="#" >Se connecter</a></li>
                 
                    <li class="dropdown">
                      <a id="admin" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                      <?php if ($_SESSION['admin']==true){
                        echo "Admin";
                      }else{
                        echo "User";
                      }
                      
                      ?>
                          <span ><img src="images/avatar/avataricon.jpg "></span>
                        </a>
                      <ul  class="dropdown-menu" >
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Mon compte</a></li>
                        <li><a href="#">Paramètres</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="ctrlGeneral/getDeconnexion">Se déconnecter</a></li>
                      </ul>
                    </li>  
                </ul>
                
              </div>
             
            </div>
           
      </div>
    </div>