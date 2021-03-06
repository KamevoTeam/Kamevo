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
  <link rel="icon" type="image/x-icon" href="img/kamico.ico" />
  <link rel="stylesheet" href="css/menu_co.css">
   <link rel="stylesheet" href="css/popup.css">
    <link rel="stylesheet" href="css/block.css">
     <link rel="stylesheet" href="css/likes.css">
     <link rel="stylesheet" href="css/notes.css">
  <link rel="stylesheet" href="groups/css/style.max.css">
  <link rel="stylesheet" href="frameworks/w3.css">
    <link rel="stylesheet" href="groups/css/group.css">
   <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
  <script type="text/javascript" src="frameworks/jquery.min.js"></script>
   <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
    <script type="text/javascript" src="js/createHttpObject.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/message.js"></script>
    <script type="text/javascript" src="js/notes.js"></script>
    <script type="text/javascript" src="js/jquery-ias.min.js"></script> <!-- infinite scroll lib for better stuff :)  --> 
    <script type="text/javascript">
      /*  Infinite scroll pour charger les commentaires   */
      var ias = jQuery.ias({
        container:  '#totalPost',
        item:       '.block',
        pagination: '#pageCount',
        next:       '.nextPage'
    });

    ias.extension(new IASSpinnerExtension());
    ias.extension(new IASNoneLeftExtension({text: "Fin des publications"}));

    ias.extension(new IASTriggerExtension({

      text: 'Afficher plus de publications', 
      offset: 2

    }));

    </script>
 <title>Kamevo - Groupe</title>
</head>
<body>
 <?php require("menu_co.php"); //load menu
 ?>
	 <div class="container">


	  <?php 
	   require("disp_group_content.php"); //show the info box of the groupe (avatar, banner, infos and posts)
	  ?>
	</div>
</body>
</html>