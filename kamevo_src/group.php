<?php session_start(); 
  if(!isset($_SESSION['ID'])){
      header('location:index.php?return=GroupErrorAccess');
  }else{
    require('php/users.class.php');
    include('php/userProfile.class.php');
    require('php/groups.class.php');
    

    $user = new users($_SESSION['ID']); //initialize the user objet 
    $groupId = (int)$_GET['groupId'];

    	if(isset($groupId) && $groupId > 0){
    		
    		$groupId = (int)$_GET['groupId'];
        
        

    		$currentGroup = new group($groupId); //initialize the group object

    	}else{

    		header('location:index.php?return=GroupErrorId');
    	}
    
  }

  ?>
<html>
<head>
 <meta charset="UTF-8">
  <link rel="stylesheet" href="css/menu_co.css">
   <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/block.css">
     <link rel="stylesheet" href="css/likes.css">
  <link rel="stylesheet" href="groups/css/style.max.css">
  <link rel="stylesheet" href="frameworks/w3.css">
    <link rel="stylesheet" href="groups/css/group.css">
   <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
  <script type="text/javascript" src="frameworks/jquery.min.js"></script>
 <title>Kamevo - Groupe</title>
</head>
<body>
 <?php require("menu_co.php"); ?>
	 <div class="container">


	  <?php 
	   require("groupContent.php")
	  ?>
	</div>
</body>
</html>