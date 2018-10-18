<?php
    class modelGeneral{
        private $dao;

        function __construct(){
            $this->dao=new viewGenerale();
        }

        public function enregistrerFormulaire($obj){
            if ($obj->getTypetape()!=""){
                if ($obj->getTypetape()=="email"){
                    $requete = "SELECT `mot_de_passe` `admin` FROM `User` WHERE `email`='".$obj->getIdentifiant()."'";
                }else {
                    $requete = "SELECT `mot_de_passe` `admin` FROM `User` WHERE `pseudo`='".$obj->getIdentifiant()."'";
                }
                // $requete="SELECT `mot_de_passe` FROM `User` WHERE `email`='maxime@gmail.com'";
                if($result = $this->dao->bddQuery($requete)){
                    // traiter le retour
                    $compte = array();
                    foreach($result as $o){
                        $compte[] = $o;
                    }
                }
                else{
                    // gerer l'erreur
                var_dump($result);
                    return false;
                }
                var_dump($result);
                if ($result[0]['mot_de_passe']==$obj->getPassword()){
                    // if ($result[0]['mot_de_passe']=="toulouse31"){
                    return true;
                }else{
                    return false;
                }
            }
        }
    
    }
?>