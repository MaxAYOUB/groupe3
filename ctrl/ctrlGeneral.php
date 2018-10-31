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
    public function getParametre($bienPasse)
    {
        $this->vue->afficherParametre($bienPasse);
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
    public function getCgu()
    {
        $this->vue->afficherCgu();
    }

    public function getForm()
    {
        // Variable avatar contenant le résultat de la requête getAvatar
        $avatar = $this->model->getAvatar();
        $_SESSION['listeAvatar']=$avatar;
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
            $dataTab = $_POST;

        if ($this->verifier($dataTab)) {
            $this->user = new user($dataTab);
            $ret = $this->model->enregistrerFormulaire($this->user);
            if ($ret != false && isset($ret['0']['cles'])) {
                $dataTab['cles'] = $ret['0']['cles'];
                $dataTab['admin'] = false;

                foreach ($_SESSION['listeAvatar'] as $avatars) {
                    if ($avatars['slug_avatar']==$dataTab['avatar']){
                        $dataTab['avatar']=$avatars['avatar'];
                    }
                }
                $this->gererSession($dataTab);
            } else {
                $dataTab['erreur'] = $ret;
            }

        }else{
            $dataTab['erreur']="true";
            $retour="notOK";
        }
        $this->vue->afficherFormOK($dataTab);
        
    }
        

    public function getDeconnexion()
    {
        $_SESSION['admin'] = "";
        $_SESSION['pseudo'] = "";
        $_SESSION['avatar'] = "";
        $_SESSION['cles'] = "";
        $_SESSION['email'] = "";
        $_SESSION['connecte'] = false;
        $_SESSION['nom'] = "";
        $_SESSION['prenom'] = "";

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
        $_SESSION['nom'] = $tab['nom'];
        $_SESSION['prenom'] = $tab['prenom'];
    }

    public function getAuthentification()
    {
        $this->vue->afficherConnection();
    }

    public function verifierAuthentification()
    {

        foreach ($_POST as $key => $val) {
            $dataTab = json_decode($key, true);
        }
        // var_dump($dataTab);
        $this->user = new Compte($dataTab);
        // var_dump($this->user);
        $verifAuthentification = $this->model->authentification($this->user);
        if ($verifAuthentification != false) {
            $avatar = $this->model->getAvatar();
            $_SESSION['listeAvatar']=$avatar;
            $this->gererSession($verifAuthentification);
            $data['bon']=true;
            $this->vue->afficherConnexionOk($data);
        } else {
            // $this->vue->afficherConnexionNotOk($verifAuthentification);
            $data['erreur']=true;
            $this->vue->afficherConnexionNotOk($data);
        }
    }

    public function AuthentificationApplication()
    {
        // var_dump($_POST);
        $tab = $_POST;
        // var_dump($tab);
        $tab['identifiant']=$tab['id'];
        $tab['motdepasse']=$tab['password'];
        $this->user = new Compte($tab);
        $verifAuthentification = $this->model->authentification($this->user);
        if ($verifAuthentification != false) {
            $avatar = $this->model->getAvatar();
            $verifAuthentification['avatar']=$avatar;
            $this->gererSession($verifAuthentification);
        } else {
            $_SESSION['erreur'] = "mauvais identifiant ou mot de passe";
        }
        $this->vue->afficherConnexionOk($_SESSION);
    }

    public function getModifierCompte()
    {
        $this->user = new user($a);
        $lesUpdates = array();
        $lesUpdates = $this->model->updateCompte($this->user);
        var_dump($lesUpdates);
    }

    public function gererPassword(){
        var_dump($_POST);
        $this->user=new Compte($_POST);
        $sesDonnees=array();
        $sesDonnees=$this->model->razPassword($this->user);

        //verifie si tout c'est bien passé
        if (!$sesDonnees['erreurPseudo'] && !$sesDonnees['erreurPassword']){
            var_dump($sesDonnees);
            //le message du mail
            $message = "Bonjour,\r\nVous nous avez signalé que vous aviez oublié votre mot de passe et/ou votre pseudo.
            \r\nVotre pseudo : {$sesDonnees['pseudo']}\r\nVotre password : {$sesDonnees['mot_de_passe']}\r\n \r\n
            Veuillez penser à modifier votre mot de passe.";

            //il ne faut pas que les lignes fassent plus de 70 char donc par sécurité on met ça pour les couper tous les 70 char
            $message = wordwrap($message, 70, "\r\n");

            //le header
            $headers = 'From: filrouge@afpa-balma.fr' . "\r\n" .
            'Reply-To: filrouge@afpa-balma.fr' . "\r\n" .
            'X-Mailer: PHP/' . phpversion();

            // Envoi du mail
            $ok = mail($this->user->getIdentifiant(), 'Modification du mot de passe', $message, $headers);
            if ($ok){
                $this->getAccueil();
            }else{
                $this->getAuthentification();
            }
        }else{
            var_dump($sesDonnees);
        }
    }

    public function modifierMotDePasse(){
        
        $this->user=new Compte($_POST);
        
        $result['erreur']=$this->model->modifierPassword($this->user);
        $this->vue->afficherConnexionOk($result);
    }

    public function modifierAvatar(){
        // var_dump($_POST);
        $this->user=new avatar($_POST);
        $resultat['erreur']=$this->model->UpdateAvatar($this->user);
        $this->vue->afficherConnexionOk($resultat);
    }
    public function telechargerAPK(){
        $this->vue->fichierAPK();
    }
}
