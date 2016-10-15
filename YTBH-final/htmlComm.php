	<div class='block'>
		
		<?php
		if (isset($_SESSION['pseudo'])) { if (!empty($_SESSION['pseudo'])) {
			$okForTextarea = true;?>
		<form action='posts.php?id=5' method='POST' style='text-align: center;'>
		<textarea name='commentaire' id='commentaire' placeholder='Commentez' rows='5' cols='70'></textarea>
		<input type='submit' />
		</form>
		<?php } else {
			$okForTextarea = false;
		}}else {
			$okForTextarea = false;
		}
		if ($okForTextarea == false) {
			echo '<h4 style="text-align: center;">Vous devez vous <a href=\'connexion.php?redirect=posts&id=5\'>connecter</a> pour pouvoir envoyer des commentaires !</h4>';
		}
		
				$order = 'default';
			if (isset($_GET['order'])) {
				if (!empty($_GET['order'])) {
					if ($_GET['order'] == 'time') {
						$order = 'time';
					}
				}
			}
		if ($order == 'default') {
				if (isset($_GET['id'])){ if (!empty($_GET['id'])){
					$req = $bdd1->prepare('SELECT ID, id_post, poster, comment, note, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date FROM `comments` WHERE `id_post` = :id_post ORDER BY note DESC, ID DESC');
					$req->execute(array(
					'id_post' => $_GET['id']
					));
				}}
		}elseif ($order == 'time') {
				if (isset($_GET['id'])){ if (!empty($_GET['id'])){
					$req = $bdd1->prepare('SELECT ID, id_post, poster, comment, note, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date FROM `comments` WHERE `id_post` = :id_post ORDER BY ID DESC');
					$req->execute(array(
					'id_post' => $_GET['id']
					));
				}}
		}
		?>
	
	<div id='CommentairesBoite'>
		<?php
			while ($donnees = $req->fetch()) {?>
				<div id='Commentaire'>
					<?php echo '<a style="font-weight: bold;" href=\'users.php?id=' . getPseudoByID($donnees['poster']) . '\'>' . getPseudoByID($donnees['poster']) . '</a> : ' . $donnees['comment'] . '<br /><span class="sign" style="text-align: right;">Envoyé par <a href=\'users.php?id=' . getPseudoByID($donnees['poster']) . '\'>' . getPseudoByID($donnees['poster']) . '</a> le ' . $donnees['date'] . '</span>'; ?>
				</div><?php } ?>
		</div></div>
</body>
</html>