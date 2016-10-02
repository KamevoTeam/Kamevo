	<form action='posts.php?id=5' method='POST'>
		<textarea name='commentaire' id='commentaire' placeholder='Commentez' rows='5' cols='70'></textarea>
		<input type='submit' />
	</form>
	
	<div id='CommentairesBoite'>
		<?php
		if (isset($_GET['id'])){ if (!empty($_GET['id'])){
			$req = $bdd1->prepare('SELECT * FROM `comments` WHERE `id_post` = :id_post');
			$req->execute(array(
			'id_post' => $_GET['id']
			));}}
		?>
	</div>
</body>
</html>