<?php

class Commande {
	
	// Objet PDO servant à la connexion à la base
	private $pdo;

	// Connexion à la base de données
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"], $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	// Récupère tous les enregistrements de la table
	public function getAll() {
		$sql = "SELECT * FROM commande";
		
		$req = $this->pdo->prepare($sql);
		$req->execute();
		
		return $req->fetchAll();
	}
	
	public function insertCommande($id_pharma,$id_user)
	{
		$sql = $this->pdo->prepare("INSERT INTO commande (date_command,id_pharma,id_user) VALUES (CURRENT_DATE(), :id_pharma ,:id_user)");
		$sql->bindParam(':id_pharma',$id_pharma);
		$sql->bindParam(':id_user', $id_user);
		$sql ->execute();
		$_SESSION['idCommande'] = $this->pdo->lastInsertId();
	}

	public function afficherTout()
	{
		$req = $this->pdo->prepare("SELECT medicament.nom_medoc, pharmacie.nom_pharma , commande.date_command , quantite FROM contient INNER JOIN commande ON commande.id_command = contient.id_command INNER JOIN pharmacie ON pharmacie.id_pharma = commande.id_pharma INNER JOIN medicament ON medicament.id_medoc = contient.id_medoc WHERE id_user =:id_user");
		$req->bindParam(':id_user', $_SESSION['id']);
		$req->execute();		
		return $req->fetchAll();
	}

	public function afficherLaCommande($id)
	{
		$req = $this->pdo->prepare("SELECT medicament.nom_medoc,medicament.description_medoc, pharmacie.nom_pharma , commande.date_command , quantite FROM contient INNER JOIN commande ON commande.id_command = contient.id_command INNER JOIN pharmacie ON pharmacie.id_pharma = commande.id_pharma INNER JOIN medicament ON medicament.id_medoc = contient.id_medoc WHERE commande.id_command = :id_commande ");
		$req->bindParam(':id_commande',$id);
		$req->execute();
		return $req->fetchAll();
	}
	public function afficherListcommandes()
	{
		$req = $this->pdo->prepare("SELECT * FROM `commande` WHERE id_user = :id Order by date_command desc");
		$req->bindParam(':id',$_SESSION["id"]);
		$req->execute();
		return $req->fetchAll();
	}
}

?>