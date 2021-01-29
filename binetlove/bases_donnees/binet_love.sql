-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 29 jan. 2021 à 13:54
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
  `nom` varchar(32) NOT NULL,
  `login` varchar(32) NOT NULL,
  `image` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `nom`, `login`, `image`) VALUES
(1, 'design1', 'louiscmc', 'upload/design1\r\n'),
(2, 'design2', 'louiscmc', 'upload/design2'),
(3, 'design3', 'louiscmc', 'upload/design3'),
(4, 'design4', 'louiscmc', 'upload/design4\r\n');

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
(12, 'mathildea', 'louiscmc', '&lt;p&gt;coucou&lt;/p&gt;', '', 1, '2021-01-24 14:35:53', 1),
(13, 'anonyme', 'mathildea', '&lt;p&gt;lfksndv&amp;ugrave;n&lt;/p&gt;', '', 1, '2021-01-24 11:35:27', 0),
(14, 'anonyme', 'mathildea', '&lt;p&gt;lfksndv&amp;ugrave;n&lt;/p&gt;', '', 1, '2021-01-24 11:37:19', 0),
(15, 'mathildea', 'louis_vaneau', '&lt;p&gt;lfkdnfv&amp;ugrave;sn&lt;/p&gt;', 'upload/design1', 1, '2021-01-24 14:35:52', 1),
(16, 'mathildea', 'louis_vaneau', '&lt;p&gt;lfkdnfv&amp;ugrave;sn&lt;/p&gt;', 'upload/design1', 1, '2021-01-24 14:35:51', 1),
(17, 'mathildea', 'louis_vaneau', '&lt;p&gt;lfkdnfv&amp;ugrave;sn&lt;/p&gt;', 'upload/design1', 1, '2021-01-24 14:35:50', 1),
(18, 'mathildea', 'louis_vaneau', '&lt;p&gt;lfkdnfv&amp;ugrave;sn&lt;/p&gt;', 'upload/design1', 1, '2021-01-24 14:35:50', 1),
(19, 'mathildea', 'louis_vaneau', '&lt;p&gt;lfkdnfv&amp;ugrave;sn&lt;/p&gt;', 'upload/design1', 1, '2021-01-24 14:35:49', 1),
(20, 'mathildea', 'louis_vaneau', '&lt;p&gt;lfkdnfv&amp;ugrave;sn&lt;/p&gt;', 'upload/design1', 1, '2021-01-24 14:35:48', 1),
(21, 'mathildea', 'mathildea', '&lt;p&gt;coucou je veux le design 2 car chamby &amp;lt;3&lt;/p&gt;', 'upload/design2', 0, '2021-01-24 14:35:48', 1),
(22, 'mathildea', 'mathildea', '&lt;p&gt;&amp;ugrave;isdj&amp;ugrave;voqisj&amp;ugrave;&amp;lt;wcpoj&lt;/p&gt;', 'upload/design1', 1, '2021-01-24 14:35:46', 1);

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
  `casert` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `polytechniciens`
--

INSERT INTO `polytechniciens` (`id`, `login`, `admin`, `password`, `nom`, `prenom`, `section`, `promotion`, `casert`) VALUES
(0, 'louiscmc', 1, 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 'Cattin--Mota de Campos', 'Louis', 'Natation', 2019, 702013),
(1, 'mathildea', 1, 'e05bfbc4670d242fdf5e9512e408adb7df517863', 'André', 'Mathilde', 'Escalade', 2019, 123003),
(2, 'louis_vaneau', 0, 'pass_vaneau', 'Vaneau', 'Louis', 'Roulade', 1828, 11001);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `lettre`
--
ALTER TABLE `lettre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
