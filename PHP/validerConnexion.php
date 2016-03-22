<?php
include('fonctionsUtilisateurs.php');

$erreur='';
$_SESSION['code'] = $_SESSION['niveau'] = '';

// Vérifie si l'utilisateur a appuyé sur le bouton "Continuer"
if (isset($_POST['submit'])) 
{
	// Vérifie que les champs "code utilisateur" et "mot de passe" ne sont pas vides
	if ((empty($_POST['code'])) || (empty($_POST['motdepasse']))) 
	{
		$erreur = "Le code d'utilisateur ou le mot de passe est invalide! SVP réessayez à nouveau.";
		
	} else {
		$niveau = '';
		
		//echo ("<script>console.log('fffffff');</script>");
		//echo $_POST['code'];
		//echo $_POST['motdepasse'];
		// Vérifie si la combinaison existe dans la BD
		 
		if (VerifierInfosUtilisateurExistent($_POST['code'], $_POST['motdepasse']))
		{
			// Trouve le niveau de l'utilisateur dans la BD
			$niveau = GetNiveauSecurite($_POST['code']);
			
			// Création des variables de session (code utilisateur, niveau utilisateur, noQuartUnique)
			$_SESSION['code'] = $_POST['code'];
			$_SESSION['niveau'] = $niveau;
			exit(header("location: index.php"));
			
		} else {
			$erreur = "Le code d'utilisateur ou le mot de passe est invalide! SVP réessayez à nouveau. 2";
		}
		
	}
}

?>