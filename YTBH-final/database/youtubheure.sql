-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 02 Octobre 2016 à 14:05
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `youtubheure`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `id` int(11) NOT NULL,
  `id_page` int(11) NOT NULL,
  `note` int(11) NOT NULL,
  `ip` varchar(15) COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `ID` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `message` varchar(255) NOT NULL,
  `datecreation` varchar(255) NOT NULL,
  `views` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `points` int(11) NOT NULL,
  `video` varchar(255) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`ID`, `author`, `message`, `datecreation`, `views`, `title`, `points`, `video`) VALUES
(1, 'azertyu', 'sfqvtvqervtertvert', 'eqrtvertvqertv', 453, 'titre1', 5345, 'qsdqsdqsd'),
(2, 'sdfqstvqert', 'ertvqrt', 'rtvqerteqrtv', 453453, 'titre2', 453, 'https://www.youtube.com/watch?v=v6yhwF9_gG0'),
(3, 'gfgdsf', 'qsfvazertytrez', 'sdfghfdsdfg', 5446, 'titre5', 886, ''),
(4, 'sdtvrevtert', 'drtvdrtvdrtv', 'drtvrtdrtvdrt', 54343, 'titre3', 56365356, 'https://www.youtube.com/watch?v=v6yhwF9_gG0'),
(5, 'oiuytre', 'dfghertyhgfdertyhgfdsghg', 'sdfsdfsdf', 453, 'titre4', 4534, 'https://www.youtube.com/watch?v=UoFMVg9XeKQ');

-- --------------------------------------------------------

--
-- Structure de la table `tc_tuto_rating`
--

CREATE TABLE `tc_tuto_rating` (
  `id` int(6) NOT NULL,
  `media` int(6) NOT NULL,
  `rate` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `lastvisit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `pseudo`, `Nom`, `password`, `email`, `lastvisit`, `grade`) VALUES
(1, 'toto', '', '202cb962ac59075b964b07152d234b70', 'abc@hotmail.fr', '0100-01-01 00:00:00', 0),
(3, 'Paul', 'Leclerc', '2b6feac64c4a99c3432bc346f85ee830', 'paulleclerc@laposte.net', '2016-10-02 15:49:35', 1);

-- --------------------------------------------------------

--
-- Structure de la table `vote`
--

CREATE TABLE `vote` (
  `ID` int(11) NOT NULL,
  `vote` varchar(255) NOT NULL,
  `votant` varchar(255) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vote`
--

INSERT INTO `vote` (`ID`, `vote`, `votant`, `id_post`) VALUES
(51, '5', 'toto', 3),
(50, '5', 'toto', 5),
(49, '3', 'toto', 5),
(48, '5', 'toto', 4),
(47, '4', 'toto', 4),
(46, '3', 'toto', 4),
(45, '4', 'toto', 4),
(44, '5', 'toto', 1),
(43, '3', 'toto', 4),
(42, '4', 'toto', 4),
(41, '5', 'toto', 4),
(40, '3', 'toto', 4),
(39, '4', 'toto', 4),
(38, '3', 'toto', 4),
(37, '4', 'toto', 4),
(36, '5', 'toto', 4);

-- --------------------------------------------------------

--
-- Structure de la table `vote_donner`
--

CREATE TABLE `vote_donner` (
  `ID` double NOT NULL,
  `ID_vote` double NOT NULL,
  `Note` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `vote_donner`
--

INSERT INTO `vote_donner` (`ID`, `ID_vote`, `Note`) VALUES
(1, 1, 6);

-- --------------------------------------------------------

--
-- Structure de la table `vote_index`
--

CREATE TABLE `vote_index` (
  `ID` double NOT NULL,
  `Titre` text NOT NULL,
  `Description` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `tc_tuto_rating`
--
ALTER TABLE `tc_tuto_rating`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `tc_tuto_rating`
--
ALTER TABLE `tc_tuto_rating`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
