<!DOCTYPE html>

<html lang="fr">
<head>
<meta charset="UTF-8">
  <title>LPM</title>
</head>
<body>

<?php
include('menuLPM.php'); 
include('fonctionsItem.php');
if ($_SESSION['code'] == ''){
	echo "<font size=3 color=red>Veuillez utiliser le bouton connexion du menu!</font>";
}else{
//echo '<form action="rechercherPageAccueil.php" method="post" enctype="multipart/form-data">';
//echo '<div id="div_table_accueil">';
//echo '<Center><table><tr><td><input type="text" name="champRecherche">';
//echo '<input type="submit" name="submit" value="Rechercher"></td></tr></table></div><br>';
echo '<form action="commander.php" method="post" enctype="multipart/form-data">';
echo '<font size=3 color=black>Les quantités sont à titre indicatif seulement vous pouvez commander au delà de la disponibilité en inventaire !</font>';
echo '<font size=3 color=black><br>Lorsque vous avez terminer de choisir chacune de vos quantité appuyé sur ce gros bouton!</font>';
echo '<center><input type="submit" name="submit" style="width:300px; height:150px; color:green;" value="Passez ma commande !"></div><br>';

$items=GetProduits();

	 echo '<div id="div_table_accueil">';
     echo '<table align=center border=1>';
     $tableauAffichage = array();
     $categorie = "";
     $categorieold= "";
     foreach ($items as $item){           
         	  
          if ($item[estActif])
            {
               $categorie = $item[categorie];
               if (!($categorieold==$categorie)){
               		echo "<tr><td align=center colspan=3><div style=\"font-size: large; font-family: sans-serif\"><p style=\"color: #ffffff; background-color: #000000\">Catégorie:$categorie</p></div></td></tr>";
               }
               $categorieold = $item[categorie];
               echo "<tr><td align=left>Quantité voulue:<input type='text' name=$item[id] id=$item[id] value = 0>";
               //echo "<input type=\"hidden\" name="noItemUnique" value='.$noItemUnique.'>";
               echo "<td align=left>Id: ";
               echo  $item[id];
               echo "<br>Quantité disponible: ";
               echo  $item[quantite];
               echo "<br>Nom: ";
               echo  $item[nom];
               echo "<br>Description: ";
               echo $item[description];
               echo "<br>Coût: ";
               echo $item[cout];
               echo "$<br>";
               $photo = $item[photographie];
               if ("" == $item[photographie])
               {
               	$photo = "APhotoND.jpg";
               }
               //$lienImage = "<td><a href='afficheItem.php?noItemUnique='.$item[id].'><img src=\"../Ressources/Images/imagesItems/petitePhoto.jpg\" onmouseover=\"this.src='../Ressources/Images/imagesItems/$photo'\" onmouseout=\"this.src='../Ressources/Images/imagesItems/petitePhoto.jpg'\"/></a>";
               $lienImage = "<td><img src=\"../Ressources/Images/imagesItems/$photo\" style=\"width:230px;height:180px\"/>";
               echo $lienImage;
               echo "</td></td></tr>";    
            }
         }
    echo '</table></div>';
}
?>
</form>
   <footer>
		<h4>Gabriel Poulin</h4> 
		<h4>2016. Tous droits réservés.</h4>
	</footer>
</body>
</html>