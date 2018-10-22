<?php
/*
 *   @T.Noël @M.Ayoub
 *   Construction de la classe ctrlGeneral
 */
    class ctrlGeneral{
        function __construct(){
            $this->vue=new viewGeneral();
            $this->model=new modelGeneral();
        }
        public function getAccueil(){
            $this->vue->afficherAccueil();
        }
        public function getForm()
        {
            // Variable avatar contenant le résultat de la requête getAvatar
            $avatar = $this->model->getAvatar();
            // Variable appareil contenant le résultat de la requête SQL getAppareil
            $appareil = $this->model->getAppareil();
            // Création d'un tableau associatif résultant des deux requêtes sur la BDD (avatar & appareil)
            $database = array(
                'avatar' => $avatar,
                'appareil' => $appareil,
            );
            $this->vue->afficherForm($database);
        }
        // Enregistrement du formulaire
        public function enregForm()
        {
    var_dump($_POST);
            $dataTab = array(
                'civilite' => $_POST['civilite'],
                'nom' => $_POST['nom'],
                'prenom' => $_POST['prenom'],
                'pseudo' => $_POST['pseudo'],
                'motdepasse' => $_POST['motdepasse'],
                'email' => $_POST['email'],
                'adresse' => $_POST['adresse'],
                'codePostal' => $_POST['codePostal'],
                'ville' => $_POST['ville'],
                'avatar' => $_POST['avatar'],
                'telephone' => $_POST['telephone'],
                'appareil' => $_POST['appareil'],
            );
            // var_dump($dataTab);
            if ($this->verifier($dataTab)) {
                $this->user = new User($dataTab);
                var_dump($this->user);
                $ret = $this->model->enregistrerFormulaire($this->user);
                var_dump($ret);
                if ($ret) {
                    $dataTab['admin']=false;
                    $this->gererSession($dataTab);
                    $this->vue->afficherFormOk();
                } else {
                    $this->vue->afficherFormNotOk($dataTab);
                }
            } else {
                $this->vue->afficherFormNotOk($dataTab);
            }
        }
    public function getDeconnexion() {
        $_SESSION['connecte'] = false;
    }

    // Fonction vérifiant les champs de formulaire
    private function verifier($data)
    {
        if ($data['civilite'] != '' && $data['nom'] != '' && $data['prenom'] != '' && $data['pseudo'] != '' && $data['email'] != ''
        //  && $data['avatar'] != '' 
         && $data['motdepasse'] != '' && $data['appareil'] != '') {
            return true;
        } else {
            return false;
        }
    }

    private function gererSession($tab)
    {
        $_SESSION['admin'] = $tab['admin'];
        $_SESSION['pseudo'] = $tab['pseudo'];
        $_SESSION['avatar'] = $tab['avatar'];
        $_SESSION['cles'] = $tab['cles'];
        $_SESSION['email'] = $tab['email'];
        $_SESSION['connecte'] = true;
    }

    public function getAuthentification(){
        $this->vue->afficherConnection();
    }

    public function verifierAuthentification(){
        $this->user=new Compte($_POST);

        $verifAuthentification=$this->model->authentification($this->user);

        if ($verifAuthentification!=false){
            $this->gererSession($verifAuthentification);
            
            $this->vue->afficherConnexionOk();
        }else{
            $this->vue->afficherConnexionNotOk($verifAuthentification);
        }
    }


    public function AuthentificationApplication(){
        $tab=json_decode($_POST, true);

        $this->user=new Compte($tab);

        $verifAuthentification=$this->model->authentification($this->user);

        if ($verifAuthentification!=false){
            $this->gererSession($verifAuthentification);
            
        }else{
            $_SESSION['erreur']="mauvais identifiant ou mot de passe";
        }
        return json_encode($_SESSION);
    }

    public function getModifierCompte(){

        //test
        // $a['pseudo']="max";
        // $a['motdepasse']="toulouse31";
        // $a['civilite']="Mme";
        // $a['nom']="ayoubRouan";
        // $a['prenom']="maxime";
        // $a['avatar']="avatar";
        // $a['appareil']="appareil2";
        // $a['adresse']="15 av Victor Hugo";
        // $a['ville']="tournefeuille";
        // $a['codePostal']=31170;
        $this->user=new User($a);

        $lesUpdates=array();

        $lesUpdates=$this->model->updateCompte($this->user);
        var_dump($lesUpdates);
    }

    }
    

