<?php
$sendSettings  = new settingsControl($user,$_POST,$_FILES);
$sendSettings->checkData();


?>
<div class="settings">
<div class="header">
		<h3 class="header-tilte">Modifier mes informations personelles :</h3>
		<div class="header-separation"></div>
	</div>
	 <div class="informations">
 	  <form action="#errorSetting" class="infos" method="post" enctype="multipart/form-data">
 	  <div class="line-set">
      <h5 class="info-label">Nouveau prénom : </h5>
     <input type="text" name="prenom" placeholder="<?=$user->name; ?>" id="info-input" class="inline input-info" >
    </div>
    <div class="line-set">
      <h5 class="info-label">Nouveau pseudo : </h5>
     <input type="text" placeholder="<?=$user->pseudo; ?>" id="info-input" class="inline input-info" name="pseudo">
    </div>
    <div class="line-set">
      <h5 class="info-label">Catégorie du profil : </h5>
     <select class="input-info" name="catego">
      <option value="Technology" name="techno">Technologie</option>
       <option value="Gaming" name="gaming">Gaming</option>
        <option value="Technologie" name="beaute">Beauté</option>
       <option value="Bricolage" name="brico" selected="selected">Bricolage</option>
      <option value="Autre" name="autre">Autre ...</option>
     </select>
    </div>

 	 </div><h3 class="header-tilte">Modifier mes photos :</h3>
    <div class="header-separation"></div>
	<div class="basics">
 	  <h5 class="file-label">Modifier ma photo de profil : </h5>
 	   <input name="profile" class="inline input-file" id="my-file1" type="file" >
      <label for="my-file1" class="input-file-trigger" tabindex="0">Choisir un fichier ...</label>
       <br/><h5 class="file-label">Modifier ma photo de couverture : </h5>
 	    <input name="cover" class="inline input-file" id="my-file2" type="file">
      <label for="my-file2" class="input-file-trigger" tabindex="0">Choisir un fichier ...</label>
 	 </div>
    <div class="text">
    <h3 class="header-tilte">Ajouter une biographie à mon profil :</h3>
		<div class="header-separation"></div>
     
  	  <textarea name="bio" class="text-area"><?=$sendSettings->bio_user; ?></textarea>
  	  *Votre biographie ne peut contenir que 80 caractères maximum
     
    </div>
    <div class="error" id="settingError">
    <!-- Si vous devez afficher un message d'erreur -->
    <?php
  print_r( $sendSettings->errorReturn);
    for ($i=0; $i < $sendSettings->numberOfError; $i++) { 
      
      $sendSettings->errorReturn[$i];
    }
    
    ?>
</div>
   
  	<input type="submit" class="submit" name="submit" value="Enregistrer">

  </form>
  
</div>
