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
		?>
	</div>
<div class="betafaded">
	
</div>
<div class="betapoped">
	<h3>Kamevo - Bêta</h3>
	<p>Kamevo est actuellement en version bêta, merci d'excuser tout bug ou problême, et de nous en faire part.<br/>Nous espérons que votre expérience sera la meilleure possible.</p><br/><br/>
	<a href="#" class="betaclose">J'ai compris</a>
</div>
<script src="js/betapop.js"></script>
<script src="js/like.js"></script>
<script src="js/explore.js"></script>
<script src="js/groups.js"></script>
</body>
</html>
