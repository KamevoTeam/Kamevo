<?php
session_start();
include('co_pdo.php');
if(isset($_SESSION['ID'])){

	if($_POST['result'] == 1 || $_POST['result'] == 2){

		$userVoteYet = isUservote($_SESSION['ID'],$_POST['comment']);

		if ($userVoteYet[0] > 0){

			$newvote = 0;

			if($_POST['result'] == 1 AND $userVoteYet[1] == 2) $newvote = 1; 
			if($_POST['result'] == 2 AND $userVoteYet[1] == 1) $newvote = 2;

			if($_POST['result'] == 1 AND $userVoteYet[1] == 1) $newvote = 0;
			if($_POST['result'] == 2 AND $userVoteYet[1] == 2) $newvote = 0;

			if($newvote == 0){

				$reqDelVote = $bdd->prepare('DELETE FROM votecomments WHERE votant = ? AND id_com = ?');
				$reqDelVote->execute(array($_SESSION['ID'],$_POST['comment']));
				echo $_POST['comment'].'votecVote annuléOld='. $userVoteYet[1];

			}else{

				$reqUpdateVote = $bdd->prepare('UPDATE votecomments SET vote = ? WHERE id_com = ? AND votant = ?');
				$reqUpdateVote->execute(array($newvote,$_POST['comment'],$_SESSION['ID']));
				echo $_POST['comment'].'votecVote mis à jourNw='.$newvote.'andOd='.$userVoteYet[1];

			}

		

		}else{


		$req = $bdd->prepare('INSERT INTO votecomments(vote,votant,id_com) VALUES (?,?,?)');
		$req->execute(array(htmlspecialchars($_POST['result']), $_SESSION['ID'], $_POST['comment']));
		if($_POST['result'] == 1) echo $_POST['comment'].'votecTu aimes ce commentaireNew=1';
		if($_POST['result'] == 2) echo $_POST['comment'].'votecTu n\'aimes pas ce commentaireNew=2';

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

	$req2 = $bdd->prepare('SELECT * FROM votecomments WHERE votant=:votantuser AND id_com=:currentpost');
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