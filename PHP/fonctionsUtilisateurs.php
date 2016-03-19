<?php
session_start();

function connexionDBMySql(){
	try{
	$conn = new mysqli ( "localhost", "demo", "demopass", "lepetitmagasin" );
	}catch(Exception $e){
		echo ("<script>console.log('ERREUR: connexion DB');</script>");
	}
	return $conn;
}

	    
// Vérifie si l'utilisateur existe dans la BD
function VerifierUtilisateurExiste($code)
{
	
	$conn = connexionDBMySql();
	$query = "SELECT * utilisateur where code='$code'";
	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete VerifierUtilisateurExiste nexiste pas');</script>");
		return false;
	}
	return true;
} 

// Vérifie si la combinaison d'un code utilisateur et mot de passe existe dans la BD et si l'utilisateur est actif
function VerifierInfosUtilisateurExistent($code,$motdepasse)
{

	$conn = connexionDBMySql();
	$md5MDP = MD5($motdepasse);
	//$query = "SELECT * from utilisateur where code='$code' and motDePasse='$md5MDP'";
	//$query = "SELECT * FROM utilisateur where code='root' and motDePasse=MD5('super')";
	//$query = "SELECT * FROM utilisateur where code='root'";
	$query = "SELECT * FROM utilisateur where code='$code' and motDePasse='$md5MDP'";
	//echo $code;
	//echo $motdepasse;
	//echo $md5MDP;
	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete connexionDBMySql nexiste pas');</script>");
	}else{
		echo ("<script>console.log('dans le else');</script>");
		$row = mysqli_fetch_array ( $result );
		$codeRequete = $row['code'];
		echo "===>";
		echo $codeRequete;
		if ($codeRequete == 'root' ){
			echo ("<script>console.log('Le code est valide');</script>");
		return true;	
		}
		
	}
	
	return false;
}
	

// Charge tous les utilisateurs "actifs" qui sont dans la BD et les classes par ordre alphabétique
function GetUtilisateurs()
{
	$options = array();
	$conn = connexionDBMySql();
	$query = "SELECT * utilisateur where code='$code' and motDePasse='$motdepasse'";

	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete GetUtilisateurs nexiste pas');</script>");
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
	$query = "SELECT * utilisateur where code='$code' ";

	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete GetNiveauSecurite nexiste pas');</script>");
		return false;
	}
	$row = mysqli_fetch_array ( $result );
	$niveauSecurite = $row['niveauSecurite'];
	
	return $niveauSecurite;
}

// Enregistre un nouveau mot de passe dans la BD
function SetNouveauMotDePasse($code, $motdepasse)
{
	$conn = connexionDBMySql();
	$query = "insert into utilisateur where code='$code' (motDePasse) VALUES (MD5('supermotdepasse'))";

	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete SetNouveauMotDePasse nexiste pas');</script>");
		return false;
	}
	
	return true;
}

// Enregistre le niveau choisit (employe ou gestionnaire) pour un utilisateur dans la BD
function SetNiveauSecurite($code, $niveau)
{
	$conn = connexionDBMySql();
	$query = "insert into utilisateur where code='$code' (niveauSecurite) VALUES ('+ $niveau +')";
	
	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete SetNiveauSecurite nexiste pas');</script>");
		return false;
	}
	
	return true;
}

// Désactive/active un utilisateur dans la BD
function SetUtilisateurActif($code, $actif)
{
	$conn = connexionDBMySql();
	$query = "insert into utilisateur where code='$code' (estActif) VALUES ('+ $actif +')";
	
	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete SetUtilisateurActif nexiste pas');</script>");
		return false;
	}
	
	return true;
}


// Enregistre un utilisateur "actif" dans la BD
function AjouterUtilisateur($code, $motDePasse, $nom, $Prenom, $niveauSecurite, $estActif, $estSupprimer)
{
	$conn = connexionDBMySql();
	$query = "INSERT INTO utilisateur (code, motDePasse, nom, prenom, niveauSecurite, estActif, estSupprimer) VALUES ('unUser', MD5(' + $motDepasse + '),'+ $nom +','+ $prenom +', '+ $niveauSecurite +',true,false)";
	
	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete AjouterUtilisateur nexiste pas');</script>");
		return false;
	}
	
	return true;
}

?>