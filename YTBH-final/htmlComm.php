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
		
		if (isset($_GET['id'])){ if (!empty($_GET['id'])){
			$req = $bdd1->prepare('SELECT ID, id_post, poster, comment, DATE_FORMAT(date, \'%d/%m/%Y à %H:%i\') AS date FROM `comments` WHERE `id_post` = :id_post');
			$req->execute(array(
			'id_post' => $_GET['id']
			));}}
		?>
	
	<div id='CommentairesBoite'>
		<?php
			
			while ($donnees = $req->fetch()) { ?>
				<div id='Commentaire'>
					<?php echo '<a style="font-weight: bold;" href=\'users.php?id=' . $donnees['poster'] . '\'>' . $donnees['poster'] . '</a> : ' . $donnees['comment'] . '<br /><span class="sign" style="text-align: right;">Envoyé par <a href=\'users.php?id=' . $donnees['poster'] . '\'>' . $donnees['poster'] . '</a> le ' . $donnees['date'] . '</span>'; ?>
				</div>
			<?php }
		?>
	</div></div>
</body>
</html>