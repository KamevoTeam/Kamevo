<?php 
session_start();
require('php/users.class.php');
if(isset($_SESSION['ID'])) $user = new users($_SESSION['ID']);
 ?>

	<title>YTBH - Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/feed.css">
	<link rel="stylesheet" href="css/responsive.css">
	<link rel="stylesheet" href="css/block.css">
	<link rel="stylesheet" href="css/pub.css">
	<link rel="stylesheet" href="css/social.css">
	<link rel="stylesheet" href="css/line-separator.css">
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>