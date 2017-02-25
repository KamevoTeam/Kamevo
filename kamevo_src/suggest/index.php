<?php session_start();
if (isset($_SESSION['ID'])) {
	if (empty($_SESSION['ID'])) {
		header('location: ../?message=Vous devez être connecté pour pouvoir suggérer des ajouts !');
	}
} else {
	header('location: ../?message=Vous devez être connecté pour pouvoir suggérer des ajouts !');
}
if (isset($_POST['suggest'])) {
require('php/send.php');
}
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kamevo - Suggestion</title>
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="css/suggest.css">
	<link rel="stylesheet" href="../css/popup.css">
	<link rel="stylesheet" href="../css/menu_co.css">
    <link rel="stylesheet" href="../frameworks/w3.css">
    <link rel="stylesheet" href="../frameworks/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="../frameworks/jquery.min.js"></script>
</head>
<body>
	<?php require("../menu_co.php") ?>
	<div class="container">
		<?php require("php/suggest.php"); ?>
	</div>
	<script type="text/javascript" src="../js/explore.js"></script>
</body>
</html>