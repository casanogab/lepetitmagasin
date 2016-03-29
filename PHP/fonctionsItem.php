<?php
session_start();

function connexionDBMySql(){
	try{
		$conn = new mysqli ( "localhost", "demo", "demopass", "lepetitmagasin" );
		$conn->set_charset("utf8");
	}catch(Exception $e){
		echo ("<script>console.log('ERREUR: connexion DB');</script>");
	}
	return $conn;
}

// fonctionne bien
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
	$i=0;
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$options[$i][id] = $row ['id'];
		$options[$i][quantite] = $row ['quantite'];
		$options[$i][nom] = $row ['nom'];
		$options[$i][description] = $row ['description'];
		$options[$i][cout] = $row ['cout'];
		$options[$i][photographie] = $row ['photographie'];
		$options[$i][categorie] = $row ['categorie'];
		$options[$i][code] = $row ['code'];
		$options[$i][estActif] = $row ['estActif'];
		$i++;
	}
	sort($options);
	return $options;
}