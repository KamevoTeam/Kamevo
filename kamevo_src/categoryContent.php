<?php
require('php/co_pdo.php');
	if (isset($_GET['cat'])) {
		if (!empty($_GET['cat'])) {
			
				if (isset($_SESSION['ID'])) {
					if (!empty($_SESSION['ID'])) {
						$req = $bdd->prepare('SELECT lang FROM users WHERE ID = ?');
						$req->execute(array($_SESSION['ID']));
						
						$response = $req->fetch();
						$lang = $response['lang'];
					} else {
						$lang = 'FR_fr';
					}
				} else {
					$lang = 'FR_fr';
				}
			
			$req = $bdd->prepare('SELECT * FROM users WHERE category = :cat AND lang = :lang ORDER BY points DESC');
			$req->execute(array(
				'cat' => $_GET['cat'],
				'lang' => $lang
			)); ?>
					<div class="publisher">
					<div class="block-title">
								<img class="block-img" src="img/user.png" alt="William">
							<h6 class="block-name"><strong>Vidéastes | <?=$_GET['cat'] ?></strong></h6>
			  </div>
						<?php
							while ($response = $req->fetch()) {
								echo '<p><img class="profile-img" src="userDataUpload/picProfile/' . $response['avatar'] . '" alt="profile-image">' . $response['pseudo'] . '</p>';
							}
						?>
			 </div>
		<?php }
	}
?>
	
