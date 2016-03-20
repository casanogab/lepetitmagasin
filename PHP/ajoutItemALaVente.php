
<?php
session_start();
include('utilitaire.php');
$noItemUnique =  $_POST['noItemUnique'];
//$noItemUnique = 2101;
$tableauVente = array();
   if ($_SESSION['vente'] == '')
   {
      $tableauVente[0] = $noItemUnique;
      $_SESSION['nbrItemVente'] = 1;
   }else
   {
      $nbrItemVente = $_SESSION['nbrItemVente']; 
      $tableauVente = $_SESSION['vente'];
      $quantiteDejaChoisi = getQuantiteDunItemDeLotDansUneMemeVente($noItemUnique, $tableauVente, $nbrItemVente);
      // si cest un item unique il ne doit pas etre réajouter 
      // mais un item deja ajouter qui est un item de lot on peu
      if (0==estDejaEcrit($noItemUnique, $tableauVente, $nbrItemVente) || 1==estUnItemDeLot($noItemUnique))
      {
         // la quantite disponible d'un item de lot doit être suffisante
         if ( $quantiteDejaChoisi < quantiteItemDisponible(getNoUniqueEmplacement($noItemUnique))){
            $tableauVente[$nbrItemVente] = $noItemUnique;
            $_SESSION['nbrItemVente'] = $_SESSION['nbrItemVente'] + 1;  
         }
      }
   }
$_SESSION['vente'] = $tableauVente;
exit(header("location: index.php"));
?>
