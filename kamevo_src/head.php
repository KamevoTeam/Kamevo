<?php 
session_start();
require('php/users.class.php');
require('php/func_posts.php');
require('php/getGeneralStats.php');
if(isset($_SESSION['ID'])) $user = new users($_SESSION['ID']); //initialize the user objet 
 ?>

	<title>YTBH - Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/feed.css">
	<link rel="stylesheet" href="css/block.css">
	<link rel="stylesheet" href="css/pub.css">
	<link rel="stylesheet" href="css/social.css">
	<link rel="stylesheet" href="css/line-separator.css">
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="css/menu.css">
	<link rel="stylesheet" href="profile/css/profile.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>