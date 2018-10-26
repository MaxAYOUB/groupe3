<?php
class viewGeneral
{

    public function afficherAccueil()
    {
        $_SESSION['page'] = "accueilNew.php";
        include "templates/default.php";
    }

    public function afficherForm($database)
    {
        $_SESSION['page'] = "inscription.php";
        include "templates/default.php";
    }

    public function afficherFormOk($data)
    {
        
        include "templates/partials/tabEnJSON.php";
    }

    public function afficherFormNotOk($tab)
    {
        
        include "templates/partials/tabEnJSON.php";
    }

    public function afficherConnexionOk($data)
    {
        
        include "templates/partials/tabEnJSON.php";
    }

    public function afficherConnexionNotOk($data)
    {
        
        include "templates/partials/tabEnJSON.php";
    }

    public function afficherConnection()
    {
        $_SESSION['page'] = "identification.php";
        include "templates/default.php";
    }

// Ajout par Jade et Carl
    public function afficherCompte()
    {
        $_SESSION['page'] = "templateMonCompte.php";
        include "templates/default.php";
    }
    public function afficherParametre()
    {
        $_SESSION['page'] = "contenueParametreUser.php";
        include "templates/default.php";
    }
    public function afficherListe()
    {
        $_SESSION['page']= "ongletListe.php";
        include "templates/default.php";
    }
    public function afficherGalerie()
    {
        $_SESSION['page']= "galerieAvatars.php";
        include "templates/default.php";
    }
    public function afficherAjoutUser()
    {
        include "templates/partials/addUser.php";
    }
    public function afficherEditUser()
    {
        include "templates/partials/editUser.php";
    }
// Fin d'ajout
}
