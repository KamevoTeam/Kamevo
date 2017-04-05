<?php
	session_start();
	require('php/userProfile.class.php');
	require('php/publication.class.php');
	require('php/users.class.php');
	$user = 'nop';
	$id_post = (int)($_GET['idpost']);

	if(isset($_SESSION['ID']) AND (isset($id_post) AND $id_post>0)){
		 $user = new users($_SESSION['ID']); //initialize the user objet 

		 $current_post = new publication($id_post);		  

		}else{

			header('location:index.php?return=detailsErrorAcess');
			die();

		}


	?>

<!DOCTYPE html>
<html>
<head>
	<title>Publication de William</title>
	<meta charset="utf-8">
		<link rel="stylesheet" href="css/chat.css">
      <link rel="stylesheet" href="css/notes.css">
	<link rel="stylesheet" href="css/menu_co.css">
	<link rel="stylesheet" href="css/pub.css">
	<link rel="stylesheet" href="css/likes-details.css">
	<link rel="stylesheet" href="DESIGN/details/css/line-separator.css">
	<link rel="stylesheet" href="DESIGN/details/css/block.css">
	<link rel="stylesheet" href="DESIGN/details/css/progressBar.css">
	<link rel="stylesheet" href="DESIGN/details/css/style.max.css">
	<link rel="stylesheet" href="post/css/popup.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="js/createHttpObject.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script> 
    <script type="text/javascript" src="js/jquery-ias.min.js"></script> <!-- infinite scroll lib for better stuff :)  --> 
    <script type="text/javascript">
    	/*  Infinite scroll pour charger les commentaires   */
    	var ias = jQuery.ias({
  			container:  '#allCommentsDiv',
  			item:       '.oneComment',
  			pagination: '#pagesDisplay',
  			next:       '.nextPage'
		});

		ias.extension(new IASSpinnerExtension());
		ias.extension(new IASNoneLeftExtension({text: '<h6 class="end-comment">Fin des commentaires</h6>'}));

		ias.extension(new IASTriggerExtension({

			text: 'Afficher plus de commentaires', 
			offset: 2

		}));

    </script>
</head>
<body>

	<?php
	if(isset($_SESSION['ID'])){ 
		require("menu_co.php");

	}else{
		require("menu_pasco_general.php");
	}
	  
	require("addons.php");
	require("pub.php");
	 ?>
	<div class="container">
	<?php 
	/*Beginning of displaying post*/




		$current_post->printPosts('uniq',1);
		$current_post->loadComments();
	?>	
	</div>
</body>
</html>

<script type="text/javascript">
		
	 $(document).ready(function(){

	 					 $('.block-comment').filter('com1').hide();
                         setTimeout(function(){$(".block-comment").filter('com1').fadeIn('slow');}, 1000);
                  });


</script>