<?php
session_start();
include('co_pdo.php');
if(isset($_SESSION['pseudo'])){

if($_POST['result'] > 0 AND $_POST['result'] <= 5){




$req = $bdd->prepare('INSERT INTO vote(vote,votant,id_post) VALUES (?,?,?)');
$req->execute(array(htmlspecialchars($_POST['result']), $_SESSION['pseudo'], $_POST['post']));


echo 'Merci '.$_SESSION['pseudo'].', tu as voté '.htmlspecialchars($_POST['result']).'/5 sur cette publication! (Post n°'.$_POST['post'].')';	;
}else{

	echo 'Tu essayes de bidouiller le système? :)';

}

}else{


	echo 'Tu dois être connecté pour voter!';
}
?>