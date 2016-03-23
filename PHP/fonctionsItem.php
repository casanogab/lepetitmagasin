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

// Charge tous les produits "actifs" qui sont dans la BD et les classes par ordre alphabétique
function GetProduits()
{
	$options = array();
	$conn = connexionDBMySql();
	$query = "SELECT * FROM produit where estActif=true";

	$result = mysqli_query ( $conn, "$query" );
	if (! $result) {
		echo ("<script>console.log('ERREUR: requete GetProduits nexiste pas');</script>");
		return false;
	}
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$options[] = $row ['nom'];
	}
	sort($options);
	return $options;
}