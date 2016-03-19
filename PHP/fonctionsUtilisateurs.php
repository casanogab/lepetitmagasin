<?php
session_start();

function connexionDBMySql(){
	try{
	$conn = new mysqli ( "localhost", "demo", "demopass", "lepetitmagasin" );
	}catch(Exception $e){
		console.log("ERREUR: connexion DB");
	}
	return $conn;
}

	    
// Vérifie si l'utilisateur existe dans la BD
function VerifierUtilisateurExiste($code)
{
	$conn = connexionDBMySql();
	$query = "SELECT * utilisateur where code=' + $code + '";
	
	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		console.log("ERREUR: requete VerifierUtilisateurExiste n'existe pas");
		return false;
	}
	return true;
}

// Vérifie si la combinaison d'un code utilisateur et mot de passe existe dans la BD et si l'utilisateur est actif
function VerifierInfosUtilisateurExistent($code,$motdepasse)
{
	$conn = connexionDBMySql();
	$query = "SELECT * utilisateur where code=' + $code + ' and motDePasse=' + $motdepasse+ '";

	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		console.log("ERREUR: requete connexionDBMySql n'existe pas");
		return false;
	}
	return true;
}
	

// Charge tous les utilisateurs "actifs" qui sont dans la BD et les classes par ordre alphabétique
function GetUtilisateurs()
{
	$options = array();
	$conn = connexionDBMySql();
	$query = "SELECT * utilisateur where code=' + $code + ' and motDePasse=' + $motdepasse+ '";

	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		console.log("ERREUR: requete GetUtilisateurs n'existe pas");
		return false;
	}
	while ( $row = mysqli_fetch_array ( $result ) ) {		
		$options[] = $row ['code'];
	}
	sort($options);
	return $options; 
}

// Trouve le niveau (employe ou gestionnaire) de l'utilisateur dans la BD
function GetNiveauSecurite($code)
{
	$niveauSecurite = '';
	$conn = connexionDBMySql();
	$query = "SELECT * utilisateur where code=' + $code + ' ";

	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		console.log("ERREUR: requete GetNiveauSecurite n'existe pas");
		return false;
	}
	$row = mysqli_fetch_array ( $result );
	$niveauSecurite = $row['niveauSecurite'];
	
	return $niveauSecurite;
}

// Trouve dans la BD si c'est la première connexion de l'utilisateur
function GetPremiereConnexion($code)
{
	$premiereConnexion = '';
	$xml = simplexml_load_file('Ressources/XML/utilisateurs.xml') or die('Erreur de lecture du fichier "utilisateurs.xml"!');
	
	foreach($xml as $utilisateur) 
		{
			if ($utilisateur->code == $code)
			{
				return (string)$premiereConnexion = $utilisateur->premierlogin;
			} 
		}
		
	return $premiereConnexion;
}

// Retourne le montant total amassé par l'employé pendant son quart de travail et qui est inscrit dans la BD
function GetMontantVentesDuQuart($noQuartUnique)
{
	$montantTotalVentes = 0;
	$xml = simplexml_load_file("Ressources/XML/quartsDeTravail.xml") or die("Erreur: Ne peut charger le fichier quartsDeTravail.xml ou il est inexistant!");
	
	foreach ($xml as $quart)
	{
		if ($quart->noQuartUnique == $noQuartUnique)
		{
			return (float)$montantTotalVentes = $quart->montantTotalVentes;
		}
	}
	return $montantTotalVentes;
}

// Incrémente de 1 le numéro de quart de travail unique
function AugmenteNoQuartUnique() {
	$xml = simplexml_load_file('Ressources/XML/parametresCoop.xml') or die("Erreur: Ne peut charger le fichier quartsDeTravail.xml ou il est inexistant!");
	$sxe = new SimpleXMLElement($xml->asXML());	
	$sxe->noQuartUnique = $sxe->noQuartUnique + 1;
	$sxe->asXML('Ressources/XML/parametresCoop.xml');
	
	return (integer)$sxe->noQuartUnique;
}

// Enregistre l'heure de la fin du quart de travail
function SetHeureFinDeQuart($noQuartUnique) {
	$xml = simplexml_load_file('Ressources/XML/quartsDeTravail.xml') or die("Erreur: Ne peut charger le fichier quartsDeTravail.xml ou il est inexistant!");
		
	foreach ($xml as $quart)
	{
		if ($quart->noQuartUnique == $noQuartUnique)
		{
			$quart->heureFin = date('H:i:s');
			$xml->asXML('Ressources/XML/quartsDeTravail.xml');
			
			return true;
		}
	}
	
	return false;
}

// Enregistre si c'est la première connexion de l'utilisateur
function SetPremiereConnexion($code, $premiereConnexion)
{
	$xml = simplexml_load_file('Ressources/XML/utilisateurs.xml') or die('Erreur de lecture du fichier "utilisateurs.xml"!');
	
	foreach($xml as $utilisateur) 
		{
			if ($utilisateur->code == $code)
			{
				$utilisateur->premierlogin = $premiereConnexion;  
				$xml->asXML('Ressources/XML/utilisateurs.xml');
			
				return true;
			} 
		}

	return false;		
}

// Enregistre un nouveau mot de passe dans la BD
function SetNouveauMotDePasse($code, $motdepasse)
{
	$xml = simplexml_load_file('Ressources/XML/utilisateurs.xml') or die('Erreur de lecture du fichier "utilisateurs.xml"!');;
	
	foreach($xml as $utilisateur) 
	{
		if ($utilisateur->code == $code)
		{
			$utilisateur->motdepasse = $motdepasse;  
			$xml->asXML('Ressources/XML/utilisateurs.xml');
				
			return true;
		}
	}
	
	return false;
}

// Enregistre le niveau choisit (employe ou gestionnaire) pour un utilisateur dans la BD
function SetNiveau($code, $niveau)
{
	$niveau = '';
	$xml = simplexml_load_file('Ressources/XML/utilisateurs.xml') or die('Erreur de lecture du fichier "utilisateurs.xml"!');
	
	foreach($xml as $utilisateur) 
	{
		if ($utilisateur->code == $code)
		{
			$utilisateur->niveau = $niveau;  
			$xml->asXML('Ressources/XML/utilisateurs.xml');
	
			return true;
		} 
	}

	return false;
}

// Désactive un utilisateur dans la BD
function SetUtilisateurActif($code, $actif)
{
	$xml = simplexml_load_file('Ressources/XML/utilisateurs.xml') or die('Erreur de lecture du fichier "utilisateurs.xml"!');
		
	foreach($xml as $utilisateur) 
	{
		if ($utilisateur->code == $code)
		{
			$utilisateur->actif = $actif;  
	 		$xml->asXML('Ressources/XML/utilisateurs.xml');
	 		
			return true;
		} 
	}
	
	return false;
}


// Enregistre un utilisateur "actif" dans la BD
function AjouterUtilisateur($code, $niveau)
{
	$xml = simplexml_load_file('Ressources/XML/utilisateurs.xml') or die('Erreur de lecture du fichier "utilisateurs.xml"!'); 
	$sxe = new SimpleXMLElement($xml->asXML());
	$utilisateur = $sxe->addChild('utilisateur');
	$utilisateur->addChild('code', $code);
	$utilisateur->addChild('motdepasse', $code);
	$utilisateur->addChild('niveau', $niveau);
	$utilisateur->addChild('actif', 'oui');
	$utilisateur->addChild('premierlogin', 'oui');
    	$sxe->asXML('Ressources/XML/utilisateurs.xml');  
}


function CreerNouveauQuartDeTravail($code, $noQuartUnique) 
{
	$xml = simplexml_load_file('Ressources/XML/quartsDeTravail.xml') or die("Erreur: Ne peut charger le fichier quartsDeTravail.xml ou il est inexistant!");
	$sxe = new SimpleXMLElement($xml->asXML());
	$quart = $sxe->addChild('quart');
	$quart->addChild('noQuartUnique', $noQuartUnique);
	$quart->addChild('code', $code);
	$quart->addChild('montantTotalVentes', '0');
	$quart->addChild('montantTotalRemboursements', '0');
	$quart->addChild('date', date('y-m-d'));
	$quart->addChild('heureDebut', date('H:i:s'));
	$quart->addChild('heureFin', '0');
	$sxe->asXML('Ressources/XML/quartsDeTravail.xml');
}

?>