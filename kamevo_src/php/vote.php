<?php
session_start();
include('co_pdo.php');
if(isset($_SESSION['ID'])){

	if($_POST['result'] == 1 || $_POST['result'] == 2){

		$userVoteYet = isUservote($_SESSION['ID'],$_POST['post']);

		if ($userVoteYet[0] > 0){

			$newvote = 0;

			if($_POST['result'] == 1 AND $userVoteYet[1] == 2) $newvote = 1; 
			if($_POST['result'] == 2 AND $userVoteYet[1] == 1) $newvote = 2;

			if($_POST['result'] == 1 AND $userVoteYet[1] == 1) $newvote = 0;
			if($_POST['result'] == 2 AND $userVoteYet[1] == 2) $newvote = 0;

			if($newvote == 0){

				$reqDelVote = $bdd->prepare('DELETE FROM vote WHERE votant = ? AND id_post = ?');
				$reqDelVote->execute(array($_SESSION['ID'],$_POST['post']));
				echo $_POST['post'].'votepVote annuléOld='. $userVoteYet[1];

			}else{

				$reqUpdateVote = $bdd->prepare('UPDATE vote SET vote = ? WHERE id_post = ? AND votant = ?');
				$reqUpdateVote->execute(array($newvote,$_POST['post'],$_SESSION['ID']));
				echo $_POST['post'].'votepVote mis à jourNw='.$newvote.'andOd='.$userVoteYet[1];

			}

		

		}else{


		$req = $bdd->prepare('INSERT INTO vote(vote,votant,id_post) VALUES (?,?,?)');
		$req->execute(array(htmlspecialchars($_POST['result']), $_SESSION['ID'], $_POST['post']));
		if($_POST['result'] == 1) echo $_POST['post'].'votepTu aimes cette publicationNew=1';
		if($_POST['result'] == 2) echo $_POST['post'].'votepTu n\'aimes pas cette publicationNew=2';

		}
		


		
	}else{

	echo 'Tu essayes de bidouiller le système? :)';

	}

}else{

	echo 'Tu dois être connecté pour voter!';
}


function isUservote($tester,$idpost){

	//$isSub = false;
	include('co_pdo.php');

	$responseVote = array(0,0);

	$req2 = $bdd->prepare('SELECT * FROM vote WHERE votant=:votantuser AND id_post=:currentpost');
	$req2->execute(array('votantuser' => $tester, 'currentpost' => $idpost));
	$nb = $req2->rowCount();
	$retourResult = $req2->fetch();



	$responseVote[0] = $nb;

	if($responseVote[0] > 0){

		$responseVote[1] = $retourResult['vote'];

	}


	return $responseVote;


}
?>