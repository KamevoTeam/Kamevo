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
		<?php include('social.php'); ?>
		  
		  	<div class="block">
			<div class="block-title">
			
			   <h2 class="block-name"><strong>Titre de la page</strong></h2>
			  
			</div>
			<p class="block-bio">Description<br /><br />

			
			<div class="line-separator1"></div>
			<div class="line-separator2"></div>
			<div class="line-separator3"></div>
			<div class="line-separator4"></div>
			<div class="line-separator5"></div>

			  
			<div class="line-separator6"></div>
			<br/>
			   
			</div>

			<?php require ("pub.php");
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
