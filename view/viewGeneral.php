<?php
class viewGeneral
{

    public function afficherAccueil()
    {
        $page = "accueilNew.php";
        include "templates/default.php";
    }

    public function afficherForm($database)
    {
        $page = "inscription.php";
        include "templates/default.php";
    }

    public function afficherFormOk()
    {
        $page = "ok.php";
        include "templates/default.php";
    }

    public function afficherFormNotOk($tab)
    {
        $page = "notok.php";
        include "templates/default.php";
    }

    public function afficherConnexionOk()
    {
        $page = "accueilNew.php";
        include "templates/default.php";
    }

    public function afficherConnexionNotOk($tab)
    {
        $page = "notok.php";
        include "templates/default.php";
    }

    public function afficherConnection()
    {
        $page = "identification.php";
        include "templates/default.php";
    }

// Ajout par Jade et Carl
    public function afficherCompte()
    {
        $page = "templateMonCompte.php";
        include "templates/default.php";
    }
    public function afficherParametre()
    {
        $page = "contenueParametreUser.php";
        include "templates/default.php";
    }
    public function afficherListe()
    {
        $page = "ongletListe.php";
        include "templates/default.php";
    }
    public function afficherGalerie()
    {
        $page = "galerieAvatars.php";
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
