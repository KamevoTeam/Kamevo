<?php
	if (isset($_SESSION['pseudo'])) {
		if (!empty($_SESSION['pseudo'])) {
			$req = $bdd->prepare('INSERT INTO `comments` (`ID`, `id_post`, `poster`, `comment`) VALUES (NULL, :ID, :user, :comment)');
			$req->execute(array(
				'ID' => $_GET['id'],
				'user' => $_SESSION['pseudo'],
				'comment' => $comment
			));
		}
	}
?>