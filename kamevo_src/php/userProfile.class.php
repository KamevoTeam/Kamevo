<?php
	
	class userProfile{

	
	private $user_id;
	public $user_psd;
	public $user_pts;
	public $user_subscribers;
	public $user_subscriptions;


	function __construct($id_user){

				$this->user_id = $id_user;
	}

	static public function ifUserExist($id_user){

			require('co_pdo.php');
			

			$userExist = 'no';

			$reqUExist = $bdd->prepare('SELECT * FROM users WHERE ID = ?');
			$reqUExist->execute(array($id_user));
			$value = $reqUExist->rowCount();
			if($value>0) $userExist='yes'; 

			return $userExist;

			
	}


	public function initProfile(){

		include('co_pdo.php');
		$req = $bdd->prepare('SELECT * FROM users WHERE ID = ?');
		$req->execute(array($this->user_id));
		$rep = $req->fetch();

		
		$this->user_psd = $rep['pseudo'];
		$this->user_pts = $rep['points'];
		$this->user_subscribers = $rep['abonnes'];
		$this->user_subscriptions = $rep['abonnements'];


	}

	public function getUrlBanner(){

		//a completer

		return 'DESIGN/user/img/ban_default.png';


	}




	}





?>