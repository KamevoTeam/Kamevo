-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 22 Décembre 2016 à 17:58
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `kamevobdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `ID` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `poster` int(11) NOT NULL,
  `comment` text NOT NULL,
  `note` decimal(10,0) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`ID`, `id_post`, `poster`, `comment`, `note`, `date`) VALUES
(1, 5, 3, 'coucou', '0', '2016-10-03 09:32:23'),
(2, 5, 3, 'j\'adore ce Post\r\nbises', '0', '2016-10-03 09:43:43'),
(3, 5, 3, 'j\'adore ce Post\r\nbises', '0', '2016-10-03 09:44:30');

-- --------------------------------------------------------

--
-- Structure de la table `commentslikes`
--

CREATE TABLE `commentslikes` (
  `ID` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `value` int(11) NOT NULL COMMENT '1 = j''aime, 0 = je n''aime pas'
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
  `video` varchar(255) NOT NULL DEFAULT '',
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`ID`, `author`, `message`, `datecreation`, `views`, `title`, `points`, `video`, `likes`, `dislikes`) VALUES
(1, 'azertyu', 'sfqvtvqervtertvert', 'eqrtvertvqertv', 453, 'titre1', 5345, 'qsdqsdqsd', 0, 0),
(2, 'sdfqstvqert', 'ertvqrt', 'rtvqerteqrtv', 453453, 'titre2', 453, 'https://www.youtube.com/watch?v=v6yhwF9_gG0', 0, 0),
(3, 'gfgdsf', 'qsfvazertytrez', 'sdfghfdsdfg', 5446, 'titre5', 886, '', 0, 0),
(4, 'sdtvrevtert', 'drtvdrtvdrtv', 'drtvrtdrtvdrt', 54343, 'titre3', 56365356, 'https://www.youtube.com/watch?v=v6yhwF9_gG0', 0, 0),
(5, 'oiuytre', 'dfghertyhgfdertyhgfdsghg', 'sdfsdfsdf', 453, 'titre4', 4534, 'https://www.youtube.com/watch?v=UoFMVg9XeKQ', 0, 0),
(6, 'toto', 'Ceci est un message super cool pour permettre à Wistaro de travailler sur les posts utilisateurs! blablabkqsjdiqhldiuynliducyIUYINFUYQNLIUYNLIUYRLNYNRLIQUYEZRNLICUQYZELIURYLNCUIQLZUERLNCQIZUYENCRLIQZUEYNRLCIUQZYENLCRIUYQZNELICRUYNQLZIEUYNC', '19/06/1997', 10654654, 'Ceci est le titre du post', 0, 'qsd', 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `subs`
--

CREATE TABLE `subs` (
  `ID` int(11) NOT NULL,
  `abonne` varchar(255) NOT NULL,
  `abonnement` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `subs`
--

INSERT INTO `subs` (`ID`, `abonne`, `abonnement`) VALUES
(8, '10', '3'),
(7, '1', '8'),
(6, '2', '8'),
(107, '1', '3'),
(9, '10', '4'),
(32, '10', '1');

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
  `grade` int(11) NOT NULL,
  `abonnes` int(11) NOT NULL DEFAULT '0',
  `abonnements` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `pseudo`, `Nom`, `password`, `email`, `lastvisit`, `grade`, `abonnes`, `abonnements`, `points`) VALUES
(1, 'toto', '', '202cb962ac59075b964b07152d234b70', 'abc@hotmail.fr', '0100-01-01 00:00:00', 0, 1, 2, 0),
(3, 'Paul', 'Leclerc', '2b6feac64c4a99c3432bc346f85ee830', 'paulleclerc@laposte.net', '2016-10-02 15:49:35', 1, 2, 0, 0),
(4, 'dfsdfs', 'fsdfs', '7682fe272099ea26efe39c890b33675b', 'wistaro@hotmail.fr', '2016-10-24 15:32:53', 1, 1, 0, 0),
(5, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:38:15', 1, 0, 0, 0),
(6, 'toto', 'toto', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:46:22', 1, 1, 0, 0),
(7, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:46:44', 1, 0, 0, 0),
(8, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:47:02', 1, 2, 0, 0),
(9, 'tutu', 'tutu', 'bdb8c008fa551ba75f8481963f2201da', 'tutu@toto.fr', '2016-12-06 20:48:26', 1, 0, 0, 0),
(10, 'Wistaro', 'William', '202cb962ac59075b964b07152d234b70', 'wistaro@hotmail.fr', '2016-12-18 17:07:52', 1, 1, 3, 0);

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
(1, '1', 'toto', 6),
(2, '2', 'toto', 6),
(3, '1', '10', 46),
(4, '2', '10', 46),
(5, '2', '10', 46),
(6, '1', '10', 46),
(7, '1', '10', 46),
(8, '1', '10', 46),
(9, '2', '10', 46),
(10, '1', '10', 46),
(11, '2', '10', 46),
(12, '1', '10', 46),
(13, '1', '10', 46),
(14, '1', '10', 46),
(15, '2', '10', 46),
(16, '2', '10', 46),
(17, '2', '10', 46),
(18, '1', '10', 46),
(19, '2', '10', 46),
(20, '2', '10', 46),
(21, '1', '10', 46),
(22, '2', '10', 46),
(23, '1', '10', 46),
(24, '2', '10', 46),
(25, '1', '10', 46),
(26, '2', '10', 46),
(27, '1', '10', 46),
(28, '2', '10', 46),
(29, '1', '10', 46),
(30, '2', '10', 46),
(31, '1', '10', 46),
(32, '2', '10', 46),
(33, '1', '10', 46),
(34, '2', '10', 46),
(35, '2', '10', 46),
(36, '2', '10', 46),
(37, '1', '10', 46),
(38, '1', '10', 46),
(39, '1', '10', 46),
(40, '1', '10', 46),
(41, '2', '10', 46),
(42, '2', '10', 46),
(43, '1', '10', 46),
(44, '1', '1', 46),
(45, '2', '1', 46),
(46, '2', '1', 46),
(47, '2', '1', 46),
(48, '2', '1', 46),
(49, '2', '1', 46),
(50, '2', '1', 46),
(51, '1', '1', 46),
(52, '2', '1', 46),
(53, '1', '1', 46),
(54, '2', '1', 46),
(55, '2', '1', 46),
(56, '2', '1', 46),
(57, '2', '1', 46),
(58, '1', '1', 46),
(59, '1', '1', 46),
(60, '2', '1', 46),
(61, '2', '1', 46),
(62, '2', '1', 46),
(63, '2', '1', 46),
(64, '2', '1', 46),
(65, '2', '1', 46),
(66, '2', '1', 46),
(67, '2', '1', 46),
(68, '2', '1', 46),
(69, '2', '1', 46),
(70, '2', '1', 46),
(71, '2', '1', 46),
(72, '2', '1', 46),
(73, '2', '1', 46),
(74, '2', '1', 46),
(75, '1', '1', 46),
(76, '1', '1', 46),
(77, '1', '1', 46),
(78, '1', '1', 46),
(79, '2', '1', 46);

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
-- Index pour la table `commentslikes`
--
ALTER TABLE `commentslikes`
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
-- Index pour la table `subs`
--
ALTER TABLE `subs`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT pour la table `commentslikes`
--
ALTER TABLE `commentslikes`
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `subs`
--
ALTER TABLE `subs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT pour la table `tc_tuto_rating`
--
ALTER TABLE `tc_tuto_rating`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
