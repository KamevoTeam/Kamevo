<?php
	$req = $bdd->prepare('INSERT INTO `comments` (`ID_POST`, `ID_poster`, `comment`) VALUES (`:ID`, `:user`, `:comment`)');
	$req->execute(array(
		'ID' => $,
		'user' => $_SESSION['ID'],
		'comment' => $comment
	));
?>