<?php
	session_start();
	require('php/userProfile.class.php');
?>
<!DOCTYPE html>
<html>
<head>
	<?php
		require("head_userpage.php");
	?>
</head>
<body>
	<?php
	if(isset($_SESSION['ID'])){ 
		require("menu_co.php");

	}else{
		require("menu_pasco_general.php");
	}
	  
	 ?>
	<div class="site-pusher">
	  <div class="content">
	 <?php

	 if(!isset($errorProfile)){

	 	
	   require("user_profile.php"); 
	   require("info_user.php"); ?>

	   <div class="fade"></div>
		<div class=blockallz>
	

	<?php

		 //require("posts_user.php");
	$userPage->printUserPosts('profile');

	  echo '</div>';
	}else{

		include('userNotExist.php');
	}
	?>
	</div>
<?php require("js/animation_user.php") ?>
<script src="js/explore.js"></script>
</body>
</html>