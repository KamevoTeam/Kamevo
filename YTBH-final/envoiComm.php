<?php
	if (isset($_SESSION['ID'])) {
		if (!empty($_SESSION['ID'])) {
			$req = $bdd->prepare('INSERT INTO `comments` (`ID`, `id_post`, `poster`, `comment`) VALUES (NULL, :ID, :user, :comment)');
			$req->execute(array(
				'ID' => $_GET['id'],
				'user' => $_SESSION['ID'],
				'comment' => $comment
			));
		}
	}
?>