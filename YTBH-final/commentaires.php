<?php
include('php/co_pdo.php');
$bdd1 = $bdd;

if (isset($_POST['commentaire'])) {
	if (!empty($_POST['commentaire'])) {
		$comment = htmlspecialchars($_POST['commentaire']);
		include('envoiComm.php');
	}
}

	include('htmlComm.php');
?>