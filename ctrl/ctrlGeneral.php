<?php
    class ctrlGeneral{
        private $vue;
        private $model;
        private $user;

        function __construct(){
            // $this->vue=new viewGeneral();
            $this->model=new modelGeneral();
        }

        public function getConnection(){
            $this->view->afficherConnection();
        }

        public function getAuthentification(){
            $this->view->afficherConnection();
        }

        public function verifierAuthentification(){
            $a['identifiant']="maxime@gmail.com";
            // $a['identifiant']="max";
            $a['motdepasse']="toulouse31";
            $this->user=new Compte($a);
            var_dump($this->user);
            // $this->user=new Compte($_POST);
            $verifAuthentification=$this->model->enregistrerFormulaire($this->user);
            var_dump($verifAuthentification);
            if ($verifAuthentification){

            }else{
                
            }
        }

    }
?>