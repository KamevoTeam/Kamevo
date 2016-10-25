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

include('php/func_posts.php');
echo '<br /><br /><br />';
if(!isset($_GET['ID'])){

	$id_post = 1;
}else{

	$id_post = (int)$_GET['ID'];
}
	getPosts('onePost',$id_post);
	
include('commentaires.php');


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