<?php
	
	class userProfile{

	
	public $user_id;
	public $user_psd;
	public $user_pts;
	public $user_subscribers;
	public $user_subscriptions;
	public $user_nb_posts;
	public $current_post_id = 0;
	private $avatarID;
	private $bannerID;
	public $bio;
	private $userConnected;



	function __construct($id_user,$userConnected){

				$this->user_id = $id_user;
				$this->userConnected = $userConnected;
				
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
	public function ifUserSubs(){

	//$isSub = false;
	include('co_pdo.php');
	$tryer = $this->userConnected->idUser;
	$sub = $this->user_id;

	$req2 = $bdd->prepare('SELECT * FROM subs WHERE abonne=:abo AND abonnement=:abonemnt');
	$req2->execute(array('abo' => $tryer, 'abonemnt' => $sub));
	$nb = $req2->rowCount();
	return $nb;

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
		$this->avatarID = $rep['avatar'];
		$this->bannerID = $rep['banner'];
		$this->bio = $rep['bio'];

		$req->closeCursor();

		
		$this->updateSubs(); //on met à jour les abonnes/abonnements
		$this->updateNbPosts(); //



	}

	public function getUrlBanner(){

		//a completer

		return 'userDataUpload/picCover/'.$this->bannerID;


	}
	public function getUrlAvatar(){

		//a completer

		return 'userDataUpload/picProfile/'.$this->avatarID;


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
		$posts->execute(array($this->user_id));
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

	private function getAvatarUser($userIDAv){


		include('co_pdo.php');

		$req = $bdd->prepare('SELECT avatar FROM users WHERE ID = ?');
		$req->execute(array($userIDAv));
		$rep = $req->fetch();

		return $rep['avatar'];

	}

	public function printPosts($mode){

		include('co_pdo.php');

		echo '<div id="totalPost" class="totalPost">';

		if($mode == 'uniq'){

			$this->updateLikes($this->current_post_id);
			$req = "SELECT * FROM posts WHERE ID = ?";
			$getPosts = $bdd->prepare($req);
			$getPosts->execute(array($this->current_post_id));
			$nbposts = $getPosts->rowCount();

		}

		if($mode == 'home'){

			/*begenning of Home*/

			/* PAGINATION DES POSTS AVEC AUTOSCROLL*/
			$req = $this->conditionsString;
			$PostsPerPage = 6;
			$nbTotalPostsReq = $bdd->prepare($req);
			$nbTotalPostsReq->execute();
			

			$nbTotalPosts = $nbTotalPostsReq->rowCount();

			$totalPages = ceil($nbTotalPosts/$PostsPerPage);

			if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages) {
   					 $currentPage = (int)$_GET['page'];
				} else {
   					$currentPage = 1;
			}

			$start = ($currentPage-1)*$PostsPerPage;

				echo '<div class="pageCountHome" id="pageCountHome" style="visibility:hidden;">';
  				for($i=1;$i<=$totalPages;$i++) {
         			if($i == $currentPage) {
            			echo $i.' ';
         			}elseif ($i == $currentPage+1) {
         				echo '<a href="index.php?page='.$i.'" class="nextPage">'.$i.'</a> ';
         			} else {
            			echo '<a href="index.php?page='.$i.'">'.$i.'</a> ';
         			}
      			} 
      			echo '</div>';


      			/*CHARGEMENT DE LA REQUETE*/
      			$reqDisp = $this->conditionsString.' ORDER BY ID DESC LIMIT '.$start.','.$PostsPerPage;
      			$getPosts = $bdd->prepare($reqDisp);
				$getPosts->execute();
				$nbposts = $getPosts->rowCount(); 


			/*END OF HOME*/

		}

		if($mode == 'group'){

			/* PAGINATION DES POSTS AVEC AUTOSCROLL*/
			$req = "SELECT * FROM posts WHERE groupId = ? ORDER BY ID DESC";
			$PostsPerPage = 5;
			$nbTotalPostsReq = $bdd->prepare($req);
			$nbTotalPostsReq->execute(array($this->groupeId));
			$nbTotalPosts = $nbTotalPostsReq->rowCount();

			$totalPages = ceil($nbTotalPosts/$PostsPerPage);

			if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages) {
   					 $currentPage = (int)$_GET['page'];
				} else {
   					$currentPage = 1;
			}

			$start = ($currentPage-1)*$PostsPerPage;

				echo '<div class="pageCount" id="pageCount" style="visibility:visible;">';
  				for($i=1;$i<=$totalPages;$i++) {
         			if($i == $currentPage) {
            			echo $i.' ';
         			}elseif ($i == $currentPage+1) {
         				echo '<a href="group.php?groupId='.$this->groupeId.'&page='.$i.'" class="nextPage">'.$i.'</a> ';
         			} else {
            			echo '<a href="group.php?groupId='.$this->groupeId.'&page='.$i.'">'.$i.'</a> ';
         			}
      			} 
      			echo '</div>';

      			/*CHARGEMENT DE LA REQUETE*/
      			$reqDisp = 'SELECT * FROM posts WHERE groupId = ? ORDER BY ID DESC LIMIT '.$start.','.$PostsPerPage;
      			$getPosts = $bdd->prepare($reqDisp);
				$getPosts->execute(array($this->groupeId));
				$nbposts = $getPosts->rowCount(); 

		}

		if($mode == 'profile'){
			
			

			/* PAGINATION DES POSTS AVEC AUTOSCROLL*/
			$req = "SELECT * FROM posts WHERE author = ? ORDER BY ID DESC";
			$PostsPerPage = 5;
			$nbTotalPostsReq = $bdd->prepare($req);
			$nbTotalPostsReq->execute(array($this->user_id));
			$nbTotalPosts = $nbTotalPostsReq->rowCount();

			$totalPages = ceil($nbTotalPosts/$PostsPerPage);

			if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages) {
   					 $currentPage = (int)$_GET['page'];
				} else {
   					$currentPage = 1;
			}

			$start = ($currentPage-1)*$PostsPerPage;

				echo '<div class="pageCount" id="pageCount" style="visibility:hidden;">';
  				for($i=1;$i<=$totalPages;$i++) {
         			if($i == $currentPage) {
            			echo $i.' ';
         			}elseif ($i == $currentPage+1) {
         				echo '<a href="user.php?id='.$this->user_id.'&page='.$i.'" class="nextPage">'.$i.'</a> ';
         			} else {
            			echo '<a href="user.php?id='.$this->user_id.'&page='.$i.'">'.$i.'</a> ';
         			}
      			} 
      			echo '</div>';

      			/*CHARGEMENT DE LA REQUETE*/
      			$reqDisp = 'SELECT * FROM posts WHERE author = ? ORDER BY ID DESC LIMIT '.$start.','.$PostsPerPage;
      			$getPosts = $bdd->prepare($reqDisp);
				$getPosts->execute(array($this->user_id));
				$nbposts = $getPosts->rowCount(); 
		} 

		

		 if($nbposts == 0 AND ($mode == 'profile' OR $mode == 'home' OR $mode == 'group')){ 

		 	if($mode == 'profile') { ?>
			</div><div class="block">
  				<div class="block-title">
	 			 	<h6 class="block-name"><strong>Aucun post</strong></h6>
	 			</div>
					<p class="block-bio"><?=$this->user_psd; ?> n'a pas encore posté de message! <br /></p>
			</div>
			<?php }
			if($mode == 'group') { ?>
			</div><div class="block">
  				<div class="block-title">
	 			 	<h6 class="block-name"><strong>Aucun post</strong></h6>
	 			</div>
					<p class="block-bio">Il n'y a aucune publication dans ce groupe!<br /></p>
			</div>
			<?php }
			if($mode == 'home') { ?>

				<div class="block">
  					<div class="block-title">
	 			 		<h6 class="block-name"><strong></strong></h6>
	 				</div>
					<p class="block-bio">Vos abonnements n'ont rien posté! Allez découvrir de nouvelles chaînes :)</p>
				</div>

				<?php } ?>

		<?php }else{ 

			while($resp = $getPosts->fetch()){

				$this->updateLikes($resp['ID']);
				if(($resp['likes'] + $resp['dislikes']) == 0) { $calculPourcent = 50; }else {
				$calculPourcent = 100*(($resp['likes'])/($resp['likes']+$resp['dislikes'])); }
			?>


			<div class="block">
  				<div class="block-title">
					 <img class="block-img" src="userDataUpload/picProfile/<?=$this->getAvatarUser($resp['author']); ?>" alt="William">
	 				 <h6 class="block-name"><strong><?=$this->getPsdFromId($resp['author']); ?> | </strong></h6>
					 <h6 class="block-points">Points : <strong> <?=$resp['points']; ?></strong></h6>
					 <h6 class="block-views"><strong> <?=$resp['uniq_views']; ?></strong> &nbsp;<img src='img/view.png' alt='Views' class="eyes-css"></h6>
					 <p class="block-date">Date : <strong><?=$resp['datecreation']; ?></strong></p>
				</div>

				<p class="block-bio"><?php


				if(strlen($resp['message']) > 250 && $mode != 'uniq'){

					echo substr($resp['message'], 0,250).'...';

				}else{

					echo $resp['message'];
				}

				?>
					

				</p>

				<?php if(!empty($resp['image'])) { //affichage dans le cas d'une image ?>

					<div class="img" id="145">
						<a href="details.php?idpost=<?=$resp['ID'] ?>"><img src="userDataUpload/picPost/<?=$resp['image']; ?>" alt="" id="" class="image"></a>
						
					</div> 

				<?php }
				 if(!empty($resp['video'])) { //si une vidéo est détectée!

				 	/*Démarrage de la conversion */

					$url  = $resp['video'];

					$patternYT = '/[\\?\\&]v=([^\\?\\&]+)/'; //parsing youtube url :)
					preg_match($patternYT,$url,$matches);

					if(isset($matches[1])){

						$id_vid_yt = $matches[1];
						$ytconfirmed = 1;
						$iframeYt = 'https://www.youtube.com/embed/'.$id_vid_yt.'" frameborder="0" allowfullscreen>'; 
						$thumbnailsYt = 'http://i.ytimg.com/vi/'.$id_vid_yt.'/hqdefault.jpg';

					}else{
						/* Vidéo inconnue! */
						$ytconfirmed = 0;
						$iframeYt = 'img/novideo.jpg';
						$thumbnailsYt = 'img/novideo.jpg';

					}	
		
				/*Fin de la conversion*/
				 //$mode = 'uniq';

				 	if($mode == 'uniq'){ //mode "voir plus": affichage du lecteur ?>

						<?php if($ytconfirmed == 1){ ?>

							 <div class="video">
							 	 <iframe class="iframe"  src="<?=$iframeYt; ?>" frameborder="0" allowfullscreen></iframe>
							</div>

						  <?php }else{ ?>
							<img src="<?= $iframeYt; ?>" alt="unknow" class="error-image">
						  <?php	} ?>
					<?php }

				
					if($mode == 'profile'){ //mode affichage multiple  = miniature only ?>
					<div class="img">
						<a href="details.php?idpost=<?=$resp['ID'] ?>"><img src="<?=$thumbnailsYt; ?>" alt="" id="" class="image" /></a>

					</div> 

				<?php } }?>
					
					

			<br/>

	 			<div class="abouts">
	  				<img onclick="userVote(1,<?=$resp['ID'] ?>)" src="img/poucevert.png" alt="like" height="20" weight="20" class="like"/> <span class="nblikesid<?=$resp['ID'] ?>" id="nblikesid<?=$resp['ID'] ?>"><?=$resp['likes']; ?></span>
	  				<img onclick="userVote(2,<?=$resp['ID'] ?>)" src="img/poucerouge.png" alt="like" height="20" weight="20" class="like"/> <span class="nbdislikesid<?=$resp['ID'] ?>" id="nbdislikesid<?=$resp['ID'] ?>"><?=$resp['dislikes']; ?></span> <span class="infoLike"><progress id="avancement" class="avancementid<?=$resp['ID'] ?> progress-one" value="<?=$calculPourcent; ?>" max="100"></progress></span>
	  				 <div id="votemessage<?=$resp['ID'] ?>" class="votemessage<?=$resp['ID'] ?>" style="display:none;"></div>

 	 				 <?php if($mode != 'uniq'){ ?>
 	 				 <a href="details.php?idpost=<?=$resp['ID'] ?>" class="block-more">En savoir plus <i class="fa fa-caret-right" aria-hidden="true"></i></a>
 	 				 <?php }else{} ?>
  				  </div>
  				 </div>

  				<?php
  				//if($mode == 'profile') echo "</div>"; //si on affiche pas de commentaires, on ferme la div, sinon on la ferme après les commentaires

			
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