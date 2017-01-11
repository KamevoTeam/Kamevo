<?php

	class publication extends userProfile{

		public $title_of_publi;


		function __construct($id_post){

				$this->current_post_id = $id_post;

		}

		public function loadComments(){
			
			//todo
			?>
			<div class="comments">
			
				<div class="forms">
  					<form method="post" class="comment-form">
	  					<h6 class="block-name"><strong>William - Gaming </strong></h6><br/>
  						<textarea class="comment-input" name="comment" placeholder="Mon commentaire ..."></textarea>
  						<input type="submit" name="submit" class="post-btn" value="publier mon commentaire">
  					</form>
  				</div>

  				<!-- Only one comment -->
  	 			<div class="block-comment com1">
					<img class="block-img" src="../img/user.png" alt="William">
	 				 <h6 class="block-name"><strong>William - Gaming </strong> | <span class="comment-date">16/09/2016 à 16:49</span></h6>
					<p class="comment-content">
						 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  					 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  					 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	 					 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	 					 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	 					 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	  				 <br/><a href="" class="comment-like">J'aime ( 1 )</a>
	  				<a href="" class="comment-like">Je n'aime pas ( - )</a>
	 					<br/></p>
				</div>

				<div class="block-comment com2">
					<img class="block-img" src="../img/user.png" alt="William">
	 				 <h6 class="block-name"><strong>William - Gaming </strong> | <span class="comment-date">16/09/2016 à 16:49</span></h6>
					<p class="comment-content">
						 Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
	  					 tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
	  					 quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
	 					 consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
	 					 cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
	 					 proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
	  				 <br/><a href="" class="comment-like">J'aime ( 1 )</a>
	  				<a href="" class="comment-like">Je n'aime pas ( - )</a>
	 					<br/></p>
				</div>


		</div>
			<?php
		}


		












	}


?>