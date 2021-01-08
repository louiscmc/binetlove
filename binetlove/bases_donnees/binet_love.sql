-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 08 jan. 2021 à 14:37
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
  `id` int(11) NOT NULL,
  `login` varchar(64) NOT NULL,
  `destinataire` varchar(64) NOT NULL,
  `contenu` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `supprime` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `lettre`
--

INSERT INTO `lettre` (`id`, `login`, `destinataire`, `contenu`, `time`, `supprime`) VALUES
(1, 'louis.cattin--mota_de_campos', 'louis.cattin--mota_de_campos', '&lt;p&gt;sdqsdsqdsqdsqdsqd&lt;/p&gt;', '2021-01-02 22:31:32', 0),
(2, 'louis.cattin--mota_de_campos', 'louis.cattin--mota_de_campos', '&lt;p&gt;&lt;span style=&quot;font-family:Fine College&quot;&gt;sdqsdqsdqsdsqd&lt;/span&gt;&lt;/p&gt;', '2021-01-02 22:32:24', 0),
(3, 'louis.cattin--mota_de_campos', 'mathilde_andre', '&lt;p&gt;wxwxw&amp;lt;x&amp;lt;wxw&amp;lt;xw&amp;lt;&lt;span style=&quot;font-family:Fine College&quot;&gt;wxw&amp;lt;xw&amp;lt;xw&amp;lt;x&amp;lt;wx&lt;/span&gt;&lt;/p&gt;', '2021-01-02 22:38:43', 0),
(4, 'louis.cattin--mota_de_campos', 'louis_vaneau', '&lt;p&gt;dsdqsdqsdsqdqsdqsdsqd&lt;span style=&quot;font-family:Caveat&quot;&gt;sdqsdsqdqsdsq&lt;/span&gt;&lt;/p&gt;&lt;p&gt;&amp;nbsp;&lt;/p&gt;&lt;p&gt;&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;sdqsdsqdqsd&lt;/span&gt;&lt;span style=&quot;font-family:Caveat&quot;&gt;sdqdsdqsd&lt;/span&gt;sdqsdsqdqsd&lt;span style=&quot;font-family:Arial,Helvetica,sans-serif&quot;&gt;sdqsdqsd&lt;/span&gt;&lt;/p&gt;', '2021-01-02 22:48:52', 0),
(5, 'louis.cattin--mota_de_campos', 'louis.cattin--mota_de_campos', '&lt;p&gt;dfsdfsdfdsfsdfsdfsdsd&lt;strong&gt;fsdfsdfsdfs&lt;em&gt;dfsdfsd&lt;/em&gt;&lt;/strong&gt;&lt;/p&gt;', '2021-01-04 10:13:21', 0),
(6, 'louis.cattin--mota_de_campos', 'louis.cattin--mota_de_campos', '&lt;p&gt;ljnkjbnjknhiubn&lt;span style=&quot;font-family:Fine College&quot;&gt;&lt;span style=&quot;font-size:72px&quot;&gt;;:m,kjln,lkjn&lt;/span&gt;&lt;/span&gt;😗&lt;/p&gt;', '2021-01-06 17:00:30', 0),
(7, 'louis.cattin--mota_de_campos', 'louis.cattin--mota_de_campos', '&lt;p&gt;zeaeazeazeaz&lt;span style=&quot;font-family:Fine College&quot;&gt;erzerzerzer&lt;/span&gt;&lt;span style=&quot;font-family:Times New Roman,Times,serif&quot;&gt;rzerezrze&lt;/span&gt;&lt;/p&gt;', '2021-01-08 14:22:30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `polytechniciens`
--

CREATE TABLE `polytechniciens` (
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

INSERT INTO `polytechniciens` (`login`, `admin`, `password`, `nom`, `prenom`, `section`, `promotion`, `casert`) VALUES
('louis.cattin--mota_de_campos', 1, 'pass_louis', 'Cattin--Mota de Campos', 'Louis', 'Natation', 2019, 702013),
('mathilde_andre', 1, 'pass_mathilde', 'André', 'Mathilde', 'Escalade', 2019, 123003),
('louis_vaneau', 0, 'pass_vaneau', 'Vaneau', 'Louis', 'Roulade', 1828, 11001);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `lettre`
--
ALTER TABLE `lettre`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `lettre`
--
ALTER TABLE `lettre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
