<?php

	class publication extends userProfile{

		public $title_of_publi;
		private $errorMessage;


		function __construct($id_post){

				$this->current_post_id = $id_post;
				$this->errorMessage = '';

		}

		private function sendComment(){


			require('co_pdo.php');

			$textComment =  htmlspecialchars($_POST['comment']);
			$id_post_to_send = $this->current_post_id;
			$id_sender_of_comment = $_SESSION['ID'];

			//for ($i=0; $i < 100 ; $i++) { 
				$sendCom = $bdd->prepare('INSERT INTO comments(id_post,poster,comment,note) VALUES (?,?,?,?)');
				$sendCom->execute(array($id_post_to_send,$id_sender_of_comment,$textComment,'0'));

			//}
			

			//echo 'Commentaire posté!';
			$_POST = array(); //cleaning receving datas



		}

		public function loadComments(){
				
			require('co_pdo.php');	
			if(isset($_POST['submit']) AND !empty($_POST['comment'])) $this->sendComment(); ?>

			<div class="comments">
			
				<!-- Post comment form --> 
				<div class="forms">
  					<form method="post" class="comment-form" action="#">
	  					<h6 class="block-name"><strong>William - Gaming </strong></h6><br/>
  						<textarea class="comment-input" name="comment" placeholder="Mon commentaire ..."></textarea>
  						<input type="submit" name="submit" class="post-btn" value="publier mon commentaire">
  					</form>
  					<span class="respComSend" id="resComSend" style="color:red;background:yellow;"><?=$this->errorMessage; ?></span>
  				</div>
  				<!-- End of post comment form --> 
  				<?php 

  				$CommentsPerPage = 20;
				$nbTotalCommentsReq = $bdd->prepare('SELECT ID FROM comments WHERE id_post = ?');
				$nbTotalCommentsReq->execute(array($this->current_post_id));
				$nbTotalComments = $nbTotalCommentsReq->rowCount();

				$totalPages = ceil($nbTotalComments/$CommentsPerPage);

				if(isset($_GET['page']) AND !empty($_GET['page']) AND $_GET['page'] > 0 AND $_GET['page'] <= $totalPages) {
   					 $currentPage = (int)$_GET['page'];
				} else {
   					$currentPage = 1;
				}

				$start = ($currentPage-1)*$CommentsPerPage;
				echo '<div id="pagesDisplay">';
  				for($i=1;$i<=$totalPages;$i++) {
         			if($i == $currentPage) {
            			echo $i.' ';
         			}elseif ($i == $currentPage+1) {
         				echo '<a href="details.php?idpost='.$this->current_post_id.'&page='.$i.'" class="nextPage">'.$i.'</a> ';
         			} else {
            			echo '<a href="details.php?idpost='.$this->current_post_id.'&page='.$i.'">'.$i.'</a> ';
         			}
      			} 
      			?> 
      			</div>
      			<div id="allCommentsDiv">
  				<?php
  				/*Request to load all the comments */

  				$updateCom = $bdd->prepare('SELECT * FROM comments WHERE id_post = ? ORDER BY ID DESC LIMIT '.$start.','.$CommentsPerPage);
				$updateCom->execute(array($this->current_post_id));
				while($dataCom = $updateCom->fetch()){

					$this->updateLikesComments($dataCom['ID']); //updating likes for every comments
				} 

  				$loadCom = $bdd->prepare('SELECT * FROM comments WHERE id_post = ? ORDER BY ID DESC LIMIT '.$start.','.$CommentsPerPage);
				$loadCom->execute(array($this->current_post_id));

				

				
				while($dataCom = $loadCom->fetch()){
				 ?>

					

			
  				<!-- Only one comment -->
  				<div class="oneComment" id="comment<?=$dataCom['ID']; ?>" style="padding-top: 50px;">
	  	 			<div class="block-comment com">
						<img class="block-img" src="img/user.png" alt="William">
		 				 <h6 class="block-name"><strong><?=$this->getPsdFromId($dataCom['poster']); ?> </strong> | <span class="comment-date"><?=$dataCom['date']; ?></span></h6>
						<p class="comment-content">
							 <?=$dataCom['comment']; ?>
		  				 <br/><a href="#comment<?=$dataCom['ID']; ?>" class="comment-like" onclick="userVoteComment(1,<?=$dataCom['ID']; ?>)">J'aime ( <?=$dataCom['likes']; ?> )</a>
		  				<a href="#comment<?=$dataCom['ID']; ?>" class="comment-like" onclick="userVoteComment(2,<?=$dataCom['ID']; ?>)">Je n'aime pas ( <?=$dataCom['dislikes']; ?> )</a>
		 					<br/></p><span id="ErrorcommentId<?=$dataCom['ID']; ?>" class="ErrorcommentId<?=$dataCom['ID']; ?>"></span>
					</div>
				</div>
				<?php } ?>
				</div>


		</div>
			<?php
		}

		private function getPsdFromId($userIdSearch){

			include('co_pdo.php');
			$req = $bdd->prepare('SELECT pseudo FROM users WHERE ID = ?');
			$req->execute(array($userIdSearch));
			$rep = $req->fetch();
			return $rep['pseudo'];


		}

		public function updateLikesComments($idComment){

			require('co_pdo.php');

			$ComgetL = $bdd->prepare('SELECT * FROM votecomments WHERE id_com = ? AND vote = 1'); //1 = like
			$ComgetL->execute(array($idComment));
			$Comnblikes = $ComgetL->rowCount();


			$ComgetD = $bdd->prepare('SELECT * FROM votecomments WHERE id_com = ? AND vote = 2'); //2 = dislike
			$ComgetD->execute(array($idComment));
			$Comnbdislikes = $ComgetD->rowCount();

			$ComLDupds = $bdd->prepare('UPDATE comments SET likes = ?, dislikes = ? WHERE ID = ?');
			$ComLDupds->execute(array($Comnblikes,$Comnbdislikes,$idComment));

			$ComLDupds->closeCursor();

	}


		












	}


?>