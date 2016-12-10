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
		require("menu.php");
	}
	  
	 ?>
	<div class="site-pusher">
	  <div class="content">
	 <?php

	 if(!isset($errorProfile)){

	 	
	   require("user_profile.php");
	    require("info_user.php");
	  require("posts_user.php");
	}else{

		include('userNotExist.php');
	}
	?>
	</div>
<?php require("DESIGN/php/javascript.php") ?>
<?php require("js/animation_user.php") ?>
</body>
</html>