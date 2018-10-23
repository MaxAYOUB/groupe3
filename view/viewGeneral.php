<?php
class viewGeneral
{

    public function afficherAccueil(){
        $page="accueilNew.php";
        include "templates/default.php";
    }

    public function afficherForm($database)
    {
        $page="inscription.php";
        include "templates/default.php";
    }

    public function afficherFormOk()
    {
        $page="ok.php";
        include "templates/default.php";
    }

    public function afficherFormNotOk($tab)
    {
        $page="notok.php";
        include "templates/default.php";
    }

    public function afficherConnexionOk(){
        $page="ok.php";
        include "templates/default.php";
    }

    public function afficherConnexionNotOk($tab){
        $page="notok.php";
        include "templates/default.php";
    }

    public function afficherConnection(){
        $page="identification.php";
        include "templates/default.php";
    }

}
