<meta charset="utf-8">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link href='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.css' rel='stylesheet' />
<link rel="stylesheet" href="CSS/index.css"/>
<script src="JS/local.js" type="text/javascript"></script>
<?php

ini_set("display_errors", 1);
ini_set("display_startup_errors", 1);
error_reporting(E_ALL);
session_start();

// Chargement des fichiers MVC
require("control/monControleur.php");
require("view/maVue.php");
require("model/categorie.php");
require("model/commande.php");
require("model/contient.php");
require("model/medicament.php");
require("model/user.php");
require("model/officine.php");

// Routes
if(isset($_GET["action"])) {
	switch($_GET["action"]) {
		case "accueil":
			(new monControleur)->accueil();
			break;
		case "Inscription":
			(new monControleur)->inscription();
			break;
		case "Categorie":
			(new monControleur)->categorie($_GET['idCat']);
			break;
		case "Connexion":
			(new monControleur)->afficheConnection();
			break;
		case "Verifconn":
			(new monControleur)->verifConnexion($_POST['identifiant'],$_POST['password']);
			break;
		case "valInscription":
			(new monControleur)->validerInscription($_POST['nomUser'],$_POST['prenomUser'],$_POST['mailUser'],$_POST['mdpUser'],$_POST['mdpConfUser'],$_POST['adresseUser'],$_POST['villeUser'],$_POST['cpUser'],$_POST['telUser']);
			break;
		case "Categorie":
			(new monControleur)->categorie($_GET['idCat']);
			break;
		case "Panier":
			(new monControleur)->panier();
			break;
		case "ValidPanier":
			(new monControleur)->siteOfficine();
			break;	
		case "Deconnecter":
			(new monControleur)->seDeconecter();
			break;
		case "Profil":
			(new monControleur)->affMonProfil();
			break;
		case "validerModifs":
			(new monControleur)->validerModifs($_POST["nomUser"],$_POST["prenomUser"],$_POST["mailUser"],$_POST["mdpUser"],$_POST["mdpConfUser"],$_POST["adresseUser"],$_POST["villeUser"],$_POST["cpUser"],$_POST["telUser"]);
			break;
		case "ValiderCommande":
			(new monControleur)->valCommande($_POST['selectionOfficine']);
			break;
		case "historiqueCommande":
			(new monControleur)->listCommandes();
			break;
		case "affCommande":
			(new monControleur)->recapCommande();
			break;
		// Route par défaut : erreur 404
		default:
			(new monControleur)->accueil();
			break;
	}
}
else {
	// Pas d'action précisée = afficher l'accueil
	(new monControleur)->accueil();
}

?>
<script type="text/javascript">
	chargerPanier();
</script>