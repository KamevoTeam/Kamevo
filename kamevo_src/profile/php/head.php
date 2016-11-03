<?php 
session_start();
require('php/users.class.php');
require('php/func_posts.php');
require('php/getGeneralStats.php');
if(isset($_SESSION['ID'])) $user = new users($_SESSION['ID']); //initialize the user objet 
 ?>


	<title>Profil</title>
	<meta charset="utf-8">	<link rel="stylesheet" href="css/pub.css">
	<link rel="stylesheet" href="profile/css/profile.css">
	<link rel="stylesheet" href="profile/css/line-separator.css">
	<link rel="stylesheet" href="profile/css/style.max.css">
	<link rel="stylesheet" href="profile/css/menu.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="profile/php/js.php"></script>