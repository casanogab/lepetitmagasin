<?php

session_start();



echo '<!DOCTYPE HTML>';
echo '<html>';
	echo '<head>';
        echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8">';
		echo '<link rel="stylesheet" type="text/css" href="../Ressources/CSS/magasinstyle.css">';
	echo '</head>';

echo '<div id="div_table_accueil">';
	echo '<table>';



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

echo '</div>';

echo '<div id="fonctions_gestionnaire">';

if ($_SESSION['niveau'] == '0'):
	echo '<td>';
		echo '<a href="gestionnaireDeComptes.php"> Gestionnaire de comptes </a>';
	echo '</td>';
	
	echo '<td>';
		echo '<a href="gestionnaireDeRapports.php">Gestionnaire de rapports</a>';
	echo '</td>';

endif;

echo '</tr>';
echo '</div>';
// FIN - Troisième ligne du menu: fonctions réservées aux gestionnaires

echo '</table>';
echo '</div>';

echo '<div id="div_logo">';
	echo '<h1>Le petit magasin</h1>';
	// echo '<img src="/Ressources/Images/coop.jpg">';
echo '</div>';
?>