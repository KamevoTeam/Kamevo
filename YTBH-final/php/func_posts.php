<?php
	function getAverageVote($id_post){

		require('co_pdo.php');
		$reqAv = $bdd->prepare('SELECT avg(vote) FROM vote WHERE id_post = ?');
		$reqAv->execute(array($id_post));
		$resp = $reqAv->fetch();
		return round($resp['avg(vote)'],1);
		

	}

	function getNumberVote($id_post){

		require('co_pdo.php');
		$reqAv = $bdd->prepare('SELECT * FROM vote WHERE id_post = ?');
		$reqAv->execute(array($id_post));
		return $reqAv->rowCount();
		


	}

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

					/*Démarrage de la conversion */
					$url  = $resp['video'];
					$pattern = '/[\\?\\&]v=([^\\?\\&]+)/';
					preg_match($pattern,$url,$matches);

					if(isset($matches[1])){

						$id_vid = $matches[1];
						echo '<div class="line-separator6"></div><div class="video"><iframe class="iframe"  src="https://www.youtube.com/embed/'.$id_vid.'" frameborder="0" allowfullscreen></iframe></div>'; 

					}	
		
				/*Fin de la conversion*/

					
						
				 } ?>
				
				
				<div class="line-separator6"></div>
				<br/>
			   <div class="abouts">
			  	 	<h6 class="block-name"><strong><?=$resp['title']; ?></strong></h6>
			  	<h6 class="block-points">Vues : <strong> <?=$resp['views']; ?></strong></h6>
			 	<p class="block-date">Le <strong><?=$resp['datecreation']; ?></strong></p>
			 	 <a href="posts.php?id=<?php echo $resp['ID']; ?>" class="block-more">En savoir plus</a>
			   	
			   	<div class="votes">
    			<h4 class="votes-title"></h4>
    			 <div class="vote-bar">
     			<span onclick="userVote(1,<?=$resp['ID']; ?>);">&#9734;</span>
      			<span onclick="userVote(2,<?php echo $resp['ID']; ?>);">&#9734;</span>
      			 <span onclick="userVote(3,<?php echo $resp['ID']; ?>);">&#9734;</span>
     			 <span onclick="userVote(4,<?php echo $resp['ID']; ?>);">&#9734;</span>
     			<span onclick="userVote(5,<?php echo $resp['ID']; ?>); return false;">&#9734;</span>
     				</div>
     				<p>Moyenne: 
     				<?php echo getAverageVote($resp['ID']); ?>/5 pour <?php echo getNumberVote($resp['ID']); ?> votants.</p>
    		</div>
			</div>
			</div>

		
			



			<?php }

		}			

	}
	
	function getPost($id) {
		require('co_pdo.php');
		
		$req = $bdd->prepare('SELECT * FROM posts WHERE ID = :id');
		$req->execute(array(
			'id' => $id
		));
		
		while ($resp = $req->fetch()) {?>
			
			<div class="block">
				<div class="block-title">
				<img class="block-img" src="img/user.png" alt="<?=$resp['author']; ?>">
			  	 <h6 class="block-name"><strong><?=$resp['author']; ?></strong></h6>
			  	<h6 class="block-points">Points : <strong> <?=$resp['points']; ?></strong></h6>
			 	 <p class="block-date">Dernière activité : <strong>Jamais</strong></p>
				</div>
				<p class="block-bio"><?=$resp['message']; ?></p>

				<?php if($resp['video'] != ''){ 

					/*Démarrage de la conversion */
					$url  = $resp['video'];
					$pattern = '/[\\?\\&]v=([^\\?\\&]+)/';
					preg_match($pattern,$url,$matches);

					if(isset($matches[1])){

						$id_vid = $matches[1];
						echo '<div class="line-separator6"></div><div class="video"><iframe class="iframe"  src="https://www.youtube.com/embed/'.$id_vid.'" frameborder="0" allowfullscreen></iframe></div>'; 

					}	
		
				/*Fin de la conversion*/

					
						
				 } ?>
				
				
				<div class="line-separator6"></div>
				<br/>
			   <div class="abouts">
			  	 	<h6 class="block-name"><strong><?=$resp['title']; ?></strong></h6>
			  	<h6 class="block-points">Vues : <strong> <?=$resp['views']; ?></strong></h6>
			 	<p class="block-date">Le <strong><?=$resp['datecreation']; ?></strong></p>
			 	 <a href="posts.php?id=<?php echo $resp['ID']; ?>" class="block-more">En savoir plus</a>
			   	
			   	<div class="votes">
    			<h4 class="votes-title"></h4>
    			 <div class="vote-bar">
     			<span onclick="userVote(1,<?=$resp['ID']; ?>);">&#9734;</span>
      			<span onclick="userVote(2,<?php echo $resp['ID']; ?>);">&#9734;</span>
      			 <span onclick="userVote(3,<?php echo $resp['ID']; ?>);">&#9734;</span>
     			 <span onclick="userVote(4,<?php echo $resp['ID']; ?>);">&#9734;</span>
     			<span onclick="userVote(5,<?php echo $resp['ID']; ?>); return false;">&#9734;</span>
     				</div>
     				<p>Moyenne: 
     				<?php echo getAverageVote($resp['ID']); ?>/5 pour <?php echo getNumberVote($resp['ID']); ?> votants.</p>
    		</div>
			</div>
			</div>
		<?php }
	}
echo '1';
?>