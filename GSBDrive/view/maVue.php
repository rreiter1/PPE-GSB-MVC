<?php

class maVue {
	
	public function accueil($data) 
	{
		echo "<center><div id='haut'> <h1>GSBDrive</h1> ";
		if(isset($_SESSION["message"]['text']))
		{
			echo $_SESSION["message"]['text'];
		}
		if(isset($_SESSION["connecter"]) && $_SESSION['connecter'])
		{
			echo "<a href='index.php?action=Deconnecter'> Se deconnecter </a> &nbsp <a href='index.php?action=Profil'> Mon Profil </a>";
			echo "&nbsp<a href='index.php?action=historiqueCommande'>Liste des commandes </a>";
		}
		else 
		{
		echo "<a href='index.php?action=Inscription'> Inscription </a> &nbsp <a href='index.php?action=Connexion'> Connexion </a>";
		}

		echo  "&nbsp <a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a></div>";
		
		/*echo "<table border=1> <tr><div id='barre'>";*/
		echo "<div id='hautCategorie'>";
		foreach($data as $uneDonnee)
		{
			echo /*<td>*/"<a id='categorie2' href='index.php?action=Categorie&idCat=".$uneDonnee["id_categorie"]."'>".$uneDonnee["nom_categorie"]."</a>"/*</td>"*/;
		}
		/*echo "</table></tr></br>";*/
		echo "</div></center> ";
	}
	
	public function categorie($data,$cate)
	{
	
		$this->accueil($cate);
		echo "</br> <div id='categorie'> <center>";
		echo "<table border=1  width=100%;>";
		foreach($data as $uneDonnee)
		{
			echo "<center> <tr> <td>".$uneDonnee["nom_medoc"]."</td><td>".$uneDonnee["description_medoc"]."</td><td> <center> <button class='bouton' value='".$uneDonnee["id_medoc"]."'>Valider</button> </center> </td></tr> </center>"; 
		}
		echo "<script> chargerPage(); </script>";
		echo "</center> </div>";
	}

	public function inscription()
	{
        echo"
        <html>
	        <head>
	            <title>Inscription</title>
				<meta charset='utf-8'>
				<link rel='stylesheet' href='CSS/index.css'/>
				<link rel='stylesheet' href='CSS/inscription.css'/>


	        </head>        
	        <body>
	        	<div>
	           		<div id=tete>
	               		";
	    if(isset($_SESSION["message"]['text']))
	    {
	    	echo $_SESSION["message"]['text'];
	    }
	    echo "
	            	</div>
	            	<div id='haut'>
			 			<center><h1> GSBDrive</h1>
	           			&nbsp<a href='index.php?action=accueil'>Retour  à l'acceuil</a>
	           			&nbsp <a href='index.php?action=Connexion'> Connexion </a>
	           			&nbsp <a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a>
	           			</div></center>
	           			<br/>
	           		</div>

	           		<div id='formulaire'>
	           		<div id='hautplus'>
	           		<center><h4>Formulaire d'Inscription</h4></center>
	           		</div>	
			            <FORM method=POST action='index.php?action=valInscription'>
							
							
							<div class='containair'>
							<div class='infos'><div class='item'>
							<p>Veuiller saisir votre nom:</p>
			                <input class='input' type='text' name='nomUser' required><br/>
							</div><div class='item'>
							<p>Veuiller saisir votre prenom:</p>
							<input class='input' type='text' name='prenomUser' required><br/>
							</div></div>

							<div class='infos'><div class='item'> 
			                <p>Veuiller saisir votre e-mail:</p>
							<input class='input' type='email' name='mailUser' required><br/>
							</div></div>

							<div class='infos'><div class='item'>
							<p>Veuiller saisir votre mot de passe:</p>
							<input class='input' type='password' name='mdpUser' required minlenght='6' placeholder='6 caractères minimum'><br/>
							</div><div class='item'>
			                <p>Veuiller Confirmer votre mot de passe:</p>
							<input class='input' type='password' name='mdpConfUser' required minlenght=6><br/>
							</div></div>

							<div class='infos'><div class='item'>
			                <p>Veuiller saisir votre adresse:</p>
							<input class='input' type='text' name='adresseUser' required><br/>
							</div><div class='item'>
			                <p>Veuiller saisir votre ville:</p>
			                <input class='input' type='text' name='villeUser' required><br/>
							</div></div>

							<div class='infos'><div class='item'>
							<p>Veuiller saisir votre code postal:</p>
							<input class='input' type='text' name='cpUser' required mexlenght=6><br/>
							</div><div class='item'>
			                <p>Veuiller saisir votre numéro de téléphone:</p>
							<input class='input' type='text' name='telUser' required maxlenght=21><br/>
							</div></div>
							</div>

			                <input type='submit'>
			            </FORM>
		            	
	            	</div>
	       		</div>
	        </body>
        </html>";
	}
	public function modiferInfos($donnee)
	{
        /*echo"
        <h1>Historique des commandes</h1>

		<table border=1> <tr>";
		foreach($data as $uneDonnee)
		{
			echo "<td>".$uneDonnee[""]."</td>";
		}*/
		echo "<div id='haut'>  
			<center><h1>GSBDrive</h1>
			&nbsp<a href='index.php?action=accueil'>Retour  à l'acceuil</a>
			&nbsp <a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a>
			</center></div>       
	        <div id='profil'>
	       <center>
        <div id='hautplus'>
        <h4>Modifier ses informations </h4>
        </div>
	        <FORM method=POST action='index.php?action=validerModifs'><br/>
				Veuiller saisir votre nom:<br/><input type='text' name='nomUser' class='input' required value=\"".stripslashes($donnee['nom_user'])."\"><br/><br/>
				Veuiller saisir votre prenom:<br/><input type='text' name='prenomUser' class='input' required value=\"".stripslashes($donnee['prenom_user'])."\"><br/><br/>   
				Veuiller saisir votre e-mail:<br/><input type='email' name='mailUser' class='input' required value=\"".stripslashes($donnee['mail_user'])."\"><br/><br/>
				Veuiller saisir votre mot de passe:<br/><input type='password' class='input' placeholder='Laisser vide si aucun changement' name='mdpUser'><br/><br/>
				Veuiller confirmer votre mot de passe:<br/><input type='password' class='input' placeholder='Laisser vide si aucun changement' name='mdpConfUser'><br/><br/>
				Veuiller saisir votre adresse:<br/><input type='text' name='adresseUser' class='input' required value=\"".stripslashes($donnee['adresse_user'])."\"><br/><br/>
				Veuiller saisir votre ville:<br/><input type='text' name='villeUser' class='input' required value=\"".stripslashes($donnee['ville_user'])."\"><br/><br/>
				Veuiller saisir votre code postal:<br/><input type='text' name='cpUser' class='input' required value=\"".stripslashes($donnee['cp_user'])."\"><br/><br/>
				Veuiller saisir votre numéro de téléphone:<br/><input type='text' class='input' name='telUser' required value=\"".stripslashes($donnee['telephone_user']	)."\"><br/><br/>
				<input type='submit'>
			</FORM>
		</center><br/></div>";
	    if($_SESSION["modifFait"])
	    {
	    	echo "<br/> Vos modification on bien été enregistré";
	    }

	    if(isset($_SESSION['mdpConf']) && $_SESSION["mdpConf"])
	    {
	    	echo "<br/> Vos mots de passe ne sont pas pareil, veuillez ressaisire votre mot de passe de confirmation";
	    }
    }


    public function affListCommandes($donner)
    {
        echo "<center><div id='haut'> <h1>GSBDrive</h1>";
        echo "&nbsp<a href='index.php?action=Deconnecter'> Se déconnecter </a>";
        echo "&nbsp<a href='index.php?action=accueil'>Retour à l'acceuil</a>"; 
        echo "&nbsp <a href='index.php?action=Profil'> Mon Profil </a>";
        echo "&nbsp<a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a></div>";
        echo "</div></center>";

        echo "</br> <div id='categorie'> <center>
        <div id='hautplus'>
        <h4>Liste des commandes</h4>
        </div>";
        echo "<table border=1 width=100%>";
        foreach ($donner as $uneDonnee) {
            echo "<form method='POST' action='index.php?action=affCommande'> <tr><td> Commande n°".$uneDonnee["id_command"]."</td><td> Le : ".$uneDonnee["date_command"]."</td><td><center><button class='bouton' name='idCommande' value='".$uneDonnee["id_command"]."'>Info sur la commande </button> </center> </td></tr></form>"; 
        }
        echo "</table></center></div>";
    }


    public function afficheOfficine($donner)
    {
    	echo "<div id='haut'>
    		<center> <h1>GSBDrive</h1> 
    		&nbsp<a href='index.php?action=Deconnecter'> Se déconnecter </a>
    		&nbsp<a href='index.php?action=accueil'>Retour à l'acceuil</a>
    		&nbsp <a href='index.php?action=Profil'> Mon Profil </a>
    		&nbsp<a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a>
    		</center>
    		</div> <br/>";    		
        echo "
        <div id='categorie'>
	        <div id='hautplus'>
	        	<center><h4> Choix officine </h3></center>
	        </div>
        <form method=POST action='index.php?action=ValiderCommande'>";
		echo "<center><br/><select id='idOfficine' name='selectionOfficine'>";
		$i =0;
        foreach ($donner as $Pharma) 
        {
			echo "<option value='".$Pharma['id_pharma']."'>".$Pharma['nom_pharma']." à ".$Pharma['ville_pharma']."</option>";
        }
		echo "</select><br/>";
		echo "<style>
		.coordinates {
		background: rgba(0, 0, 0, 0.5);
		color: #fff;
		position: absolute;
		bottom: 40px;
		left: 10px;
		padding: 5px 10px;
		margin: 0;
		font-size: 11px;
		line-height: 18px;
		border-radius: 3px;
		display: none;
		}
		</style>";
		echo "<div id='imap'></div>";
		echo '<pre id="coordinates" class="coordinates"></pre>';
		echo '<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>';
		echo "<script src='https://api.tiles.mapbox.com/mapbox-gl-js/v1.5.0/mapbox-gl.js'></script>";
		echo "<script src='JS/google.js' type='text/javascript' ></script>";
		echo "<script>
			var long = document.getElementById('long');
			var lat = document.getElementById('lat');
			var coordinates = document.getElementById('coordinates');
			var map = new mapboxgl.Map({
			container: 'imap',
			style: 'mapbox://styles/mapbox/streets-v11',
			center: {lng: 5.159623206837068, lat: 48.77842821951461},
			zoom: 16
			});";
			echo "var markers = new Array();";
		foreach ($donner as $Pharma) 
        {
			echo "markers['".$Pharma['id_pharma']."'] = {lng: ".$Pharma["lng_pharmacie"].",lat: ".$Pharma["lar_pharmacie"]."};";
        }
		echo"

			var marker = new mapboxgl.Marker({
			draggable: false
			})
			.setLngLat({lng: 5.159623206837068, lat: 48.77842821951461})
			.addTo(map);
			$(function(){
			    $('#idOfficine').change(function(){
			        marker.setLngLat(markers[$(this).val()]);
			        map.setCenter(markers[$(this).val()]);
			    });
			});
			
			function onDragEnd() {
			var lngLat = marker.getLngLat();
			coordinates.style.display = 'block';
			coordinates.innerHTML =
			'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;
			}
			
			marker.on('dragend', onDragEnd);
		</script>";
		
        echo "<button name='ValiderCom'>Valider</button></center><br/><form><div>";
    }

     public function affConnection()
    {

        echo "<div id='haut'><center><h1>GSBDrive</h1> 
        &nbsp<a href='index.php?action=accueil'>Retour  à l'acceuil</a>
        &nbsp <a href='index.php?action=Inscription'> Inscription </a>
        &nbsp <a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a></div></center>
        <center>
        <div id='profil'>
            <div id='hautplus'>
                <center><h4>Connexion</h4></center>
            </div>
            <form name='formulaire' action='index.php?action=Verifconn' method='POST'><br/>
                Veuiller saisir votre identifiant de connexion:<br/> <input type='text' name='identifiant' class='input' required/><br/><br/>
                Veuiller saisir votre mots de passe :<br/> <input type='password' name='password' class='input' required /><br/><br/>
                <button name='connct' >Se Connecter </button>";
        echo "</FORM></center><br/></div>";
    }

    public function panier($lesQuantites)
    {
        echo "<div id='haut'><center><h1>GSBDrive</h1>";
        if(isset($_SESSION["connecter"]) && $_SESSION['connecter'])
        {
            echo "&nbsp<a href='index.php?action=Deconnecter'> Se deconnecter </a> ";
            echo " &nbsp<a href='index.php?action=accueil'>Retour à l'acceuil</a>";
            echo "&nbsp <a href='index.php?action=Profil'> Mon Profil </a>";
            echo "&nbsp<a href='index.php?action=historiqueCommande'>Liste des commandes </a>";
        }
        else 
        {
            echo "&nbsp<a href='index.php?action=accueil'>Retour à l'acceuil</a>";
            echo "&nbsp<a href='index.php?action=Inscription'> Inscription </a> &nbsp <a href='index.php?action=Connexion'> Connexion </a>";

        }

        echo "&nbsp <a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a></div></center>
        <center>";
        if(!isset($_COOKIE["panier"]) OR $_COOKIE['panier']=="null" OR $_COOKIE['panier']=="")
        {
            echo "<cenetr>Votre panier est vide</center>";
        }
        else
        {
            echo "<center><div id='panier'> <div id='hautplus'>
                <center><h4>Panier</h4></center>
            </div><form method='POST' action='index.php?action=ValidPanier'><table border=1>";
            echo "<tr><th>Nom du médicament</th><th> Quantité</th></tr>";

            foreach ($lesQuantites as $article => $Quantite) 
            {
            	echo "<tr><td>";
            	(new monControleur)->AffichePanier($article);
            	echo "</td><td> <input type=number name='".$article."' value='".$Quantite."' min='0'/></td></tr>";
        	}
        	echo "</table>";
        	echo "<center><div id='bouton'><button name='ValiderPanier'>Suivant</button></div></center></form></div></center>";
        }
	}

	public function affPanier($nom_med)
	{

		echo $nom_med["nom_medoc"];
	}
    

    public function recap($donner)
    {
    	echo "<div id='haut'><center><h1>GSBDrive</h1>";
            echo "&nbsp<a href='index.php?action=Deconnecter'> Se deconnecter </a> ";
            echo " &nbsp<a href='index.php?action=accueil'>Retour à l'acceuil</a>";
            echo "&nbsp <a href='index.php?action=Profil'> Mon Profil </a>";
            echo "&nbsp<a href='index.php?action=historiqueCommande'>Liste des commandes </a>";
        	echo "&nbsp <a id='paniercount' href='index.php?action=Panier'> Panier </a><a id='test'></a></div></center>
        <center>";
        if(isset($_SESSION['finCommande'])&&$_SESSION['finCommande'])
        {
            echo "<script> clearPanier(); </script>";
        }
        echo "<div id='profil'>";

        echo "<div id='hautplus'><h4>récapitulatif de la commande</h4></div>";

        echo "Vous avez effectué votre commande le ".$donner[0]['date_command']." et sera livré à ".$donner[0]['nom_pharma']."<br/>
        Voici la liste de votre commande :";
        echo "<table border=1> <tr ><td >Nom médicament</td><td> Quantité</td><td><center>Description du medicament </td></tr>";
        foreach ($donner as $value) {
           echo "<tr><td id='paddingTD'>".$value['nom_medoc']."</td><td> <center>".$value['quantite']."</center></td><td id='paddingTD'>".$value['description_medoc']."</td></tr>";
        }
        echo "</table></div>";

    }

}
?>
