<?php
	$nom = htmlspecialchars($_POST['nom']);
	$prenom = htmlspecialchars($_POST['prenom']);
	$pseudo = htmlspecialchars($_POST['pseudo']);
	$pass = md5(sha1(htmlspecialchars($_POST['pass'])));
	$confirm = md5(sha1(htmlspecialchars($_POST['confirm'])));
	$mail = htmlspecialchars($_POST['mail']);
?>