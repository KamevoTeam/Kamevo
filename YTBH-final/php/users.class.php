<?php

class users{

	
	


	function __construct($pseudo, $mdp){

		$this->pseudo = $pseudo;
		$this->mdp = $mdp;


	}

	static public function checkuser($pseudo,$mdp){

		require('co_pdo.php');

		unset($_SESSION['pseudo']); //cleaning the session

		$reqCheckExist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
		$reqCheckExist->execute(array($pseudo));
		$value = $reqCheckExist->rowCount();

		if($value > 0){

			$response = $reqCheckExist->fetch();
			if($response['password'] == md5($mdp)){

				$_SESSION['pseudo'] = $pseudo;
				return 'Félicitations! Vous êtes maintenant connecté! <br /><a href="index.php">Retourner à l\'index</a>';


			}else{

				return 'Mauvais mot de passe.';
			}
		}else{

			return 'Utilisateur inconnu';
		}

	}

	static public function waitForInput($data){
		
		if(isset($data['go'])){

			if(isset($data['pseudo'],$data['password']) AND !empty($data['pseudo']) AND !empty($data['password'])){

				$rep = users::checkuser(htmlspecialchars($data['pseudo']), htmlspecialchars($data['password']));
				
				return $rep;

			}else{

				return 'Tous les champs ne sont pas remplis!';
			}
		}
	}

}




?>
