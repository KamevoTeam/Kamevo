	<?php

		include 'php/groups.class.php';
		$createGroup = new group(0); //0 because it's a non-object query, I could define it as static method, but... 
		$createGroup->createNewGroup($user,$_POST,$_FILES);

	?>
	<a href="post.php">
	 <div class="post-btn">
		Publier ...
	  </div>
	 </a>
	<div class="groups">
		<h4>GROUPES</h4>
		<div class="line-separator5"></div>

		<?php 
			group::printGroupFollowed($_SESSION['ID']);
		?>
		
		
		<!-- Keep everything below -->
		
		<a href="" class="nodeco"><div class="group">
		<h3 class="group-create"> + Créer un groupe</h3>
		<span class="errorGroupCreation"></span>
		<span class="errorGroupCreation"><?=$createGroup->errorReturn; ?></span>
		</div></a>
		<div class="aboutabout">
			<i class="fblue fa fa-cog" id="icon"></i> <a href="#" class="param-groups">A propos de Kamevo</a>
		</div>
	</div>
	<form method="post" action="" enctype="multipart/form-data">
	<div class="group-creator">
		<div class="group-popup">
			<div class="group-content">
			<span class="closer-group"><i class="fa fa-close" id="icon"></i></span>
				<h2 class="group-create-title"><i class="fa fa-plus-circle" id="icon"></i> Créer un groupe :</h2><br/>
				<h5 class="label-info">Choisir un nom pour le groupe :</h5>
			     <input type="text" class="input-info" placeholder="Nom du groupe" name="nameOfGroup">
			     <br/><br/><br/>
				<form action="" method="post" class="form-groups">
				  <h5 class="file-label">Avatar du groupe : </h5>
					<input class="inline input-file" id="my-file" type="file" name="profile">
			      <label for="my-file" class="input-file-trigger" tabindex="0">Choisir un fichier ...</label><br/>
				  <h5 class="file-label">Photo de couverture du groupe : </h5>
			 	    <input class="inline input-file" id="my-fileC" type="file" name="cover">
			      <label for="my-fileC" class="input-file-trigger" tabindex="0">Choisir un fichier ...</label><br/>
			      <input type="submit" name="submit" class="group-create-btn" value="Créer le groupe">
				</form>
			</div>
	 	</div>
	 </div>
	 </form>