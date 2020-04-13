
function setLocal(id)
{
	if(localStorage.getItem("Panier") == null)
	{
		var panier=[];
		panier.push(id);
		//convertis le Tableau en string (Json.Stringify)
		localStorage.setItem("Panier",JSON.stringify(panier));
	}
	else
	{
		console.log(id);
		//convertie le string en tabelau (JSON.parse)
		var tempo = JSON.parse(localStorage.getItem('Panier'));
		tempo.push(id);
		//reconvertie ...
		localStorage.setItem("Panier",JSON.stringify(tempo));
	}
	var tempo = JSON.parse(localStorage.getItem('Panier'));
	var jsonPanier = localStorage.getItem('Panier');
	//var i = tempo.length;
	QuantiterPanier();
	//document.getElementById('paniercount').text = Tomate +" ("+tempo.length+") ";
	console.log(localStorage.getItem('Panier'));
	document.cookie = "panier="+ jsonPanier;
}
function QuantiterPanier()
{
	var tempo = JSON.parse(localStorage.getItem('Panier'));
	document.getElementById('test').innerHTML = " ("+tempo.length+") ";
}
function ChargerPanier()
{
	if(document.cookie.indexOf("panier") == -1)
	{
		var jsonPanier = localStorage.getItem('Panier');
		document.cookie = "panier="+ jsonPanier;
	}
	QuantiterPanier()
}

function chargerPage()
{
	// tout les element qui se trouve dans la classe 'bouton' sont rangeais dans lesboutons
	var lesboutons = document.querySelectorAll(".bouton");
	var Tomate = document.getElementById('paniercount').text;
	for(var i = 0; i < lesboutons.length; i-=-1) 
	{	
		//dans id on mais la value d'une bouton que l'on parcoure
		//var id = lesboutons[i].value;
		//quand on clique sur le bouton on dit qui appel la fonction setLocal avec en parametre l'id 
		lesboutons[i].onclick = function(e)
		{
			setLocal(this.value);
		}
		//console.log(id);
	}
}

function clearPanier()
{
	localStorage.clear();
	document.cookie = "panier=";
}

