<?php
include('../includes/bdd.php');
$bdd1 = $bdd; $bdd2 = $bdd; $bdd3 = $bdd;

$error = array(
	'passLen' => false,
	'mailValid' => false,
	'pseudo' => false,
	'mail' => false,
	'pass' => false,
	'*' => false,
	'traitement' => true);

if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['confirm']) && isset($_POST['mail']) && isset($_POST['pseudo'])) {
	if (empty($_POST['nom']) && empty($_POST['prenom']) && empty($_POST['pass']) && empty($_POST['confirm']) && empty($_POST['mail']) && empty($_POST['pseudo'])) {
		$error['*'] = true;
	} else {
			include('traitement.php');

			if (strlen($_POST['pass']) >= 8) {
				$error['passLen'] = false;
			} else {
				$error['passLen'] = true;
			}
			
			if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)) {
				$error['mailValid'] = false;
			} else {
				$error['mailValid'] = true;
			}
			
			include('../includes/mailPseudoVerif.php');
				if ($ok['pseudo'] == true) {
					$error['pseudo'] = false;
				} else {
					$error['pseudo'] = true;
				}
				
				if ($ok['mail'] == true) {
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
	echo 'coucou';
} else {?>
<!DOCTYPE html>
<html>
<head>
	<meta charset='UTF-8' />
</head>

<style>
	strong {
		font-weight: bold;
		text-decoration: none;
	}
</style>

<body>
	<?php if (isset($error)) { if ($error == '*') { echo '<p><h1>Vous devez remplir <strong>TOUT</strong> le formulaire</h1></p>'; }} ?>
	<form method='POST' action='.' enctype="multipart/form-data">
		<p><label for='nom'>Nom* : <input type='text' placeholder='Dupont' name='nom' id='nom' required autofocus /></label></p>
		<p><label for='prenom'>Prénom* : <input type='text' placeholder='Jean' name='prenom' id='prenom' required /></label></p>
		<p><label for='pseudo'>Pseudo* : <input type='text' name='pseudo' id='pseudo' required /><?php if (isset($error)) { if ($error == 'pseudo') { echo 'Ce pseudo existe déjà !'; }}?></label></p>
		<P><label for='pass'>Mot de passe* : <input type='password' name='pass' id='pass' required /><?php if (isset($error)) { if ($error == 'pass') { echo 'Les mots de passe ne correspondent pas !'; } elseif ($error == 'passlen') { echo 'Votre mot de passe n\'est pas assez long'; }} ?></label></p>
		<p><label for='confirm'>Confirmez* : <input type='password' name='confirm' id='confirm' required /></label></p>
		<p><label for='mail'>Adresse Mail* : <input type='email' placeholder='ex@mple.com' name='mail' id='mail' required /><?php if (isset($error)) { if ($error == 'mail') { echo 'Ce mail est déjà utilisée'; } elseif ($error == 'mailValide'){ echo 'Votre adresse mail n\'est pas valide'; }} ?></label></p>
		<p><label for='avatar'>Avatar : <input type='file' name='avatar' name='avatar' id='avatar' /></label></p>
		<p><input type='submit' /></p>
	</form>
</body>
</html><?php } ?>