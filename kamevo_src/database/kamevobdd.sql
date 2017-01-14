-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 14 Janvier 2017 à 17:45
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
  `note` decimal(10,0) NOT NULL DEFAULT '0',
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `likes` int(11) NOT NULL DEFAULT '0',
  `dislikes` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`ID`, `id_post`, `poster`, `comment`, `note`, `date`, `likes`, `dislikes`) VALUES
(5, 7, 12, 'Ceci est un commentaire de test!0', '0', '2017-01-12 15:50:29', 0, 0),
(4, 7, 12, 'qsdqsd', '0', '2017-01-12 15:48:26', 0, 0),
(6, 7, 12, 'Ceci est un commentaire de test!1', '0', '2017-01-12 15:50:29', 0, 0),
(7, 7, 12, 'Ceci est un commentaire de test!2', '0', '2017-01-12 15:50:29', 0, 0),
(8, 7, 12, 'Ceci est un commentaire de test!3', '0', '2017-01-12 15:50:29', 0, 0),
(9, 7, 12, 'Ceci est un commentaire de test!4', '0', '2017-01-12 15:50:29', 0, 0),
(10, 7, 12, 'Ceci est un commentaire de test!5', '0', '2017-01-12 15:50:29', 0, 0),
(11, 7, 12, 'Ceci est un commentaire de test!6', '0', '2017-01-12 15:50:29', 0, 0),
(12, 7, 12, 'Ceci est un commentaire de test!7', '0', '2017-01-12 15:50:29', 0, 0),
(13, 7, 12, 'Ceci est un commentaire de test!8', '0', '2017-01-12 15:50:29', 0, 0),
(14, 7, 12, 'Ceci est un commentaire de test!9', '0', '2017-01-12 15:50:29', 0, 0),
(15, 7, 12, 'Ceci est un commentaire de test!10', '0', '2017-01-12 15:50:29', 0, 0),
(16, 7, 12, 'Ceci est un commentaire de test!11', '0', '2017-01-12 15:50:29', 0, 0),
(17, 7, 12, 'Ceci est un commentaire de test!12', '0', '2017-01-12 15:50:29', 0, 0),
(18, 7, 12, 'Ceci est un commentaire de test!13', '0', '2017-01-12 15:50:29', 0, 0),
(19, 7, 12, 'Ceci est un commentaire de test!14', '0', '2017-01-12 15:50:29', 0, 0),
(20, 7, 12, 'Ceci est un commentaire de test!15', '0', '2017-01-12 15:50:29', 0, 0),
(21, 7, 12, 'Ceci est un commentaire de test!16', '0', '2017-01-12 15:50:29', 0, 0),
(22, 7, 12, 'Ceci est un commentaire de test!17', '0', '2017-01-12 15:50:29', 0, 0),
(23, 7, 12, 'Ceci est un commentaire de test!18', '0', '2017-01-12 15:50:29', 0, 0),
(24, 7, 12, 'Ceci est un commentaire de test!19', '0', '2017-01-12 15:50:29', 0, 0),
(25, 7, 12, 'Ceci est un commentaire de test!20', '0', '2017-01-12 15:50:29', 0, 0),
(26, 7, 12, 'Ceci est un commentaire de test!21', '0', '2017-01-12 15:50:29', 0, 0),
(27, 7, 12, 'Ceci est un commentaire de test!22', '0', '2017-01-12 15:50:29', 0, 0),
(28, 7, 12, 'Ceci est un commentaire de test!23', '0', '2017-01-12 15:50:29', 0, 0),
(29, 7, 12, 'Ceci est un commentaire de test!24', '0', '2017-01-12 15:50:29', 0, 0),
(30, 7, 12, 'Ceci est un commentaire de test!25', '0', '2017-01-12 15:50:29', 0, 0),
(31, 7, 12, 'Ceci est un commentaire de test!26', '0', '2017-01-12 15:50:29', 0, 0),
(32, 7, 12, 'Ceci est un commentaire de test!27', '0', '2017-01-12 15:50:29', 0, 0),
(33, 7, 12, 'Ceci est un commentaire de test!28', '0', '2017-01-12 15:50:29', 0, 0),
(34, 7, 12, 'Ceci est un commentaire de test!29', '0', '2017-01-12 15:50:29', 0, 0),
(35, 7, 12, 'Ceci est un commentaire de test!30', '0', '2017-01-12 15:50:29', 0, 0),
(36, 7, 12, 'Ceci est un commentaire de test!31', '0', '2017-01-12 15:50:29', 0, 0),
(37, 7, 12, 'Ceci est un commentaire de test!32', '0', '2017-01-12 15:50:29', 0, 0),
(38, 7, 12, 'Ceci est un commentaire de test!33', '0', '2017-01-12 15:50:29', 0, 0),
(39, 7, 12, 'Ceci est un commentaire de test!34', '0', '2017-01-12 15:50:29', 0, 0),
(40, 7, 12, 'Ceci est un commentaire de test!35', '0', '2017-01-12 15:50:29', 0, 0),
(41, 7, 12, 'Ceci est un commentaire de test!36', '0', '2017-01-12 15:50:29', 0, 0),
(42, 7, 12, 'Ceci est un commentaire de test!37', '0', '2017-01-12 15:50:29', 0, 0),
(43, 7, 12, 'Ceci est un commentaire de test!38', '0', '2017-01-12 15:50:29', 0, 0),
(44, 7, 12, 'Ceci est un commentaire de test!39', '0', '2017-01-12 15:50:29', 0, 0),
(45, 7, 12, 'Ceci est un commentaire de test!40', '0', '2017-01-12 15:50:29', 0, 0),
(46, 7, 12, 'Ceci est un commentaire de test!41', '0', '2017-01-12 15:50:29', 0, 0),
(47, 7, 12, 'Ceci est un commentaire de test!42', '0', '2017-01-12 15:50:29', 0, 0),
(48, 7, 12, 'Ceci est un commentaire de test!43', '0', '2017-01-12 15:50:29', 0, 0),
(49, 7, 12, 'Ceci est un commentaire de test!44', '0', '2017-01-12 15:50:29', 0, 0),
(50, 7, 12, 'Ceci est un commentaire de test!45', '0', '2017-01-12 15:50:29', 0, 0),
(51, 7, 12, 'Ceci est un commentaire de test!46', '0', '2017-01-12 15:50:29', 0, 0),
(52, 7, 12, 'Ceci est un commentaire de test!47', '0', '2017-01-12 15:50:29', 0, 0),
(53, 7, 12, 'Ceci est un commentaire de test!48', '0', '2017-01-12 15:50:29', 0, 0),
(54, 7, 12, 'Ceci est un commentaire de test!49', '0', '2017-01-12 15:50:29', 0, 0),
(55, 7, 12, 'Ceci est un commentaire de test!50', '0', '2017-01-12 15:50:29', 0, 0),
(56, 7, 12, 'Ceci est un commentaire de test!51', '0', '2017-01-12 15:50:29', 0, 0),
(57, 7, 12, 'Ceci est un commentaire de test!52', '0', '2017-01-12 15:50:29', 0, 0),
(58, 7, 12, 'Ceci est un commentaire de test!53', '0', '2017-01-12 15:50:29', 0, 0),
(59, 7, 12, 'Ceci est un commentaire de test!54', '0', '2017-01-12 15:50:29', 0, 0),
(60, 7, 12, 'Ceci est un commentaire de test!55', '0', '2017-01-12 15:50:29', 0, 0),
(61, 7, 12, 'Ceci est un commentaire de test!56', '0', '2017-01-12 15:50:29', 0, 0),
(62, 7, 12, 'Ceci est un commentaire de test!57', '0', '2017-01-12 15:50:29', 0, 0),
(63, 7, 12, 'Ceci est un commentaire de test!58', '0', '2017-01-12 15:50:29', 0, 0),
(64, 7, 12, 'Ceci est un commentaire de test!59', '0', '2017-01-12 15:50:29', 0, 0),
(65, 7, 12, 'Ceci est un commentaire de test!60', '0', '2017-01-12 15:50:29', 0, 0),
(66, 7, 12, 'Ceci est un commentaire de test!61', '0', '2017-01-12 15:50:29', 0, 0),
(67, 7, 12, 'Ceci est un commentaire de test!62', '0', '2017-01-12 15:50:29', 0, 0),
(68, 7, 12, 'Ceci est un commentaire de test!63', '0', '2017-01-12 15:50:29', 0, 0),
(69, 7, 12, 'Ceci est un commentaire de test!64', '0', '2017-01-12 15:50:29', 0, 0),
(70, 7, 12, 'Ceci est un commentaire de test!65', '0', '2017-01-12 15:50:29', 0, 0),
(71, 7, 12, 'Ceci est un commentaire de test!66', '0', '2017-01-12 15:50:29', 0, 0),
(72, 7, 12, 'Ceci est un commentaire de test!67', '0', '2017-01-12 15:50:29', 0, 0),
(73, 7, 12, 'Ceci est un commentaire de test!68', '0', '2017-01-12 15:50:29', 0, 0),
(74, 7, 12, 'Ceci est un commentaire de test!69', '0', '2017-01-12 15:50:29', 0, 0),
(75, 7, 12, 'Ceci est un commentaire de test!70', '0', '2017-01-12 15:50:29', 1, 0),
(76, 7, 12, 'Ceci est un commentaire de test!71', '0', '2017-01-12 15:50:29', 0, 0),
(77, 7, 12, 'Ceci est un commentaire de test!72', '0', '2017-01-12 15:50:29', 0, 2),
(78, 7, 12, 'Ceci est un commentaire de test!73', '0', '2017-01-12 15:50:29', 0, 0),
(79, 7, 12, 'Ceci est un commentaire de test!74', '0', '2017-01-12 15:50:29', 0, 1),
(80, 7, 12, 'Ceci est un commentaire de test!75', '0', '2017-01-12 15:50:29', 0, 1),
(81, 7, 12, 'Ceci est un commentaire de test!76', '0', '2017-01-12 15:50:29', 0, 0),
(82, 7, 12, 'Ceci est un commentaire de test!77', '0', '2017-01-12 15:50:29', 0, 1),
(83, 7, 12, 'Ceci est un commentaire de test!78', '0', '2017-01-12 15:50:29', 0, 1),
(84, 7, 12, 'Ceci est un commentaire de test!79', '0', '2017-01-12 15:50:29', 0, 1),
(85, 7, 12, 'Ceci est un commentaire de test!80', '0', '2017-01-12 15:50:29', 0, 1),
(86, 7, 12, 'Ceci est un commentaire de test!81', '0', '2017-01-12 15:50:29', 0, 0),
(87, 7, 12, 'Ceci est un commentaire de test!82', '0', '2017-01-12 15:50:29', 2, 0),
(88, 7, 12, 'Ceci est un commentaire de test!83', '0', '2017-01-12 15:50:29', 0, 0),
(89, 7, 12, 'Ceci est un commentaire de test!84', '0', '2017-01-12 15:50:29', 0, 0),
(90, 7, 12, 'Ceci est un commentaire de test!85', '0', '2017-01-12 15:50:29', 0, 0),
(91, 7, 12, 'Ceci est un commentaire de test!86', '0', '2017-01-12 15:50:29', 0, 0),
(92, 7, 12, 'Ceci est un commentaire de test!87', '0', '2017-01-12 15:50:29', 1, 0),
(93, 7, 12, 'Ceci est un commentaire de test!88', '0', '2017-01-12 15:50:29', 0, 0),
(94, 7, 12, 'Ceci est un commentaire de test!89', '0', '2017-01-12 15:50:29', 0, 1),
(95, 7, 12, 'Ceci est un commentaire de test!90', '0', '2017-01-12 15:50:29', 0, 0),
(96, 7, 12, 'Ceci est un commentaire de test!91', '0', '2017-01-12 15:50:29', 0, 0),
(97, 7, 12, 'Ceci est un commentaire de test!92', '0', '2017-01-12 15:50:29', 0, 0),
(98, 7, 12, 'Ceci est un commentaire de test!93', '0', '2017-01-12 15:50:29', 0, 1),
(99, 7, 12, 'Ceci est un commentaire de test!94', '0', '2017-01-12 15:50:29', 0, 0),
(100, 7, 12, 'Ceci est un commentaire de test!95', '0', '2017-01-12 15:50:29', 1, 0),
(101, 7, 12, 'Ceci est un commentaire de test!96', '0', '2017-01-12 15:50:29', 1, 0),
(102, 7, 12, 'Ceci est un commentaire de test!97', '0', '2017-01-12 15:50:29', 0, 1),
(103, 7, 12, 'Ceci est un commentaire de test!98', '0', '2017-01-12 15:50:29', 0, 2),
(104, 7, 12, 'Ceci est un commentaire de test!99', '0', '2017-01-12 15:50:29', 0, 0),
(105, 7, 12, 'Dernier commenatire', '0', '2017-01-12 16:44:18', 0, 1),
(106, 7, 12, 'Dernier commenatire', '0', '2017-01-12 16:45:19', 4, 0),
(107, 7, 12, 'qsdqsdqsd', '0', '2017-01-12 16:45:27', 0, 0),
(108, 7, 12, 'qsdqsdqsd', '0', '2017-01-12 16:45:46', 1, 0),
(109, 5, 12, 'toto fait du vÃ©lo', '0', '2017-01-12 16:46:01', 0, 0),
(110, 5, 12, 'toto fait du vÃ©lo', '0', '2017-01-12 16:46:23', 0, 0),
(111, 5, 12, 'toto fait du vÃ©lo', '0', '2017-01-12 16:46:35', 0, 0),
(112, 5, 12, 'J\'aime le vÃ©lo et la trotinette', '0', '2017-01-12 16:46:59', 0, 0),
(113, 5, 12, 'J\'aime le vÃ©lo et la trotinette', '0', '2017-01-12 16:50:11', 0, 0),
(114, 5, 12, 'J\'aime le vÃ©lo et la trotinette', '0', '2017-01-12 16:51:05', 0, 0),
(115, 5, 12, 'Ce commentaires est trÃ¨s sympatique', '0', '2017-01-12 16:51:19', 0, 0),
(116, 5, 12, 'Ce commentaires est trÃ¨s sympatique', '0', '2017-01-12 16:52:11', 0, 0),
(117, 5, 12, 'Ce commentaires est trÃ¨s sympatique', '0', '2017-01-12 16:53:18', 0, 0),
(118, 5, 12, 'Ce commentaires est trÃ¨s sympatique', '0', '2017-01-12 16:55:31', 0, 0),
(119, 5, 12, 'J\'aime le vÃ©lo et la trotinette', '0', '2017-01-12 17:03:49', 0, 0),
(120, 7, 12, 'dfgdfg', '0', '2017-01-12 17:10:38', 0, 1),
(121, 3, 12, 'Test d\'un commentaire\r\n', '0', '2017-01-12 18:11:47', 1, 0),
(122, 3, 12, 'Cette publication est trÃ¨s intÃ©rÃ©ssalqkslfqsldjsqd\r\n\r\n\r\n', '0', '2017-01-12 18:32:29', 0, 0),
(123, 7, 12, 'toto fait du vÃ©lo', '0', '2017-01-12 18:41:59', 0, 1),
(124, 7, 12, 'toto gazefzezefzef', '0', '2017-01-12 18:42:11', 0, 1),
(125, 6, 12, 'Ceci est un super commentaire!', '0', '2017-01-12 19:11:09', 0, 0),
(126, 7, 12, 'xc', '0', '2017-01-14 18:01:43', 0, 0),
(127, 7, 12, 'sdfsfsdfsd', '0', '2017-01-14 18:01:49', 0, 0);

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
  `dislikes` int(11) NOT NULL DEFAULT '0',
  `uniq_views` int(11) NOT NULL DEFAULT '0',
  `total_views` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`ID`, `author`, `message`, `datecreation`, `views`, `title`, `points`, `video`, `likes`, `dislikes`, `uniq_views`, `total_views`) VALUES
(1, 'azertyu', 'sfqvtvqervtertvert', 'eqrtvertvqertv', 453, 'titre1', 5345, 'qsdqsdqsd', 0, 0, 0, 0),
(2, 'sdfqstvqert', 'ertvqrt', 'rtvqerteqrtv', 453453, 'titre2', 453, 'https://www.youtube.com/watch?v=v6yhwF9_gG0', 0, 0, 0, 0),
(3, 'gfgdsf', 'qsfvazertytrez', 'sdfghfdsdfg', 5446, 'titre5', 886, '', 1, 0, 0, 0),
(4, 'sdtvrevtert', 'drtvdrtvdrtv', 'drtvrtdrtvdrt', 54343, 'titre3', 56365356, 'https://www.youtube.com/watch?v=v6yhwF9_gG0', 0, 0, 0, 0),
(5, 'oiuytre', 'dfghertyhgfdertyhgfdsghg', 'sdfsdfsdf', 453, 'titre4', 4534, 'https://www.youtube.com/watch?v=UoFMVg9XeKQ', 0, 0, 0, 0),
(6, 'toto', 'Ceci est un message super cool pour permettre à Wistaro de travailler sur les posts utilisateurs! blablabkqsjdiqhldiuynliducyIUYINFUYQNLIUYNLIUYRLNYNRLIQUYEZRNLICUQYZELIURYLNCUIQLZUERLNCQIZUYENCRLIQZUEYNRLCIUQZYENLCRIUYQZNELICRUYNQLZIEUYNC', '19/06/1997', 10654654, 'Ceci est le titre du post', 0, 'qsd', 2, 0, 0, 0),
(7, 'toto', 'fsdpofkspdofkpsodk', 'podkfspdofkpok', 99999999, 'spdofkspodkfpsok', 1654, 'sdfsdf', 0, 1, 1, 1);

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
(141, '12', '1'),
(9, '10', '4'),
(32, '10', '1'),
(118, '1', '4');

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
(1, 'toto', '', '202cb962ac59075b964b07152d234b70', 'abc@hotmail.fr', '0100-01-01 00:00:00', 0, 2, 2, 0),
(3, 'Paul', 'Leclerc', '2b6feac64c4a99c3432bc346f85ee830', 'paulleclerc@laposte.net', '2016-10-02 15:49:35', 1, 1, 0, 0),
(4, 'dfsdfs', 'fsdfs', '7682fe272099ea26efe39c890b33675b', 'wistaro@hotmail.fr', '2016-10-24 15:32:53', 1, 2, 0, 0),
(5, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:38:15', 1, 0, 0, 0),
(6, 'toto', 'toto', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:46:22', 1, 0, 0, 0),
(7, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:46:44', 1, 0, 0, 0),
(8, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:47:02', 1, 2, 0, 0),
(9, 'tutu', 'tutu', 'bdb8c008fa551ba75f8481963f2201da', 'tutu@toto.fr', '2016-12-06 20:48:26', 1, 0, 0, 0),
(11, 'root', 'root', '63a9f0ea7bb98050796b649e85481845', 'root@toto.fr', '2017-01-11 17:35:09', 1, 0, 0, 0),
(10, 'Wistaro', 'William', '202cb962ac59075b964b07152d234b70', 'wistaro@hotmail.fr', '2016-12-18 17:07:52', 1, 0, 3, 0),
(12, 'willy', 'william', '88ddcc8eca1a3a544391fefef54ce9df0483d1ab545eb4dd847cbe1d3028e48361e8bc0349d45d361e60d3ca8e1b53d1b7267b8e5a0be3e7b185d961a558553e', 'wistaro@hotmail.fr', '2017-01-11 18:45:28', 1, 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure de la table `views_posts`
--

CREATE TABLE `views_posts` (
  `ID` int(11) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `id_post` int(11) NOT NULL,
  `nb_visites` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `views_posts`
--

INSERT INTO `views_posts` (`ID`, `ip`, `id_post`, `nb_visites`) VALUES
(41, '::1', 7, 2);

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
(30, '2', '1', 46),
(35, '1', '1', 6),
(285, '2', '12', 7),
(284, '1', '12', 6),
(250, '2', '12', 1),
(263, '1', '12', 3);

-- --------------------------------------------------------

--
-- Structure de la table `votecomments`
--

CREATE TABLE `votecomments` (
  `ID` int(11) NOT NULL,
  `vote` varchar(255) NOT NULL,
  `votant` varchar(255) NOT NULL,
  `id_com` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `votecomments`
--

INSERT INTO `votecomments` (`ID`, `vote`, `votant`, `id_com`) VALUES
(89, '2', '12', 79),
(14, '1', '12', 106),
(88, '2', '12', 82),
(87, '2', '12', 84),
(22, '1', '12', 106),
(23, '2', '12', 103),
(24, '2', '12', 98),
(79, '2', '12', 123),
(86, '2', '12', 85),
(40, '1', '12', 106),
(83, '1', '12', 100),
(76, '2', '12', 94),
(45, '2', '12', 103),
(46, '2', '12', 102),
(47, '1', '12', 101),
(82, '1', '12', 108),
(49, '1', '12', 92),
(50, '1', '12', 87),
(51, '1', '12', 87),
(52, '2', '12', 83),
(53, '2', '12', 80),
(54, '2', '12', 77),
(55, '2', '12', 77),
(84, '2', '12', 124),
(60, '1', '12', 106),
(61, '2', '12', 105),
(119, '1', '12', 75),
(74, '2', '12', 120),
(71, '1', '12', 121);

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
-- Index pour la table `views_posts`
--
ALTER TABLE `views_posts`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `votecomments`
--
ALTER TABLE `votecomments`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `subs`
--
ALTER TABLE `subs`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT pour la table `tc_tuto_rating`
--
ALTER TABLE `tc_tuto_rating`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT pour la table `views_posts`
--
ALTER TABLE `views_posts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT pour la table `vote`
--
ALTER TABLE `vote`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=286;
--
-- AUTO_INCREMENT pour la table `votecomments`
--
ALTER TABLE `votecomments`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
