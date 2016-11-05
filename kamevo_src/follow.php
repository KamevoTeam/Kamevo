<?php
	include('header.php');
	include('php/co_pdo.php');
	
	if (isset($_GET['id'])) {
		if (!empty($_GET['id'])) {
			$req = $bdd->prepare('INSERT INTO follows (user, following) VALUES (:user, :following)');
			$req->execute(array(
				'user' => $_SESSION['ID'],
				'following' => $_GET['id']
			));
		}
	}
?><br /><br /><br /><?php
		if (isset($_SESSION['ID'])) {
			if (!empty($_SESSION['ID'])) {
				echo '<a href="follow.php?id=1">follow</a>';
			}
		}
	
	include('footer.php');
?>