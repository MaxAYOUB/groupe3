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
            

            // Requete pour l'insertion d'une nouvelle adresse si elle n'existe pas

            $sonAdresse="";
            $requeteAdresse="SELECT `id_adresse` FROM `adresse` WHERE `adresse`='{$data->getAdresse()}' AND `CP`='{$data->getCodepostal()}'";
            // var_dump($requeteAdresse);
            if($result0 = $this->DAO->bddQuery($requeteAdresse)){
                
                // traiter le retour  / enregistrement de l id
                $compte3 = array();
                foreach($result0 as $obj){
                    $compte3[] = $obj;
                }
                // var_dump($compte3);
                $sonAdresse=$compte3[0]['id_adresse'];
                $lesResult['adresse']=true;
            }
            else{
                // gerer l'erreur / enregistrement d'une nouvelle adresse
                // var_dump($result);
                $requeteAdresseAjout= "INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (null,'{$data->getAdresse()}','{$data->getVille()}','{$data->getCodepostal()}')";
                $resultAjout = $this->DAO->bddQuery($requeteAdresseAjout);
                $requeteAdresseId="SELECT `id_adresse` FROM `adresse` WHERE `adresse`='{$data->getAdresse()}' AND `CP`='{$data->getCodepostal()}'";
                // var_dump($requeteAdresseId);
                if($resultId = $this->DAO->bddQuery($requeteAdresseId)){
                    // traiter le retour  / enregistrement de l id
                    $compte4 = array();
                    foreach($resultId as $obj){
                        $compte4[] = $obj;
                    }
                    $sonAdresse=$compte4[0]['id_adresse'];
                    $lesResult['adresse']=true;
                    // var_dump($compte4);
                }
                else{
                    // gerer l'erreur / dire le fait que ca s est mal passe
                    $lesResult['adresse'] = false;
                }
            }

            // Mise en place des clés de cryptage
            $cle = md5("Notre application" . $data->getEmail(), $row_output = false);
            $cleMDP = $data->getMotdepasse();
            // $sonAdresse= ($sonAdresse!=""? $sonAdresse:"null");
            if ($sonAdresse==""){
                $sonAdresse="null";
            }

            // Requete pour l'insertion d'un nouvel utilisateur
            $sql = "INSERT INTO `user`(`id_user`, `civilite`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `email`,`telephone`,`cles`, `supprime`, `admin`, `id_adresse`, `id_avatar`, `id_appareil`)
            VALUES (NULL,'{$data->getCivilite()}','{$data->getNom()}','{$data->getPrenom()}','{$data->getPseudo()}','{$cleMDP}','{$data->getEmail()}','{$data->getTelephone()}','{$cle}','0',FALSE,{$sonAdresse},
            (SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar` = '{$data->getAvatar()}'),
            (SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil` = '{$data->getAppareil()}'))";

            // Renvoi les informations demandées dans une variable result
            $result20 = $this->DAO->bddQuery($sql);
            
            $sql = "SELECT `cles` FROM `user` WHERE `pseudo` = '{$data->getPseudo()}'";
            // Recupère les infos de l'utilisateur return false s'il n'existe pas
            if ($result30 = $this->DAO->bddQuery($sql)) {
                $compte = array();
                foreach ($result30 as $obj1) {
                    $compte[] = $obj1;
                }
                return $compte;
            } else {
                // var_dump($result3);
                return false;
            }
            // return $result;
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
                $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles`,`id_avatar`, `email`, `nom`, `prenom` FROM `user` WHERE `email`='".$obj->getIdentifiant()."'";
            }else {
                $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles`,`id_avatar`, `email`, `nom`, `prenom` FROM `user` WHERE `pseudo`='".$obj->getIdentifiant()."'";
            }
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
                return false;
            }
            //verifie si le bon mot de passe a été tapé
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
                return $result[0];
            }else{
                return false;
            }
        }else{
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

        $requeteAdresse="SELECT `id_adresse` FROM `adresse` WHERE `adresse`='".$o->getAdresse()."' AND `CP`='".$o->getCodepostal()."'";
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
            $requeteAdresseId="SELECT `id_adresse` FROM `adresse` WHERE `adresse`='".$o->getAdresse()."' AND `CP`='".$o->getCodepostal()."'";
            if($resultId = $this->DAO->bddQuery($requeteAdresseId)){
                // traiter le retour  / enregistrement de l id
                $compte4 = array();
                foreach($resultId as $obj){
                    $compte4[] = $obj;
                }
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


    public function razPassword($obj){

        //c'est ce que je renverrai
        //je met tout a vide pour ne pas avoir à vérifier si ça existe dans le ctrlGeneral
        $sesDonnees=array();
        $sesDonnees['pseudo']="";
        $sesDonnees['erreurPseudo']=true;
        $sesDonnees['mot_de_passe']="";
        $sesDonnees['erreurPassword']=true;

        //verifie si l'email rentré correspond bien à un utilisateur et récupére son pseudo
        $requetePseudo= "SELECT `pseudo` FROM `user` WHERE `email`='{$obj->getIdentifiant()}'";
var_dump($requetePseudo);
        if($result66 = $this->DAO->bddQuery($requetePseudo)){
            
            // traiter le retour / dire que ca s est bien passe
            $compte5 = array();
            foreach($result66 as $obj2){
                $compte5[] = $obj2;
            }

            //sauvegarde le pseudo et dit qu'il n'y a pas eu d'erreur
            $sesDonnees['pseudo']=$compte5[0]['pseudo'];
            $sesDonnees['erreurPseudo']=false;
        }
        else{
            var_dump($result66);
            // gerer l'erreur / dire le fait que ca s est mal passe
            $sesDonnees['erreurPseudo']=true;
        }

        //permet de ne faire la suite que si le client a été trouvé
        if (!$sesDonnees['erreurPseudo']){

            //créé une chaine de charactére aléatoire de 15 charactéres avec des chiffres et/ou des lettres 
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $longueurMax = strlen($caracteres);
            $chaineAleatoire = '';
            for ($i = 0; $i < 15; $i++){
                $chaineAleatoire .= $caracteres[rand(0, $longueurMax - 1)];
            }
            var_dump($chaineAleatoire);

            //sauvegarde la version non codée du mot de passe pour la donner au client
            $sesDonnees['mot_de_passe']=$chaineAleatoire;

            //code le mot de passe
            $chaineAleatoire=md5($chaineAleatoire,$raw_output = false);
            var_dump($chaineAleatoire);

            //change le mot de passe dans la base de donnée
            $requeteUpdate= "UPDATE `user` SET `mot_de_passe`='{$chaineAleatoire}'WHERE `email`='{$obj->getIdentifiant()}'";
            $result2 = $this->DAO->bddQuery($requeteUpdate);

            //vérifie si le changement s'est bien effectué
            $requetePassword= "SELECT `mot_de_passe` FROM `user` WHERE `email`='{$obj->getIdentifiant()}'";
            var_dump($requetePassword);
            if($result3 = $this->DAO->bddQuery($requetePassword)){
                
                // traiter le retour / dire que ca s est bien passe
                $compte5 = array();
                foreach($result3 as $obj3){
                    $compte5[] = $obj3;
                }
                var_dump($compte5);
                //a été changé ou pas = erreur ou pas
                if($compte5[0]['mot_de_passe']==$chaineAleatoire){
                    $sesDonnees['erreurPassword']=false;
                }else{
                    $sesDonnees['mot_de_passe']="";
                    $sesDonnees['erreurPassword']=true;
                }
            }
            else{
                // gerer l'erreur / dire le fait que ca s est mal passe
                $sesDonnees['mot_de_passe']="";
                $sesDonnees['erreurPassword']=true;
            }
        }
        var_dump($sesDonnees);
        return $sesDonnees;
    }

    public function modifierPassword($obj){
        $verif= "SELECT `mot_de_passe` FROM `user` WHERE  `email`='{$_SESSION['email']}'";
        if($result4 = $this->DAO->bddQuery($verif)){
                
            // traiter le retour / dire que ca s est bien passe
            $compte1 = array();
            foreach($result4 as $obj1){
                $compte1[] = $obj1;
            }
            var_dump($compte1);
            var_dump(md5($obj->getIdentifiant(), $raw_output = false));
            //a été changé ou pas = erreur ou pas
            if($compte1[0]['mot_de_passe']==md5($obj->getIdentifiant(), $raw_output = false)){
                $sql="UPDATE `user` SET `mot_de_passe`='{$obj->getMotdepasse()}' WHERE `email`='{$_SESSION['email']}'";
                $result2 = $this->DAO->bddQuery($sql);

                $verif= "SELECT `mot_de_passe` FROM `user` WHERE  `email`='{$_SESSION['email']}'";
                if($result3 = $this->DAO->bddQuery($verif)){
                
                    // traiter le retour / dire que ca s est bien passe
                    $compte5 = array();
                    foreach($result3 as $obj3){
                        $compte5[] = $obj3;
                    }
                    // var_dump($compte5);
                    // return true;
                    //a été changé ou pas = erreur ou pas
                    if($compte5[0]['mot_de_passe']==$obj->getMotdepasse()){
                        return true;
                    }else{
                        // $this->modifierPassword($obj);
                        return "false3";
                    }
                }
            }else{
                // $this->modifierPassword($obj);
                return "false2";
            }
        }else{
            return false;
        }
        
    }

    public function UpdateAvatar($obj){
        $requeteAvatar="SELECT `id_avatar`, `avatar` FROM `avatar` WHERE `slug_avatar`='{$obj->getSlugavatar()}'";
        // var_dump($requeteAvatar);
        $leSlug="";
        if($result3 = $this->DAO->bddQuery($requeteAvatar)){
                
            // traiter le retour / dire que ca s est bien passe
            $compte5 = array();
            foreach($result3 as $obj3){
                $compte5[] = $obj3;
            }
            $leSlug=$compte5[0]['id_avatar'];
            
        }else{
            return false;
        }

        if ($leSlug!=""){
            $requeteUpdate="UPDATE `user` SET `id_avatar`='{$leSlug}' WHERE `pseudo`='{$_SESSION['pseudo']}'";
            $result1 = $this->DAO->bddQuery($requeteUpdate);

            $verif= "SELECT `id_avatar` FROM `user` WHERE  `pseudo`='{$_SESSION['pseudo']}'";
                if($result2 = $this->DAO->bddQuery($verif)){
                
                    // traiter le retour / dire que ca s est bien passe
                    $compte2 = array();
                    foreach($result2 as $obj2){
                        $compte2[] = $obj2;
                    }
                    //a été changé ou pas = erreur ou pas
                    if($compte2[0]['id_avatar']==$leSlug){
                        $_SESSION['avatar']=$compte5[0]['avatar'];
                        return true;
                    }else{
                        return false;
                    }
                }
        }else{
            return false;
        }
    }
}
