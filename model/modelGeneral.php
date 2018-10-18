<?php
    class modelGeneral{
        private $dao;

        function __construct(){
            $this->dao=new DAO_mysql();
        }

        /**
         * verifie si l'utilisateur a rentré les bonnes informations
         * 
         * on lui envoie un objet Compte contenant ces infos
         */
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
                if($result = $this->dao->bddQuery($requete)){
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
                        if($result2 = $this->dao->bddQuery($requete2)){
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

            if($result = $this->dao->bddQuery($requeteAvatar)){
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
           
            if($result = $this->dao->bddQuery($requeteAppareil)){
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
            if($result = $this->dao->bddQuery($requeteAdresse)){
                
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

                if($result = $this->dao->bddQuery($requeteUpdate)){
                
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

                if($result = $this->dao->bddQuery($requeteVerif)){
                
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
?>