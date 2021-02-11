-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 12 fév. 2021 à 00:00
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
  `image` varchar(64) NOT NULL,
  `selec` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `images`
--

INSERT INTO `images` (`id`, `nom`, `login`, `image`, `selec`) VALUES
(1, 'design1', 'louiscmc', 'upload/design1\r\n', 0),
(2, 'design2', 'louiscmc', 'upload/design2', 0),
(3, 'design3', 'louiscmc', 'upload/design3', 0),
(4, 'design4', 'louiscmc', 'upload/design4\r\n', 0),
(6, 'Asterix34AnniversaireRep-1024x46', 'louiscmc', 'upload/Asterix34AnniversaireRep-1024x468.png', 0),
(7, 'Asterix34AnniversaireRep-1024x46', 'louiscmc', 'upload/Asterix34AnniversaireRep-1024x468.png', 0);

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
(45, 'louiscmc', 'louiscmc', '&lt;p&gt;sdffdfsdfsdfdfsdfs&lt;/p&gt;', 'upload/design4', 0, '2021-01-31 00:38:56', 1),
(46, 'louiscmc', 'mathildea', '&lt;p&gt;fsdfdfsfsdf&lt;/p&gt;', 'upload/design4', 1, '2021-02-01 00:00:07', 0),
(47, 'louiscmc', 'louis_vaneau', '&lt;p&gt;sdfsfdfsfdfsdfdsfsdfsdfqsdferbgese gte rb g esrg serg esrg bserg ersg ddfs fsqdqsdsq&lt;/p&gt;', 'upload/design4', 0, '2021-01-31 23:59:43', 0),
(48, 'louiscmc', 'louiscmc', '&lt;p&gt;hgfjugfj&lt;/p&gt;', 'upload/design4', 1, '2021-01-30 19:02:39', 0),
(49, 'louiscmc', 'louis_vaneau', '&lt;p&gt;nh,j n,j&lt;/p&gt;', 'upload/design4', 0, '2021-01-31 00:37:08', 0),
(50, 'louiscmc', 'mathildea', '&lt;p&gt;ghjgjkgh&lt;/p&gt;', 'upload/design4', 1, '2021-01-31 00:37:58', 0),
(51, 'louiscmc', 'mathildea', '&lt;p&gt;:(&lt;/p&gt;', 'upload/design4', 0, '2021-01-31 02:18:12', 0),
(52, 'louiscmc', 'mathildea', '&lt;p&gt;sdqsdsqdqsdqdqsdqsdqsdqsd&lt;/p&gt;', 'upload/design4', 1, '2021-01-31 02:22:13', 0),
(53, 'louiscmc', 'mathildea', '&lt;p&gt;cxcwxcwcw&lt;/p&gt;', 'upload/design1', 1, '2021-01-31 13:05:18', 0),
(54, 'louiscmc', 'louiscmc', '&lt;p&gt;cbbbvcvbcb&lt;/p&gt;', 'upload/design3', 0, '2021-01-31 03:12:27', 1),
(55, 'louiscmc', 'louiscmc', '&lt;p&gt;dqsdsqdqsdqsdqsd&lt;/p&gt;', 'upload/design2', 1, '2021-01-31 03:12:22', 0),
(56, 'louiscmc', 'louiscmc', '&lt;p&gt;ddqsdqsds&lt;/p&gt;', 'upload/design4', 0, '2021-01-31 23:59:27', 0),
(57, 'louiscmc', 'louis_vaneau', '&lt;p&gt;ouin ouin le covid&lt;/p&gt;', 'upload/design4', 1, '2021-01-31 21:18:47', 0),
(59, 'louiscmc', 'louiscmc', '&lt;p&gt;efdffs&lt;span style=&quot;font-family:Fine College&quot;&gt;fdsfsfdsds&lt;/span&gt;&lt;/p&gt;', 'upload/design3', 1, '2021-02-06 15:06:06', 0),
(60, 'louiscmc', 'louis_vaneau', '&lt;p&gt;sdqsdsqd&lt;/p&gt;', 'upload/design4', 0, '2021-02-06 15:06:24', 0),
(61, 'louiscmc', 'mathildea', '&lt;p&gt;sdfsdfsdf&lt;/p&gt;', 'upload/design1', 1, '2021-02-11 21:23:17', 0),
(62, 'mathildea', 'louiscmc', '&lt;p&gt;qzfsnmoi&lt;/p&gt;', 'upload/design1', 0, '2021-02-11 22:32:17', 0),
(63, 'mathildea', 'louiscmc', '&lt;p&gt;lseixjm&lt;/p&gt;', 'upload/design1', 0, '2021-02-11 22:32:38', 0),
(64, 'mathildea', 'louiscmc', '&lt;p&gt;lseixjm&lt;/p&gt;', 'upload/design1', 0, '2021-02-11 22:34:34', 0),
(65, 'mathildea', 'louiscmc', '&lt;p&gt;kjdvnw&amp;lt;m&amp;ugrave;op&lt;/p&gt;', 'upload/design1', 0, '2021-02-11 22:35:29', 0),
(66, 'mathildea', 'louiscmc', '&lt;p&gt;kjdvnw&amp;lt;m&amp;ugrave;op&lt;/p&gt;', 'upload/design1', 0, '2021-02-11 22:35:40', 0),
(67, 'mathildea', 'louiscmc', '&lt;p&gt;&amp;ugrave;poezis;:&amp;ugrave;&lt;/p&gt;', 'upload/design1', 0, '2021-02-11 22:35:48', 0),
(68, 'mathildea', 'louiscmc', '&lt;p&gt;msdjlkbm&lt;/p&gt;', 'upload/design1', 0, '2021-02-11 22:52:16', 0),
(69, 'mathildea', 'louis_vaneau', '&lt;p&gt;s&amp;lt;evtrb&amp;sect;qest&amp;egrave;nudy,tifu;oppo,inurbyetvzrcaevtbyqnru,io;rp;o!,i&amp;egrave;nubyvt&amp;#39;r&amp;quot;c&amp;eacute;er&amp;quot;vt&amp;#39;by(nui,ouriptouori,eyunybetzvarcEVTRIYU&lt;/p&gt;', 'upload/design1', 1, '2021-02-11 22:55:23', 0);

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
(0, 'louiscmc', 1, 'd82ece8d514aca7e24d3fc11fbb8dada57f2966c', 'Cattin--Mota de Campos', 'Louis', 'Natation', 2019, 702013, 0),
(1, 'mathildea', 1, 'e05bfbc4670d242fdf5e9512e408adb7df517863', 'André', 'Mathilde', 'Escalade', 2019, 123003, 0),
(2, 'louis_vaneau', 0, 'pass_vaneau', 'Vaneau', 'Louis', 'Roulade', 1828, 11001, 0);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
