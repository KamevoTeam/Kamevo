<?php
	if (isset($_GET['id'])) {
		if (!empty($_GET['id'])) {
			$req = $bdd->prepare('INSERT INTO follows (user, following) VALUES (:user, :following)');
			$req->execute(array(
				'user' => $_SESSION['ID'],
				'following' => $_GET['id']
			));
		}
	}
?>