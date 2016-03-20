<?php
include('menuCPMEL.php');
include('fonctionsUtilisateurs.php');

if (!isset($_SESSION['code'])) {
    exit(header("location: index.php"));
}

?>

<html>

	<head>
		<title>Déconnexion</title>
		<meta charset="UTF-8">
	</head>

	<body>

		<div id="div_Entete">
			<h1>Déconnexion</h1>
		</div>

		<div id="div_Formulaire">
			<form action="index.php" method="post">
				<input type="submit" name="submit" value="Retourner à la page d'accueil">
			</form>	
		</div>
		
	</body>

	<div id="div_Footer">
	
	<br> <br>
	<footer>
		<h4>Gabriel Poulin et Marc-Etienne Leblanc</h4> 
		<h4>2014. Tous droits réservés.</h4>
	</footer>

	</div>
	
</html>

<?php
session_destroy();
?>