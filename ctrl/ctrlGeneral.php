<?php
    class ctrlGeneral{
        private $vue;
        private $model;
        private $user;

        function __construct(){
            $this->vue=new viewGeneral();
            $this->model=new modelGeneral();
        }

        public function getAuthentification(){
            $this->view->afficherConnection();
        }

        public function verifierAuthentification(){
            // $a['identifiant']="maxime@gmail.com";
            
            //informations de tests 
            $a['identifiant']="max";
            $a['motdepasse']="toulouse31";
            // $a=array();
            $this->user=new Compte($a);
            
            // $this->user=new Compte($_POST);
            var_dump($this->user);

            $verifAuthentification=$this->model->authentification($this->user);
            var_dump($verifAuthentification);

            if ($verifAuthentification!=false){
                $this->gererSession($verifAuthentification);
                var_dump($_SESSION);
                $this->vue->afficherConnexionOk();
            }else{
                $this->vue->afficherConnexionNotOk();
            }
        }

        private function gererSession($tab){
            $_SESSION['admin']=$tab['admin'];
            $_SESSION['pseudo']=$tab['pseudo'];
            $_SESSION['avatar']=$tab['avatar'];
            $_SESSION['cles']=$tab['cles'];
            $_SESSION['email']=$tab['email'];
        }


        public function verifierAuthentificationApplication(){
            $tab=json_decode($_POST, true);

            $this->user=new Compte($tab);
            
            var_dump($this->user);

            $verifAuthentification=$this->model->authentification($this->user);
            var_dump($verifAuthentification);

            if ($verifAuthentification!=false){
                $this->gererSession($verifAuthentification);
                var_dump($_SESSION);
            }else{
                $_SESSION['erreur']="mauvais identifiant ou mot de passe";
            }
            return json_encode($_SESSION);
        }

        public function getModifierCompte(){

            //test
            $a['pseudo']="max ezfqsdf sdqf";
            $a['motdepasse']="toulouse31";
            $a['civilite']="Mr";
            $a['nom']="ayoubR";
            $a['prenom']="max";
            $a['avatar']="avatar";
            $a['appareil']="appareil2";
            $a['adresse']="16 av Victor Hugo";
            $a['ville']="tournefeuille";
            $a['codePostal']=31170;
            $this->user=new User($a);

            $lesUpdates=array();

            // $this->user=new Compte($_POST);
            $lesUpdates=$this->model->updateCompte($this->user);
            var_dump($lesUpdates);
        }

    }
?>