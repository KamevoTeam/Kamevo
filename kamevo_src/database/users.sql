-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Dim 24 Septembre 2017 à 15:44
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
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `Nom` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `insDate` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lastCo` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grade` int(11) NOT NULL,
  `abonnes` int(11) NOT NULL DEFAULT '0',
  `abonnements` int(11) NOT NULL DEFAULT '0',
  `points` int(11) NOT NULL DEFAULT '0',
  `avatar` varchar(255) NOT NULL DEFAULT 'defaultAvatar.png',
  `banner` varchar(255) NOT NULL DEFAULT 'defaultBanner.png',
  `bio` varchar(255) NOT NULL DEFAULT 'Cet utilisateur n''a pas de biographie',
  `category` varchar(255) NOT NULL DEFAULT 'default'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`ID`, `pseudo`, `Nom`, `password`, `email`, `insDate`, `lastCo`, `grade`, `abonnes`, `abonnements`, `points`, `avatar`, `banner`, `bio`, `category`) VALUES
(1, 'toto', '', '202cb962ac59075b964b07152d234b70', 'abc@hotmail.fr', '0100-01-01 00:00:00', '2017-07-27 16:56:21', 0, 2, 0, 0, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'technology'),
(3, 'Paul', 'Leclerc', '2b6feac64c4a99c3432bc346f85ee830', 'paulleclerc@laposte.net', '2016-10-02 15:49:35', '2017-07-27 16:56:21', 1, 0, 0, 100, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'beauty'),
(4, 'dfsdfs', 'fsdfs', '7682fe272099ea26efe39c890b33675b', 'wistaro@hotmail.fr', '2016-10-24 15:32:53', '2017-07-27 16:56:21', 1, 0, 0, 0, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(5, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:38:15', '2017-07-27 16:56:21', 1, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(6, 'toto', 'toto', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:46:22', '2017-07-27 16:56:21', 1, 0, 0, 0, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(7, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:46:44', '2017-07-27 16:56:21', 1, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(8, 'titi', 'titi', 'f71dbe52628a3f83a77ab494817525c6', 'toto@hotmail.fr', '2016-12-06 20:47:02', '2017-07-27 16:56:21', 1, 3, 0, 100, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(9, 'tutu', 'tutu', 'bdb8c008fa551ba75f8481963f2201da', 'tutu@toto.fr', '2016-12-06 20:48:26', '2017-07-27 16:56:21', 1, 0, 0, 0, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(11, 'root', 'root', '63a9f0ea7bb98050796b649e85481845', 'root@toto.fr', '2017-01-11 17:35:09', '2017-07-27 16:56:21', 1, 0, 0, 0, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(10, 'Wistaro', 'William', '202cb962ac59075b964b07152d234b70', 'wistaro@hotmail.fr', '2016-12-18 17:07:52', '2017-07-27 16:56:21', 1, 1, 0, 0, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(12, 'willy', 'Axel', '88ddcc8eca1a3a544391fefef54ce9df0483d1ab545eb4dd847cbe1d3028e48361e8bc0349d45d361e60d3ca8e1b53d1b7267b8e5a0be3e7b185d961a558553e', 'wistaro@hotmail.fr', '2017-01-11 18:45:28', '2017-07-27 16:56:21', 1, 1, 0, 62, 'a114a81c1850ecd1737432d79e88299a.gif', '11ce87f9a7ef9d67bba57530726b6740.png', 'azertyu', 'default'),
(13, 'tata', 'tata', '7759c425e452e4e809d194084601097168236325736c3911badb429d34a962af9ce681a43e719b7a5d70144dfafbd7bb1402a55aee734000b83ea1a14c7459d3', 'toto@hotmail.fr', '2017-01-18 15:06:47', '2017-07-27 16:56:21', 1, 1, 0, 0, 'Ionic.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(14, 'azeaze', 'azeaze', '28949888ab4351793b519c5c11cf0aa24d429cab3b83d16762f7eb41ef0e9ab36a8795908305e91b407c210e78d5b5c9e201ec001a0d6a199246ed95f49548ae', 'to2to@hotmail.fr', '2017-02-04 19:36:20', '2017-07-27 16:56:21', 1, 0, 2, 18, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(15, 'Pseudo', 'PrÃ©nom', '2118c37356b669d52c22510c0287642551fcdc1b9b27517999e040ad56d1ad678cb71496eb4da19832143ae14ef1ceabf1824349bd608176a91f22f7088a5427', 'mail@toto.fr', '2017-02-06 15:40:49', '2017-07-27 16:56:21', 1, 2, 0, 50, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(16, 'koko', 'koko', 'c60fc71e9ed53d5acbe5804af89f676c1d9e108ddf0da0a5db627f12a17120eaf2e591c32e51227a25b4563adcf33f0a018a7cad5c10dec910693a2e2d917d16', 'koko@hotmail.fr', '2017-02-24 17:33:52', '2017-07-27 16:56:21', 1, 2, 0, 45, '0cd47c1a5faa80c9c6ac43944536cfa8.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(17, 'Kamevo.com', 'Kamevo.com', 'b14361404c078ffd549c03db443c3fede2f3e534d73f78f77301ed97d4a436a9fd9db05ee8b325c0ad36438b43fec8510c204fc1c1edb21d0941c00e9e2c1ce2', 'user@skyfight.be', '2017-02-26 13:45:13', '2017-07-27 16:56:21', 1, 1, 3, 83, '9b62131f7f277662b00c58d0d055f30f.png', 'bb962ea5dc60521fb81636ec6e2175d2.png', 'Kamevo.com , video referencing', 'default'),
(18, 'axel', 'Axel', '99adc231b045331e514a516b4b7680f588e3823213abe901738bc3ad67b2f6fcb3c64efb93d18002588d3ccc1a49efbae1ce20cb43df36b38651f11fa75678e8', 'root@root.be', '2017-03-13 19:58:09', '2017-07-27 16:56:21', 1, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(29, 'Zeldaweed', 'Axel', '328aca18a70aa4ca4e4aabb769bdce96621f9132568455b6badf75b9c741172a3ce9aea677d5cb9faaf1a344db0d85077df70189ecfc590bea45d74ac6d10a0d', 'axel@users.be', '2017-04-06 14:38:26', '2017-07-27 16:56:21', 1, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'technology'),
(19, 'test', 'test', 'ee26b0dd4af7e749aa1a8ee3c10ae9923f618980772e473f8819a5d4940e0db27ac185f8a0e1d5f84f88bc887fd67b143732c304cc5fa9ad8e6f57f50028a8ff', 'test@test.be', '2017-04-03 18:24:25', '2017-09-24 17:28:23', 1, 0, 2, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateurazeazea', 'default'),
(20, 'Kamevo.com', 'Kamevo.com', '1f40fc92da241694750979ee6cf582f2d5d7d28e18335de05abc54d0560e0f5302860c652bf08d560252aa5e74210546f369fbbbce8c12cfc7957b2652fe9a75', 'axel@skyfight.be', '2017-04-03 18:28:06', '2017-07-27 16:56:21', 1, 2, 8, 28, 'ad6da9161bc296c52e63e67c755285c8.jpg', 'c0387d9925ebfaf89e0a1b16298c9886.png', 'Ne gardez que le meilleur des vidÃ©os et vidÃ©astes du Web !', 'technology'),
(21, 'w', 'w', 'aa66509891ad28030349ba9581e8c92528faab6a34349061a44b6f8fcd8d6877a67b05508983f12f8610302d1783401a07ec41c7e9ebd656de34ec60d84d9511', 'axel@user.be', '2017-04-03 18:31:08', '2017-07-27 16:56:21', 1, 0, 0, 0, 'Kamevo-logo.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(22, 'kijk', 'kijk', 'd29e53a4b38f44be371c743ed031cec170c43f818780bb7d247635c06971160e807823b3db79cfdd2a5b6db5da4de58d35c8049f06e5caba980c014f1eb8a115', 'kijk@megoed.be', '2017-04-03 18:33:04', '2017-07-27 16:56:21', 1, 0, 0, 0, 'kamelogo.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(23, 'allah', 'allah', '1f40fc92da241694750979ee6cf582f2d5d7d28e18335de05abc54d0560e0f5302860c652bf08d560252aa5e74210546f369fbbbce8c12cfc7957b2652fe9a75', 'allah@akbar.be', '2017-04-03 18:34:14', '2017-07-27 16:56:21', 1, 0, 0, 0, 'novideo.jpg', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(24, 'mdr', 'xd', '6d16e989de5314f3eff5e0c4a24c2bf0fd7f8fe395e713ac839b325a10c4ed1191d1c972c49471efcaa197275b652464fc19007ea5f3542b798c6295b38a2b31', 'xd@mdr.ve', '2017-04-03 18:34:43', '2017-07-27 16:56:21', 1, 0, 0, 0, '123.jpg', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(25, 'fg', 'fg', 'b6b53b8e67c81aef55a7928d23aeab8b78e08cb140f00dacee5a8b8a10dda7c7edc7cf8bd51a59e0648e0525fcc67956129b0b3f7812480be9703339e515585e', 'fg@fg.tb', '2017-04-03 18:35:18', '2017-07-27 16:56:21', 1, 0, 0, 0, 'bgbg.jpg', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(26, 'wx', 'wx', '949307e18ac946b62b9a74cede09452ccc7b6d7e0c41803e40f727ed5e1537ae60012447e9363eb1fc4aa042a2db5b74a682a50fa246609ac31dfd5e72f60cdd', 'wx@wx.wx', '2017-04-03 18:38:08', '2017-07-27 16:56:21', 1, 0, 0, 0, 'corona.jpg', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(27, 'sdf', 'sdf', '50fde99373b04363727473d00ae938a4f4debfd0afb1d428337d81905f6863b3cc303bb331ffb3361085c3a6a2ef4589ff9cd2014c90ce90010cd3805fa5fbc6', 'sdf@sdf.qd', '2017-04-03 18:38:48', '2017-07-27 16:56:21', 1, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(28, 'wilqsd', 'dqsd', '2c1ee68372215b1ce064426b5cdbd4ef2581ace0dd3b21fa2be27f364827242e83f68b68be03f5b3e24be5d1b4315f98a0a96d19713fb3a19dc455fb6adc3431', 'q@qsdq.be', '2017-04-03 18:45:59', '2017-07-27 16:56:21', 1, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'default'),
(30, 'testzz', 'testzz', '1f40fc92da241694750979ee6cf582f2d5d7d28e18335de05abc54d0560e0f5302860c652bf08d560252aa5e74210546f369fbbbce8c12cfc7957b2652fe9a75', 'ex@exx.be', '2017-04-06 14:40:58', '2017-07-27 16:56:21', 1, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Biographie de l\'utilisateur', 'beauty'),
(34, 'TestAccount', 'ImTesting', '1f40fc92da241694750979ee6cf582f2d5d7d28e18335de05abc54d0560e0f5302860c652bf08d560252aa5e74210546f369fbbbce8c12cfc7957b2652fe9a75', 'axel@testaccount.be', '2017-06-26 16:26:44', '2017-07-27 16:56:21', 1, 1, 0, 58, 'defaultAvatar.png', 'defaultBanner.png', 'Cet utilisateur n\'a pas de biographie', 'technology'),
(32, 'Axel', 'JenAiPas', '1f40fc92da241694750979ee6cf582f2d5d7d28e18335de05abc54d0560e0f5302860c652bf08d560252aa5e74210546f369fbbbce8c12cfc7957b2652fe9a75', 'connect@skyfight.be', '2017-05-10 18:02:40', '2017-07-27 16:56:21', 0, 0, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Cet utilisateur n\'a pas de biographie', 'technology'),
(33, 'Chat', 'Tester', '1f40fc92da241694750979ee6cf582f2d5d7d28e18335de05abc54d0560e0f5302860c652bf08d560252aa5e74210546f369fbbbce8c12cfc7957b2652fe9a75', 'axel@userz.be', '2017-06-05 13:58:29', '2017-07-27 16:56:21', 1, 1, 1, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Cet utilisateur n\'a pas de biographie', 'technology'),
(35, 'momo', 'momo', 'ba6e89a1687ecec9e285334ec603395c179e22640a9a8c57db54fa0ebbb8d8eb56f7ebc16c8961569750ce4b9f5bf0ff90072cc9fcc35f5b19514e3516fc33dd', 'momo@hotm.fr', '2017-07-22 17:38:00', '2017-08-06 18:10:58', 1, 1, 4, 102, 'defaultAvatar.png', 'defaultBanner.png', 'Cet utilisateur n\'a pas de biographie', 'technology'),
(36, 'mama', 'mama', 'b9619288ffe7674fb31a218212a3ede772954403050105c8301cbc49ca8209f931bd0220544b07548cd0f19b85adee06f651c980d4cebff846c83d9bfab684b4', 'mama@hotm.fr', '2017-07-22 17:45:35', '2017-07-27 16:56:21', 1, 1, 0, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Cet utilisateur n\'a pas de biographie', 'technology'),
(37, 'thor', 'thro', 'df6b9fb15cfdbb7527be5a8a6e39f39e572c8ddb943fbc79a943438e9d3d85ebfc2ccf9e0eccd9346026c0b6876e0e01556fe56f135582c05fbdbb505d46755a', 'test@insa.fr', '2017-09-24 16:14:46', '2017-09-24 16:14:47', 1, 0, 1, 0, 'defaultAvatar.png', 'defaultBanner.png', 'Cet utilisateur n\'a pas de biographie', 'technology');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
