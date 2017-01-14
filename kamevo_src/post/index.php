<?php session_start(); ?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kamevo - Publier</title>
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="css/post.css">
	<link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="../frameworks/w3.css">
    <link rel="stylesheet" href="../frameworks/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>
</head>
<body>
	<?php require("php/menu.php"); ?>
	<div class="container">
		<?php require("php/post.php"); ?>
	</div>
</body>
</html>