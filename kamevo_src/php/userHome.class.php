<?php

	class userHome extends userProfile {

		public $userIdFollow = array();
		public $conditionsString = '';

		function __construct($user){

			$this->user_id = $user;

		}

		public function initializeHome(){

			$this->user_psd = userHome::getPsdFromId($this->user_id);

			userHome::getFollowedUsers();


		}

		private function getFollowedUsers(){

			include('co_pdo.php');

			$getF = $bdd->prepare('SELECT abonnement FROM subs WHERE abonne = ?');
			$getF->execute(array($this->user_id));
			$indB = 0;
			while ($foll = $getF->fetch()) {
				
				$this->userIdFollow[$indB] =  $foll['abonnement'];

				$indB++;
			}

			
			
			


			userHome::generateRequestString();
			
			

		}

		private function generateRequestString(){

			$this->conditionsString = 'SELECT * FROM posts WHERE';
			
			for ($i=0; $i < sizeof($this->userIdFollow); $i++) { 
		
				if($i < (sizeof($this->userIdFollow))-1) $this->conditionsString = $this->conditionsString.' author='.$this->userIdFollow[$i].' OR';

				if($i == (sizeof($this->userIdFollow))-1) $this->conditionsString = $this->conditionsString.' author='.$this->userIdFollow[$i];


			}

			if(sizeof($this->userIdFollow) > 0) { //correctif: sur certaines version de MariaDb bug (?)
				$this->conditionsString = $this->conditionsString.' OR author='.$this->user_id.' AND groupId = 0';
			}else{
				$this->conditionsString = $this->conditionsString.' author='.$this->user_id.' AND groupId = 0';
			}

			

			//echo $this->conditionsString;

		}













	}













?>