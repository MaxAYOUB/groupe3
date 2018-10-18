<?php 
class Compte{
/*
 * PROPRIETES
 */	
    private $id_compte = null;
	private $motdepasse = null;
	private $typetape = null;
	private $admin = null;
	private $identifiant = null;
	
	
/*
 * CONSTRUCTEUR
 */	
	public function __construct($a = array()){
	    (isset($a['id_compte'])) ? null : null;
	    (isset($a['motdepasse'])) ? $this->setMotdepasse($a['motdepasse']) : null;
		(isset($a['admin'])) ? $this->setAdmin($a['admin']) : null;
		(isset($a['identifiant'])) ? $this->setIdentifiant($a['identifiant']) : null;
	    (isset($a['identifiant'])) ? $this->setTypetape($a['identifiant']) : null;
		
	}

/*
 * SETTERS
 */
	public function setId_compte($v){
	    $this->id_compte = $this->isAlpha($v) ? $v : null;
	}
	public function setMotdepasse($v){
		$this->motdepasse = $this->isAlpha($v) ? $v : null;
	}
	public function setTypetape($v){
		$this->typetape = $this->isEmail($v) ? "email" : "pseudo";
	}
	public function setAdmin($v){
		$this->admin = $this->isAlpha($v) ? $v : null;
	}
	public function setIdentifiant($v){
		$this->identifiant = $v;
	}
	
	
/*
 * GETTERS
 */
	public function getId_compte(){
	    return $this->id_compte;
	}
	public function getMotdepasse(){
		return $this->motdepasse;
	}
	public function getTypetape(){
		return $this->typetape;
	}
	public function getAdmin(){
		return $this->admin;
	}
	public function getIdentifiant(){
		return $this->identifiant;
	}
	
/*
 * DESTRUCTEUR
 */	
	public function __destruct(){
		
	}
	
   /*
 * EXPRESSIONS REGULIERES**
 */	
	
private function isAlpha($val){
	$regex = "/^[a-zA-Z\-\'\" 0-9]*$/";
	return preg_match($regex,$val);
}

private function isEmail($val){
	$regex = "/^[0-9a-z._-]+@{1}[0-9a-z.-]{2,}[.]{1}[a-z]{2,5}$/i";
	return preg_match($regex,$val);
}

}
?>