-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 14 mars 2021 à 19:25
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
-- Structure de la table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `login` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `selec` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `login`, `image`, `time`, `selec`) VALUES
(9, 'louiscmc', 'upload/design1.png', '2021-03-05 23:10:57', 1),
(10, 'louiscmc', 'upload/design2.png', '2021-03-05 22:58:22', 0),
(11, 'louiscmc', 'upload/design3.png', '2021-03-05 22:58:28', 0),
(12, 'louiscmc', 'upload/design4.png', '2021-03-05 22:58:36', 0);

-- --------------------------------------------------------

--
-- Structure de la table `lettre`
--

CREATE TABLE `lettre` (
  `id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `destinataire` varchar(64) NOT NULL,
  `contenu` text NOT NULL,
  `design` varchar(64) NOT NULL,
  `chupachups` tinyint(1) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `supprime` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `polytechniciens`
--

CREATE TABLE `polytechniciens` (
  `id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nom` varchar(64) NOT NULL,
  `prenom` varchar(64) NOT NULL,
  `section` varchar(32) NOT NULL,
  `promotion` int(11) NOT NULL,
  `casert` int(11) NOT NULL,
  `gagnant` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `polytechniciens`
--

INSERT INTO `polytechniciens` (`id`, `login`, `admin`, `password`, `nom`, `prenom`, `section`, `promotion`, `casert`, `gagnant`) VALUES
(1, 'louiscmc', 1, 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 'Cattin--Mota de Campos', 'Louis', 'Natation', 2019, 702013, 1),
(2, 'mathildea', 1, 'e05bfbc4670d242fdf5e9512e408adb7df517863', 'André', 'Mathilde', 'Escalade', 2019, 123003, 0),
(6, 'mathv', 0, '543f1918df382a23d6680f90d9ab51137a0fb752', 'Vergnolle', 'Mathéo', 'Raid', 2020, 121022, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lettre`
--
ALTER TABLE `lettre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `polytechniciens`
--
ALTER TABLE `polytechniciens`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `lettre`
--
ALTER TABLE `lettre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT pour la table `polytechniciens`
--
ALTER TABLE `polytechniciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
