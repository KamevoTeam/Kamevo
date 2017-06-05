<html>
<head>
	<meta charset="UTF-8">
	<title>Kamevo.com - Catégories</title>
	<!-- CSS -->
	<link rel="stylesheet" href="../css/menu_co.css">
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="css/category_finder.css">
	<link rel="stylesheet" href="css/category.css">
	<link rel="stylesheet" href="../css/popup.css">
	<!-- LOADING FRAMEWORKS AND ADDING OPTIONS -->
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <link rel="stylesheet" href="../frameworks/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
</head>
<body>
<?php require("menu.php"); ?>
<div class="container">
	<?php require("../php/co_pdo.php") ?>
	<?php require("category_finder.php"); ?>
	<?php require("category.php"); ?>
</div>
</body>
</html>
<script>document.write('<script src="http://' + (location.host || '127.0.0.1').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')</script>