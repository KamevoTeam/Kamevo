<?php
	session_start();
	require('php/userProfile.class.php'); //load userProfileclass
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		require("head_userpage.php"); //load special header only for this page 
	?>
</head>
<body>
	<?php
	if(isset($_SESSION['ID'])){ //load the appropriate menu
		require("menu_co.php");

	}else{
		require("menu_pasco_general.php");
	}
	  
	 ?>
	<div class="site-pusher">
	  <div class="content">
	 <?php

	 if(!isset($errorProfile)){

	 	
	   require("disp_user_profile.php"); //load banner, pseudo and avatar of the current user
	   require("disp_info_user.php"); //load info box for the user 
	   ?>

	   <div class="fade"></div>
		<div class=blockallz>
	

	<?php

	$userPage->printPosts('profile'); //show all posts of the user (userProfile.class.php)

	 
	}else{

		include('disp_userNotExist.php'); //if we can't find user
	}
	?>
	</div>
<?php require("js/animation_user.php") ?>
<script src="js/explore.js"></script>
</body>
</html>