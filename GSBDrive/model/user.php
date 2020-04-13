<?php

class User{

    private $pdo;

    public function __construct(){
        $config = parse_ini_file("config.ini");
		
		try {
			$this->pdo = new \PDO("mysql:host=".$config["host"].";dbname=".$config["database"], $config["user"], $config["password"]);
		} catch(Exception $e) {
			echo $e->getMessage();
		}
    }
    public function verificationEmailExist($email)
    {
        $sql=$this->pdo->prepare("SELECT * FROM user WHERE mail_user =':email'");
        //echo $req;
        $sql->bindParam(':email',$email);
        $sql->execute();
        if($sql->rowCount() == 0) 
        {
            return true;
        }
        else{
            return false;
        }
    }
    public function ajoutUser($nom, $prenom, $mail, $mdp, $adresse, $ville, $cp, $tel){
        $mdpHash=password_hash($mdp,PASSWORD_BCRYPT);
       	$sql =$this->pdo->prepare("INSERT INTO user(nom_user, prenom_user, mail_user, mdp_user, adresse_user, ville_user, cp_user, telephone_user) VALUES (:nom, :prenom, :mail, :mdp, :adresse, :ville, :cp, :tel)");
        //echo $req;
        $sql->bindParam(':nom',$nom);
        $sql->bindParam(':prenom',$prenom);
        $sql->bindParam(':mail',$mail);
        $sql->bindParam(':mdp',$mdpHash);
        $sql->bindParam(':adresse',$adresse);
        $sql->bindParam(':ville',$ville);
        $sql->bindParam(':cp',$cp);
        $sql->bindParam(':tel',$tel);
		$sql->execute();
        $_SESSION['id'] = $this->pdo->lastInsertId();
    }

    public function getall($id)
    {
        $sql=$this->pdo->prepare("SELECT * FROM user WHERE id_user=:id");
        $sql->bindParam(':id',$id);
        $sql->execute();
        return $sql->fetch();
    }

    public function verrifie($mail, $mdp){
        $sql =$this->pdo->prepare("SELECT id_user,mail_user, mdp_user FROM `user` WHERE mail_user=:mail");
        $sql->bindParam(':mail',$mail);
        $sql->execute();
        if($sql->rowCount() > 0) 
        {
            $test = $sql->fetch();
	        if(password_verify($mdp, $test['mdp_user']))
	        {
	            $_SESSION['connecter'] = true;
	            $_SESSION['id']= $test['id_user'];
                //echo $req;
	        }
            else
            {
                $_SESSION['connecter'] = false;
                //echo $req;
            }
	    }
	    else
        {
            $_SESSION['connecter'] = false;
            //echo $req;
        }
    }

    public function modifWithMdp($nom,$prenom,$mail,$mdp,$ville,$cp,$adresse,$tel)
    {
        $mdpHash=password_hash($mdp,PASSWORD_BCRYPT);

        $sql=$this->pdo->prepare("UPDATE user SET nom_user=:nom, prenom_user=:prenom , mail_user=:mail , mdp_user=:mdp , ville_user=:ville , cp_user=:cp , adresse_user=:adresse , telephone_user=:tel WHERE id_user=:id"); 
        $sql->bindParam(':nom',$nom);
        $sql->bindParam(':prenom',$prenom);
        $sql->bindParam(':mail',$mail);
        $sql->bindParam(':mdp',$mdpHash);
        $sql->bindParam(':adresse',$adresse);
        $sql->bindParam(':ville',$ville);
        $sql->bindParam(':cp',$cp);
        $sql->bindParam(':tel',$tel);
        $sql->bindParam(':id',$_SESSION["id"]);
        //echo $sql;
        $sql->execute();
        return $sql->fetch();
    }

    public function modif($nom,$prenom,$mail,$ville,$cp,$adresse,$tel)
    {
        $sql=$this->pdo->prepare("UPDATE user SET nom_user=:nom, prenom_user=:prenom , mail_user=:mail , ville_user=:ville , cp_user=:cp , adresse_user=:adresse , telephone_user=:tel WHERE id_user=:id"); 
        $sql->bindParam(':nom',$nom);
        $sql->bindParam(':prenom',$prenom);
        $sql->bindParam(':mail',$mail);
        $sql->bindParam(':adresse',$adresse);
        $sql->bindParam(':ville',$ville);
        $sql->bindParam(':cp',$cp);
        $sql->bindParam(':tel',$tel);
        $sql->bindParam(':id',$_SESSION["id"]);
        var_dump($sql);
        echo "<br/>".$nom;
        echo "<br/>".$prenom;
        echo "<br/>".$mail;
        echo "<br/>".$ville;
        echo "<br/>".$cp;
        echo "<br/>".$adresse;
        echo "<br/>".$tel;
        $sql->execute();
        return $sql->fetch();
    }
}

?>