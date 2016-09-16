<?php
// je vérifie que le formulaire est bien envoyé, sinon je passe dirrectement à l'html
if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['pass']) && isset($_POST['confirm']) && isset($_POST['mail']) && isset($_POST['pseudo'])) {
	//si les variables sont vides, c'est que l'utilisateur a traficoté le code html avec l'inspection d'élement
	if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['pass']) && !empty($_POST['confirm']) && !empty($_POST['mail']) && !empty($_POST['pseudo'])) {
		//Le mot de passe doit absolument être composé d'au moins 8 caractères, l'email est aussi vérifiée
		if (strlen($_POST['pass']) >= 8) {
			if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL)){
			//je supprime les chevrons pour éviter la faille XSS, je crypte les mots de passe
			$nom = htmlspecialchars($_POST['nom']);
			$prenom = htmlspecialchars($_POST['prenom']);
			$pseudo = htmlspecialchars($_POST['pseudo']);
			$pass = md5(sha1(htmlspecialchars($_POST['pass'])));
			$confirm = md5(sha1(htmlspecialchars($_POST['confirm'])));
			$mail = htmlspecialchars($_POST['mail']);
			//je me connecte à mysql
			try {
				$bdd = new PDO('mysql:host=localhost;dbname=test;charset=UTF8', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
				$bdd1 = $bdd; $bdd2 = $bdd; $bdd3 = $bdd;
			} catch (Exception $e) {
				die('Erreur : ' . $e->getMessage());
			}
			
			//je vérifie que les pseudos et mails n'existent pas déjà
			$req = $bdd->prepare('SELECT * FROM users WHERE `pseudo` = :pseudo OR `mail` = :mail');
			$req->execute(array(
				'pseudo' => $pseudo,
				'mail' => $mail));
				//si $ok est mis à false, c'est que l'un des identifiants existe déjà
				$ok = true;
				while ($reponse = $req->fetch()) {
					if ($pseudo == $reponse['pseudo']) {
						$ok = 'pseudo';
					}
					if ($mail == $reponse['mail']) {
						$ok = 'mail';
					}
				}
				//si les id n'existent pas, je vérifie juste les mots de passe et je lance le processus d'inscription
				if ($ok != 'pseudo' && $ok != 'mail') {
					if ($pass == $confirm) {
						$req = $bdd1->prepare('INSERT INTO users(Nom,Prénom,mail,password,pseudo,Avatar,grade) VALUES (:nom,:prenom,:mail,:password,:pseudo,:avatar,:grade)');
						$req->execute(array(
							'nom' => $nom,
							'prenom' => $prenom,
							'mail' => $mail,
							'password' => $pass,
							'pseudo' => $pseudo,
							'avatar' => 0,
							'grade' => 1)); 
							
							//je vérifie que l'avatar est envoyé auquel cas, je lance le processus de vérification du fichier ; je vérifie qu'il n'y a pas d'erreur lors de l'upload
							if (isset($_FILES['avatar']) && !empty($_FILES['avatar']) && $_FILES['avatar']['error'] == 0) {
									//je vérifie que le fichier ne pèse pas plus d'1Mo
									if ($_FILES['avatar']['size'] <= 1048576) {
										//je vérifie l'extension du fichier, seuls les fichiers jpg, jpeg, gif, png sont autorisés
										$infosfichier = pathinfo($_FILES['avatar']['name']);
										$extension_upload = $infosfichier['extension'];
										$extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
										if (in_array($extension_upload, $extensions_autorisees)) {
											//Je récupère l'ID de l'inscription puis je dis à la base de données que l'utilisateur possède un avatar
											$req = $bdd2->prepare('SELECT `ID` FROM `users` WHERE `pseudo` = :pseudo');
											$req->execute(array(
												'pseudo' => $pseudo));							
											$donnee = $req->fetch();
											$id = $donnee['ID'];
												$req = $bdd3->prepare('UPDATE `users` SET `Avatar` = :ext WHERE `ID` = :id');
												$req->execute(array(
													'ext' => $extension_upload,
													'id' => $id));
												
												//j'enregistre le fichier avec le nom $id.$extension_upload
												move_uploaded_file($_FILES['avatar']['tmp_name'], '../img/avatars/' . $id . '.' . $extension_upload);
												echo 'Si tu voies ce message, c\'est qu\'il y a un problème ;)';
												header('location: ../accueil/?message=inscFinish');
												
										} else {
											header('location: ../accueil/?message=avatarType');
										}
									} else {
										header('location: ../accueil/?message=avatarWeight');
									}
							} else {
								//je redirige l'utilisateur vers la page home en affichant un message
								//header('location: ../accueil/?message=inscFinish');
							}
							
							/*-----===== *** On envoie un mail *** =====-----
							\\\\\---==== ** confirmation compte ** ====---/////*/
							
							if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)) // On filtre les serveurs qui rencontrent des bogues.
							{
								$passage_ligne = "\r\n";
							}
							else
							{
								$passage_ligne = "\n";
							}
							//=====Déclaration des messages au format texte et au format HTML.
							$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";
							$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
							//==========
							 
							//=====Création de la boundary
							$boundary = "-----=".md5(rand());
							//==========
							 
							//=====Définition du sujet.
							$sujet = "Hey mon ami !";
							//=========
							 
							//=====Création du header de l'e-mail.
							$header = "From: \"YTBH\"<support@ytbh.com>".$passage_ligne;
							$header.= "Reply-to: \"YTBH\" <suport@ytbh.com>".$passage_ligne;
							$header.= "MIME-Version: 1.0".$passage_ligne;
							$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=" . $boundary . $passage_ligne;
							//==========
							 
							//=====Création du message.
							$message = $passage_ligne."--".$boundary.$passage_ligne;
							//=====Ajout du message au format texte.
							$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;
							$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
							$message.= $passage_ligne.$message_txt.$passage_ligne;
							//==========
							$message.= $passage_ligne."--".$boundary.$passage_ligne;
							//=====Ajout du message au format HTML
							$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;
							$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;
							$message.= $passage_ligne.$message_html.$passage_ligne;
							//==========
							$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
							$message.= $passage_ligne."--".$boundary."--".$passage_ligne;
							//==========
							 
							//=====Envoi de l'e-mail.
							//mail($mail,$sujet,$message,$header);
							//==========
					} else {
						// je déclare que l'erreur est la non-égalité des mots de passe
						$error = 'password';
					}
				} else {
					//je dis que le pseudo ou le mail existent déjà
					$error = $ok;
				}
			} else {
				//l'email n'est pas valide
				$error = 'mailValide';
			}
		} else {
			// le mot de passe n'est pas assez long
			$error = 'passlen';
		}
	}else{
		// toutes les données ne sont pas envoyées
		$error = '*';
	}
} else {
	//echo 'erreur';
}

?>
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
</html>