 <div class="group-header">
 <!-- " - GROUPE" toujours après le nom du groupe -->
  <h3 class="name">Kamevo - GROUPE</h3>
   <img class="group-img" src="<?=$currentGroup->getAvatarGroup(); ?>" alt="profile-image">
  <img class="group-cover-img" src="<?=$currentGroup->getCoverGroup(); ?>" alt="cover-image">
 </div>
 <div class="infos">
  <h4 class="infos-title"><?=$currentGroup->getNameGroup(); ?></h4>
 	<div class="info">
 		Créateur : <strong><span class="info-var"><?=$currentGroup->getPsdFromId($currentGroup->getAuthorGroup()); ?></span></strong><br/>
 	</div>
 	<div class="info">
 		Inscrits : <strong><span class="info-var"><?=$currentGroup->getNbMemberGroup(); ?></span></strong><br/>
 	</div>
 	<div class="info">
 		Statut : <strong><span class="info-var">Abonné</span></strong><br/>
 	</div>
 	<div class="info">
 		Publications : <strong><span class="info-var"><?=$currentGroup->getNbPubliGroup(); ?></span></strong><br/>
 	</div>
 </div>
 <div class="join">
 	<a href="leaveGroup?group=<?=$groupId ?>" class="group-btn">Quitter le groupe</a>
 	<!-- Remplacer par "Rejoindre le groupe si la personne est déjà dedans" -->
 </div>
 <div class="publics">
<?php
			

  		$currentGroup->printPosts('group');
	
?>

 </div>