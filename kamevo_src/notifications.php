<?php
session_start();
  include('php/userProfile.class.php');
  include('php/userHome.class.php');
  include('php/users.class.php');

  $user = new users($_SESSION['ID']);
  $home = new userHome(htmlspecialchars($_SESSION['ID']));
  $home->initializeHome();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kamevo - Gérer mes notifications</title>
  	<link rel="icon" type="image/x-icon" href="img/kamico.ico" />
  	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
  	<link rel="stylesheet" href="css/notify.css">
  	<link rel="stylesheet" href="css/menu_co.css">
    <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/notes.css">
    <link rel="stylesheet" href="css/style.max.css">
    <link rel="stylesheet" href="notifications/css/notify.css">
  	<!--  LOADING FRAMWORKS   !-->
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
</head>
<body>
<?php 
	require('menu_co.php');
?>
<div class="content">
  <?php require('notifications/php/notify.php'); ?>
</div>
<script src='js/explore.js'></script>
</body>
</html>
<script>document.write('<script src="http://' + (location.host || '127.0.0.1').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>