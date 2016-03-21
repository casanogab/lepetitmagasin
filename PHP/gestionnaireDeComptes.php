<?php
include('menuLPM.php');
include('validerGestionnaireDeComptes.php');

if (!isset($_SESSION['code'])) {
    exit(header("location: index.php"));
}
?>

<html>

	<head>
		<title>Gestionnaire de comptes</title>
	</head>
	
	<body>
		<div id="div_Entete">
			<h1>Gestionnaire de comptes</h1>
		</div>
			<table>
				<tr>
					<div id="div_Ajouter_utilisateur">
						<form id='ajout_utilisateur' method='post'>  
		
							<fieldset >
								<h3>Ajouter un compte</h3>
							
								<label for='code'>Code utilisateur:</label>
								<input type='text' name='code' id='code'  maxlength="25"> 
								<br>
 
								<label for='gestionnaire'>Est gestionnaire:</label>
								<input type="checkbox" name="gestionnaire" value="oui"> 
								<br><br>
 
								<input type='submit' name='submit1' value='Ajouter'>
							</fieldset>
						
							<div id="div_Erreur">
								<span><?php echo $erreur; ?></span>  <!-- pour message d'erreur si le gestionnaire 
														saisit des infos invalides-->
							</div>
						
						</form>
					</div>
				</tr> <br><br>
			
				<tr>
					<form id='modif_mdp' method='post'>
				
						<td>
							<fieldset >
							<h3>Modifier un compte</h3>
							
							</div>
					
							<div id="div_Tous_les_utilisateurs">
								<select name="code" size="10" id="code">
									<?php 
										foreach($boutonsOptionsUtilisateurs as $valeur)
										{
											echo "<option value='".$valeur."'>".$valeur."</option>";
										} 
									?>
								</select>
							</div>	
							
							<div id="div_Boutons_utilisateurs">
								<td>
									<input type='submit' name='submit2' value='Modifier le mot de passe'>  <br>
									<input type='submit' name='submit3' value='Supprimer le compte' 
										onclick='return confirm("Êtes-vous certain de vouloir supprimer le compte?")'>
								</td>
							</div>

							</fieldset>	

							<div id="div_Erreur">
								<span><?php echo $erreur2; ?></span>  <!-- pour message d'erreur si le gestionnaire 
														ne sélectionne pas d'utilisateur-->
							</div>
						
							</div>
						</td>
					</form>
				</tr>	
			</table>

		<div id="div_Formulaire">
			<form action="index.php" method="post">
				<input type="submit" name="submit" value="Retourner à la page d'accueil">
			</form>	
		</div>

	<div id="div_Footer">
	
	<br> <br>
	<footer>
		<h4>Gabriel Poulin et Marc-Etienne Leblanc</h4> 
		<h4>2014. Tous droits réservés.</h4>
	</footer>

	</div>
	
		
	</body>
	
</html>