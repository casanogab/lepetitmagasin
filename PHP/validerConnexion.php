<?php
include('fonctionsUtilisateurs.php');

$erreur='';
$_SESSION['code'] = $_SESSION['niveau'] = $_SESSION['noQuartUnique'] = '';

// Vérifie si l'utilisateur a appuyé sur le bouton "Continuer"
if (isset($_POST['submit'])) 
{
	// Vérifie que les champs "code utilisateur" et "mot de passe" ne sont pas vides
	if ((empty($_POST['code'])) || (empty($_POST['motdepasse']))) 
	{
		$erreur = "Le code d'utilisateur ou le mot de passe est invalide! SVP réessayez à nouveau.";
		
	} else {
		$niveau = '';

		// Vérifie si la combinaison existe dans la BD
		if (VerifierInfosUtilisateurExistent($_POST['code'], $_POST['motdepasse']))
		{
			// Trouve le niveau de l'utilisateur dans la BD
			$niveau = GetNiveau($_POST['code']);
			
			// Création des variables de session (code utilisateur, niveau utilisateur, noQuartUnique)
			$_SESSION['code'] = $_POST['code'];
			$_SESSION['niveau'] = $niveau;
			$_SESSION['noQuartUnique'] = AugmenteNoQuartUnique();
			
			// Création du quart de travail unique dans la BD avec enregistrement de la date et de l'heure
			CreerNouveauQuartDeTravail($_SESSION['code'], $_SESSION['noQuartUnique']);

			// Vérifie si c'est la première fois que l'utilisateur se connecte, dans la BD
			if (GetPremiereConnexion($_SESSION['code']) == "oui") 
			{
				echo  '<script> alert("Comme il s\'agit de votre première connexion, vous devez changer votre mot de passe maintenant!"); 
				document.location.href = "premiereConnexion.php"</script>';
		
				exit();
			}
			
			exit(header("location: index.php"));
			
		} else {
			$erreur = "Le code d'utilisateur ou le mot de passe est invalide! SVP réessayez à nouveau.";
		}
	}
}

?>