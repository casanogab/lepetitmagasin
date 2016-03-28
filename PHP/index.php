<!DOCTYPE html>

<html>
<head>
  <title>LPM</title>
</head>
<body>
<a href=""><img src="../Ressources/Images/imagesItems/petitePhoto.jpg" onmouseover="this.src='../Ressources/Images/imagesItems/APhotoND.jpg'" onmouseout="this.src='../Ressources/Images/imagesItems/petitePhoto.jpg'"/></a>
<?php
include('menuLPM.php'); 
include('fonctionsItem.php');
echo "<h1>Bienvenue sur la page d'accueil</h1>";
if ($_SESSION['code'] == ''){
	echo "<font size=3 color=red>Veuillez utiliser le bouton connexion du menu!</font>";
}else{
echo '<form action="rechercherPageAccueil.php" method="post" enctype="multipart/form-data">';
echo '<div id="div_table_accueil">';
echo '<Center><table><tr><td><input type="text" name="champRecherche">';
echo '<input type="submit" name="submit" value="Rechercher"></td></tr></table></div><br>';


$items=GetProduits();
foreach ($items as $item){	
	echo $item[nom];
	echo "allo";
}

     $i=1; 
     echo '<div id="div_table_accueil">';
     echo '<table align=center ><br><tr>';
     $tableauAffichage = array();
     foreach ($items as $item){           
	  
      	  
          if ($item[estActif])
            {
               $photo = $item[photographie];
               if ("" == $item[photographie])
               {
                  $photo = "APhotoND.jpg";
               }
               echo "<td>";
               echo  $item [id];
               echo "<br>";
               echo  $item[quantite];
               echo "<br>";
               echo  $item[nom];
               echo "<br>";
               echo $item[description];
               echo "<br>";
               echo $item[cout];
               echo "<br>";
                  //$lienImage = '<td><a href="afficheItem.php?noItemUnique='.$item[id].'"><img src=../Ressources/Images/imagesItems/'.$photo.' style="width:230px;height:180px"/></a><br>' ;
                                                                                
                                                                              //echo "<img src=\"../Ressources/Images/imagesItems/petitePhoto.jpg\" onmouseover=\"this.src='../Ressources/Images/imagesItems/.$photo.'\" onmouseout=\"this.src='../Ressources/Images/imagesItems/petitePhoto.jpg'\"/>";
              $lienImage = "<td><a href='afficheItem.php?noItemUnique='.$item[id].'><img src=\"../Ressources/Images/imagesItems/petitePhoto.jpg\" onmouseover=\"this.src='../Ressources/Images/imagesItems/$photo'\" onmouseout=\"this.src='../Ressources/Images/imagesItems/petitePhoto.jpg'\"/></a>";
                  echo $lienImage;
                  echo "</td>";
               
                  if (0==$i%4){
                     echo "</tr><tr>";
                  }
                  $i = ++$i;
               }
            }
    echo '</tr></table></div>';
}
?>
</form>
   <footer>
		<h4>Gabriel Poulin</h4> 
		<h4>2016. Tous droits réservés.</h4>
	</footer>
</body>
</html>