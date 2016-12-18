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


	public function updateProfile(){




		include('co_pdo.php');

		$this->updateSubs(); //on met à jour les abonnes/abonnements


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

	public function getId(){

		return $this->user_id;

	}

	private function updateSubs(){
		
		include('co_pdo.php');
		$subs = $bdd->prepare('SELECT * FROM subs WHERE abonnement = ?');
		$subs->execute(array($this->user_id));
		$nb_subs = $subs->rowCount();

		$subst = $bdd->prepare('SELECT * FROM subs WHERE abonne = ?');
		$subst->execute(array($this->user_id	));
		$nb_subst = $subst->rowCount();

		$upds = $bdd->prepare('UPDATE users SET abonnes = ?, abonnements = ? WHERE ID = ?');
		$upds->execute(array($nb_subs,$nb_subst,$this->user_id));

	}

	public function ifUserSub($tryer2){

		$userSub = FALSE;

		include('co_pdo.php');
		$req3 = $bdd->prepare('SELECT * FROM subs WHERE abonne=:abo AND abonnement=:abonemnt');
		$req3->execute(array('abo' => $tryer2, 'abonemnt' => $this->user_id));
		$nb2 = $req3->rowCount();
		
		if($nb2 > 0) $userSub = TRUE;

		return $userSub;

	}

	public function printUserPosts(){

		include('co_pdo.php');

		

		$getPosts = $bdd->prepare('SELECT * FROM posts WHERE author = ? ORDER BY ID DESC LIMIT 10');
		$getPosts->execute(array($this->user_psd));
		$nbposts = $getPosts->rowCount();

		if($nbposts == 0){ ?>

			<div class="block">
  				<div class="block-title">
	 			 	<h6 class="block-name"><strong>Aucun post</strong></h6>
	 			</div>
					<p class="block-bio"><?=$this->user_psd; ?> n'a pas encore posté de message! <br /></p>
			</div>

		<?php }else{ 

			while($resp = $getPosts->fetch()){

				$this->updateLikes($resp['ID']);
			?>


			<div class="block">

  				<div class="block-title">
					<img class="block-img" src="img/user.png" alt="William">
	 				 <h6 class="block-name"><strong><?=$resp['author']; ?> |</strong></h6>
					 <h6 class="block-points">Points : <strong> <?=$resp['points']; ?></strong></h6>
						<p class="block-date">Date : <strong><?=$resp['datecreation']; ?></strong></p>
	 			</div>

				<p class="block-bio"><?=$resp['message']; ?></p>

					<!--<div class="img" id="145">
						<img src="img/123.jpg" alt="" id="" class="image">
						<img src="img/error.png" alt="close" class="errbut">
					</div> -->

			<br/><div class="line-separator6"></div>

	 			<div class="abouts">
	  				 <button onclick="userVote(1,46)" class="like"><img src="img/poucevert.jpg" alt="like" height="20" weight="20" /> <?=$resp['likes']; ?></button>
	  				 <button onclick="userVote(2,46)" class="like"><img src="img/poucerouge.jpg" alt="like" height="20" weight="20" /> <?=$resp['dislikes']; ?></button>

 	 				 <a href="#" class="block-more">En savoir plus <i class="fa fa-caret-right" aria-hidden="true"></i></a>
  				</div>

			</div>

			<?php
				} //end of fetching datas
		}//end of if


	} //end of function

	private function updateLikes($idPost){

		require('co_pdo.php');

		$getL = $bdd->prepare('SELECT * FROM vote WHERE id_post = ? AND vote = 1'); //1 = like
		$getL->execute(array($idPost));
		$nblikes = $getL->rowCount();

		$getD = $bdd->prepare('SELECT * FROM vote WHERE id_post = ? AND vote = 2'); //2 = dislike
		$getD->execute(array($idPost));
		$nbdislikes = $getD->rowCount();

		$LDupds = $bdd->prepare('UPDATE posts SET likes = ?, dislikes = ? WHERE ID = ?');
		$LDupds->execute(array($nblikes,$nbdislikes,$idPost));

		$LDupds->closeCursor();

	}



} //end of class





?>