<?php
    class CtrlAdmin{
        private $vue;
        private $model;
        private $compte;
        private $user;

      //  public $test;

        function __construct(){
            $this->vue=new viewAdmin;
            $this->model=new modelAdmin;
        }

        public function getConsoleAdmin(){
            $this->view->afficherConsoleAdmin();
        }

        public function gererCompte(){
           /*  
            $a['identifiant']="martin.m@gmail.com";
            // $a['identifiant']="tb";
            $this->user=new Compte($a);
            var_dump($this->user);
            //suppression compte*****
            $compteSup=$this->model->supprimerCompte($this->user);
            var_dump($compteSup);
           // $this->compte = new Compte($_POST);
           if ($compteSup['supprime']=="1"){
           $this->vue->afficherRazOk();
           }
           else{
            $this->vue->afficherRazNotOk();   
           } */
           // ajouter compte
           $b['civilite']="M";
          
           $b['nom']="tabert";
           $b['prenom']="eric";
           $b['pseudo']="titi";   
           $b['email']="tabert.eric@wanadoo.fr";
           $b['motdepasse']="1234";
           //$b['avatar']="kl";
           $b['avatar']="obelix";
           $b['appareil']="samsung";
           //$b['appareil']="ffd";
           $b['conditionsGenerales']="lkl";
           $b['adresse']="ffsd";
           $b['codePostal']="123122";
           $b['ville']="bruguieres";
           $b['administrateur']=true;
           $b['supprime']="0";

           $this->user=new User($b);
           
           var_dump( $this->user);

           $ajoutCompte=$this->model->ajouterCompte($this->user);
           
           //$this->compte = new User($_POST);
          
           if ($ajoutCompte){
           $this->vue->afficherCompteOk();
           }
           else{
            $this->vue->afficherCompteNotOk();   
           } 
          

        }
 
       // public function gererPassword(){

       // }
    
       }
?>