<?php
/*
* This script calculate points with up-to-date datas for each users, and update field 'points' on table 'users'. 
*
* It's run every day at 00:00AM GMT+1, by a cron task
*/
	
	require('co_pdo.php');



	$first = $bdd->prepare('SELECT * FROM users');
	$first->execute();

	while($res = $first->fetch()){

		/***************************/
		$sumLikes = 0;
		$sumDislikes = 0;
		$total_views = 1; 
		$numbersOfPublis = 0;
		$daysBeforeInscription = 0;
		$socialNetworksConnected = 0;
		$hoursBeforeLastActivity = 0;
		/****************************/

		/*TOTAL LIKES/DISLIKES and VIEWS*/
		$second = $bdd->prepare('SELECT SUM(likes) AS slikes, SUM(dislikes) AS sdislikes, SUM(uniq_views) AS sviews FROM posts WHERE author = ?');
		$second->execute(array($res['ID']));

		$getInfos = $second->fetch();

		$sumLikes = $getInfos['slikes'];
		if(!isset($sumLikes)) $sumLikes = 0;

		$sumDislikes = $getInfos['sdislikes'];
		if(!isset($sumDislikes)) $sumDislikes = 0;

		$total_views = $getInfos['sviews'] +1;
		if(!isset($total_views)) $total_views = 1;

		$second->closeCursor();
		
		/*NUMBER OF POSTS*/
		$third = $bdd->prepare('SELECT ID FROM posts WHERE author = ?');
		$third->execute(array($res['ID']));
		$numbersOfPublis = $third->rowCount();
		$third->closeCursor();


		/*DAYS UNTIL INSCRIPTION*/
		date_default_timezone_set('Europe/Paris');
		$daysBeforeInscription = intval((time() - strtotime($res['insDate']))/86400)+1; 
		$hoursBeforeInscription = intval((time() - strtotime($res['lastCo']))/604800)+1; 


		/*SOCIAL NETWORKS CONNECTED*/


		/*AMOUNT OF COMMENTS*/

		//$nbComments = $bdd->prepare();
			
		/*FINAL COUNT :) */

		$userPoints = round(100*((($sumLikes+$sumDislikes)/$total_views) + ($numbersOfPublis/$daysBeforeInscription) + (($sumLikes-$sumDislikes)/$total_views) + ($socialNetworksConnected*0.5))/($hoursBeforeInscription+1),0);

		/*UPDATE DATABASE*/
		
		$updatePts = $bdd->prepare('UPDATE users SET points = ? WHERE ID = ?');
		$updatePts->execute(array($userPoints,$res['ID']));
	}

	echo 'Sucess! ';
	
?>