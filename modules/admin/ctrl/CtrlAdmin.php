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
            $a['identifiant']="tabert.b@orange.fr";
            $a['identifiant']="tb";
            $this->compte=new compte($a);
            var_dump($this->compte);
            $compte=this->model->supprimerCompte($this->compte);
            var_dump($compte);
           // $this->compte = new Compte($_POST);
           if ($compte){

           };
           else{

           };
        }

       // public function gererPassword(){

       // }
    
    }
?>