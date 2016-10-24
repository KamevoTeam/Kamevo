<?php
	$nom = htmlspecialchars($_POST['nom']);
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$pass = md5(htmlspecialchars($_POST['pass']));
	$confirm = md5(htmlspecialchars($_POST['confirm']));
	$mail = htmlspecialchars($_POST['mail']);
?>