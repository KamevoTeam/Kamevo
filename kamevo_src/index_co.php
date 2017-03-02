<!DOCTYPE html>
<html>
<head>
	<?php
		//changer en head2.php pour utiliser les frameworks en local (actuellement non-fonctionnels)
		require ("head.php");
		include('php/userProfile.class.php');
		include('php/userHome.class.php');
		include('php/users.class.php');
	
		$user = new users($_SESSION['ID']);
		$home = new userHome(htmlspecialchars($_SESSION['ID']));
		$home->initializeHome();


	?>
</head>
<body>
	<?php
		require ("menu_co.php");
	?>
	<div class="site-pusher">
      <div class="content"> 
		<?php include('social.php'); ?>
		  <?php
		  
		  	$home->printPosts('home');
		  	//require("post-examples.php");
			require ("pub.php");
			require("php/chat.php");
		  ?>
		  </div>	
		</div>
		<?php
			//require ("displaypost.php");
			require ("groups.php");
			$id = 14;
		?>
	</div>
<?php require ("javascript.php"); ?>
<script src="js/explore.js"></script>
<script src="js/groups.js"></script>
</body>
</html>
<!--<script>document.write('<script src="http://' + (location.host || '127.0.0.1').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>!-->
