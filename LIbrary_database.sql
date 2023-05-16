-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           10.4.27-MariaDB - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.3.0.6589
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Listage de la structure de table library. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT '',
  `password` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table library.admin : ~0 rows (environ)
INSERT INTO `admin` (`id`, `username`, `password`) VALUES
	(1, 'admin', 'az@er999');

-- Listage de la structure de table library. emprunt
CREATE TABLE IF NOT EXISTS `emprunt` (
  `N_emp` int(11) NOT NULL AUTO_INCREMENT,
  `Nom_usager` varchar(50) DEFAULT '',
  `Prenom_usager` varchar(50) DEFAULT '',
  `Titre_livre` varchar(50) DEFAULT '',
  `Date_emp` date DEFAULT curdate(),
  `Date_retoure` date DEFAULT NULL,
  PRIMARY KEY (`N_emp`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table library.emprunt : ~17 rows (environ)
INSERT INTO `emprunt` (`N_emp`, `Nom_usager`, `Prenom_usager`, `Titre_livre`, `Date_emp`, `Date_retoure`) VALUES
	(1, 'Ait abidalla', 'ayoub', 'Probabilités et statistiques', '2023-05-12', '2023-05-13'),
	(2, 'Ait abidalla', 'ayoub', 'Mécanique quantique', '2023-05-18', '2023-05-26'),
	(3, '	karim', 'amin', 'Algèbre linéaire et géométrie', '2023-05-25', NULL),
	(4, 'Maki', 'Fouad', 'Mécanique des fluides', '2023-05-10', '2023-05-26'),
	(5, 'orich', 'outman', 'The C Programming Language', '2023-05-09', NULL),
	(6, 'Ait abidalla', 'ayoub', 'Introduction to Algorithms', '2023-05-25', NULL),
	(7, 'Ait abidalla', 'ayoub', 'The C Programming Language', '2023-06-10', NULL),
	(11, 'Ait abidalla', 'ayoub', 'Algèbre linéaire et géométrie', '2023-05-19', NULL),
	(12, 'Ait abidalla', 'ayoub', 'Mécanique des fluides', '2023-06-07', '2023-06-11'),
	(13, 'Ait abidalla', 'ayoub', 'Probabilités et statistiques', '2023-05-11', '2023-05-13'),
	(14, 'orich', 'outman', 'Mécanique des fluides', '2023-05-28', '2023-06-07'),
	(17, 'Allali', 'mustapha', 'Algèbre linéaire et géométrie', '2023-05-12', '2023-05-13'),
	(20, 'alami', 'mohamed', 'Mécanique quantique', '2023-05-13', NULL),
	(21, 'Maki', 'Fouad', 'The C Programming Language', '2023-05-13', NULL),
	(22, 'Maki', 'Fouad', 'Probabilités et statistiques', '2023-05-13', NULL),
	(23, 'Maki', 'fouad', 'Mécanique quantique', '2023-05-13', NULL),
	(24, 'alami', 'mohamed', 'Algèbre linéaire et géométrie', '2023-05-13', NULL);

-- Listage de la structure de table library. livres
CREATE TABLE IF NOT EXISTS `livres` (
  `Numero` int(11) NOT NULL AUTO_INCREMENT,
  `Titre` varchar(50) DEFAULT '',
  `Auteur` varchar(50) DEFAULT '',
  `edition` varchar(50) DEFAULT '',
  `Nbrpages` int(11) DEFAULT NULL,
  `Nbrexemplaires` int(11) DEFAULT NULL,
  PRIMARY KEY (`Numero`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table library.livres : ~8 rows (environ)
INSERT INTO `livres` (`Numero`, `Titre`, `Auteur`, `edition`, `Nbrpages`, `Nbrexemplaires`) VALUES
	(1, 'Introduction to Algorithms', 'Thomas H. Cormen', 'MIT Press', 1312, 5),
	(2, 'The C Programming Language', 'Brian W. Kernighan ', 'Prentice Hall', 272, 4),
	(3, 'Algèbre linéaire et géométrie', 'Bernard Gaveau et Pierre Lecomte', 'Dunod', 544, 10),
	(4, 'Analyse mathématique, tome 1', 'Jean-Pierre Demailly', 'EDP', 584, 8),
	(5, 'Géométrie affine et euclidienne', 'Michel Brion', 'Hermann', 228, 10),
	(6, 'Probabilités et statistiques', 'Didier Piau', 'Dunod', 480, 5);

-- Listage de la structure de table library. usagers
CREATE TABLE IF NOT EXISTS `usagers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) DEFAULT '',
  `prenom` varchar(50) DEFAULT '',
  `adresse` varchar(50) DEFAULT '',
  `email` varchar(50) DEFAULT '',
  `statut` varchar(50) DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table library.usagers : ~16 rows (environ)
INSERT INTO `usagers` (`id`, `nom`, `prenom`, `adresse`, `email`, `statut`) VALUES
	(1, 'Ait abidalla', 'ayoub', 'agadir', 'ayoubabidalla@gmail.com', 'Enseignant'),
	(2, 'karim', 'amin', 'agadir', 'karim@maroc.com', 'Etudiant'),
	(3, 'orich', 'outman', 'ANZI', 'orich@gmail.com', 'Etudiant'),
	(5, 'Ghafarri', 'hamid', 'agadir', 'ghafarri@gmail.com', 'Etudiant'),
	(6, 'alami', 'mohamed', 'agadir', 'alami@gmail.com', 'Enseignant'),
	(7, 'Maki', 'Fouad', 'rabat', 'makifouad@gmail.com', 'Etudiant'),
	(10, 'Abbassi', 'ilyasse', 'Agadir ', 'Abassiilyasse@gmail.com', 'Etudiant'),
	(11, 'alami', 'karim', 'Ait melloul', 'alamikarim01@gmail.com', 'Etudiant'),
	(12, 'Alaoui', 'khalid', 'houara', 'alaouikhaL@gmail.com', 'Etudiant'),
	(13, 'Allali', 'mustapha', 'Agadir', 'allalimustapha@gmail.com', 'Enseignant'),
	(14, 'Amrabt', 'ayoub', 'Tikiouine', 'amrabt@gmail.com', 'Etudiant'),
	(15, 'Belhaj ', 'khadija', 'Agadir', 'khadijabelhaj@gmail.com', 'Etudiant'),
	(16, 'Naciri', 'lamya', 'Agadir', 'nacirilamyaa@gmail.com', 'Etudiant'),
	(17, 'cherkaoui', 'Fatima', 'Agadir', 'cherkaouifatima@gmail.com', 'Etudiant'),
	(18, 'Kacem', 'mohamed', ' INEZGANE', 'Kacemmohamed@gmail.com', 'Etudiant'),
	(20, 'elyazid', 'karim', 'agadir', 'elyazid@gmail.com', 'Etudiant');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
