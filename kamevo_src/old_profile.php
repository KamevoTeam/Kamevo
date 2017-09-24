<!DOCTYPE html>
<html>
<head>
<?php
require("profile/php/head.php");
?>
</head>
<body>
<?php

	

require("menu.php"); //le menu est le même partout, on charge le menu de base

	$profile['id'] = '123';

	if(isset($_SESSION['id'])){
		require("profile/php/1203.php");
	}else{
		require("profile/php/1204.php");
	}
	require("profile/php/style.php");
?>
</body>
</html>