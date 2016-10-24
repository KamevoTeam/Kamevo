<?php

class users{

	
	public $pseudo;	


	function __construct($ID){

		$this->idUser = $ID;
		


	}

	static public function checkuser($pseudo,$mdp){

		require('co_pdo.php');

		unset($_SESSION['ID']); //cleaning the session

		$reqCheckExist = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
		$reqCheckExist->execute(array($pseudo));
		$value = $reqCheckExist->rowCount();

		if($value > 0){

			$response = $reqCheckExist->fetch();
			if($response['password'] == md5($mdp)){

				$_SESSION['ID'] = $response['ID'];
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



	public function getPseudo(){

		include('co_pdo.php');
		$req = $bdd->prepare('SELECT pseudo FROM users WHERE ID = ?');
		$req->execute(array($this->idUser));
		$rep = $req->fetch();
		return $rep['pseudo'];
	}

	public function getMail(){

		include('co_pdo.php');
		$req1 = $bdd->prepare('SELECT email FROM users WHERE ID = ?');
		$req1->execute(array($this->idUser));
		$resq = $req1->fetch();
		return $resq['email'];
	}

	public function getId(){

		return $this->idUser;
	}
}
?>
