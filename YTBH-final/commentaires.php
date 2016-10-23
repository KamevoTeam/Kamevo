<?php
include('php/co_pdo.php');
$bdd1 = $bdd;

include('php/commentaires.php');

	if (isset($_POST['commentaire']) && isset($_SESSION['ID'])) {
		if (!empty($_POST['commentaire']) && !empty($_SESSION['ID'])) {
			sendComm($_SESSION['ID'], $_POST['commentaire'], $_GET['ID']);
		}
	}

	include('htmlComm.php');
?>