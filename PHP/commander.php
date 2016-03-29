<?php
//session_start();
include('menuLPM.php'); 
include('fonctionsItem.php');
//$noItemUnique =  $_POST['noItemUnique'];
//$noItemUnique = 2101;
//$tableauVente = array();
$i=0;
$items=GetProduits();

foreach ($items as $item){
	//echo "allo";
	//echo $_POST[1];
	//echo $_POST[$item[id]];
	if ($_POST[$item[id]]>0){
		$tableauVente[$i][id]=$item[id];
		$tableauVente[$i][quantite]=$_POST[$item[id]];
		echo $tableauVente[$i][id];
		echo $tableauVente[$i][quantite];
		$i++;
	
	}
}


echo "Votre commande est passée à Stéphanie! N'oubliez pas de vous déconnecter";
//exit(header("location: index.php"));
?>
