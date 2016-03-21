<?php
include('menuLPM.php');
include('validerModifierMdpAutre.php');

if (!isset($_SESSION['code'])) {
    exit(header("location: index.php"));
}
?>

<html>

	<head>
		<title>Modifier le mot de passe d'un employé</title>
	</head>
	
	<body>
		<div id="div_Entete">
			<h1>Modifier le mot de passe d'un employé</h1> <br>
			<h2>Veuillez SVP entrer le nouveau mot de passe:</h2>
		</div>

		<div id="div_Formulaire">
			<form id='modifier_mdp_autre' method='post'> 
		
				<fieldset >
					<label for='gestionnaire'>Est gestionnaire: 
						<?php 
							if ($niveau == '0' ) { echo  "OUI"; } 
							else {echo "NON";} 
						?>
					</label> 
					<br><br>

					<label for 'nouveaumdp1'>Nouveau mot de passe:</label>
					<input type='password' name='nouveaumdp1' id='nouveaumdp1' maxlength="25">
					<br>

					<label for 'nouveaumdp2'>Confirmer le nouveau mot de passe:</label>
					<input type='password' name='nouveaumdp2' id='nouveaumdp2' maxlength="25">
 
					<input type='submit' name='submit' value='Enregistrer' />
				</fieldset>
			
				<div id="div_Erreur">
					<span><?php echo $erreur; ?></span>  <!--// pour message d'erreur si l'utilisateur 
										saisit des infos de mots de passe invalides-->
				</div>
				
			</form>
		</div>

		<div id="div_Formulaire">
			<form action="gestionnaireDeComptes.php" method="post">
				<input type="submit" name="submit" value="Annuler">
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
