<?php

	include 'co_pdo.php';

	session_start();
	$groupId = (int)$_GET['group'];

	$req = $bdd->prepare('DELETE FROM groups_members WHERE groupId = ? AND user = ?');
	$req->execute(array($groupId,$_SESSION['ID']));
	$req->closeCursor();

	header('location: ../index.php?error=removeFromGroup');
	die();

?>