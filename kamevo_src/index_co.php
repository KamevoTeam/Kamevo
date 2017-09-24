<!DOCTYPE html>
<html>
<head>
	<?php
		
		require ("head.php");
		include('php/userProfile.class.php');
		include('php/userHome.class.php');
		include('php/users.class.php');
	
		$user = new users($_SESSION['ID']);  //initialize current user info (php/user.class.php)
		$home = new userHome(htmlspecialchars($_SESSION['ID'])); //generate user index.php page (userHome.class.php)
		$home->initializeHome(); //initialize user homepage


	?>
</head>
<body>
	<?php
		require ("menu_co.php");
	?>
	<div class="site-pusher">
      <div class="content"> 
		<?php include('disp_social.php'); //show all social networks of Kamevo 
		?>
		  <?php
		  
		  	$home->printPosts('home'); //display posts on home (userProfile.class.php)

			require ("disp_pub.php"); //load ad banner
			require("php/chat.php");
		  ?>
		  </div>	
		</div>
		<?php
			require ("disp_group_creation.php"); //load the module to create a group 
		?>
	</div>

<script src="js/like.js"></script>
<script src="js/explore.js"></script>
<script src="js/groups.js"></script>
</body>
</html>
