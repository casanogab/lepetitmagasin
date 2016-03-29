-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Feb 27, 2016 at 12:21 PM
-- Server version: 5.5.41-log
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "-05:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lepetitmagasin`
--

-- --------------------------------------------------------

--
-- Table structure for table `produit`

CREATE TABLE IF NOT EXISTS `produit` (
`id` int(10) NOT NULL,
`nom` varchar(50) NOT NULL,
`quantite` int(10) NOT NULL,
`description` varchar(100) NOT NULL,
`cout` float(10) NOT NULL,
`photographie` varchar(50),
`categorie` varchar(50),
`code` int(10),
`estActif` boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

ALTER TABLE `produit`
 ADD PRIMARY KEY (`id`);

ALTER TABLE `produit`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('efface', 5,'efface rose',0.99,'efface.jpg','Agrafes, attaches dt adhésifs diverses','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('crayon2', 10,'crayon jaune',0.50,'','Agrafes, attaches dt adhésifs diverses','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('ciseau', 15,'ciseau noir',1.24,'ciseaunoir.jpg','Articles de bureau diverses','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('ciseau de gauché', 20,'ciseau de gauche pouvant servir au droitier',20.25,'ciseaugauche.jpg','Articles de bureau diverses','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('compat', 25,'regarde les étoile',10.00,'compat.jpg','Articles de bureau diverses','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('rapporteur dangle', 30,'rapporteur dangle description',1.06,'rapporteurdangle.jpg','Articles de bureau diverses','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('Carton blanc', 30,'Carton blanc',0.60,'cartonblanc.jpg','Carton affiche(22pX28p)','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('Carton bleu ciel', 30,'Carton bleu ciel',0.60,'cartonbleuciel.jpg','Carton affiche(22pX28p)','leCode',true);
INSERT INTO produit (nom, quantite, description, cout, photographie, categorie, code, estActif) VALUES ('Carton bleu marine', 30,'Carton bleu marine',0.60,'cartonbleumarine.jpg','Carton affiche(22pX28p)','leCode',true);
-- --------------------------------------------------------

--
-- Table structure for table `commande`


CREATE TABLE IF NOT EXISTS `commande` (
`id` int(10) NOT NULL,
  `utilisateurID` varchar(50) NOT NULL,
  `total` float(10) NOT NULL,
  `commanderLe` date() NOT NULL
  `preparerLe` date() NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;


-- --------------------------------------------------------

--
-- Table structure for table `ligneCommande`


CREATE TABLE IF NOT EXISTS `ligneCommande` (
`id` int(10) NOT NULL,
`commandeID` int(10) NOT NULL,
  `produitID` varchar(50) NOT NULL,
  `quantite` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for table `ligneCommande`
--
ALTER TABLE `ligneCommande`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `ligneCommande`
--
ALTER TABLE `ligneCommande`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;


-- --------------------------------------------------------


--INSERT INTO utilisateur (code, motDePasse, nom, prenom, niveauSecurite, estActif, estSupprimer) VALUES ('petit', MD5('petit'),'petitlapin','petitjaneot',1,true,false);
--INSERT INTO utilisateur (code, motDePasse, nom, prenom, niveauSecurite, estActif, estSupprimer) VALUES ('root', MD5('super'),'lapin','janeot',0,true,false);
-- Table structure for table `utilisateur`
--0 = admin 1= usager

CREATE TABLE IF NOT EXISTS `utilisateur` (
`id` int(10) NOT NULL,
`code` varchar(50) NOT NULL,
`motDePasse` varchar(50) NOT NULL,
`nom` varchar(50) NOT NULL,
`prenom` varchar(50) NOT NULL,
`niveauSecurite` int(5) NOT NULL, 
`estActif` boolean NOT NULL,
`estSupprimer` boolean NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;



-- --------------------------------------------------------

--
-- Table structure for table `parametres_administratif`
-- parametres_administratif(pointsMin) 

CREATE TABLE IF NOT EXISTS `parametres_administratif` (
`id` int(10) NOT NULL,
`pointsMin` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Indexes for table `parametres_administratif`
--
ALTER TABLE `parametres_administratif`
 ADD PRIMARY KEY (`id`); 

--
-- AUTO_INCREMENT for table `parametres_administratif`
--
--
ALTER TABLE `parametres_administratif`
MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;


INSERT INTO parametres_administratif(pointsMin) VALUES (0);

INSERT INTO age(min, max, points) VALUES (18,35,16);
INSERT INTO age(min, max, points) VALUES (36,36,14);
INSERT INTO age(min, max, points) VALUES (37,37,12);
INSERT INTO age(min, max, points) VALUES (38,38,10);
INSERT INTO age(min, max, points) VALUES (39,39,8);
INSERT INTO age(min, max, points) VALUES (40,40,6);
INSERT INTO age(min, max, points) VALUES (41,41,4);
INSERT INTO age(min, max, points) VALUES (42,42,2);
INSERT INTO age(min, max, points) VALUES (43,125,0);

INSERT INTO domaine_formation(domaine, points) VALUES ("construction",5);
INSERT INTO domaine_formation(domaine, points) VALUES ("informatique",6);

INSERT INTO niveau_scolarite(niveau, points) VALUES ("secondaire",15);
INSERT INTO niveau_scolarite(niveau, points) VALUES ("cegep",16);
INSERT INTO niveau_scolarite(niveau, points) VALUES ("universitaire",17);

INSERT INTO tef(epreuve, resultat, points) VALUES ("CO","A1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CO","A2", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CO","B1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CO","B2", 5);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CO","C1", 6);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CO","C2", 7);

INSERT INTO tef(epreuve, resultat, points) VALUES ("CE","A1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CE","A2", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CE","B1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CE","B2", 5);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CE","C1", 6);
INSERT INTO tef(epreuve, resultat, points) VALUES ("CE","C2", 7);

INSERT INTO tef(epreuve, resultat, points) VALUES ("EO","A1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EO","A2", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EO","B1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EO","B2", 5);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EO","C1", 6);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EO","C2", 7);

INSERT INTO tef(epreuve, resultat, points) VALUES ("EE","A1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EE","A2", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EE","B1", 0);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EE","B2", 5);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EE","C1", 6);
INSERT INTO tef(epreuve, resultat, points) VALUES ("EE","C2", 7);
