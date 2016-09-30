<!DOCTYPE html>
<!-- Cette page n'est pas du tout parfaite, il faut rajouter tout le html, css et javascript -->
<html>
<head>
	<meta charset='UTF-8' />
	<script src='jquery-3.1.0.min.js'></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
</head>

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

<body>
	<?php if (isset($error)) { if ($error == '*') { echo '<p><h1>Vous devez remplir <strong>TOUT</strong> le formulaire</h1></p>'; }} ?>
	<form method='POST' action='' enctype="multipart/form-data">
		<br /><br /><br />
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='nom' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Nom* : </label></div><div id='inputFormInsc'><input type='text' placeholder='Dupont' name='nom' id='nom' required autofocus /></p></div></div>
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='pseudo' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Pseudo* : </label></div><div id='inputFormInsc'><input class='ask' type='text' name='pseudo' id='pseudo' title='/!\ Votre pseudo doit contenir au moins 6 caractères&nbsp;/!\' required /></p></div><?php if (isset($error['pseudo'])) { if ($error['pseudo'] == true) { echo '<div id=\'FormErreur\'>Ce pseudo est déjà utilisé</div>'; } } ?><!-- <div id='FormErreur'></div> --></div>
		<P><div id='FormInsc'><div id='labelFormInsc'><label for='pass' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Mot de passe* : </label></div><div id='inputFormInsc'><input type='password' name='pass' id='pass' class='ask' title='Par mesure de sécurité, votre mot de passe doit contenir au moins 8 caractères&nbsp;!' required /></p></div><?php if (isset($error['passLen'])) { if ($error['passLen'] == true) { echo 'echo <div id=\'FormErreur\'>Le mot de passe doit contenir au moins 8 caractères'; } } ?></div>
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='confirm' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Confirmez* : </label></div><div id='inputFormInsc'><input type='password' name='confirm' id='confirm' required /></p></div><?php if (isset($error['pass'])) { if ($error['pass'] == true) { echo '<div id=\'FormErreur\'>Les mots de passe ne correspondent pas !</div>'; } } ?></div>
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='mail' title='Tous les champs marqués d&quot;une astérisque (*) doivent être remplis !'>Adresse Mail* : </label></div><div id='inputFormInsc'><input type='email' placeholder='ex@mple.com' name='mail' id='mail' required /></p></div><?php if (isset($error['mail'])) { if ($error['mail'] == true) { echo '<div id=\'FormErreur\'>Votre mail est déjà utilisé !</div>'; }} if (isset($error['mailValid'])) { if ($error['mailValid'] == true) { echo '<div id=\'FormErreur\'>Votre mail n\'est pas valide</div>'; } } ?></div>
		<p><div id='FormInsc'><div id='labelFormInsc'><label for='avatar' title='Si vous ne mettez pas d&quot;avatar, vous pourrez toujours en rajouter une dans la page "Mon Profil"'>Avatar : </label></div><div id='inputFormInscAvatar'><input type='file' name='avatar' name='avatar' id='avatar' /></p></div></div>
		<p><input type='submit' value='Envoyer' class='submitButton' /></p>
	</form>
</body>
</html>
