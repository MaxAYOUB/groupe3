<?php
/*
 *   @T.Noël @M.Ayoub
 *   Construction de la classe ModelGeneral
 */
class modelGeneral
{

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
        // Requete testant si le pseudo existe déjà avant d'insérer un nouvel user
        $sqlUser = "SELECT `cles` FROM `user` WHERE `pseudo` = '{$data->getPseudo()}'";
        $idPseudo = "";
        $tabErreur = array();
        // Si
        if ($result2 = $this->DAO->bddQuery($sqlUser)) {
            $compte2 = array();
            foreach ($result2 as $obj2) {
                $compte2[] = $obj2;
            }
            $tabErreur['pseudo'] = true;
        } else {
            $idPseudo = true;
            $tabErreur['pseudo'] = false;
        }

        // Requete testant si l'email existe déjà avant d'insérer un nouvel user
        $sqlPseudo = "SELECT `cles` FROM `user` WHERE `email` = '{$data->getEmail()}'";
        $idEmail = "";
        // SI
        if ($result3 = $this->DAO->bddQuery($sqlPseudo)) {
            $compte3 = array();
            foreach ($result3 as $obj3) {
                $compte3[] = $obj3;
            }
            $tabErreur['email'] = true;
        } else {
            $idEmail = true;
            $tabErreur['email'] = false;
        }
        // Si les paramètres ($idEmail & $idPseudo) sont à True on envoit les requêtes d'insertion. (Pas besoin d'indiquer == true en php)
        if ($idEmail && $idPseudo) {
            // Requete pour l'insertion d'une nouvelle adresse
            $sql = "INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (NULL,'{$data->getAdresse()}','{$data->getVille()}','{$data->getCodepostal()}')";
            $result = $this->DAO->bddQuery($sql);

            // Mise en place des clés de cryptage
            $cle = md5("Notre application" . $data->getEmail(), $row_output = false);
            $cleMDP = md5("Notre application" . $data->getMotdepasse(), $row_output = false);

            // Requete pour l'insertion d'un nouvel utilisateur
            $sql = "INSERT INTO `user`(`id_user`, `civilite`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `email`,`telephone`,`cles`, `supprime`, `admin`, `id_adresse`, `id_avatar`, `id_appareil`)
            VALUES (NULL,'{$data->getCivilite()}','{$data->getNom()}','{$data->getPrenom()}','{$data->getPseudo()}','{$cleMDP}','{$data->getEmail()}','{$data->getTelephone()}','{$cle}','0',FALSE,(SELECT `id_adresse` FROM `adresse` WHERE `adresse` = '{$data->getAdresse()}' AND `CP` = '{$data->getCodepostal()}'),
            (SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar` = '{$data->getAvatar()}'),
            (SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil` = '{$data->getAppareil()}'))";

            // Renvoi les informations demandées dans une variable result
            $result = $this->DAO->bddQuery($sql);
            $sql = "SELECT `cles` FROM `user` WHERE `pseudo` = '{$data->getPseudo()}'";
            // Recupère les infos de l'utilisateur return false s'il n'existe pas
            if ($result = $this->DAO->bddQuery($sql)) {
                $compte = array();
                foreach ($result as $obj1) {
                    $compte[] = $obj1;
                }
            } else {
                return false;
            }
            return $result;
        } else {
            return $tabErreur;
        }
    }

    public function authentification($obj){
        // var_dump($obj);
            
        $requete="";
        //ca dit si un identifiant et un mot de passe a été rentré
        if ($obj->getTypetape()!="" && $obj->getMotdepasse()!=""){
            
            if ($obj->getTypetape()=="email"){
                // var_dump($obj->getTypetape());
                $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles`,`id_avatar`, `email` FROM `user` WHERE `email`='".$obj->getIdentifiant()."'";
            }else {
                $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles`,`id_avatar`, `email` FROM `user` WHERE `pseudo`='".$obj->getIdentifiant()."'";
            }
            
            // var_dump($requete);
            //recupére les infos de l'utilisateur return false si il n'existe pas
            if($result = $this->DAO->bddQuery($requete)){
                // traiter le retour
                $compte = array();
                foreach($result as $obj1){
                    $compte[] = $obj1;
                }
            }
            else{
                // gerer l'erreur
            // var_dump($obj);
                return false;
            }
            //test coder le mot de passe de la base
            $result[0]['mot_de_passe']=md5($result[0]['mot_de_passe'],$raw_output=false);

            //verifie si le bon mot de passe a été tapé
            // var_dump($result);
            // var_dump($result[0]);
            if ($result[0]['mot_de_passe']==$obj->getMotdepasse()){
                
                $requete2="SELECT `avatar` FROM `avatar` WHERE `id_avatar`='".$result[0]['id_avatar']."'";

                //récupére l'avatar utilisé par l'utilisateur
                    if($result2 = $this->DAO->bddQuery($requete2)){
                        // traiter le retour
                        $compte = array();
                        foreach($result2 as $obj2){
                            $compte[] = $obj2;
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
                // var_dump($obj);
                return false;
            }
        }else{
            // var_dump($obj);
            return false;
        }
    }

    public function updateCompte($o){

        //servent a recuperer les id des autres tables
        $sonAdresse="";
        $sonAppareil="";
        $sonAvatar="";

        //sert a dire si toutes les requetes se sont bien passees
        $lesResult=array();


        //recupere l id de l'avatar choisi
        $requeteAvatar="SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar`='".$o->getAvatar()."'";

        if($result = $this->DAO->bddQuery($requeteAvatar)){
            // traiter le retour  / enregistrement de l id
            $compte1 = array();
            foreach($result as $obj){
                $compte1[] = $obj;
            }
            $sonAvatar=$compte1[0]['id_avatar'];
            
            $lesResult['avatar']=true;
        }
        else{
            // gerer l'erreur / dire le fait que ca s est mal passe
            
            $lesResult['avatar']=false;
        }
        // var_dump($sonAvatar);


        //recupere l id de l'appareil choisi
        $requeteAppareil="SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil`='".$o->getAppareil()."'";
       
        if($result = $this->DAO->bddQuery($requeteAppareil)){
            // traiter le retour  / enregistrement de l id
            $compte2 = array();
            foreach($result as $obj){
                $compte2[] = $obj;
            }
            $sonAppareil=$compte2[0]['id_appareil'];
            $lesResult['appareil']=true;
        }
        else{
            // gerer l'erreur / dire le fait que ca s est mal passe
            $lesResult['appareil']=false;
        }
        var_dump($sonAppareil);

        $requeteAdresse="SELECT `id_adresse` FROM `adresse` WHERE `adresse`='".$o->getAdresse()."' AND `CP`='".$o->getCodepostal()."'";
       
        // echo "salut";
        if($result = $this->DAO->bddQuery($requeteAdresse)){
            
            // traiter le retour  / enregistrement de l id
            $compte3 = array();
            foreach($result as $obj){
                $compte3[] = $obj;
            }
            $sonAdresse=$compte3[0]['id_adresse'];
            $lesResult['adresse']=true;
        }
        else{
            // gerer l'erreur / enregistrement d'une nouvelle adresse

            $requeteAdresseAjout= "INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (null,'".$o->getAdresse()."','".$o->getVille()."','".$o->getCodepostal()."')";
            $resultAjout = $this->DAO->bddQuery($requeteAdresseAjout);
            var_dump($requeteAdresseAjout);
            $requeteAdresseId="SELECT `id_adresse` FROM `adresse` WHERE `adresse`='".$o->getAdresse()."' AND `CP`='".$o->getCodepostal()."'";
       
                echo "salut";
            if($resultId = $this->DAO->bddQuery($requeteAdresseId)){
                
                var_dump($resultId);
                // traiter le retour  / enregistrement de l id
                $compte4 = array();
                foreach($resultId as $obj){
                    $compte4[] = $obj;
                }
                var_dump($compte4);
                $sonAdresse=$compte4[0]['id_adresse'];
                $lesResult['adresse']=true;
            }
            else{
                // gerer l'erreur / dire le fait que ca s est mal passe
                $lesResult['adresse'] = false;
            }
        }
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
            }
            else{
                // gerer l'erreur
            }

            $requeteVerif= "SELECT * FROM `user` WHERE `pseudo`='".$o->getPseudo()."'";

            if($result = $this->DAO->bddQuery($requeteVerif)){
            
                // traiter le retour / dire que ca s est bien passe
                $compte5 = array();
                foreach($result as $obj){
                    $compte5[] = $obj;
                }
                $lesResult['sonUpdate']=true;

            }
            else{
                // gerer l'erreur / dire le fait que ca s est mal passe
                $lesResult['sonUpdate']=false;
            }
            
            //verifie si l'update a bien change les valeurs
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
