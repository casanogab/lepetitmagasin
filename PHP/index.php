<!DOCTYPE html>

<html>
<head>
  <title>LPM</title>
</head>
<body>


<?php
include('menuLPM.php'); 
include('fonctionsItem.php');
echo "<h1>Bienvenue sur la page d'accueil</h1>";
echo '<form action="rechercherPageAccueil.php" method="post" enctype="multipart/form-data">';
echo '<div id="div_table_accueil">';
echo '<Center><table><tr><td><input type="text" name="champRecherche">';
echo '<input type="submit" name="submit" value="Rechercher"></td></tr></table></div><br>';
  //$sxe = itemsXML();
   $items = GetProduits;
   //$noItemUnique = $item->noItemUnique;
     $i=1; 
     echo '<div id="div_table_accueil">';
     echo '<table align=center ><br><tr>';
     $tableauAffichage = array();
    
     foreach ($items as $item)
      {   
            // Pour tout les items disponible on affiche la bonne photographie associé si elle est disponbile.
            // sinon on utilise une photo générique.
            if ($item->estDisponible == "oui")
            {
               $photo = $item->photographie;
               if ("" == $item->photographie)
               {
                  $photo = "APhotoND.jpg";
               }
                // ici on vérifie que l'item n'est pas déjà afficher 
               // on ne veut pas voir les 200 crayons rouges d'un items de lots sur la page d'accueil 
                if (0==estAfficher($item->noUniqueEmplacement, $tableauAffichage))
                {
                  $lienImage = '<td><a href="afficheItem.php?noItemUnique='.$item->noItemUnique.'"><img src=Ressources/Images/imagesItems/'.$photo.' style="width:230px;height:180px"/></a><br>' ;
                  echo $lienImage;
                  echo $item->noUniqueEmplacement."<br>"; 
                  echo $item->description."</td>";
               
                  if (0==$i%4){
                     echo "</tr><tr>";
                  }
                  $i = ++$i;
               }
            }
     }
    echo '</tr></table></div>';
?>
</form>
   <footer>
		<h4>Gabriel Poulin et Marc-Etienne Leblanc</h4> 
		<h4>2014. Tous droits réservés.</h4>
	</footer>
</body>
</html>