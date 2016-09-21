<?php
	

	function getPosts($mode,$pseudo=''){

		require('co_pdo.php');

		/* $mode: set the mode to display posts
		* = homeNoConnect: Display all messages (10?) range by points
		* = homeConnect: Dipslay all messages from followed users
		* = profile: Display all messages of the current user
		*
		*
		*
		*
		**/


		if($mode == 'homeNoConnect'){

			$req = $bdd->prepare('SELECT * FROM posts ORDER BY points DESC LIMIT 10');
			$req->execute();
			while($resp = $req->fetch()){?>

			<div class="block">
				<div class="block-title">
				<img class="block-img" src="img/user.png" alt="<?=$resp['author']; ?>">
			  	 <h6 class="block-name"><strong><?=$resp['author']; ?></strong></h6>
			  	<h6 class="block-points">Points : <strong> <?=$resp['points']; ?></strong></h6>
			 	 <p class="block-date">Dernière activité : <strong>Jamais</strong></p>
				</div>
				<p class="block-bio"><?=$resp['message']; ?></p>

				<?php if($resp['video'] != ''){ 

					$url  = $resp['video'];
					$pattern = '/[\\?\\&]v=([^\\?\\&]+)/';
					preg_match($pattern,$url,$matches);

					if(isset($matches[1])){

						$id_vid = $matches[1];
						echo '<div class="line-separator6"></div><div class="video"><iframe class="iframe"  src="https://www.youtube.com/embed/'.$id_vid.'" frameborder="0" allowfullscreen></iframe></div>'; 

					}	
		
		

					
						
				 } ?>
				
				
				<div class="line-separator6"></div>
				<br/>
			   <div class="abouts">
			  	 	<h6 class="block-name"><strong><?=$resp['title']; ?></strong></h6>
			  	<h6 class="block-points">Vues : <strong> <?=$resp['views']; ?></strong></h6>
			 	<p class="block-date">Le <strong><?=$resp['datecreation']; ?></strong></p>
			 	 <a href="#" class="block-more">En savoir plus</a>
			   	</div>
			</div>


			<?php }

		}			

	}

?>