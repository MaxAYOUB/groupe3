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

    // Ajout par Jade et Carl
    public function getCompte()
    {
        $this->vue->afficherCompte();
    }
    public function getParametre()
    {
        $this->vue->afficherParametre();
    }
    public function getListe()
    {
        $this->vue->afficherListe();
    }
    public function getGalerie()
    {
        $this->vue->afficherGalerie();
    }
    public function getAjoutUser()
    {
        $this->vue->afficherAjoutUser();
    }
    public function getEditUser()
    {
        $this->vue->afficherEditUser();
    }
// Fin d'ajout

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
        foreach ($_POST as $key => $val) {
            $dataTab = json_decode($key, true);
        }

        if ($this->verifier($dataTab)) {
            $this->user = new User($dataTab);
            var_dump($this->user);
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

    public function getDeconnexion()
    {
        $_SESSION['admin'] = "";
        $_SESSION['pseudo'] = "";
        $_SESSION['avatar'] = "";
        $_SESSION['cles'] = "";
        $_SESSION['email'] = "";
        $_SESSION['connecte'] = false;

        $this->vue->afficherAccueil();
    }

    // Fonction vérifiant les champs de formulaire
    private function verifier($data)
    {
        if ($data['civilite'] != '' && $data['nom'] != '' && $data['prenom'] != '' && $data['pseudo'] != '' && $data['email'] != '' && $data['motdepasse'] != '' && $data['appareil'] != '') {
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
        $this->user = new Compte($_POST);
        $verifAuthentification = $this->model->authentification($this->user);
        if ($verifAuthentification != false) {
            $this->gererSession($verifAuthentification);
            $this->vue->afficherConnexionOk();
        } else {
            $this->vue->afficherConnexionNotOk($verifAuthentification);
        }
    }

    public function AuthentificationApplication()
    {
        $tab = json_decode($_POST, true);
        $this->user = new Compte($tab);
        $verifAuthentification = $this->model->authentification($this->user);
        if ($verifAuthentification != false) {
            $this->gererSession($verifAuthentification);
        } else {
            $_SESSION['erreur'] = "mauvais identifiant ou mot de passe";
        }
        return json_encode($_SESSION);
    }

    public function getModifierCompte()
    {
        $this->user = new User($a);
        $lesUpdates = array();
        $lesUpdates = $this->model->updateCompte($this->user);
        var_dump($lesUpdates);
    }
}
