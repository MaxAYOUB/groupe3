<?php
    class modelGeneral{
        private $dao;

        function __construct(){
            $this->dao=new DAO_mysql();
        }

        public function enregistrerFormulaire($obj){
            var_dump($obj->getTypetape());
            $requete="";
            if ($obj->getTypetape()!=""){
                var_dump($obj->getTypetape());
                if ($obj->getTypetape()=="email"){
                    var_dump($obj->getTypetape());
                    $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles` FROM `user` WHERE `email`='".$obj->getIdentifiant()."'";
                }else {
                    $requete = "SELECT `mot_de_passe`, `admin`, `pseudo`, `cles` FROM `user` WHERE `pseudo`='".$obj->getIdentifiant()."'";
                }
                // $requete="SELECT `mot_de_passe` FROM `User` WHERE `email`='maxime@gmail.com'";
                var_dump($requete);
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
                if ($result[0]['mot_de_passe']==$obj->getMotdepasse()){
                    // if ($result[0]['mot_de_passe']=="toulouse31"){
                    return $result[0];
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
    
    }
?>