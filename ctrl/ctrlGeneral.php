<?php
    class ctrlGeneral{
        private $vue;
        private $model;
        private $user;

        function __construct(){
            $this->vue=new viewGenerale();
            $this->model=new modelGeneral();
        }

    
    }
?>