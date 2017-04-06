<?php

	include 'co_pdo.php';
	session_start();
	$idFrom = (int)$_SESSION['ID'];
	$idMe = (int)$_GET['idTo'];

	$mpreq = $bdd->prepare('SELECT * FROM messages WHERE (messTo = ? AND messFrom = ?) OR (messTo = ? AND messFrom = ?)');
	$mpreq->execute(array($idMe,$idFrom,$idFrom,$idMe));

	$nbMess = $mpreq->rowCount();

	while($dialog = $mpreq->fetch()){

		if($dialog['messFrom'] != $idMe){?>
			<div class="my-message">
   				 <p class="msg-r"><?=$dialog['content']; ?></p>
  			 </div>
  		<?php }else{?>

  			<div class="a-message">
    			<p class="msg-l"><?=$dialog['content']; ?></p>
  			 </div>
	<?php 

  		}
	}

	$mpreq->closeCursor();



?>