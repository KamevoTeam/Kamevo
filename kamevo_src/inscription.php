<!DOCTYPE html>
<html>
<head>
	<?php
		//changer en head2.php pour utiliser les frameworks en local (actuellement non-fonctionnels)
		require ("head.php");
	?>
</head>
<body>
	<?php
		require ("menu.php");
	?>
	<div class="site-pusher">
      <div class="content">
		  <?php
			require ("pub.php");
		  ?>	
		</div><?php
	  require("php/co_pdo.php");
	  
$bdd1 = $bdd; $bdd2 = $bdd; $bdd3 = $bdd;

$error = array(
	'passLen' => false,
	'mailValid' => false,
	'pseudo' => false,
	'mail' => false,
	'pass' => false,
	'*' => false,
	'traitement' => true);

	//echo '0.3';
if (isset($_POST['nom']) && isset($_POST['pseudo']) && isset($_POST['pass']) && isset($_POST['confirm']) && isset($_POST['mail']) && isset($_POST['pseudo'])) {
	if (empty($_POST['nom']) && empty($_POST['pseudo']) && empty($_POST['pass']) && empty($_POST['confirm']) && empty($_POST['mail']) && empty($_POST['pseudo'])) {
		//echo '0.2';
		$error['*'] = true;
	} else {
			$nom = $_POST['nom'];
			$pseudo = $_POST['pseudo'];
			$pass = hash('sha512', $_POST['pass']);
			$confirm = hash('sha512', $_POST['confirm']);
			$mail = $_POST['mail'];

			if (strlen($_POST['pass']) >= 8) {
				//echo 'pass';
				$error['passLen'] = false;
			} else {
				$error['passLen'] = true;
			}
			
			if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
				$error['mailValid'] = false;
				//echo '1';
			} else {
				$error['mailValid'] = true;
			}
			
			include('mailPseudoVerifInsc.php');
				if ($ok['pseudo'] == true) {
					//echo '2';
					$error['pseudo'] = false;
				} else {
					$error['pseudo'] = true;
				}
				
				if ($ok['mail'] == true) {
					//echo '3';
					$error['mail'] = false;
				} else {
					$error['mail'] = true;
				}
				
			if ($pass == $confirm) {
				$error['pass'] = false;
			} else {
				$error['pass'] = true;
			}
	
		$error['traitement'] = false;
		$error['*'] = false;
	}
}

if ($error == array('passLen' => false, 'mailValid' => false, 'pseudo' => false, 'mail' => false, 'pass' => false, '*' => false, 'traitement' => false)) {
	$req = $bdd1->prepare('INSERT INTO `users` (`pseudo`, `password`, `Nom`, `email`, `grade`) VALUES (:pseudo, :password, :nom, :mail, :grade)');
	$req->execute(array(
		'pseudo' => $pseudo,
		'password' => $pass,
		'nom' => $nom,
		'mail' => $mail,
		'grade' => 1));
	header('location: ./?message=\'InscFinish\'');
} else { ?>
<!-- #####-> début de l'affichage de la page <-##### -->
<script>
	$( function() {
	$( document ).tooltip();
	});
</script>
<style>
	form {
		text-align: center;
	}
</style>
	<div class="block">
			<div class="block-title">
			   <h2 class="block-name"><strong>Inscription</strong></h2>
			</div>
	<?php if (isset($error)) { 
				if ($error == '*') { 

					echo '<p><h1>Vous devez remplir <strong>TOUT</strong> le formulaire</h1></p>'; 
				}

			} ?>
	<form method='POST' action='' enctype="multipart/form-data">
		
		<p>
			<div id='FormInsc'>
				<div id='labelFormInsc'>
				<label for='nom' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Nom* : </label>
		</div><div id='inputFormInsc'><input type='text' placeholder='Dupont' name='nom' id='nom' required autofocus />
		</p>
		</div>
		</div>

		<p>
		<div id='FormInsc'><div id='labelFormInsc'>
		<label for='pseudo' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Pseudo* : </label></div>
		<div id='inputFormInsc'>
		<input class='ask' type='text' name='pseudo' id='pseudo' title='/!\ Votre pseudo doit contenir au moins 6 caractères&nbsp;/!\' required />
		</p>
		</div>
		<?php if (isset($error['pseudo'])) { if ($error['pseudo'] == true) 
		{ 
			echo '<div id=\'FormErreur\'>Ce pseudo est déjà utilisé</div>'; 
			}
			 } ?><!-- <div id='FormErreur'></div> --></div>
		<P>
		<div id='FormInsc'><div id='labelFormInsc'><label for='pass' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Mot de passe* : </label></div><div id='inputFormInsc'><input type='password' name='pass' id='pass' class='ask' title='Par mesure de sécurité, votre mot de passe doit contenir au moins 8 caractères&nbsp;!' required /></p></div><?php if (isset($error['passLen'])) { if ($error['passLen'] == true) { echo '<div id=\'FormErreur\'>Le mot de passe doit contenir au moins 8 caractères'; } } ?></div>
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='confirm' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Confirmez* : </label></div><div id='inputFormInsc'><input type='password' name='confirm' id='confirm' required /></p></div><?php if (isset($error['pass'])) { if ($error['pass'] == true) { echo '<div id=\'FormErreur\'>Les mots de passe ne correspondent pas !</div>'; } } ?></div>
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='mail' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Adresse Mail* : </label></div><div id='inputFormInsc'><input type='email' placeholder='ex@mple.com' name='mail' id='mail' required /></p></div><?php if (isset($error['mail'])) { if ($error['mail'] == true) { echo '<div id=\'FormErreur\'>Votre mail est déjà utilisé !</div>'; }} if (isset($error['mailValid'])) { if ($error['mailValid'] == true) { echo '<div id=\'FormErreur\'>Votre mail n\'est pas valide</div>'; } } ?></div>
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='avatar' title='Si vous ne mettez pas d&quot;avatar, vous pourrez toujours en rajouter une dans la page "Mon Profil"'>Avatar : </label></div><div id='inputFormInscAvatar'><input type='file' name='avatar' name='avatar' id='avatar' /></p></div></div>
		<p><input type='submit' value='Envoyer' class='submitButton' /></p>
	</form>

	</div>


<?php } ?>

</body>
</html>