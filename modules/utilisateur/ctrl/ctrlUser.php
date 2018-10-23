<?php
    class ctrlUser{
        private $view;
        public function __construct(){
            $this->view = new viewUser();
        }

        public function erreurAcces(){
            $this->view->afficherErreurAcces();
        }

    }

?>