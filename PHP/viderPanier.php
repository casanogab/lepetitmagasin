
<?php
session_start();

   if ($_SESSION['vente'] != '')
   {
      unset($_SESSION['vente']);
      unset($_SESSION['nbrItemVente']);
   }
exit(header("location: index.php"));
?>
