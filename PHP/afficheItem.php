<!DOCTYPE html>
<html>
<head>
  <title>CPMEL</title>
</head>
<body>

<?php
include('utilitaire.php');
include('menuCPMEL.php'); 
$noItemUnique =  $_GET['noItemUnique'];
$categorie =  $_GET['categorie'];
echo '<h1>Item '.getDescriptionItem($noItemUnique).'</h1>';
// Le Système affiche la fiche de l’item qui comprend la photographie de
// l’item, sa description, son numéro unique d’emplacement, son prix sans
// taxe, sa quantité et sa catégorie.



//noItemUnique='.$noItemUnique.'
// Affiche les options ajouter à la vente, modifier et supprimer si l'utilisateur est connecter
if (!($_SESSION['code'] == '')){ 
   echo '<br><div id="div_table_accueil">';
   echo '<table align=center cellspacing="20px"><tr>';
   echo '<td><form action="ajoutItemALaVente.php" method="post"  enctype="multipart/form-data"> 
         <input type="hidden" name="noItemUnique" value='.$noItemUnique.'> <input type="submit" name="submit" value="Ajouter à la vente"></td></form>'; 
   echo '<td><form action="supprimerItem.php?noItemUnique='.$noItemUnique.' method="get"  enctype="multipart/form-data"> 
         <input type="hidden" name="noItemUnique" value='.$noItemUnique.'> <input type="submit" name="submit" value="Supprimer"></td></form>';    
 echo '<td><form action="modifierItem.php?noItemUnique='.$noItemUnique.' method="get"  enctype="multipart/form-data"> 
         <input type="hidden" name="noItemUnique" value='.$noItemUnique.'> <input type="submit" name="submit" value="Modifier"></td></form></td><br>';
$pageAnnul = "";
if (strcmp($categorie,"")==0){
   $pageAnnul = "index.php";
}else{
$pageAnnul = "afficheCategorie.php";
}
echo '<td><form action="'.$pageAnnul.'" method="GET"  enctype="multipart/form-data">';
         echo '<input type="hidden" name="categorie" value='.$categorie.'>' ;
         echo '<input type="submit" name="submit" value="Annuler"></td></form></td></tr></table></div><br>';  
}
   echo '<br><div id="div_table_accueil">';
   echo '<Center><table><tr>';
   $sxe = itemsXML();
   $items = $sxe->items[0];
   $dejaAffiche = 0;
   foreach ($items as $item)
   {    
      if ($item->noItemUnique == $noItemUnique && $dejaAffiche==0 && strcmp($item->estDisponible,"oui")==0){
         $photo = $item->photographie;
            if ("" == $item->photographie)
            {
               $photo = "APhotoND.jpg";
            }
         echo "<BR>Emplacement: ".$item->noUniqueEmplacement;
         echo "<BR>Description: ".$item->description;
         $prix = floatval($item->prix);
         echo '<BR>Prix sans taxe: '.number_format($prix, 2, ',', ' ').'$';     
         $quantite=1;
         if (strcmp($item->estUnLot,"oui")==0){
             $quantite = quantiteItemDisponible($item->noUniqueEmplacement);
         }
         echo "<BR>Quantit&eacute; disponible: ".$quantite;
         echo "<BR>Cat&eacute;gorie: ".$item->categorie;
         echo '<BR><img style="width:800px;height:600px" src="Ressources/Images/imagesItems/'.$photo.' "/><BR></div></table></div>';
         $dejaAffiche=1;
      }
   }
?>
   <footer>
		<h4>Gabriel Poulin et Marc-Etienne Leblanc</h4> 
		<h4>2014. Tous droits réservés.</h4>
	</footer>
</body>
</html>