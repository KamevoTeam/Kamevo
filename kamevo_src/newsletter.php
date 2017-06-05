<?php session_start(); 

require('php/users.class.php');

  if(!isset($_SESSION['ID'])){
      header('location:index.php?return=settingsErrorAccess');
        
      if (getGrade($_SESSION['ID']) != 'fondateur') {
          header('location:index.php?return=restrictedAccess');
      }
  }else{
    $user = new users($_SESSION['ID']); //initialize the user objet 
  }

  ?>
<html>
<head>
 <meta charset="UTF-8">
  <link rel="stylesheet" href="css/menu_co.css">
  <link rel="stylesheet" href="css/notes.css">
   <link rel="stylesheet" href="css/popup.css">
  <link rel="stylesheet" href="frameworks/w3.css">
   <link rel="stylesheet" href="newsletter/css/style.max.css">
  <link rel="stylesheet" href="newsletter/css/newsletter.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
   <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
  <script type="text/javascript" src="frameworks/jquery.min.js"></script>
 <title>Kamevo - Newsletter</title>
</head>
<body>
 <?php require("menu_co.php"); ?>
  <div class="container">
   <?php require("newsletterContent.php"); ?>
  </div>
  <script src="js/explore.js"></script>
</body>
</html>