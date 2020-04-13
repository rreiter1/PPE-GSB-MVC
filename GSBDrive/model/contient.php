<?php

class Contient {
	
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
		$sql = "SELECT * FROM contient";
		
		$req = $this->pdo->prepare($sql);
		$req->execute();
		
		return $req->fetchAll();
	}
	
	public function insertContient($id_medoc,$id_command,$quantite)
	{
		$sql =$this->pdo->prepare("INSERT INTO contient (id_medoc,id_command,quantite) VALUES (:id_medoc, :id_commande,:quantite)");
		//echo $sql;
		$sql->bindParam(':id_medoc',$id_medoc);
		$sql->bindParam(':id_commande',$id_command);
		$sql->bindParam(':quantite',$quantite);
		$sql ->execute();
	}
	
	public function getQuantite($id_command)
	{
		$sql=$this->pdo->prepare("SELECT quantite FROM contient WHERE id_command = :id_commande");
		$sql->bindParam(':id_commande',$id_command);
		$sql->execute();
		
		return $sql->fetch();
	}
}

?>

