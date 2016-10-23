	<div class='block'>
		
		<?php
		if (isset($_SESSION['ID'])) { if (!empty($_SESSION['ID'])) {
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
		if (isset($_GET['id'])) {if (!empty($_GET['id'])){
			getComm(30, $order, $_GET['id']);
		}} ?>
	

</body>
</html>