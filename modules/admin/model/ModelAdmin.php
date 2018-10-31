<?php
class ModelAdmin
{
    private $dao;
    /// Constructeur
    public function __construct()
    {
        $this->dao = new DAO_mysql;
    }

    // Fonction pour ajouter un compte
    public function ajouterCompte($data)
    {
        $requeteAjoutAdresse = "INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (NULL,'{$data->getAdresse()}','{$data->getVille()}','{$data->getCodepostal()}')";
        $resultat = $this->dao->bddQuery($requeteAjoutAdresse);
        // Mise en place des clés de cryptage
        $cle = md5("Notre application" . $data->getEmail(), $row_output = false);
        $cleMDP = $data->getMotdepasse();
        // var_dump($cle);
        // Requete pour l'insertion d'un nouvel utilisateur
        $sql = "INSERT INTO `user`(`id_user`, `civilite`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `email`, `cles`, `supprime`, `admin`, `id_adresse`, `id_avatar`, `id_appareil`)
        VALUES (NULL,'{$data->getCivilite()}','{$data->getNom()}','{$data->getPrenom()}','{$data->getPseudo()}','{$cleMDP}','{$data->getEmail()}','{$cle}','0',FALSE,(SELECT `id_adresse` FROM `adresse` WHERE `adresse` = '{$data->getPrenom()}' AND `CP` = '{$data->getCodepostal()}'),
                (SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar` = '{$data->getAvatar()}'),
                (SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil` = '{$data->getAppareil()}'));";
        // Renvoi les informations demandées dans une variable result
        $result = $this->dao->bddQuery($sql);
        return $result;
    }

    // Fonction pour supprimer un utilisateur dans la base UPDATE
    public function supprimerCompte($obj)
    {
        $result = "";
        if ($obj->getTypetape() == "email") {
            $compte = "UPDATE `user` SET `supprime`='1' WHERE `email`='" . $obj->getIdentifiant() . "'";
            $this->dao->bddQuery($compte);
            $requete = "SELECT `supprime` FROM `user` WHERE `email`='" . $obj->getIdentifiant() . "'";
            $result = $this->dao->bddQuery($requete);
        } else {
            $compte = "UPDATE `user` SET `supprime`='1' WHERE `pseudo`='" . $obj->getIdentifiant() . "'";
            $this->dao->bddQuery($compte);
            $requete = "SELECT `supprime` FROM `user` WHERE `pseudo`='" . $obj->getIdentifiant() . "'";
            $result = $this->dao->bddQuery($compte);

        }
        return $result[0];
    }

    // Fonction pour modifier un compte UPDATE
    public function modifierCompte($data)
    {
        $requeteAdresse = "SELECT `id_adresse` FROM `adresse` WHERE `adresse`='" . $data->getAdresse() . "' AND `CP`='" . $data->getCodepostal() . "'";
        if ($result = $this->dao->bddQuery($requeteAdresse)) {
            // Traiter le retour
            $compte3 = array();
            foreach ($result as $obj) {
                $compte3[] = $obj;
            }
            $sonAdresse = $compte3[0]['id_adresse'];
            $lesResult['adresse'] = true;
        } else {
            // Gérer l'erreur
            $requeteAdresseAjout = "INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (NULL,'{$data->getAdresse()}','{$data->getVille()}','{$data->getCodepostal()}')";
            if ($result2 = $this->dao->bddQuery($requeteAdresseAjout)) {
                $lesResult['adresse'] = true;
                // Récupérer le dernier Id créé
                $sonAdresse = $this->dao->dernier_id();
            }
        }

        // Mise en place des clés de cryptage
        $cle = md5("Notre application" . $data->getEmail(), $row_output = false);
        $cleMDP = $data->getMotdepasse();

        // Requete pour modifier un utilisateur
        if ($lesResult['adresse'] == true) {
            $requeteModifCompte = "UPDATE `user` SET `civilite`='{$data->getCivilite()}', `nom`='{$data->getNom()}', `prenom`='{$data->getPrenom()}',`telephone`='{$data->getTelephone()}',
            `id_avatar` =(SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar` = '{$data->getAvatar()}'),
             `id_adresse`='" . $sonAdresse . "', `id_appareil`=(SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil` = '{$data->getAppareil()}')
            WHERE `pseudo`='{$data->getPseudo()}'";

            $result = $this->dao->bddQuery($requeteModifCompte);
            $sqlVerif = "SELECT `civilite`, `nom`, `prenom`, `id_adresse`, `id_avatar`, `id_appareil`, `telephone` FROM `user` WHERE `pseudo`='{$data->getPseudo()}'";
            $verif = array();
            if ($result3 = $this->dao->bddQuery($sqlVerif)) {
                $compte4 = array();
                foreach ($result3 as $obj) {
                    $compte4[] = $obj;
                }
                $verif = $compte4;
            } else {

            }
            if ($verif != false && $verif['0']['civilite'] == $data->getCivilite() && $verif['0']['prenom'] == $data->getPrenom()
                && $verif['0']['nom'] == $data->getNom() && $verif['0']['telephone'] == $data->getTelephone()
                && $verif['0']['id_adresse'] == $sonAdresse) {
                return $result;
            } else {
                return false;
            }
        }
    }

    // Fonction pour recuperer la liste des utilisateurs
    public function recupererUtilisateur()
    {
        $liste = "SELECT *FROM `user`WHERE `supprime`='0'";
        $resultliste = $this->dao->bddQuery($liste);
        // Traiter le retour
        $resultL = array();
        $i = 0;
        foreach ($resultliste as $obj) {
            $requeteAvatar = "SELECT * from `avatar` WHERE `id_avatar`='{$obj['id_avatar']}'";
            $requeteAdresse = "SELECT `adresse`, `ville`, `CP` from `adresse` WHERE `id_adresse`='{$obj['id_adresse']}'";
            $requeteAppareil = "SELECT `marque`,`slug_appareil` from `appareil` WHERE `id_appareil`='{$obj['id_appareil']}'";

            if ($result = $this->dao->bddQuery($requeteAvatar)) {
                // Traiter le retour requete avatar
                $compte1 = array();
                foreach ($result as $obj) {
                    $compte1[] = $obj;
                }
                $resultliste[$i]['avatar'] = $compte1[0];

            }
            if ($result = $this->dao->bddQuery($requeteAdresse)) {
                // Traiter le retour requete adresse
                $compte2 = array();
                foreach ($result as $obj) {
                    $compte2[] = $obj;
                }
                $resultliste[$i]['adresse'] = $compte2[0];
            }
            if ($result = $this->dao->bddQuery($requeteAppareil)) {

                // Traiter le retour requete appareil
                $compte3 = array();
                foreach ($result as $obj) {
                    $compte3[] = $obj;
                }
                $resultliste[$i]['appareil'] = $compte3[0];
            }
            $i++;
        }
        return $resultliste;
    }

    // Fonction pour ajouter un avatar
    public function ajouterAvatar($data)
    {
        $requeteAjoutAvatar = "INSERT INTO `avatar`(`id_avatar`, `avatar`, `slug_avatar`, `supprime`) VALUES (NULL,'{$data->getAvatar()}','{$data->getSlugavatar()}','{$data->getSupprime()}')";
        $resultat = $this->dao->bddQuery($requeteAjoutAvatar);
        $verifAvatar = "SELECT `id_avatar`FROM  `avatar` WHERE `slug_avatar`='" . $data->getSlugavatar() . "' ";
        $resultat = $this->dao->bddQuery($verifAvatar);
        return $resultat;
    }
    // Fonction pour supprimer un avatar
    public function supprimerAvatar($data)
    {
        $requeteSupression = "UPDATE `avatar` SET `supprime` = 1 WHERE `slug_avatar` = '" . $data->getSlugavatar() . "'";
        $resultat = $this->dao->bddQuery($requeteSupression);
        $verfSuprrime = " SELECT `supprime` FROM  `avatar`WHERE `slug_avatar` = '" . $data->getSlugavatar() . "'";
        $resultat = $this->dao->bddQuery($requeteSupression);
    }

    public function passerEnAdmin($obj){
        $requeteAdmin="";
            $requeteAdmin = "UPDATE `user` SET `admin`='1' WHERE `pseudo`='{$obj->getIdentifiant()}'";

        $result = $this->dao->bddQuery($requeteAdmin);
        $requeteVerif="";
            $requeteVerif="SELECT `admin` FROM `user` WHERE `pseudo`='{$obj->getIdentifiant()}'";

        if ($result2 = $this->dao->bddQuery($requeteVerif)) {
            $compte2 = array();
            foreach ($result2 as $obj2) {
                $compte2[] = $obj2;
            }
            $tabErreur['pseudo'] = true;
            if ($compte2[0]['admin']=='1'){
                return true;
            }else{
                return "false2";
            }
        } else {
            var_dump($requeteAdmin);
            var_dump($requeteVerif);
            var_dump($result2);
            return false;
        }
    }
}

