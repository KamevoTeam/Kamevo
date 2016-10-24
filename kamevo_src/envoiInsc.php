<?php

	echo '<br /><br /><br />';
	$req = $bdd1->prepare('INSERT INTO `users` (`pseudo`, `password`, `Nom`, `email`, `grade`) VALUES (:pseudo, :password, :nom, :mail, :grade)');
	$req->execute(array(
		'pseudo' => $pseudo,
		'password' => $pass,
		'nom' => $nom,
		'mail' => $mail,
		'grade' => 1));
	header('location: ./?message=\'InscFinish\'');
?>