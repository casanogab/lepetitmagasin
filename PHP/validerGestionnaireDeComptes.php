<?php
include('fonctionsUtilisateurs.php');

$erreur = $erreur2 = '';
$boutonsOptionsUtilisateurs = GetUtilisateurs();

// ***OPTION 1 - Créer un compte utilisateur***

// Vérifie si l'utilisateur a appuyé sur le bouton "Ajouter"
if (isset($_POST['submit1']))
{
	$niveau = "employe";
	
	// Vérifie que le champ "code" a été saisit
	if (empty($_POST['code'])) 
	{
		$erreur = "Le code d'utilisateur est vide! SVP réessayez à nouveau.";
	} else if (empty($_POST['mdp']))
	{
		$erreur = "Le mot de passe est vide! SVP réessayez à nouveau.";
	} else if (empty($_POST['nom']))
	{
		$erreur = "Le nom est vide! SVP réessayez à nouveau.";
	} else if (empty($_POST['prenom']))
	{
		$erreur = "Le prenom est vide! SVP réessayez à nouveau.";
			
	// Vérifie si l'utilisateur existe déjà
	} else if (VerifierUtilisateurExiste($_POST['code']))
	{
		$erreur = "Le code d'utilisateur est déjà utilisé SVP réessayez à nouveau.";
	
	// Si le champ saisit est valide, enregistre le nouvel utilisateur dans la BD
	} else {
	
		// Vérifie si l'utilisateur a coché la case "est gestionnaire"
		$niveau = 1;
		if (isset($_POST['gestionnaire']))
		{
			$niveau = 0;
		}
		
		AjouterUtilisateur($_POST['code'],$_POST['mdp'],$_POST['nom'],$_POST['prenom'], $niveau);
		echo  '<script> alert("L\'utilisateur a été créé"); document.location.href = "gestionnaireDeComptes.php"</script>';
			
		exit();
	}
	
}


// ***OPTION 2 - Modifier le mot de passe d'un compte***"

// Vérifie si l'utilisateur a appuyé sur le bouton "Modifier le mot de passe"
if (isset($_POST['submit2']) && (isset($_POST['code'])))
{
	$_SESSION['codeAutreEmploye'] = $_POST['code'];  
	
	exit(header("location: modifierMdpAutre.php"));

// Vérifie si l'utilisateur a sélectionné un compte avant d'appuyer sur le bouton "Modifier le mot de passe"
} else if (isset($_POST['submit2']) && (empty($_POST['code'])))
{
	$erreur2 = "Vous devez sélectionner un utilisateur! SVP réessayez à nouveau.";
}


// ***OPTION 3 - Supprimer un compte (note: en réalité, on désactive l'utilisateur plutôt que de le supprimer)***

// Vérifie si l'utilisateur a appuyé sur le bouton "Supprimer le compte"
if (isset($_POST['submit3']) && (isset($_POST['code'])))
{
	// Désactive l'utilisateur sélectionné dans la BD
	if (SetUtilisateurActif($_POST['code'], 0))
	{
		echo  '<script> alert("L\'utilisateur a été supprimé"); document.location.href = "gestionnaireDeComptes.php"</script>';
		
		exit();
		
	} else {
		$erreur2 = "L'utilisateur n'a pas été supprimé! SVP réessayez à nouveau.";
	} 

	// Vérifie si l'utilisateur a sélectionné un compte avant d'appuyer sur le bouton "Supprimer"
} else if (isset($_POST['submit3']) && (empty($_POST['code']))) 
{
	$erreur2 = "Vous devez sélectionner un utilisateur! SVP réessayez à nouveau.";
}

?>