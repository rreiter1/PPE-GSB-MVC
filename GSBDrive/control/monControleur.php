<?php
class monControleur {
	
	public function accueil() {
		$obj = (new categorie)->getAll();
		//changeais ViewN quand on regrouperas les Vue
		(new maVue)->accueil($obj);
	}
	public function categorie($idCat) {
		$obj2 = (new categorie)->getAll();
		$obj = (new medicament)->getMedicamentParCategorie($idCat);
		//changeais ViewN quand on regrouperas les Vue
		(new maVue)->categorie($obj,$obj2);
	}
	public function inscription() {
		//changeais viewA quand on regrouperas les Vue
		(new maVue)->inscription();
	}
	public function validerInscription($nom,$prenom,$mail,$mdp,$mdpConf,$adresse,$ville,$cp,$tel)
	{
		if((new User)->verificationEmailExist($mail))
		{
			if($mdpConf == $mdp)
			{
				(new User)->ajoutUser($nom,$prenom,$mail,$mdp,$adresse,$ville,$cp,$tel);
				$_SESSION['connecter'] = true;
				$_SESSION["message"]['text'] = "Vous etes maintenant enregistré<br/>";
				$this->accueil();				
			}
			else
			{
				$_SESSION["message"]['text'] = "Les mots de passe ne correspondent pas<br/>";
				$this->inscription();
			}
		}
		else
		{
			$_SESSION["message"]['text'] = "L'adresse mail est deja utilisé<br/>";
			$this->inscription();
		}
		$_SESSION["message"]['text'] ="";
	}
	private function getTableauPanier() {
		$lesQuantites = array();
		if(isset($_COOKIE['panier']) && $_COOKIE['panier']!="null" && $_COOKIE['panier']!="")
        {
        	$Panier = json_decode($_COOKIE['panier']);
        	//var_dump($Panier);
            sort($Panier);
            $i=0;
            
            //var_dump($Panier);
            
            foreach ($Panier as $article) 
            {
            	//var_dump($article);

            	if(array_key_exists($article, $lesQuantites))
            	{
            		$lesQuantites[$article] = $lesQuantites[$article] + 1;
            	}
            	else
            	{
            		$lesQuantites[$article] = 1;
            	}
            }
        }

        return $lesQuantites;
	}

	public function panier()
	{
		$lesQuantites = $this->getTableauPanier();
		(new maVue)->panier($lesQuantites);
	}
	public function affichePanier($id_med)
	{
		$data = (new medicament)->getMedicament($id_med);
		(new maVue)->affPanier($data);
	}
	public function afficheConnection()
	{

		(new maVue)->affConnection();
	}
	public function verifConnexion($id,$mdp)
	{
		(new User)->verrifie($id,$mdp);
		if($_SESSION['connecter'])
		{
			if(isset($_SESSION["finPanier"])and $_SESSION["finPanier"])
			{
				$this->siteOfficine();
			}
			$this->accueil();
		}
		else
		{
			echo "ERREUR , Vous avez mal saisie votre mots de passe ou votre email";
			(new maVue)->affConnection();
		}
	}

	public function siteOfficine()
	{
		$lesQuantites = $this->getTableauPanier();

		if(isset($_POST['ValiderPanier']))
        {
            foreach ($lesQuantites as $article => $Quantite) 
            {   
                $lesQuantites[$article] = $_POST[$article];
            }
            $_SESSION['Panier']=$lesQuantites;


            if(isset($_SESSION["connecter"]))
            {
            	$obj =(new Officine)->getAllOfficine();
                (new maVue)->afficheOfficine($obj);
            }
            else
            {
                $_SESSION['finPanier']=true;
                (new monControleur)->afficheConnection();
            }
        }
	}
	
	public function seDeconecter()
	{
		unset($_SESSION["connecter"]);
		session_destroy();
		$this->accueil();
	}

	public function affMonProfil()
	{
		//$objCom = (new Commande)->afficherTout();
		$_SESSION['modifFait'] = false;
		$obj = (new User)->getall($_SESSION["id"]);
		(new maVue)->modiferInfos($obj);
	}

	public function validerModifs($nom,$prenom,$mail,$mdp,$mdp2,$adresse,$ville,$cp,$tel)
	{
		if(isset($mdp) && $mdp == "")
		{
			
			(new User)->modif($nom, $prenom, $mail, $ville, $cp, $adresse, $tel);
		}
		else
		{
			if($mdp == $mdp2)
				(new User)->modifWithMdp($nom, $prenom, $mail, $mdp, $ville, $cp, $adresse, $tel);
			else
			{
				$_SESSION['modifFait'] = false;
				echo "Les mots de passe ne sont pas identique";
				$objUser = (new User)->getall($_SESSION["id"]);
				(new maVue)->modiferInfos($objUser);
				exit();
			}
		}
		$_SESSION['modifFait'] = true;
		$objUser = (new User)->getall($_SESSION["id"]);
		(new maVue)->modiferInfos($objUser);
	}
	public function valCommande($lieuOfficine)
	{
		if( isset($_SESSION['id']) && isset($_SESSION['Panier']) && isset($_POST['ValiderCom']))
		{
			if($_SESSION['id']!="" and $_SESSION['Panier']!="")
			{
				(new Commande)->insertCommande($lieuOfficine,$_SESSION['id']);
				foreach ($_SESSION['Panier'] as $idArticle => $quandtiter) {
					if($quandtiter!=0)
					{
						(new Contient)->insertContient($idArticle,$_SESSION['idCommande'],$quandtiter);
					}
				}
				$_SESSION['finCommande']=true;
				$this->recapCommande();
				unset($_SESSION["idCommande"]);
				unset($_SESSION["Panier"]);
				setcookie("panier","");
				//(new monControleur)->accueil();
				unset($_SESSION['finCommande']);
			}
			else
			{
				(new monControleur)->accueil();
			}
		}
		else
		{
			(new monControleur)->accueil();
		}
	}


	public function listCommandes()
	{
		$obj = (new Commande)->afficherListCommandes();
		(new maVue)->affListCommandes($obj);
	}

	public function recapCommande()
	{
		if(isset($_SESSION["idCommande"]))
		{
			$obj = (new Commande)->afficherLaCommande($_SESSION["idCommande"]);
		}
		else if (isset($_POST['idCommande']))
		{
			$obj = (new Commande)->afficherLaCommande($_POST["idCommande"]);
		}
		else
		{
			$this->listCommandes();
			exit;
		}
		(new maVue)->recap($obj);
	}
}


