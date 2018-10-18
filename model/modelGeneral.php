<?php
/*
 *   @T.Noël
 *   Construction de la classe ModelGeneral
 */

class ModelGeneral
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
        // Requete adresse
        $ql = "INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (NULL,'2 rue de la paix','Paris','75000');
        $result = $this->DAO->bddQuery($sql);";

        
        // Requete user
        $sql = "INSERT INTO `user`(`id_user`, `civilite`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `email`, `cles`, `supprime`, `admin`, `id_adresse`, `id_avatar`, `id_appareil`) 

        VALUES (NULL,'{$data->getCivilite()}','{$data->getNom()}','{$data->getPrenom()}','{$data->getPseudo()}','{$data->getMotDePasse()}','{$data->getEmail()}','123456789','0',FALSE,
                (SELECT `id_adresse` FROM `adresse` WHERE `adresse` = '2 rue de la paix' AND `CP` = '75000'),
                (SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar` = 'asterix'),
                (SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil` = 'samsung'));";


     /*    $sql = "INSERT INTO contact (id_contact, nom, prenom, telephone, email, message, id_civilite, id_objet)
                VALUES (NULL, '{$data->getNom()}', '{$data['prenom']}', '{$data['tel']}', '{$data['email']}', '{$data['message']}', '{$data['id_civilite']}', '{$data['id_objet']}');"; */
        // Renvoi les informations demandées dans une variable result
        $result = $this->DAO->bddQuery($sql);
        return $result;
    }

    public function updateCompte()
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
    }
}
