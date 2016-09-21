<?php
include('includes/bdd.php');

if (isset($_POST['commentaire'])) {
	if (!empty($_POST['commentaire'])) {
		$comment = htmlspecialchars($_POST['commentaire']);
		include('envoiComm.php');
	}
}

	include('htmlComm.php');
?>