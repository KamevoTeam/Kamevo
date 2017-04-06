<?php

	session_start();
	include 'co_pdo.php';


	$destMp = htmlspecialchars($_POST['to']);
	$myId = (int)$_SESSION['ID'];
	$contentMess = htmlspecialchars($_POST['cont']);


	date_default_timezone_set ( 'Europe/Paris' );
	$dateCrea = date('d/m/Y à H:i 	s\s');

	$reqSendMp = $bdd->prepare('INSERT INTO messages(messFrom, messTo, content, ack, date) VALUES (?,?,?,?,?)');
	$reqSendMp->execute(array($myId, $destMp, $contentMess,0,$dateCrea));
	$reqSendMp->closeCursor();

	echo 'Done';


?>