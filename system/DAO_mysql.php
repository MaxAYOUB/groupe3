<?php
class DAO_mysql
{
    private $myBdd;
    private $config;

    public function __construct()
    {
        $this->config = $this->configBdd();
        $this->bddConnexion();
    }

    public function bddConnexion()
    {
        $this->myBdd = new mysqli(
            $this->config['host'],
            $this->config['user'],
            $this->config['pass'],
            $this->config['database']
        );
        if ($this->myBdd->connect_errno) {
            die("Ereur de connexion : {$this->myBdd->connect_errno}");
        } else {
            mysqli_set_charset($this->myBdd, $this->config['charset']);
        }
    }

    public function bddDeconnexion()
    {
        $this->myBdd->close();
    }

    public function bddQuery($sql)
    {
        $data = array();
        if (!$result = $this->myBdd->query($sql)) {
            return false;
        } else {
            if (is_object($result)) {
                while ($row = $result->fetch_assoc()) {
                    $data[] = $row;
                }
                return $data;
            } else {
                return false;
            }
        }
    }

    public function __destruct(){
        $this->bddDeconnexion();
    }

    public function dernier_id(){
        return $this->myBdd->insert_id;
    }

    private function configBdd(){
        return $bdd = array(
           // 'host'  =>  "localhost",
           // 'user'  =>  "root",
           // 'pass'  =>    "",
           // 'database'=>    "application_gps",
           // 'charset'   =>  "utf8"
        // );
        // return $bdd = array(
         'host'  =>  "localhost",
         'user'  =>  "pvi-s01",
         'pass'  =>    "philippe31",
         'database'=>    "appli_GPS",
         'charset'   =>  "utf8"
         );
    }
}

