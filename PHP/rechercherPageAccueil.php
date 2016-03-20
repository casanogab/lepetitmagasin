<?php
session_start();
include('utilitaire.php');
echo '<head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';   
echo '</head>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $champRecherche = transforme_entre($_POST["champRecherche"]);
   //echo $champRecherche;
   if (quantiteItemDisponible($champRecherche)>0){ 
     exit(header("location: afficheItem.php?noItemUnique=".getNoItemUniqueDisponible($champRecherche)."")); 
   }
   if (noTransactionExiste($champRecherche)==1)
   { 
     exit(header("location: remboursement.php?vente=".($champRecherche)."")); 
   }else{
   echo  '<script> alert("Erreur: Le numéro entré ne correspond à aucun numéro de la base de donnée !"); document.location.href = "index.php" </script>';
   }
}


?>