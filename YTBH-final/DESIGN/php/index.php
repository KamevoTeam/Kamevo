<!DOCTYPE html>
<html>
<head>
	<?php
		require ("head.php");
	?>
</head>
<body>
	<?php
		require ("menu.php");
	?>
	<div class="site-pusher">
      <div class="content">
		<div class="social">
		  <div class="social-header"><p class="social-text">SUIVEZ-NOUS , NOUS SOMMES PARTOUT : </p></div>
			<img src="../img/twitter.png" alt='twitter' class='social-log'>
			 <img src="../img/facebook.png" alt='facebook' class='social-log'>
			<img src="../img/youtube.png" alt='youtube' class='social-log'>
		  </div>
		  <?php
		  	require ("block.php");

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
