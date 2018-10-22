<?php 
class viewAdmin{
	
	public function __construct(){
		
	}
	public function afficherConsoleAdmin(){
	}
	public function afficherRazOk(){
	    echo ('ok');
	   /// include "templates/default.php";
	}
	public function afficherRazNotOk($data){
	    echo ('notok');
		/// include "templates/default.php";
	 }
	public function afficherCompteOk(){
	    echo ('compte ok');
	   /// include "templates/default.php";
	}
	public function afficherCompteNotOk($data){
	    echo ('compte notok');
		/// include "templates/default.php";
	 }
	 public function afficherModifOk(){
	    echo ('modif ok');
	   /// include "templates/default.php";
	}
	public function afficherModifNotOk($data){
	    echo ('modif notok');
		/// include "templates/default.php";
	 }
	 public function afficherAvatarOk(){
	    echo ('avatar ok');
	   /// include "templates/default.php";
	}
	public function afficherAvatarNotOk(){
	    echo ('avatar not ok');
		/// include "templates/default.php";
	 }
}