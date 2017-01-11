<?php
	
	class userProfile{

	
	private $user_id;
	public $user_psd;
	public $user_pts;
	public $user_subscribers;
	public $user_subscriptions;
	public $user_nb_posts;
	public $current_post_id = 0;


	function __construct($id_user){

				$this->user_id = $id_user;
				$this->user_nb_posts = 0;
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





		$req = $bdd->prepare('SELECT * FROM users WHERE ID = ?');
		$req->execute(array($this->user_id));
		$rep = $req->fetch();

		$this->user_psd = $rep['pseudo'];
		$this->user_pts = $rep['points'];
		$this->user_subscribers = $rep['abonnes'];
		$this->user_subscriptions = $rep['abonnements'];
		$req->closeCursor();

		
		$this->updateSubs(); //on met à jour les abonnes/abonnements
		$this->updateNbPosts(); //



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
		$subst->execute(array($this->user_id));
		$nb_subst = $subst->rowCount();

		$upds = $bdd->prepare('UPDATE users SET abonnes = ?, abonnements = ? WHERE ID = ?');
		$upds->execute(array($nb_subs,$nb_subst,$this->user_id));

	}
	private function updateNbPosts(){
		
		include('co_pdo.php');
		$posts = $bdd->prepare('SELECT * FROM posts WHERE author = ?');
		$posts->execute(array($this->user_psd));
		$nb_posts = $posts->rowCount();
		$posts->closeCursor();


		/*$upds = $bdd->prepare('UPDATE users SET abonnes = ? WHERE ID = ?');
		$upds->execute(array($nb_subs,$nb_subst,$this->user_id));*/
		$this->user_nb_posts = $nb_posts;


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

	public function printUserPosts($mode){

		include('co_pdo.php');

		if($mode == 'uniq'){

			$req = "SELECT * FROM posts WHERE ID = ?";
			$getPosts = $bdd->prepare($req);
			$getPosts->execute(array($this->current_post_id));
			$nbposts = $getPosts->rowCount();

		}

		if($mode == 'profile'){
			$req = "SELECT * FROM posts WHERE author = ? ORDER BY ID DESC LIMIT 10";
			$getPosts = $bdd->prepare($req);
			$getPosts->execute(array($this->user_psd));
			$nbposts = $getPosts->rowCount();

		} 

		

		if($nbposts == 0 AND $mode == 'profile'){ ?>

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
	  				 <button onclick="userVote(1,<?=$resp['ID'] ?>)" class="like"><img src="img/poucevert.jpg" alt="like" height="20" weight="20" /> <?=$resp['likes']; ?></button>
	  				 <button onclick="userVote(2,<?=$resp['ID'] ?>)" class="like"><img src="img/poucerouge.jpg" alt="like" height="20" weight="20" /> <?=$resp['dislikes']; ?></button>
	  				 <div id="votemessage" class="submessage" style="display:none;"></div>

 	 				 <a href="details.php?idpost=<?=$resp['ID'] ?>" class="block-more">En savoir plus <i class="fa fa-caret-right" aria-hidden="true"></i></a>
  				</div>

			</div>

			<?php
				} //end of fetching datas
		}//end of if


	} //end of function

	public function updateLikes($idPost){

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