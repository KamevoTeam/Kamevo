<?php
session_start();



include('co_pdo.php');

//echo 'Données reçues:'.print_r($_POST); 

	if(isset($_SESSION['ID'])){

		$userId = (int)$_POST['abonnement'];

		if(isUserSub($_SESSION['ID'],$userId) == 0){

			if($userId <> $_SESSION['ID']){

			$req = $bdd->prepare('INSERT INTO subs(abonne,abonnement) VALUES(?,?)');
			$req->execute(array($_SESSION['ID'],$userId));

			echo 'subok';
		}else{

			echo 'subown';

		}

		}else{

			//section pour se désabonner

			$reqDel = $bdd->prepare('DELETE FROM subs WHERE abonne = ? AND abonnement = ?');
			$reqDel->execute(array($_SESSION['ID'],$userId));

			echo 'unsubok';
			
		}

		

	}else{


		echo 'subnoco';
	}

function isUserSub($tryer,$sub){

	//$isSub = false;
	include('co_pdo.php');

	$req2 = $bdd->prepare('SELECT * FROM subs WHERE abonne=:abo AND abonnement=:abonemnt');
	$req2->execute(array('abo' => $tryer, 'abonemnt' => $sub));
	$nb = $req2->rowCount();
	return $nb;

}
?>

