<?php
session_start();
include 'co_pdo.php';

if(isset($_SESSION['ID'])){

	$userId = (int)$_SESSION['ID'];
	$idNotif = (int)$_POST['id'];


	if($_POST['mode'] == 'delete'){

		$req = $bdd->prepare('UPDATE messages SET ack = ? WHERE messFrom = ? AND messTo = ?');
		$req->execute(array('read', $idNotif, $userId));
		$req->closeCursor();

		$reqDelMp2 = $bdd->prepare('UPDATE subs SET nbNotifMp = 0 WHERE abonne = ? AND abonnement = ?');
		$reqDelMp2->execute(array($userId, $idNotif));
		$reqDelMp2->closeCursor();

		

		echo 'Done';

	}


}


?>