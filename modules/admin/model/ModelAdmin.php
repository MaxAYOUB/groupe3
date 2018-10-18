<?php

class ModelAdmin{
   
    /// constructeur
     public function __construct(){
        $this->dao=new DAO_MySQLi;
    }   
    //fonction pour traiter supprimer un utilisateur dans la base
   
    public function supprimerCompte(){
        if ($obj->getIdentifiant()){
            $compte="UPDATE `user` SET `supprime`='1' WHERE `email`='".$obj->getIdentifiant()."'"; }
        else{
            $compte="UPDATE `user` SET `supprime`='1' WHERE `pseudo`='".$obj->getIdentifiant()."'"; }
       
            return $this->dao->bddQuery($sql);

       
    }}
