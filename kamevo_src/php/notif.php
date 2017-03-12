<?php
session_start();
include 'co_pdo.php';

if(isset($_SESSION['ID'])){

	$userId = (int)$_SESSION['ID'];
	$idNotif = (int)$_POST['id'];


	if($_POST['mode'] == 'delete'){

		$req = $bdd->prepare('SELECT ID FROM notifs WHERE destinataire = ? AND ID = ?');
		$req->execute(array($userId, $idNotif));
		$nbr = $req->rowCount();
		$req->closeCursor();

		if($nbr > 0){

			$req = $bdd->prepare('UPDATE notifs SET ack = ? WHERE ID = ?');
			$req->execute(array('read', $idNotif));
			$req->closeCursor();
			echo 'ok';


		}else{


			echo 'Aucune notification';

		}



	}


}


?>