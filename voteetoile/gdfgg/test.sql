-- phpMyAdmin SQL Dump
-- version 3.3.2
-- http://www.phpmyadmin.net
--
-- Serveur: 127.0.0.1
-- Généré le : Mer 24 Novembre 2010 à 20:28
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.5



/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `test`
--

-- --------------------------------------------------------

--
-- Structure de la table `vote_donner`
--

CREATE TABLE IF NOT EXISTS `vote_donner` (
  `ID` double NOT NULL,
  `ID_vote` double NOT NULL,
  `Note` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `vote_index`
--

CREATE TABLE IF NOT EXISTS `vote_index` (
  `ID` double NOT NULL,
  `Titre` text NOT NULL,
  `Description` longtext NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;