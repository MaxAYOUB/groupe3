<?php
/*
 *   @T.Noël @M.Ayoub
 *   Construction de la classe ModelGeneral
 */

class modelGeneral
{
    private $DAO; // Création d'une variable DAO

 
    public function __construct()
    {
        $this->DAO = new DAO_mysql(); // Instanciation d'un objet DAO
    }

    /**********************************************
     ** RECUPERATION DES AVATARS ET DE L'APPAREIL **
     ***********************************************/

    // Fonction renvoyant les avatars dans le formulaire
    public function getAvatar()
    {
        $this->DAO->bddConnexion(); // Connexion à la base
        $sql = "SELECT * FROM avatar"; // Requete pour récupérer les avatars dans la BDD
        $resultAvatar = $this->DAO->bddQuery($sql); // Renvoi le résultat de la requête dans une variable result
        return $resultAvatar;
    }

    // Fonction renvoyant le système de l'appareil dans le formulaire
    public function getAppareil()
    {
        $this->DAO->bddConnexion(); // Connexion à la base
        $sql = "SELECT * FROM appareil"; // Requete pour récupérer les systèmes dans la BDD
        $resultAppareil = $this->DAO->bddQuery($sql); // Renvoi le résultat de la requête dans une variable result
        return $resultAppareil;
    }

    /*****************
     ** SQL REQUETES **
     *****************/

    public function enregistrerFormulaire($data)
    {
        $this->DAO->bddConnexion(); // Connexion à la base
        // Requete pour l'insertion d'une nouvelle adresse
        $sql = "INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (NULL,'{$data->getAdresse()}','{$data->getVille()}','{$data->getCodepostal()}');
        $result = $this->DAO->bddQuery($sql);";

        // Mise en place des clés de cryptage
        $cle = md5("Notre application".$data->getEmail(),$row_output=FALSE);
        $cleMDP = md5("Notre application".$data->getMotdepasse(),$row_output=FALSE);
        var_dump($cle);
        
        // Requete pour l'insertion d'un nouvel utilisateur
        $sql = "INSERT INTO `user`(`id_user`, `civilite`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `email`, `cles`, `supprime`, `admin`, `id_adresse`, `id_avatar`, `id_appareil`) 
        VALUES (NULL,'{$data->getCivilite()}','{$data->getNom()}','{$data->getPrenom()}','{$data->getPseudo()}','{$cleMDP}','{$data->getEmail()}','{$cle}','0',FALSE,(SELECT `id_adresse` FROM `adresse` WHERE `adresse` = '{$data->getPrenom()}' AND `CP` = '{$data->getCodepostal()}'),
                (SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar` = '{$data->getAvatar()}'),
                (SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil` = '{$data->getAppareil()}'));";
        // Renvoi les informations demandées dans une variable result
        $result = $this->DAO->bddQuery($sql);
        return $result;
    }

 /*    public function updateCompte()
    {
        $this->DAO->bddConnexion(); // Connexion à la base
        // Requete à construire
        $sql = "";
        $result = $this->DAO->bddQuery($sql);   // Renvoi les informations demandées dans une variable result
        return $result;
    }

    public function authentification()
    {
        $this->DAO->bddConnexion(); // Connexion à la base
        // Requete à construire
        $sql = "";
        $result = $this->DAO->bddQuery($sql);   // Renvoi les informations d'authentification dans une variable result
        return $result;
    } */
}
