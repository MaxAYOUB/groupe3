<?php

class ModelAdmin{
    private $dao;
    /// constructeur
     public function __construct(){
        $this->dao=new DAO_mysql;
    }   
    //fonction pour traiter supprimer un utilisateur dans la base
   
    public function supprimerCompte($obj){
        $result="";
        // $obj->getIdentifiant()="email";
        // $obj->getIdentifiant()="pseudo";
        if ($obj->getTypetape()=="email"){
            var_dump($obj->getIdentifiant());
            $compte="UPDATE `user` SET `supprime`='1' WHERE `email`='".$obj->getIdentifiant()."'"; 
            $this->dao->bddQuery($compte);
            $requete = "SELECT `supprime` FROM `user` WHERE `email`='".$obj->getIdentifiant()."'";
            $result=$this->dao->bddQuery($requete);
            var_dump($result);

        }
        else{
            $compte="UPDATE `user` SET `supprime`='1' WHERE `pseudo`='".$obj->getIdentifiant()."'"; 
            $this->dao->bddQuery($compte);
            $requete = "SELECT `supprime` FROM `user` WHERE `pseudo`='".$obj->getIdentifiant()."'";
            $result=$this->dao->bddQuery($compte);
            var_dump($result);
        }

            
        
            return $result[0];

       
    }
    //fonction pour ajouter un compte 

     public function ajouterCompte($data){
        var_dump($resultat);
        $requeteAjoutAdresse="INSERT INTO `adresse`(`id_adresse`, `adresse`, `ville`, `CP`) VALUES (NULL,'{$data->getAdresse()}','{$data->getVille()}','{$data->getCodepostal()}')";
         $resultat=$this->dao->bddQuery($requeteAjoutAdresse);
         var_dump($resultat);
          
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
        $result = $this->dao->bddQuery($sql);
        var_dump($result);
        return $result;
        
        
     }
        //fonction pour modifier un compte
        public function modifierCompte($data){
          $requeteModifAdresse="UPDATE `adresse` set (`id_adresse`, `adresse`, `ville`, `CP`) VALUES (NULL,'{$data->getAdresse()}','{$data->getVille()}','{$data->getCodepostal()}') WHERE (SELECT `pseudo`FROM `user`WHERE`pseudo`='{$data->getPseudo()}')";
            $resultat=$this->dao->bddQuery($requeteModifAdresse);
         var_dump($resultat);
             
            //Mise en place des clés de cryptage
          $cle = md5("Notre application".$data->getEmail(),$row_output=FALSE);
           $cleMDP = md5("Notre application".$data->getMotdepasse(),$row_output=FALSE);
         var_dump($cle);
      
       
       // Requete pour modifier un utilisateur
       $requeteModifCompte = "UPDATE 'user' set (`id_user`, `civilite`, `nom`, `prenom`, `pseudo`, `mot_de_passe`, `email`, `cles`, `supprime`, `admin`, `id_adresse`, `id_avatar`, `id_appareil`) 
       VALUES (NULL,'{$data->getCivilite()}','{$data->getNom()}','{$data->getPrenom()}','{$data->getPseudo()}','{$cleMDP}','{$data->getEmail()}','{$cle}','0',FALSE,(SELECT `id_adresse` FROM `adresse` WHERE `adresse` = '{$data->getPrenom()}' AND `CP` = '{$data->getCodepostal()}'),
               (SELECT `id_avatar` FROM `avatar` WHERE `slug_avatar` = '{$data->getAvatar()}'),
               (SELECT `id_appareil` FROM `appareil` WHERE `slug_appareil` = '{$data->getAppareil()}'))WHERE `pseudo`='{$data->getPseudo()}';";
       // Renvoi les informations demandées dans une variable result
      
       
        $result = $this->dao->bddQuery($requeteModifCompte);
        var_dump($result);
        return $result;
    }
        //fonction pour ajouter un avatar
        public function ajouterAvatar($data){

    }
        //fonction pour supprimer un avatar
        public function supprimerAvatar($data){

    }
        //fonction pour verifier un utilisateur
        public function ioop($data){

    }
}
