<?php


	include 'php/co_pdo.php';
	include 'php/userProfile.class.php';
	include 'php/groups.class.php';
	
	session_start();

	if(isset($_SESSION['ID']) && isset($_GET['group'])){

		$group2join = (int)$_GET['group'];
		$userId = (int)$_SESSION['ID'];

		if(group::ifUserInGroup($userId, $group2join) == 'no'){

			date_default_timezone_set ( 'Europe/Paris' );
			$currentDate = date('d/m/Y - H:i 	s\s');

			$req = $bdd->prepare('INSERT INTO groups_members(user, groupId, date, perm) VALUES (?,?,?,?)');
			$req->execute(array($userId, $group2join, $currentDate,'Membre'));
			$req->closeCursor();

			header('location: group.php?groupId='.$group2join);


		}else{


			header('location: index.php?error=fatalErrorJoiningGroup');

		}



	}






















?>