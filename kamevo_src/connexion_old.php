<?php
	  require('display_header.php'); //include header with session panel
	  include("pubs/index.php"); //include all for adv
	  include("display_stats.php"); //include stats/info panel
	  include("display_groups.php"); //include groups panel
		
$resp = users::waitForInput($_POST);
?>
<div class="container">

			<div class="block">
			<div class="block-title">
			
			   <h2 class="block-name"><strong>Connexion</strong></h2>
			  
			</div>
			<p class="block-bio">Utilisez cette page pour vous connecter à votre espace membre et ainsi profiter de nombreux avantages.<br /><br />

			<i>Pas encore membre du site? C'est <a href="inscription.php">par-ici</a>!</i></p>
			<div class="line-separator6"></div>
			<div class='formco'><form method='POST' action="">
				<label for="pseudo">Pseudo:</label> <input type="text" name="pseudo"><br /><br />
				<label for="password">Mot de passe:</label><input type="password" name="password"><br /><br />
				<input type="submit" name="go" value="Connexion">
			</form>
			<div class="error"><?=$resp; ?></div>
			</div>
			  
			<div class="line-separator6"></div>
			<br/>
			   
			</div>
			</div>

			</div>

<?php
	if (isset($_SESSION['ID'])) {
		if (!empty($_SESSION['ID'])) {
			if (isset($_GET['redirect'])) {
				if (!empty($_GET['redirect'])) {
					if (isset($_GET['id'])) {
						if (!empty($_GET['id'])) {
							header('location: ' . $_GET['redirect'] . '?id=' . $_GET['id']);
						}
					}
				}
			}
		}
	}
	
include('display_footer.php');	