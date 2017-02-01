	<?php
		require('php/users.class.php');
		$user = 'nop';
		if(isset($_SESSION['ID'])) $user = new users($_SESSION['ID']); //initialize the user objet 
		$id = (int)($_GET['id']);
		if(isset($id) AND $id>0){
			if(userProfile::ifUserExist($id) == 'yes'){
					$userPage = new userProfile($id);
					$userPage->updateProfile();
					$pseudo = $userPage->user_psd;
			}else{
				$errorProfile = 'unknowUser';
				$pseudo = 'Erreur';
			}				
		}else{
			header('location:index.php');
		}

	?>


	<title><?=$pseudo; ?> - Kamevo</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/user/css/profile.css">
	<link rel="stylesheet" href="css/likes.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" href="css/user/css/line-separator.css">
	<link rel="stylesheet" href="css/user/css/style.max.css">
	<link rel="stylesheet" href="css/user/css/infos.css">
	<link rel="stylesheet" href="css/user/css/block.css">
	<link rel="stylesheet" href="css/user/css/menu.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="js/createHttpObject.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
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
    