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

			$this->updateLikes($this->current_post_id);
			$req = "SELECT * FROM posts WHERE ID = ?";
			$getPosts = $bdd->prepare($req);
			$getPosts->execute(array($this->current_post_id));
			$nbposts = $getPosts->rowCount();

		}

		if($mode == 'profile'){
			$req = "SELECT * FROM posts WHERE author = ? ORDER BY ID DESC LIMIT 10";
			$getPosts = $bdd->prepare($req);
			$getPosts->execute(array($this->user_id));
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
				if(($resp['likes'] + $resp['dislikes']) == 0) { $calculPourcent = 50; }else {
				$calculPourcent = 100*(($resp['likes'])/($resp['likes']+$resp['dislikes'])); }
			?>


			<div class="block">

  				<div class="block-title">
					<img class="block-img" src="img/user.png" alt="William">
	 				 <h6 class="block-name"><strong><?=$this->getPsdFromId($resp['author']); ?> |</strong></h6>
					 <h6 class="block-points">Points : <strong> <?=$resp['points']; ?></strong></h6>
					 <h6 class="block-points" style="padding-left: 58%;"><img src='img/view.png' alt='Views' height="26px" style="padding-top:7px;"> <strong> <?=$resp['uniq_views']; ?></strong></h6>
						<p class="block-date">Date : <strong><?=$resp['datecreation']; ?></strong></p>


	 			</div>

				<p class="block-bio"><?=$resp['message']; ?></p>

				<?php if(!empty($resp['image'])) { //affichage dans le cas d'une image ?>

					<div class="img" id="145">
						<img src="userDataUpload/picPost/<?=$resp['image']; ?>" alt="" id="" class="image">
						<img src="img/error.png" alt="close" class="errbut">
					</div> 

				<?php }
				 if(!empty($resp['video'])) { //si une vidéo est détectée!

				 	/*Démarrage de la conversion */

					$url  = $resp['video'];

					$patternYT = '/[\\?\\&]v=([^\\?\\&]+)/'; //parsing youtube url :)
					preg_match($patternYT,$url,$matches);

					if(isset($matches[1])){

						$id_vid_yt = $matches[1];
						$iframeYt = 'https://www.youtube.com/embed/'.$id_vid_yt.'" frameborder="0" allowfullscreen>'; 
						$thumbnailsYt = 'http://i.ytimg.com/vi/'.$id_vid_yt.'/hqdefault.jpg';

					}else{

						$iframeYt = 'img/unknowVid.png';
						$thumbnailsYt = 'img/unknowVid.png';

					}	
		
				/*Fin de la conversion*/

				 	if($mode == 'uniq'){ //mode "voir plus": affichage du lecteur ?>

					<div class="video">
					  <iframe class="iframe"  src="<?=$iframeYt; ?>" frameborder="0" allowfullscreen></iframe>
					</div>
					<?php } 

				
					if($mode == 'profile'){ //mode affichage multiple  = miniature only ?>
					<div class="img">
						<a href="#lskflkj"><img src="<?=$thumbnailsYt; ?>" alt="" id="" class="image" /></a>
						
					</div> 

				<?php } }?>
					
					

			<br/><div class="line-separator6"></div>

	 			<div class="abouts">
	  				<img onclick="userVote(1,<?=$resp['ID'] ?>)" src="img/poucevert.jpg" alt="like" height="20" weight="20" class="like"/> <?=$resp['likes']; ?>
	  				<img onclick="userVote(2,<?=$resp['ID'] ?>)" src="img/poucerouge.jpg" alt="like" height="20" weight="20" class="like"/> <?=$resp['dislikes']; ?> <span class="infoLike"><meter min="0" max="100" value="<?=$calculPourcent; ?>"></meter></span>
	  				 <div id="votemessage<?=$resp['ID'] ?>" class="votemessage<?=$resp['ID'] ?>" style="display:none;"></div>

 	 				 <?php if($mode=='profile'){?><a href="details.php?idpost=<?=$resp['ID'] ?>" class="block-more">En savoir plus <i class="fa fa-caret-right" aria-hidden="true"></i></a><?php } ?>
  				</div>

  				<?php
  				if($mode == 'profile') echo "</div>"; //si on affiche pas de commentaires, on ferme la div, sinon on la ferme après les commentaires

			
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

	public function getPsdFromId($userIdSearch){

			include('co_pdo.php');
			$req = $bdd->prepare('SELECT pseudo FROM users WHERE ID = ?');
			$req->execute(array($userIdSearch));
			$rep = $req->fetch();
			return $rep['pseudo'];


     }
     private function getThumbnailFromUrl($video){

			return $video;

	}

} //end of class

	





?>