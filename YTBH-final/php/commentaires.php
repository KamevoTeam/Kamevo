<?php

	function sendComm($poster, $commentaire, $id_post) {
		$req = $bdd->prepare('INSERT INTO `comments` (`ID`, `id_post`, `poster`, `comment`) VALUES (NULL, :ID, :user, :comment)');
		$req->execute(array(
			'ID' => $id_post,
			'user' => $poster,
			'comment' => htmlspecialchars($commentaire)
		));
	}
	
	function getComm($number, $order, $id_post) {
		include('php/co_pdo.php');
		include('php/users.class.php');
		
		if ($order == 'default') {
			$req = $bdd->prepare('SELECT ID, id_post, poster, comment, note, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date FROM `comments` WHERE `id_post` = :id_post ORDER BY note DESC, ID DESC');
			$req->execute(array(
			'id_post' => $_GET['id']
			));
		}elseif ($order == 'time') {
			$req = $bdd->prepare('SELECT ID, id_post, poster, comment, note, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date FROM `comments` WHERE `id_post` = :id_post ORDER BY ID DESC');
			$req->execute(array(
			'id_post' => $_GET['id']
			));
		} ?>
		
		<div id='CommentairesBoite'>
		<?php
			while ($donnees = $req->fetch()) {?>
				<div id='Commentaire'>
					<?php echo '<a style="font-weight: bold;" href=\'users.php?id=' . getPseudoByID($donnees['poster']) . '\'>' . getPseudoByID($donnees['poster']) . '</a> : ' . $donnees['comment'] . '<br /><span class="sign" style="text-align: right;">Envoyé par <a href=\'users.php?id=' . getPseudoByID($donnees['poster']) . '\'>' . getPseudoByID($donnees['poster']) . '</a> le ' . $donnees['date'] . '</span>'; ?>
				</div><?php } ?>
		</div></div>
		<?php
	}
?>