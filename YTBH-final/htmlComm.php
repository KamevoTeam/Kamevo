	<div class='block'>
		<form action='posts.php?id=5' method='POST' style='text-align: center;'>
		<textarea name='commentaire' id='commentaire' placeholder='Commentez' rows='5' cols='70'></textarea>
		<input type='submit' />
		</form>
	
	<div id='CommentairesBoite'>
		<?php
		if (isset($_GET['id'])){ if (!empty($_GET['id'])){
			$req = $bdd1->prepare('SELECT ID, id_post, poster, comment, DATE_FORMAT(date, \'%d/%m/%Y à %H heures %i minutes et %s secondes\') AS date FROM `comments` WHERE `id_post` = :id_post');
			$req->execute(array(
			'id_post' => $_GET['id']
			));}}
			
			while ($donnees = $req->fetch()) { ?>
				<div id='Commentaire'>
					<?php echo $donnees['poster'] . '<br />' . $donnees['comment'] . '<br />Envoyé par ' . $donnees['poster'] . ' le ' . $donnees['date']; ?>
				</div>
			<?php }
		?>
	</div></div>
</body>
</html>