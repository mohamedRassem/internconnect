-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : Dim 10 août 2025 à 19:23
-- Version du serveur :  5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `coalitiontest`
--

-- --------------------------------------------------------

--
-- Structure de la table `interconnect`
--

DROP TABLE IF EXISTS `interconnect`;
CREATE TABLE IF NOT EXISTS `interconnect` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `programme` varchar(50) DEFAULT NULL,
  `cv_path` varchar(255) DEFAULT NULL,
  `consentement` tinyint(1) DEFAULT NULL,
  `statut_paiement` varchar(20) DEFAULT 'En attente',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `interconnect`
--

INSERT INTO `interconnect` (`id`, `nom`, `email`, `telephone`, `programme`, `cv_path`, `consentement`, `statut_paiement`) VALUES
(1, 'hammami mohmaed rassem', 'mohamedrassem.hammami1@gmail.com', '55641516', 'aa', 'uploads/1754845819_LETTRE-DE-MOTIVATION-ANGLAIS (2).pdf', 1, 'En attente'),
(2, 'hammami mohmaed rassem', 'mohamedrassem.hammami1@gmail.com', '55641516', 'aa', 'uploads/1754848062_CV Ingenieur ANGLAIS.pdf (19).pdf', 1, 'En attente'),
(3, 'hammami mohmaed rassem', 'mohamedrassem.hammami1@gmail.com', '55641516', 'aa', 'uploads/1754850843_CV Ingenieur ANGLAIS.pdf (19).pdf', 1, 'En attente'),
(4, 'hammami mohmaed rassem', 'mohamedrassem.hammami1@gmail.com', '55641516', 'aa', 'uploads/1754851172_CV Ingenieur ANGLAIS.pdf (19).pdf', 1, 'En attente');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
