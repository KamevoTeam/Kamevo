<?php
	$req = $bdd1->prepare('INSERT INTO `users` (`ID`,  `pseudo`, `password`, `Nom`, `email`, `grade`) VALUES (NULL, :pseudo, :password, :nom, :mail, 1)');
	$req->execute(array(
		'pseudo' => $pseudo,
		'password' => $pass,
		'nom' => $nom,
		'mail' => $mail));
?>