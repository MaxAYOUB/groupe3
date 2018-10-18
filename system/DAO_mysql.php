<?php
    class DAO_mysql{
        private $myBdd;
        private $config;

        function __construct(){
            $this->bddConnection();
            $this->config = $this->configBdd();
        }

        public function bddConnection(){
            $this->myBdd = new mysqli(
                $this->config['host'],
                $this->config['user'],
                $this->config['pass'],
                $this->config['database']
            );
            if($this->myBdd->connect_errno){
                die("Ereur de connexion : {$this->myBdd->connect_errno}");
            }
            else{
                mysqli_set_charset($this->myBdd, $this->config['charset']);
            }
        }

        public function bddDeconnexion(){
            $this->myBdd->close();
        }
        
        public function bddQuery($sql){
    //         echo $sql;
            $data = array();
            if(!$result = $this->myBdd->query($sql)){
                die("Erreur de BDD : {$this->myBdd->connect_errno}");
            }
            else{
                if(is_object($result)){
                    while($row = $result->fetch_assoc())
                    {
                        $data[] = $row;
                    }
                    return $data;
                }
                else{
                    return false;
                }
            }
        }
        
        public function __destruct(){
            $this->bddDeconnexion();
        }


        private function bddConfig(){
            return $bdd = array(
                'host'  =>  "localhost",
                'user'  =>  "root",
                'pass'  =>    "",
                'database'=>    "application_gps",
                'charset'   =>  "utf8"
            );
        }
    }
?>