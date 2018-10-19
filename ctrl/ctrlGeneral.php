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
        $this->view->afficherForm($database);
    }

    // Enregistrement du formulaire
    public function enregForm()
    {
        $dataTab = array(
            'civilite' => $_POST['civilite'],
            'nom' => $_POST['nom'],
            'prenom' => $_POST['prenom'],
            'pseudo' => $_POST['pseudo'],
            'mot_de_passe' => $_POST['motdepasse'],
            'email' => $_POST['email'],
            'adresse' => $_POST['adresse'],
            'codePostal' => $_POST['codePostal'],
            'ville' => $_POST['ville'],
            'avatar' => $_POST['avatar'],
            'appareil' => $_POST['appareil'],
        );

        if ($this->verifier($dataTab)) {
            $this->user = new User($dataTab);
            $ret = $this->model->enregistrerFormulaire($this->user);
            if ($ret) {
                $dataTab['admin']=false;
                $this->gererSession($dataTab);
                $this->view->afficheFormOk();
            } else {
                $this->view->afficheFormNotOk();
            }
        } else {
            $this->view->afficheFormNotOk();
        }
    }

    public function getDeconnexion() {
        $_SESSION['connecte'] = false;
    }

    // Fonction vérifiant les champs de formulaire
    private function verifier($data)
    {
        if ($data['civilite'] != '' && $data['nom'] != '' && $data['prenom'] != '' && $data['pseudo'] != '' && $data['email'] != '' && $data['motdepasse'] != '' && $data['avatar'] != '' && $data['appareil'] != '' && $data['adresse'] != '' && $data['codePostal'] != '' && $data['ville'] != '') {
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
}
