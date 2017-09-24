<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<?php

	require('php/func_posts.php');
		if(isset($_SESSION['ID'])){ 

			require ("menu_co.php");
			require ("head.php");
		
		}else{ ?>
	<meta charset="utf-8">
	<link rel="stylesheet" href="DESIGN/menu.css">
    <link rel="stylesheet" href="frameworks/w3.css">
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>
</head>
		<?php
		require('menu.php');
		}
?>
</head>
<body>
	<?php

require_once('php/func_posts.php');
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