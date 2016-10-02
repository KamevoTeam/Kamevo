<?php
	if (isset($_SESSION['ID'])) {
		if (!empty($_SESSION['ID'])) {
			$req = $bdd->prepare('INSERT INTO `comments` (`id_post`, `poster`, `comment`, `date`) VALUES (`:ID`, `:user`, `:comment`, NULL)');
			$req->execute(array(
				'ID' => $_GET['id'],
				'user' => $_SESSION['ID'],
				'comment' => $comment
			));
		}
	}
?>