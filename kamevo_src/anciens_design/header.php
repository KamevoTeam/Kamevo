<?php 
session_start();
require('php/users.class.php');
if(isset($_SESSION['ID'])) $user = new users(1);
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Youtub'Heure - Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css-circle/css/circle.css">
	<link rel="stylesheet" href="css/feed.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/comments.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
	<header class="header">
	 <nav class="menu" id="top">
	  <ul>
	    <a href="#" class="log" id="icon"></a>
	     <a href="."><li class="logo"> YTBH </li></a><div class="line-separator"></div>
	    <a href="."><li class="title"> KAMEVO</li></a>
	    <?php if(isset($_SESSION['ID'])){ ?><!-- <a href="#"><li class="pseudoMenu"> <?php //echo $_SESSION['ID']; ?></li></a> --><?php } ?>
	     <div class="mme">

	     <?php 
	     if(!isset($_SESSION['ID'])){
	     echo'
	        <a class="js" href="inscription.php"><li class="link"><i class="fa fa-user-plus" id="icon"></i> Inscription</li></a>
	         <a class="js" href="connexion.php"><li class="link"><i class="fa fa-sign-in" id="icon"></i> Connexion</li></a>'; }else{

	         	echo '<a class="js" href="deco.php"><li class="link"><i class="fa fa-home" id="icon"></i> Déconnexion</li></a>';
	         	} ?>
	         <a class="js poplight" href="#?w=50%" rel="popup_name"><li class="link"><i class="fa fa-compass" id="icon"></i> Explorer</li></a>
	        <a class="js" href="."><li class="link"><i class="fa fa-home" id="icon"></i> Accueil</li></a>
	     </div>
	     <li class="link-look"><form class="form" action="" method="post">
	       <input type="search" class="f-input" name="search" placeholder=" Rechercher un profil">
	       <i class="looking fa fa-search" id="icon"></i></form>
	    </li>
	  </ul>
	 </nav>
	</header>
<body>

