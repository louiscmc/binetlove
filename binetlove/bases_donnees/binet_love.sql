-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 05 mars 2021 à 22:49
-- Version du serveur :  10.4.17-MariaDB
-- Version de PHP : 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `binet_love`
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

--
-- Déchargement des données de la table `lettre`
--

INSERT INTO `lettre` (`id`, `login`, `destinataire`, `contenu`, `design`, `chupachups`, `time`, `supprime`) VALUES
(89, 'louiscmc', 'louis_vaneau', '&lt;p&gt;dfsdfsd&lt;/p&gt;', 'upload/design1.png', 0, '2021-03-05 15:40:25', 1),
(90, 'louiscmc', 'louiscmc', '&lt;p&gt;dfsdfsd&lt;/p&gt;', 'upload/design1.png', 0, '2021-03-05 15:40:30', 1),
(91, 'louiscmc', 'mathildea', '&lt;p&gt;dfsdfsd&lt;/p&gt;', 'upload/design1.png', 0, '2021-03-05 15:40:28', 1),
(92, 'louiscmc', 'louiscmc', '&lt;p&gt;dfsdfsd&lt;/p&gt;', 'upload/design1.png', 0, '2021-03-05 14:09:02', 0),
(93, 'louiscmc', 'mathildea', '&lt;p&gt;dfsdfsd&lt;/p&gt;', 'upload/design1.png', 0, '2021-03-05 15:40:26', 1),
(94, 'mathildea', 'louis_vaneau', '&lt;p&gt;ghgfhgfh&lt;/p&gt;', 'upload/design1.png', 0, '2021-03-05 15:40:26', 1),
(95, 'mathildea', 'louiscmc', '&lt;p&gt;tu es le plus beau&lt;/p&gt;', 'upload/design1.png', 1, '2021-03-05 15:40:56', 0),
(96, 'louis', 'louiscmc', '&lt;p&gt;fsdfsdfsdfsdf&lt;/p&gt;', 'upload/design1.png', 0, '2021-03-05 16:18:21', 0);

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
(3, 'louis_vaneau', 0, 'pass_vaneau', 'Vaneau', 'Louis', 'Roulade', 1828, 11001, 0),
(4, 'louis', 0, 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 'qsdas dqsf erztergsfg', 'hgdavdqsdsqd', 'Roulade', 2019, 1, 1),
(5, 'louis2', 0, 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 'fgdfgfdg', 'louis', 'Raid', 2019, 212121, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `lettre`
--
ALTER TABLE `lettre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT pour la table `polytechniciens`
--
ALTER TABLE `polytechniciens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
