	<?php
		require('php/users.class.php');
		$user = 'nop';
		if(isset($_SESSION['ID'])) $user = new users($_SESSION['ID']); //initialize the user objet 
		$id = (int)($_GET['id']);
		if(isset($id) AND $id>0){
			if(userProfile::ifUserExist($id) == 'yes'){
					$userPage = new userProfile($id);
					$userPage->initProfile();
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
	<meta charset="utf-8">	<link rel="stylesheet" href="DESIGN/user/css/pub.css">
	<link rel="stylesheet" href="DESIGN/user/css/profile.css">
	<link rel="stylesheet" href="DESIGN/user/css/line-separator.css">
	<link rel="stylesheet" href="DESIGN/user/css/style.max.css">
	<link rel="stylesheet" href="DESIGN/user/css/infos.css">
	<link rel="stylesheet" href="DESIGN/user/css/block.css">
	<link rel="stylesheet" href="DESIGN/user/css/menu.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="DESIGN/js.php"></script>