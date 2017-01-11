<?php
	session_start();
	require('php/userProfile.class.php');

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Publication de William</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="DESIGN/user/css/menu.css">
	<link rel="stylesheet" href="DESIGN/details/css/line-separator.css">
	<link rel="stylesheet" href="DESIGN/details/css/block.css">
	<link rel="stylesheet" href="DESIGN/details/css/style.max.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>

	<?php
	if(isset($_SESSION['ID'])){ 
		require("menu_co.php");

	}else{
		require("menu_pasco_general.php");
	}
	  
	require("addons.php");
	require("pub.php");
	 ?>
	<div class="container">
	<?php 
		require("DESIGN/details/block.php");
	?>	
	</div>
</body>
</html>