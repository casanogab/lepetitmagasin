<?php
include('menuLPM.php');
include('validerConnexion.php');
?>

<html>

	<head>
		<title>Connexion</title>
		<meta charset="UTF-8">
	</head>

	<body>
	
		<div id="div_Entete">
			<h1>Connexion employé</h1> <br>
			<h2>Veuillez SVP entrer votre code utilisateur et votre mot de passe:</h2>
		</div>

		<div id="div_Formulaire">
			<form id='connexion' action='' method='post'>
			
				<fieldset >
					<label for='code'>Code utilisateur:</label>
					<input type='text' name='code' id='code'  maxlength="25">
 
					<label for='motdepasse'>Mot de passe:</label>
					<input type='password' name='motdepasse' id='motdepasse' maxlength="25">
 
					<input type='submit' name='submit' value='Continuer'>
				</fieldset>
			
				<div id="div_Erreur">
					<span><?php echo $erreur; ?></span> 
				</div>
				
			</form>
		</div>
		<div id="div_Formulaire">
			<form action="index.php" method="post">
				<input type="submit" name="submit" value="Annuler">
			</form>	
		</div>
		
	</body>

	<div id="div_Footer">
	
	<br> <br>
	<footer>
		<h4>Marc-Étienne Leblanc et Gabriel Poulin</h4> 
		<h4>2016. Tous droits réservés.</h4>
	</footer>

	</div>
	
</html>