-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 29 déc. 2020 à 22:50
-- Version du serveur :  10.4.8-MariaDB
-- Version de PHP :  7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `binet_love`
--

-- --------------------------------------------------------

--
-- Structure de la table `lettre`
--

CREATE TABLE `lettre` (
  `login` varchar(64) NOT NULL,
  `destinataire` varchar(64) NOT NULL,
  `contenu` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lettre`
--

INSERT INTO `lettre` (`login`, `destinataire`, `contenu`, `time`) VALUES
('patate', 'mathilde.andre', 'coucou test', '2020-12-28 22:54:45'),
('patate', 'louis.cattin-mota_de_campos', 'viospmnpn', '2020-12-29 00:51:59'),
('', 'louis.cattin-mota_de_campos', 'dfsdfsd😊😊😊', '2020-12-29 20:00:25'),
('1', 'louis.cattin-mota_de_campos', 'dqsdqsd', '2020-12-29 20:15:51'),
('_', 'louis.cattin-mota_de_campos', 'dfsfsdfsdf', '2020-12-29 20:18:32'),
('_', 'louis.cattin-mota_de_campos', 'dfsfsdfsdf', '2020-12-29 20:18:48'),
('', 'louis.cattin-mota_de_campos', 'cxwcwx', '2020-12-29 20:19:01'),
('', 'louis.cattin-mota_de_campos', 'cxwcwx', '2020-12-29 20:54:29'),
('', 'louis.cattin-mota_de_campos', 'cxwcwx', '2020-12-29 20:55:21'),
('', 'louis.cattin-mota_de_campos', 'cxwcwx', '2020-12-29 20:59:14'),
('admin', 'louis.cattin-mota_de_campos', 'dsdqsdsqdq', '2020-12-29 21:00:19');

-- --------------------------------------------------------

--
-- Structure de la table `polytechniciens`
--

CREATE TABLE `polytechniciens` (
  `login` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `section` varchar(32) NOT NULL,
  `promotion` int(11) NOT NULL,
  `casert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `polytechniciens`
--

INSERT INTO `polytechniciens` (`login`, `password`, `nom`, `prenom`, `section`, `promotion`, `casert`) VALUES
('louis.cattin--mota_de_campos', 'pass_louis', 'Cattin--Mota de Campos', 'Louis', 'Natation', 2019, 702013),
('mathilde_andre', 'pass_mathilde', 'André', 'Mathilde', 'Escalade', 2019, 123003);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
