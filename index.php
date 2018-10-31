<?php 
session_start();
var_dump($_POST);
if (isset($_GET['c']) && isset($_GET['m']) && isset($_GET['a'])){
	
$m=$_GET['m'];
	$ctrl = new $_GET['c'];
	$ctrl->$m($_GET['a']);

}else if (isset($_GET['c']) && isset($_GET['m'])){
	$m=$_GET['m'];
	$ctrl = new $_GET['c'];
	$ctrl->$m();
}else{
	$v="ctrlGeneral";
	$ctrl = new $v;
	$ctrl->getAccueil();
	ini_set('safe_mode','Off');
}

function __autoload($class_name = ""){
	$repertoires = array(
			"ctrl/",
			"model/",
			"view/",
			"system/",
			"metier/",
			"tests/",
            "javaScript"
	);
	$modules= array(
		"modules/admin/",
		"modules/utilisateur/",
		""
	);
	foreach($modules as $module){
		foreach($repertoires as $repertoire){
				$file = "{$module}{$repertoire}{$class_name}.php";
			// var_dump($file);
			
			if(file_exists($file)){
				include_once($file);
			}
		}
	}
}
?>  