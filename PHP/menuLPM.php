<?php

session_start();

$tableauVente = array();
$tableauVente = $_SESSION['vente'];
$nbrItemVente = $_SESSION['nbrItemVente'];

echo '<!DOCTYPE HTML>';
echo '<html>';
	echo '<head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link rel="stylesheet" type="text/css" href="Ressources/CSS/coopstyle.css">';
	echo '</head>';

echo '<div id="div_table_accueil">';
	echo '<table>';

// Affichage des items ajoutés au panier de ventes par l'employé
if ($nbrItemVente > 0){
 echo "Panier de Vente <BR>";
}
for($gg = 0; $gg < $nbrItemVente; $gg++)
{
  //echo "Panier de Vente = ".$tableauVente[$gg]." description = ".getDescription($tableauVente[$gg])."<br>";
   $prix = floatval(getPrixItem($tableauVente[$gg]));
  echo getDescription($tableauVente[$gg]).", Prix: ".number_format($prix, 2, ',', ' ')."$<br>";
   $prixSansTaxe = $prixSansTaxe + $prix;
}

if ($nbrItemVente > 0){
echo  'Prix total sans taxes: '.number_format($prixSansTaxe, 2, ',', ' ').'$<BR>';
}

//renvoie la description dun item
function getDescription($noItemUnique) {    
 $description="";
   $xml = simplexml_load_file("Ressources/XML/items.xml") or die("Erreur: Ne peut creer xml ou le fichier items.xml est inexistant ");
   $sxe = new SimpleXMLElement($xml->asXML());
   $items = $sxe->items[0];
    foreach ($items as $item){
     if (strcmp($item->noItemUnique, $noItemUnique)==0){
           $description=$item->description;
      }
    }
return $description;
}


// renvoie le prix
function getPrixItem($noItemUnique) {    
$prix = 0;  
   $xml = simplexml_load_file("Ressources/XML/items.xml") or die("Erreur: Ne peut creer xml ou le fichier items.xml est inexistant ");
   $sxe = new SimpleXMLElement($xml->asXML());
   $items = $sxe->items[0];
    foreach ($items as $item){
     if (strcmp($item->noItemUnique, $noItemUnique)==0){
           $prix=$item->prix;
      }
    }
return $prix;
}

// DÉBUT - Première ligne du menu: options utilisateurs de base
	echo '<div id="div_fonctions_employe">';
	echo '<tr>';
		echo '<td class="td_size">';
		echo '<a href="index.php">Page accueil</a>';
		echo '</td>';
		
if ($_SESSION['code'] == ''):
	echo '<td class="td_size">';
		echo '<a href="connexion.php">Connexion</a>';
	echo '</td>';

	echo '<td class="td_size">';
	echo '</td>';

	echo '<td class="td_size">';
	echo '</td>';

else:
	echo '<td class="td_size">';
	echo "Code utilisateur = " . $_SESSION['code'];
	echo '</td>';
	
	echo '<td class="td_size">';
		echo "Niveau = " . $_SESSION['niveau'];
	echo '</td>';
	
	echo '<td class="td_size">';
		echo '<a href="deconnexion.php">Deconnexion</a>';
	echo '</td>';
	
endif;

	echo '</tr>';
	echo '</div>';
// FIN - Première ligne du menu: options utilisateurs de base


// DÉBUT - Deuxième ligne du menu: catégories d'items
echo '<div id="div_Categories">';
echo '<tr>';

	echo '<td>';
		echo '<a href="afficheCategorie.php?categorie=Fournitures scolaires"> Fournitures scolaires </a>';
	echo '</td>';
	
	echo '<td>';
		echo '<a href="afficheCategorie.php?categorie=Livres">Livres </a>';
	echo '</td>';
	
	echo '<td>';
		echo '<a href="afficheCategorie.php?categorie=Vêtements">Vêtements </a>';
	echo '</td>';

	echo '<td>';
		echo '<a href="afficheCategorie.php?categorie=Autres"> Autres </a>';
	echo '</td>';

echo '</tr>';
echo '</div>';
// FIN - Deuxième ligne du menu: catégories d'items


// DÉBUT - Troisième ligne du menu: fonctions de transaction
echo '<div id="fonctions_transaction">';
echo '<tr>';

if ($_SESSION['code'] != ''):
	echo '<td>';
		echo '<a href="ajoutItem.php">Ajouter un item</a>';
	echo '</td>';
	
	echo '<td>';
		echo '<a href="createurBatchItems.php">Cr&eacuteateur item en batch</a>';
	echo '</td>';
	
endif;
	
if ($_SESSION['vente'] != ''): 
	echo '<td>';
        echo '<a href="traiterUneVente.php">Paiement</a>';
	echo '</td>';
	
	echo '<td>';
        echo '<a href="viderPanier.php">Vider le panier</a>';
	echo '</td>';
	
endif;

echo '</tr>';
echo '</div>';
// FIN - Troisième ligne du menu: fonctions de transaction


// DÉBUT - Quatrième ligne du menu: fonctions réservées aux gestionnaires
echo '<div id="fonctions_gestionnaire">';
echo '<tr>';

if ($_SESSION['niveau'] == 'gestionnaire'):
	echo '<td>';
		echo '<a href="gestionnaireDeComptes.php"> Gestionnaire de comptes </a>';
	echo '</td>';
	
	echo '<td>';
		echo '<a href="gestionnaireDeRapports.php">Gestionnaire de rapports</a>';
	echo '</td>';

endif;

echo '</tr>';
echo '</div>';
// FIN - Quatrième ligne du menu: fonctions réservées aux gestionnaires

echo '</table>';
echo '</div>';

echo '<div id="div_logo">';
	echo '<h1>Le petit magasin</h1>';
	// echo '<img src="/Ressources/Images/coop.jpg">';
echo '</div>';
?>