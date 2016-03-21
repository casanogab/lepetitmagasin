<?php
include('fonctionsUtilisateurs.php');

$erreur='';
$niveau = GetNiveau($_SESSION['codeAutreEmploye']); 

// Vérifie si l'utilisateur a appuyé sur le bouton "Enregistrer"
if (isset($_POST['submit'])) 
{
	// Vérifie qu'aucun des deux champs n'est vide
	if ((empty($_POST['nouveaumdp1'])) || (empty($_POST['nouveaumdp2']))) 
	{
		$erreur = "Tous les champs doivent être saisis! SVP réessayez à nouveau.";
	
	// Vérifie que les deux nouveaux mots de passe entrés sont identiques
	} else if ($_POST['nouveaumdp1'] !== $_POST['nouveaumdp2'])
	{
		$erreur = "Les nouveaux mots de passe saisis ne sont pas identiques! SVP réessayez à nouveau.";
			
	} else {
	
		// Enregistre le nouveau mot de passe dans la BD
		if (SetNouveauMotDePasse($_SESSION['codeAutreEmploye'], $_POST['nouveaumdp1']))
		{
			echo  '<script> alert("Le nouveau mot de passe a été enregistré"); document.location.href = "gestionnaireDeComptes.php"</script>';	
		} 

		exit();
	}
}

?>