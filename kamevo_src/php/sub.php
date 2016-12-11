<?php
session_start();


include('co_pdo.php');

//echo 'Données reçues:'.print_r($_POST); 

	if(isset($_SESSION['ID'])){

		$req = $bdd->prepare('INSERT INTO subs(abonne,abonnement) VALUES(?,?)');
		$req->execute(array($_SESSION['ID'],',87'));

		echo 'Abonnement effectué!';

	}else{


		echo 'Tu dois être connecté pour voter';
	}


?>