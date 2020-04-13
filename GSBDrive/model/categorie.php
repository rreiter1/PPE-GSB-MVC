<?php

class categorie {
	
	// Objet PDO servant Ã  la connexion Ã  la base
	private $pdo;

	// Connexion Ã  la base de donnÃ©es
	public function __construct() {
		$config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"], $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
	}
	
	// RÃ©cupÃ¨re tous les enregistrements de la table
	public function getAll() {
		$sql = "SELECT * FROM categorie";		
		$req = $this->pdo->prepare($sql);
		$req->execute();		
		return $req->fetchAll();
	}
	public function getCategorie($id_cat)
	{
		$sql = $this->pdo->prepare("SELECT nom_categorie FROM categorie Where id_categorie = :id");	
		$sql->bindParam(':id',$id_cat);	
		$sql->execute();		
		return $sql->fetch();
	}
	
	public function getNom()
	{
		$sql="SELECT nom_categorie FROM categorie";
		$req = $this->pdo->prepare($sql);
		$req->execute();
		return $req->fetchAll();
	}
}