<?php
include('php/co_pdo.php');
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
	echo '0.1';
	if (empty($_POST['nom']) && empty($_POST['pseudo']) && empty($_POST['pass']) && empty($_POST['confirm']) && empty($_POST['mail']) && empty($_POST['pseudo'])) {
		//echo '0.2';
		$error['*'] = true;
	} else {
			include('traitementInsc.php');

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
	include('envoiInsc.php');
} else { include('htmlInsc.php'); } ?>
