<?php
/*
 *   @T.Noël @M.Ayoub
 *   Construction de la classe ctrlGeneral
 */

class ctrlGeneral
{
    private $vue;
    private $model;
    private $user;

    public function __construct()
    {
        $this->vue = new viewGeneral();
        $this->model = new modelGeneral();
    }

    public function getAccueil()
    {
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
        $dataTab = array(
            'civilite' => $_POST['civilite'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'pseudo' => $_POST['pseudo'],
            'motdepasse' => $_POST['motdepasse'],
            'email' => $_POST['email'],
            'telephone' => $_POST['telephone'],
            'adresse' => $_POST['adresse'],
            'codePostal' => $_POST['codePostal'],
            'ville' => $_POST['ville'],
            'avatar' => $_POST['avatar'],
            'appareil' => $_POST['appareil'],
        );

        if ($this->verifier($dataTab)) {
            $this->user = new User($dataTab);
            $ret = $this->model->enregistrerFormulaire($this->user);
            if ($ret != false && isset($ret['0']['cles'])) {
                $dataTab['cles'] = $ret['0']['cles'];
                $dataTab['admin'] = false;
                $this->gererSession($dataTab);
                $this->vue->afficherFormOk();
            } else {
                $dataTab['erreur'] = $ret;
                $this->vue->afficherFormNotOk($dataTab);
            }
        }}

    public function getDeconnexion() {
        $_SESSION['connecte'] = false;
    }

    // Fonction vérifiant les champs de formulaire
    private function verifier($data)
    {
        if ($data['civilite'] != '' && $data['nom'] != '' && $data['prenom'] != '' && $data['pseudo'] != '' && $data['motdepasse'] != '' && $data['email'] != '' && $data['telephone'] != '' && $data['appareil'] != '') {
            //  && $data['avatar'] != ''
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

    public function getAuthentification()
    {
        $this->vue->afficherConnection();
    }

    public function verifierAuthentification()
    {
        // $a['identifiant']="maxime@gmail.com";

        //informations de tests
        // $a['identifiant']="max";
        // $a['motdepasse']="toulouse31";
        // $a=array();
        // $this->user=new Compte($a);

        $this->user = new Compte($_POST);
        // var_dump($this->user);

        $verifAuthentification = $this->model->authentification($this->user);
        // var_dump($verifAuthentification);

        if ($verifAuthentification != false) {
            $this->gererSession($verifAuthentification);
            // var_dump($_SESSION);
            $this->vue->afficherConnexionOk();
        } else {
            $this->vue->afficherConnexionNotOk($verifAuthentification);
        }
    }

    public function AuthentificationApplication()
    {
        $tab = json_decode($_POST, true);
        $this->user = new Compte($tab);
        // var_dump($this->user);
        $verifAuthentification = $this->model->authentification($this->user);
        // var_dump($verifAuthentification);
        if ($verifAuthentification != false) {
            $this->gererSession($verifAuthentification);
            // var_dump($_SESSION);
        } else {
            $_SESSION['erreur'] = "mauvais identifiant ou mot de passe";
        }
        return json_encode($_SESSION);
    }

    public function getModifierCompte()
    {
        //test
        $a['pseudo']="max ezfqsdf sdqf";
        $a['motdepasse']="toulouse31";
        $a['civilite']="Mr";
        $a['nom']="ayoubR";
        $a['prenom']="max";
        $a['avatar']="avatar";
        $a['appareil']="appareil2";
        $a['adresse']="20 av Victor Hugo";
        $a['ville']="tournefeuille";
        $a['codePostal']=31170;
        $this->user=new User($a);

        $lesUpdates=array();

        // $this->user=new Compte($_POST);
        $lesUpdates=$this->model->updateCompte($this->user);
        var_dump($lesUpdates);
    }

    }
    

