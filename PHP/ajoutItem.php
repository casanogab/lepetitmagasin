
<!DOCTYPE html>

<html>
<head>
<title>CPMEL</title>
</head>
<body> 

<?php
include('menuCPMEL.php'); 
if (!isset($_SESSION['code'])) {
    exit(header("location: index.php"));
}
include('utilitaire.php');
echo "<h1><p>Page ajout d'item.</h1>";
$noUniqueEmplacement = $description = $prix = $noTransaction = $quantite = $categorie = $motifRemboursement = $motifSuppression = $dateAjout = $dateVente = $dateRemboursement ="";


if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
      // ici c'est chacune des validation des champs qui sont vérifier
      if (1==verifieFormulaireNoUniqueEmplacement($noUniqueEmplacement = transforme_entre($_POST["noUniqueEmplacement"]))&&
         1==verifieFormulaireDescription($description = transforme_entre($_POST["description"]))&&
         1==verifieFormulairePrix($prix = transforme_entre($_POST["prix"]))&&
         1==verifieFormulaireQuantite($quantite = transforme_entre($_POST["quantite"]))&&
         1==verifieQuantiteLot($quantite = transforme_entre($_POST["quantite"]))&&
         1==verifieFormulaireCategorie( $categorie = transforme_entre($_POST["categorie"]))&&
         1==verifieFormulairePhotographie($photographie = $_FILES["fichierATransferer"]["name"]))
         {
            // les champs qui ne sont pas remplie par l'utilisateur sont initialisé
            $prix=str_replace(',', '.', $prix);
            $noTransaction = "";
            $motifRemboursement = "";
            $motifSuppression = "";
            $dateAjout =  date("y-m-d");
            $dateVente = "";
            $dateRemboursement = "";
            $estUnLot = "non";
            if ($_POST["estUnLot"] == "vrai"){
                  $estUnLot = "oui";
            }
            $estVendu = "non";
            $estDisponible = "oui";
            $i=1;
            for ($i; $i<= $quantite; $i++)
               {
                $noItemUnique = augmenteNoItemUnique();
               ajouterNodItem($noItemUnique, $noUniqueEmplacement, $description, $prix, $noTransaction, $categorie, $motifRemboursement, $motifSuppression, $dateAjout, $dateVente, $dateRemboursement, $estUnLot, $estVendu, $estDisponible, $photographie, $_SESSION['code']);
               }
             echo  '<script> alert("Item ajouté!")</script>';
         }
}
?>


<form action="ajoutItem.php" method="post" enctype="multipart/form-data">
 <table align=center ><br>
   <table><tr><td>Num&eacute;ro unique d&#39;emplacement:</td><td><input type="text" name="noUniqueEmplacement"></td></tr>
   <tr><td> Description:</td><td><textarea type="comment" name="description" rows="5" cols="40"></textarea></td></tr>
   <tr><td>Prix:</td><td><input type="text" name="prix"></td></tr>
   <tr><td>Quantit&eacute;:</td><td><input type="text" name="quantite" value="1"></td></tr>
   <tr><td>Cat&eacute;gorie</td><td>
   <select name="categorie" size="4">
     <option>Fournitures scolaires</option>
     <option>Livres</option>
     <option>Vêtements</option>
     <option>Autres</option>
   </select></td></tr>
   <tr><td>Est un item de lot</td><td>
   <input type="checkbox" name="estUnLot" value = "vrai"></td></tr>  
   <tr><td></td><td><input type="file" name="fichierATransferer" id="fichierATransferer"></td></tr>
  <tr><td><input type="submit" name="submit" value="Enregistrer l'item"></td>
</form>
<form action="index.php" method="post">
   <td><input type="submit" name="submit" value="Annuler"></td></tr></table><br>
</form>
   <footer>
		<h4>Gabriel Poulin et Marc-Etienne Leblanc</h4> 
		<h4>2014. Tous droits réservés.</h4>
	</footer>
</body>
</html>


