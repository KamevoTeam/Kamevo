<?php
/*****
This class is an extension of users class. Please note that the user objet is not directly link it.
******************/
class mpClass extends users{ 

	private $userDatas; //contain all all current users infos.
	private $currentIdConv; //current idConv



	public function __construct($userInf){

		//nothing here, sorry :D (Wista)	
		$this->userDatas = $userInf;


	}

	private function getNbNotifFromUser($currentUser){

		include 'co_pdo.php';

		$reqa = $bdd->prepare('SELECT * FROM messages WHERE ack = ? AND messFrom = ? AND messTo = ?');
		$reqa->execute(array('unread', $currentUser, $this->userDatas->idUser));
		$nbmp = $reqa->rowCount();
		$reqa->closeCursor();

		if($nbmp > 0){

			return '('.$nbmp.')';

		}else{
			return '';
		}
	}



	public function displayUserFollowed(){

		include 'co_pdo.php';

		$getF = $bdd->prepare('SELECT abonnement FROM subs WHERE abonne = ? ORDER BY nbNotifMp DESC');
		$getF->execute(array($this->userDatas->idUser));

		if($getF->rowCount() == 0){?>

			<div class="chatter" id="noFollow">	
 			 <h5 class="chatter-name"> Vous ne suivez personne!</h5>	
  			</div>


		<?php }else {
		
		while ($foll = $getF->fetch()) 

			{?>


			 <div class="chatter" id="<?=$foll['abonnement'] ?>">
			 	<input type="hidden" class="idDestMess" value="<?=$foll['abonnement']; ?>"/>
			 	<input type="hidden" class="psdDestMess" value="<?=self::getPseudoByID($foll['abonnement']); ?>"/>
 				<img src="userDataUpload/picProfile/<?=$this->getAvatarUser($foll['abonnement']); ?>" alt="chatter-img" class="chatter-img" style="visibility:hidden;">	
 			 <h5 class="chatter-name"> <?php echo $this->getPseudoByID($foll['abonnement']); ?> <span class="nbUserMp"><?=self::getNbNotifFromUser($foll['abonnement']); ?></span></h5>	
  			</div>
				
				 

				
		<?php }

	}



	}

	private function getAvatarUser($userIDAv){


		include('co_pdo.php');

		$req = $bdd->prepare('SELECT avatar FROM users WHERE ID = ?');
		$req->execute(array($userIDAv));
		$rep = $req->fetch();

		$avatar = $rep['avatar'];

		$req->closeCursor();

		if(file_exists('userDataUpload/picProfile/'.$avatar)){

			return $avatar;
		}else{

			return "defaultavatar.png";
		}

	}

	private function generate_id_conv(){

		include('co_pdo.php');

		$getIdConv = $bdd->prepare('SELECT * FROM ');

	}

}
?>