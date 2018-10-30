<div class="container">

    <div id="divCompteAvatar" class="col-xs-5 col-sm-4 col-md-4 col-lg-3">
      <img id="compteAvatar" class="col-xs-6 col-sm-offset-3 col-sm-5 col-md-offset-5 col-md-4 col-lg-7 col-lg-offset-5"
           src="<?php  echo ($_SESSION['avatar']); ?>">
  </div>

<div  class=" col-xs-7 col-sm-6 col-md-6 col-lg-8">
      <h1 id ="nomID"><?php echo ($_SESSION['nom']);echo " ".($_SESSION['prenom']);?></h1>
      <h3 id ="pseudoID"><?php echo ($_SESSION['pseudo']);?></h3>
  </div>
</div>

<div class="container-fluid" style="margin: 5% 20% 0 20%; background-color: #f2f2f2">
    <div class="tab-content">
        <div id="menu0" class="tab-pane fade in active">
            <h1>Profil</h1>
            <br>
            <h2>Dernières activités</h2>
            <br>
            <ul style="font-size: 23px">
                <li>Lieux visités</li>
                <li>RDV</li>
                <li>Avatars utilisés</li>
                <li>Dernières actions réalisées dans paramètres</li>
                <li>......</li>
                <li>......</li>
                <li>......</li>
                <li>......</li>
                <li>......</li>
                <li>......</li>
            </ul>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>PARAMETRES</h3>
            <p>Some content in menu 1.</p>
        </div>
        <div id="menu2" class="tab-pane fade">
            <?php include "templates/partials/ongletListe.php"; ?>
        </div>
        <div id="menu3" class="tab-pane fade">
            <?php include "templates/partials/galerieAvatars.php"; ?>
        </div>
    </div>
</div>