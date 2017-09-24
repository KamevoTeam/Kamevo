<?php
	$iduseri = 0;
	if(!empty($_SESSION['ID']))  $iduseri = $_SESSION['ID']; 

?><div class="groups">
	<div class="points">
	  <h6 class="bio-bio">« <?=$userPage->bio; ?> »</h6>
	   	<h6 class="inf-t">Points : <span class="p-count"><?=$userPage->user_pts; ?></span></h6>
	   </div>
	   <div class="points">
	   	<h6 class="inf-t">Abonnés : <span class="p-count"><?=$userPage->user_subscribers; ?></span></h6>
	   </div>
	   <div class="points">
	   	<h6 class="inf-t">Abonnements : <span class="p-count"><?=$userPage->user_subscriptions; ?></span></h6>
	   </div>
	   <div class="points">
	   	<h6 class="inf-t">Publications : <span class="p-count"><?=$userPage->user_nb_posts; ?></span></h6>
	   </div>
	   <div class="points">
	   	<h6 class="inf-t">Dernière activité : <span class="p-count"></span></h6>
	   </div>
	</div>
	<div class="infos">
		<div class="sub-div">
		<?php if($iduseri == $id){ ?>
		<button class="subscribe-btn" onclick="location.href='settings.php'">éditer mon profil</button>
		<?php }else{ 

			if(!isset($_SESSION['ID'])){ ?>

				<button class="subscribe-btn">S'abonner</button>
			<?php }else{

				if($userPage->ifUserSubs() == 0){ ?>
					<button class="subscribe-btn" onclick="sub('<?=$userPage->getId(); ?>')">S'abonner</button>	
				<?php }else{ ?>
					<button class="subscribe-btn" onclick="sub('<?=$userPage->getId(); ?>')">Se désabonner</button>	
					<?php } ?>
		<?php } }?>
		<div id="submessage" class="submessage" style="display:none;"></div>
	   </form>
	  </div>
	</div>
	<script type="text/javascript" src="js/sub.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script>