<?php
class medicament {
	
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
		$sql = "SELECT * FROM medicament";		
		$req = $this->pdo->prepare($sql);
		$req->execute();		
		return $req->fetchAll();
	}	
	public function getAllFullName() {
		$sql = "SELECT * FROM medicament Inner join categorie on categorie.id_categorie = medicament.id_categorie";		
		$req = $this->pdo->prepare($sql);
		$req->execute();		
		return $req->fetchAll();
	}
	public function getMedicament($id_med) {
		$sql =$this->pdo->prepare("SELECT * FROM medicament Where id_medoc =:id_med");	
		$sql->bindParam(':id_med',$id_med);	
		$sql->execute();		
		return $sql->fetch();
	}
	public function getMedicamentParCategorie($id_cat) {
		$sql = $this->pdo->prepare("SELECT * FROM medicament Inner join categorie on categorie.id_categorie = medicament.id_categorie Where medicament.id_categorie = :id_cat order by nom_medoc ASC");	
		//echo $sql;
		$sql->bindParam(':id_cat',$id_cat);
		$sql->execute();		
		return $sql->fetchAll();
	}
	
	public function getMedicamentNom($nom)
	{
		$sql=$this->pdo->prepare("SELECT * FROM medicament WHERE nom_medoc LIKE % :nom %");
		$sql->bindParam(':nom',$nom);
		$sql->execute;
		return $sql->fetchAll();
	}
}

