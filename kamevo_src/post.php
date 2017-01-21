<?php session_start(); 
	if(!isset($_SESSION['ID'])){
		header('location:index.php');
	}else{
		require('php/users.class.php');
		$user = new users($_SESSION['ID']); //initialize the user objet 
	}

	?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kamevo - Publier</title>
	<link rel="stylesheet" href="post/css/style.max.css">
	<link rel="stylesheet" href="post/css/post.css">
	<link rel="stylesheet" href="post/css/popup.css">
	<link rel="stylesheet" href="post/css/menu.css">
    <link rel="stylesheet" href="frameworks/w3.css">
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>
</head>
<body>
	<?php require("menu_co.php"); ?>
	<div class="container">
		<?php require("postContent.php"); ?>
	</div>
<script src="js/explore.js"></script>
</body>
</html>