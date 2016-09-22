<?php
	$req = $bdd->prepare('INSERT INTO `comments` (`ID_POST`, `ID_poster`, `comment`) VALUES (`:ID`, `:user`, `:comment`)');
	$req->execute(array(
		'ID' => $_GET['id'],
		'user' => $_SESSION['ID'],
		'comment' => $comment
	));
?>