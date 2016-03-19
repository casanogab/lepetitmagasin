
<?php
?>

<!DOCTYPE html>
<html lang="fr">

<head>
<meta charset="UTF-8">
<title>Sélection des immigrants</title>
<meta name="author" content="Gabriel Poulin et Marc-Etienne Leblanc">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="lib/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap-mod.css">
<script type="text/javascript" src="lib/jquery-2.2.1.min.js"></script>
<script type="text/javascript" src="js/evaluation.js"></script>
</head>

<body id="autoeval">
	<div class="wrapper">
		<?php $page = 'evaluation'; include('navbar.php'); ?>

		<main>
		<div class="container-fluid">
		<?php
		// on doit faire la recherche dans la BD car formulaire soumis
		
		$conn = new mysqli ( "localhost", "demo", "demopass", "inf3005tp1" );
		if ($conn->connect_errno) {
			?>
	    <div class="row">
				<div class="col-md-10 has_error">Erreur de connexion a la base de
					données</div>
			</div>
		<?php
		}
		
		?>
<div class="row">
<div class="col-md-4"></div>
  <div class="col-md-4" id="no-background">
<form action="" method="post" role="form">
	
					<h2>Auto-évaluation</h2>
			
				<table class="table table-bordered table-condensed table-striped">
					<thead>
						<tr class="entetetab">
						
							<th><label id="label_eval" for="age">Âge</label></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
  								<input type="text" name="age" class="form-control" required="required" pattern="[0-9]{1,3}" 
  								placeholder="Votre âge - attention, vous devez avoir 18 ou plus!" aria-describedby="basic-addon1">
  							</td>
						</tr>

					</tbody>
				</table>
<?php
$query = "SELECT * FROM domaine_formation";

$result = mysqli_query ( $conn, "$query" );
if (! $result) {
	?>
			    <div class="message">
					<h2>Erreur de avec la requette SQL domaine formation</h2>
				</div>
				<?php
}
?>
 <table class="table table-bordered table-condensed table-striped">
					<thead>
						<tr class="entetetab">
							<th><label id="label_eval" for="domaine_formation">Domaine de formation</label></th>
						</tr>
					</thead>
					<tbody>
	<?php
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$id = $row ['id'];
		$domaine = $row ['domaine'];
		$points = $row ['points'];
		?>
	 <tr>
							<td><input type="radio" name="domaine_formation"
								value=<?=$points ?>><?=" " . $domaine?></td>
						</tr>
	 <?php
	}
	?>
</tbody>
				</table>

<?php
$query = "SELECT * FROM niveau_scolarite";

$result = mysqli_query ( $conn, "$query" );
if (! $result) {
	?>
			    <div class="message">
					<h2>Erreur de avec la requette SQL niveau scolarite</h2>
				</div>
				<?php
}
?>
 <table class="table table-bordered table-condensed table-striped">
					<thead>
						<tr class="entetetab">
							<th><label id="label_eval" for="niveau_scolarite">Niveau de scolarité</label></th>
						</tr>
					</thead>
					<tbody>
	<?php
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$id = $row ['id'];
		$niveau = $row ['niveau'];
		$points = $row ['points'];
		?>
	 <tr>
							<td><input type="radio" name="niveau_scolarite"
								value=<?=$points ?>><?=" " . $niveau?></td>
						</tr>
	 <?php
	}
	?>
</tbody>
				</table>


<?php
$query = "SELECT * FROM tef WHERE epreuve='CO'";

$result = mysqli_query ( $conn, "$query" );
if (! $result) {
	?>
			    <div class="message">
					<h2>Erreur de avec la requette SQL tef CO</h2>
				</div>
				<?php
}
?>
 <table class="table table-bordered table-condensed table-striped">
					<thead>
						<tr class="entetetab">
							<th><label id="label_eval" for="tefCO">Français: compréhension orale</label></th>
						</tr>
					</thead>
					<tbody>
	<?php
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$id = $row ['id'];
		$epreuve = $row ['epreuve'];
		$resultat = $row ['resultat'];
		$points = $row ['points'];
		?>
	 <tr>
							<td><input type="radio" name="tefCO" value=<?=$points ?>><?=" " . $resultat?></td>
						</tr>
	 <?php
	}
	?>
</tbody>
				</table>



<?php
$query = "SELECT * FROM tef WHERE epreuve='CE'";

$result = mysqli_query ( $conn, "$query" );
if (! $result) {
	?>
			    <div class="message">
					<h2>Erreur de avec la requette SQL tef CE</h2>
				</div>
				<?php
}
?>
 <table class="table table-bordered table-condensed table-striped">
					<caption class="text-center"></caption>
					<thead>
						<tr class="entetetab">
							<th><label id="label_eval" for="tefCE">Français: compréhension écrite</label></th>
						</tr>
					</thead>
					<tbody>
	<?php
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$id = $row ['id'];
		$epreuve = $row ['epreuve'];
		$resultat = $row ['resultat'];
		$points = $row ['points'];
		?>
	 <tr>
							<td><input type="radio" name="tefCE" value=<?=$points ?>><?=" " . $resultat?></td>
						</tr>
	 <?php
	}
	?>
</tbody>
				</table>


<?php
$query = "SELECT * FROM tef WHERE epreuve='EO'";

$result = mysqli_query ( $conn, "$query" );
if (! $result) {
	?>
			    <div class="message">
					<h2>Erreur de avec la requette SQL tef EO</h2>
				</div>
				<?php
}
?>
 <table class="table table-bordered table-condensed table-striped">
					<thead>
						<tr class="entetetab">
							<th><label id="label_eval" for="tefEO">Français: expression orale</label></th>
						</tr>
					</thead>
					<tbody>
	<?php
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$id = $row ['id'];
		$epreuve = $row ['epreuve'];
		$resultat = $row ['resultat'];
		$points = $row ['points'];
		?>
	 <tr>
							<td><input type="radio" name="tefEO" value=<?=$points ?>><?=" " . $resultat?></td>
						</tr>
	 <?php
	}
	?>
</tbody>
				</table>


<?php
$query = "SELECT * FROM tef WHERE epreuve='EE'";

$result = mysqli_query ( $conn, "$query" );
if (! $result) {
	?>
			    <div class="message">
					<h2>Erreur de avec la requette SQL tef</h2>
				</div>
				<?php
}
?>
 <table class="table table-bordered table-condensed table-striped">
					<thead>
						<tr class="entetetab">
							<th><label id="label_eval" for="tefEE">Français: expression écrite</label></th>
						</tr>
					</thead>
					<tbody>
	<?php
	while ( $row = mysqli_fetch_array ( $result ) ) {
		$id = $row ['id'];
		$epreuve = $row ['epreuve'];
		$resultat = $row ['resultat'];
		$points = $row ['points'];
		?>
	 <tr>
							<td><input type="radio" name="tefEE" value=<?=$points ?>><?=" " . $resultat?></td>
						</tr>
	 <?php
	}
	?>
</tbody>
				</table>
<?php $pointsMin = include_once 'rechercheDBpointsMin.php';?>
<input type="hidden" name="ageCalculer">
<input type="hidden" name="pointsMinCalculer" value="<?=$pointsMin?>">
				<table class="table table-bordered table-condensed table-striped" id="resultats">
					<thead>
						<tr class="entetetab">
							<th><h4>Résultats</h4></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><div class="cache" id="zmessageAGE">Zone affichage age</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessageADF">Zone affichage domaine
									formation</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessageANS">Zone affichage niveau
									scolarité</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessageTEFCO">Zone affichage test en
									français CO</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessageTEFCE">Zone affichage test en
									français CE</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessageTEFEO">Zone affichage test en
									français EO</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessageTEFEE">Zone affichage test en
									français EE</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessage">Zone affichage resultat
									total</div></td>
						</tr>
						<tr>
							<td><div class="cache" id="zmessageAccRefus">Zone affichage qui vous informe de votre acceptation/refus points requis=<?=$pointsMin?></div>
								</td>
						</tr>
					</tbody>
				</table>
				<span id="ageValide"></span>
				<input type="button" class="btn btn-primary btn-lg" name="calculer" value="Obtenir votre score"><br>
				<input type="reset" class="btn btn-danger" value="Effacer mes réponses et recommencer">
			</form>
			<br>
			</div>
		</div>
		</main>

	</div>
</body>

</html>