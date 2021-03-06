<?php
class user
{

    /*
     * PROPRIETES
     */

    private $civilite = null;
    private $nom = null;
    private $prenom = null;
    private $pseudo = null;
    private $email = null;
    private $motdepasse = null;
    private $avatar = null;
    private $telephone = null;
    private $appareil = null;
    private $conditionsGenerales = null;
    private $adresse = null;
    private $codePostal = null;
    private $ville = null;
    private $administrateur = null;

    /*
     * CONSTRUCTEUR
     */

    public function __construct($a = array())
    {

        (isset($a['civilite'])) ? $this->setCivilite($a['civilite']) : null;
        (isset($a['nom'])) ? $this->setNom($a['nom']) : null;
        (isset($a['prenom'])) ? $this->setPrenom($a['prenom']) : null;
        (isset($a['pseudo'])) ? $this->setPseudo($a['pseudo']) : null;
        (isset($a['email'])) ? $this->setEmail($a['email']) : null;
        (isset($a['motdepasse'])) ? $this->setMotdepasse($a['motdepasse']) : null;
        (isset($a['avatar'])) ? $this->setAvatar($a['avatar']) : null;
        (isset($a['telephone'])) ? $this->setTelephone($a['telephone']) : null;
        (isset($a['appareil'])) ? $this->setAppareil($a['appareil']) : null;
        (isset($a['conditionsGenerales'])) ? $this->setConditionsGenerales($a['conditionsGenerales']) : null;
        (isset($a['adresse'])) ? $this->setAdresse($a['adresse']) : null;
        (isset($a['codePostal'])) ? $this->setCodepostal($a['codePostal']) : null;
        (isset($a['ville'])) ? $this->setVille($a['ville']) : null;
        (isset($a['administrateur'])) ? $this->setAdministrateur($a['administrateur']) : null;

    }

    /*
     * SETTERS
     */

    public function setCivilite($v)
    {
        $this->civilite = $this->isAlpha($v) ? $v : null;
    }
    public function setNom($v)
    {
        $this->nom = $this->isAlpha($v) ? $v : null;
    }
    public function setPrenom($v)
    {
        $this->prenom = $this->isAlpha($v) ? $v : null;
    }
    public function setPseudo($v)
    {
        $this->pseudo = $this->isAlpha($v) ? $v : null;
    }
    public function setEmail($v)
    {
        $v = str_replace("_", ".", $v);
        $this->email = $this->isEmail($v) ? $v : null;
    }
    public function setMotdepasse($v)
    {
        $this->motdepasse = $this->isAlpha($v) ? md5($v, $raw_output = false) : null;
    }
    public function setAvatar($v)
    {
        $v = str_replace("_", " ", $v);
        $this->avatar = $this->isAlpha($v) ? $v : null;
    }
    public function setTelephone($v)
    {
        $this->telephone = $this->isInteger($v) ? $v : null;
    }
    public function setAppareil($v)
    {
        $this->appareil = $this->isAlpha($v) ? $v : null;
    }
    public function setConditionsGenerales($v)
    {
        $this->conditionsGenerales = $this->isAlpha($v) ? $v : null;
    }
    public function setAdresse($v)
    {
        $v = str_replace("_", " ", $v);
        $this->adresse = $this->isAlpha($v) ? $v : null;
    }
    public function setCodepostal($v)
    {
        $this->codePostal = $this->isInteger($v) ? $v : null;
    }
    public function setVille($v)
    {
        $this->ville = $this->isAlpha($v) ? $v : null;
    }
    public function setAdministrateur($v)
    {
        $this->administrateur = $v;
    }

    /*
     * GETTERS
     */

    public function getCivilite()
    {
        return $this->civilite;
    }
    public function getNom()
    {
        return $this->nom;
    }
    public function getPrenom()
    {
        return $this->prenom;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function getMotdepasse()
    {
        return $this->motdepasse;
    }
    public function getAvatar()
    {
        return $this->avatar;
    }
    public function getTelephone()
    {
        return $this->telephone;
    }
    public function getAppareil()
    {
        return $this->appareil;
    }
    public function getConditionsGenerales()
    {
        return $this->conditionsGenerales;
    }
    public function getAdresse()
    {
        return $this->adresse;
    }
    public function getCodepostal()
    {
        return $this->codePostal;
    }
    public function getVille()
    {
        return $this->ville;
    }
    public function getAdministrateur()
    {
        return $this->administrateur;
    }

    /*
     * DESTRUCTEUR
     */

    public function __destruct()
    {

    }

    /**
     * EXPRESSIONS REGUILIERES
     */

    private function isAlpha($val)
    {
        $regex = "/^[a-zA-Z\-\'\" 0-9]*$/";
        return preg_match($regex, $val);
    }

    private function isEmail($val)
    {
        $regex = "/^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$/i";
        return preg_match($regex, $val);
    }

    private function isInteger($val)
    {
        $regex = "/^[0-9]*$/";
        return preg_match($regex, $val);
    }
}
