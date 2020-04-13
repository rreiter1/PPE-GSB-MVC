<?php

class Officine {
	
	// Objet PDO servant à la connexion à la base
	private $pdo;

	// Connexion à la base de données
	public function __construct() 
	{
		$config = parse_ini_file("config.ini");
		
		try
		{
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"], $config["user"], $config["password"]);
		} 
		catch(Exception $e)
		{
			echo $e->getMessage();
		}
	}
	
	// Récupère tous les enregistrements de la table
	public function getAllOfficine() 
	{
		$sql = "SELECT * FROM pharmacie";
		
		$req = $this->pdo->prepare($sql);
		$req->execute();
		
		return $req->fetchAll();
	}

	public function getNomByID($id) 
	{
		$sql =$this->pdo->prepare("SELECT nom_pharma FROM pharmacie WHERE id_pharma= :id");
		$sql->bindParam(':id',$id);
		$sql->execute();
		
		return $sql->fetchAll();
	}
	
	
}
