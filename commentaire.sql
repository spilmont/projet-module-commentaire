-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 18 jan. 2019 à 16:34
-- Version du serveur :  5.7.17
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `commentaire`
--

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` bigint(5) NOT NULL,
  `username` varchar(255) NOT NULL,
  `commentaire` text NOT NULL,
  `date` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `username`, `commentaire`, `date`) VALUES
(23, 'bryan', 'C\'est bien Bryan', '2019-01-18 14:30:42'),
(24, 'Benoit', '...', '2019-01-18 14:31:24'),
(22, 'Goeffrey', 'CYRIAK', '2019-01-18 14:30:06'),
(21, 'lubin', 'branledindon', '2019-01-18 14:28:51'),
(20, 'almarich', 'salut', '2019-01-18 14:28:11'),
(19, 'almarich', 'vive BDO!!!', '2019-01-18 14:14:17'),
(17, 'romain', 'coucou', '2019-01-18 14:10:52'),
(25, 'David', 'dÃ©Ã©Ã©Ã©Ã©Ã©dÃ©Ã©Ã©Ã©Ã©', '2019-01-18 14:31:51'),
(26, 'Onatouvus', 'ouÃ© c\'est pas faux', '2019-01-18 14:32:39'),
(27, 'Ciryack', 'o|o', '2019-01-18 14:34:33'),
(28, 'almarich', 'connard', '2019-01-18 14:39:37');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
