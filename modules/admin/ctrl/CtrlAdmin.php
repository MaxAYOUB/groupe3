<?php
class CtrlAdmin
{
    private $vue;
    private $model;
    private $compte;
    private $user;
    private $adresse;
    //  public $test;
    public function __construct()
    {
        $this->vue = new viewAdmin;
        $this->model = new modelAdmin;
    }
    public function getConsoleAdmin()
    {
        $this->view->afficherConsoleAdmin();
    }
    //Afficher la liste des utilisateurs
    public function afficherListeUtilisateur()
    {
        $listeUtilisateur = $this->model->recupererUtilisateur();
        if ($listeUtilisateur) {
            $this->vue->afficherListeOK($listeUtilisateur);
        } else {
            $this->vue->afficherListeNotOk();
        }
    }

    public function gererCompte()
    {

        $a['identifiant'] = "martin.sylvie@jkljkl.fr";
        $this->user = new Compte($a);

        //suppression compte
        $compteSup = $this->model->supprimerCompte($this->user);
        if ($compteSup['supprime'] == "1") {
            $this->vue->afficherRazOk();
        } else {
            $this->vue->afficherRazNotOk();
        }
        // ajouter un compte
        $b['civilite'] = "M";
        $b['nom'] = "tabert";
        $b['prenom'] = "eric fdsg dfh df";
        $b['pseudo'] = "mik";
        $b['email'] = "tabert.eric@wanadoo.fr";
        $b['motdepasse'] = "123456";
        $b['telephone'] = "5026562558";
        $b['avatar'] = "obelix";
        $b['appareil'] = "samsung";
        $b['conditionsGenerales'] = "true";
        $b['adresse'] = "****3000 rue des vents";
        $b['codePostal'] = "123122";
        $b['ville'] = "bruguieres***";
        $b['administrateur'] = true;
        $b['supprime'] = "0";
        $this->user = new User($b);

        $ajoutCompte = $this->model->ajouterCompte($this->user);
        // retour du model
        if ($ajoutCompte) {
            $this->vue->afficherCompteOk();
        } else {
            $this->vue->afficherCompteNotOk();
        }

        //modifier un compte
        $this->user = new User($b);
        $modifCompte = $this->model->modifierCompte($this->user);

        //retour du model
        if ($modifCompte) {
            $this->vue->afficherCompteOk();
        } else {
            $this->vue->afficherCompteNotOk("pas passe");
        }
    }
    // Fonction pour gerer les avatars
    public function gererAvatar($suprimmer)
    {

        $av['avatar'] = "daffsdir";
        $av['slug_avatar'] = "idvr";
        $av['supprime'] = $suprimmer;
        $ajoutAvatar = true;
        $this->avatar = new avatar($av);

        if ($suprimmer == 0) {

            //ajouter avatar

            $ajoutAvatar = $this->model->ajouterAvatar($this->avatar);
            var_dump($ajoutAvatar);

        } else {

            //supprimer avatar

            $supprimeAvatar = $this->model->supprimerAvatar($this->avatar);
            var_dump($this->avatar);
        }
        if ($ajoutAvatar != false) {
            $this->vue->afficherAvatarOk();
        } else { //view supprime ok?
            $this->vue->afficherAvatarNotOk();
        }
    }
}
