<!DOCTYPE html>
<html>
<head>
<?php
require("head.php");
?>
</head>
<body>
<?php

	$profile['id'] = '123';

require("menu.php");

session_start();

	if(isset($_SESSION['id'])){
		require("1203.php");
	}else{
		require("1204.php");
	}
	require("style.php");
?>
</body>
</html>