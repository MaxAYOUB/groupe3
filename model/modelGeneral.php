<?php
/*
 *   @T.Noël @M.Ayoub
 *   Construction de la classe ModelGeneral
 */

class modelGeneral {

 
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
        $sql = "SELECT * FROM avatar"; // Requete pour récupérer les avatars dans la BDD
        $resultAvatar = $this->DAO->bddQuery($sql); // Renvoi le résultat de la requête dans une variable result
        return $resultAvatar;
    }

    // Fonction renvoyant le système de l'appareil dans le formulaire
    public function getAppareil()
    {
        $sql = "SELECT * FROM appareil"; // Requete pour récupérer les systèmes dans la BDD
        $resultAppareil = $this->DAO->bddQuery($sql); // Renvoi le résultat de la requête dans une variable result
        return $resultAppareil;
    }

    /*****************
     ** SQL REQUETES **
     *****************/

    public function enregistrerFormulaire($data)
    {
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

    public function authentification($obj){
            
        $requete="";
        //ca dit si un identifiant et un mot de passe a été rentré
        if ($obj->getTypetape()!="" && $obj->getMotdepasse()!=""){
            
            if ($obj->getTypetape()=="email"){
                // var_dump($obj->getTypetape());
                $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles`,`id_avatar`, `email` FROM `user` WHERE `email`='".$obj->getIdentifiant()."'";
            }else {
                $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles`,`id_avatar`, `email` FROM `user` WHERE `pseudo`='".$obj->getIdentifiant()."'";
            }
            
            //recupére les infos de l'utilisateur return false si il n'existe pas
            if($result = $this->DAO->bddQuery($requete)){
                // traiter le retour
                $compte = array();
                foreach($result as $obj){
                    $compte[] = $obj;
                }
            }
            else{
                // gerer l'erreur
                return false;
            }
            //test coder le mot de passe de la base
            $result[0]['mot_de_passe']=md5($result[0]['mot_de_passe'],$raw_output=false);

            //verifie si le bon mot de passe a été tapé
            if ($result[0]['mot_de_passe']==$obj->getMotdepasse()){
                
                $requete2="SELECT `avatar` FROM `avatar` WHERE `id_avatar`='".$result[0]['id_avatar']."'";

                //récupére l'avatar utilisé par l'utilisateur
                    if($result2 = $this->DAO->bddQuery($requete2)){
                        // traiter le retour
                        $compte = array();
                        foreach($result2 as $obj){
                            $compte[] = $obj;
                        }
                    }
                    else{
                        // gerer l'erreur
                        return false;
                    }

                    //met toutes les infos dans un array pour le retourner au ctrlGeneral
                    $result[0]['avatar']=$result2[0]['avatar'];

                    // var_dump($result);
                return $result[0];
            }else{
                return false;
            }
        }else{
            return false;
        }
    }

    public function updateCompte($o){
        
        $sonAdresse="";
        $sonAppareil="";
        $sonAvatar="";

        $lesResult=array();


        $requeteAvatar="SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar`='".$o->getAvatar()."'";

        if($result = $this->DAO->bddQuery($requeteAvatar)){
            // traiter le retour
            $compte1 = array();
            foreach($result as $obj){
                $compte1[] = $obj;
            }
            $sonAvatar=$compte1[0]['id_avatar'];
            $lesResult['avatar']=true;
        }
        else{
            // gerer l'erreur
            $lesResult['avatar']=false;
        }
        var_dump($sonAvatar);

        $requeteAppareil="SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil`='".$o->getAppareil()."'";
       
        if($result = $this->DAO->bddQuery($requeteAppareil)){
            // traiter le retour
            $compte2 = array();
            foreach($result as $obj){
                $compte2[] = $obj;
            }
            $sonAppareil=$compte2[0]['id_appareil'];
            $lesResult['appareil']=true;
        }
        else{
            // gerer l'erreur
            $lesResult['appareil']=false;
        }
        var_dump($sonAppareil);

        $requeteAdresse="SELECT `id_adresse` FROM `adresse` WHERE `adresse`='".$o->getAdresse()."' AND `CP`='".$o->getCodepostal()."'";
       
        // echo "salut";
        if($result = $this->DAO->bddQuery($requeteAdresse)){
            
            // traiter le retour
            $compte3 = array();
            foreach($result as $obj){
                $compte3[] = $obj;
            }
            $sonAdresse=$compte3[0]['id_adresse'];
            $lesResult['adresse']=true;
        }
        else{
            // gerer l'erreur
            $lesResult['adresse']=false;
        }
        // echo "117 : ".$compte3;
        var_dump($sonAdresse);
        var_dump($lesResult);
        if ($lesResult['avatar']==true && $lesResult['appareil']==true && $lesResult['adresse']==true){
            $requeteUpdate= "UPDATE `user` SET `civilite`='".$o->getCivilite()."', `nom`='".$o->getNom().
            "', `prenom`='".$o->getPrenom()."',`id_avatar` ='".$sonAvatar."', `id_adresse`='".$sonAdresse."', `id_appareil`='".$sonAppareil."'
            WHERE `pseudo`='".$o->getPseudo()."'";

            if($result = $this->DAO->bddQuery($requeteUpdate)){
            
                // traiter le retour
                $compte4 = array();
                foreach($result as $obj){
                    $compte4[] = $obj;
                }
                echo "true";
                // $sonAdresse=$compte3[0]['id_adresse'];
                // $lesResult['adresse']=true;
            }
            else{
                // gerer l'erreur
            }

            $requeteVerif= "SELECT * FROM `user` WHERE `pseudo`='".$o->getPseudo()."'";

            if($result = $this->DAO->bddQuery($requeteVerif)){
            
                // traiter le retour
                $compte5 = array();
                foreach($result as $obj){
                    $compte5[] = $obj;
                }
                $lesResult['sonUpdate']=true;
                // $sonAdresse=$compte3[0]['id_adresse'];
                // $lesResult['adresse']=true;
            }
            else{
                // gerer l'erreur
                $lesResult['sonUpdate']=false;
            }
            // var_dump($compte5);
            if ($lesResult['sonUpdate']){
                if ($compte5[0]['civilite']==$o->getCivilite() && $compte5[0]['nom']==$o->getNom() && $compte5[0]['prenom']==$o->getPrenom() &&
                $compte5[0]['id_adresse']==$sonAdresse && $compte5[0]['id_appareil']==$sonAppareil && $compte5[0]['id_avatar']==$sonAvatar){

                    $lesResult['fait']=true;
                }else{
                    $lesResult['fait']=false;
                }
            }
        }
        return $lesResult;
    }
}
