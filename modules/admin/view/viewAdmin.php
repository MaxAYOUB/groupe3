<?php
class viewAdmin
{

    public function __construct()
    {

    }

    
    public function afficherConsoleAdmin()
    {

    }

    public function afficherCompteOk()
    {
        echo ('compte ok');
        /// include "templates/default.php";
    }
    public function afficherCompteNotOk($data)
    {
        echo ('compte notok');
        /// include "templates/default.php";
    }

    public function afficherRazOk()
    {
        echo ('ok');
        /// include "templates/default.php";
    }
    public function afficherRazNotOk($data)
    {
        echo ('notok');
        /// include "templates/default.php";
    }
    
    public function afficherListeOk($data)
    {
        echo ('affiche liste ok');
        /// include "templates/default.php";
    }
    public function afficherListeNotOk()
    {
        echo ('affiche liste notok');
        /// include "templates/default.php";
    }

    public function afficherAvatarOk()
    {
        echo ('avatar ok');
        /// include "templates/default.php";
    }
    public function afficherAvatarNotOk()
    {
        echo ('avatar not ok');
        /// include "templates/default.php";
    }
}
