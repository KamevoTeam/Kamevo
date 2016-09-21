<?php
//je vérifie que les pseudos et mails n'existent pas déjà
$req = $bdd->prepare('SELECT * FROM users WHERE `pseudo` = :pseudo OR `email` = :mail');
	$req->execute(array(
		'pseudo' => $pseudo,
		'mail' => $mail));
	
//si $ok est mis à false, c'est que l'un des identifiants existe déjà
$ok = array('pseudo' => true, 'mail' => true);
	while ($reponse = $req->fetch()) {
		if ($pseudo == $reponse['pseudo']) {
			$ok['pseudo'] = false;
		}
		if ($mail == $reponse['mail']) {
			$ok['mail'] = false;
		}
	}
?>