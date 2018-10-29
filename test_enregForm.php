<?php
$_GET['c'] = "ctrlGeneral";
$_GET['m'] = "enregForm";

$_POST = array(
	'civilite' => "Monsieur",
	'nom' => "Viguier",
	'prenom' => "Philippe",
	'email' => "philippe.viguier@afpa.fr",
	'adresse' => "afpa",
	'codePostal' => "",
	'ville' => "Toulouse",
	'appareil' => "Android",
	'telephone' => "0612345678",
	'motdepasse' => "azerty",
	'avatar' => "Sea Monster",
	'conditionsGenerales' => true,
	'pseudo' => "philippe"

);

include "index.php";




/*
{civilite: "Monsieur", nom: "Viguier", prenom: "Philippe", telephone: "06", email: "philippe.viguier@afpa.fr", …}
adresse: "afpa"
appareil: "Android"
avatar: "Sea Monster"
civilite: "Monsieur"
codePostal: ""
conditionsGenerales: true
email: "philippe.viguier@afpa.fr"
motdepasse: "azerty"
nom: "Viguier"
prenom: "Philippe"
pseudo: "philippe"
telephone: "06"
ville: ""

*/
?>