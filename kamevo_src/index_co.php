<!DOCTYPE html>
<html>
<head>
	<?php
		//changer en head2.php pour utiliser les frameworks en local (actuellement non-fonctionnels)
		require ("head.php");
		require('php/func_posts.php');
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
		  //if(!isset($_SESSION['ID'])){ getPosts('homeNoConnect'); }else{ getPosts('homeConnect'); } 
		  	if(!isset($_SESSION['ID'])){ getPosts('homeNoConnect'); }else{ getPosts('homeNoConnect'); } 

			require ("pub.php");
		  ?>	
		</div>
		<?php
			//require ("displaypost.php");
			require ("groups.php");
			$id = 14;
		?>
	</div>
<?php require ("javascript.php"); ?>
</body>
</html>
