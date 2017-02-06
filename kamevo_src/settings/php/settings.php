<div class="settings">
	<div class="header">
		<h3 class="header-tilte">Modifier mon profil :</h3>
		<div class="header-separation"></div>
	</div>
	 <div class="informations">
 	  <form action="" class="infos" method="post">
 	  <div class="line-set">
      <h5 class="info-label">Nom : </h5>
     <input type="text" value="Zelkyo" id="info-input" class="inline input-info">
    </div>
 	  </form>
 	 </div>
	<div class="basics">
 	  <h5 class="file-label">Modifier ma photo de profil : </h5>
 	   <input class="inline input-file" id="my-file" type="file" name="profile">
      <label for="my-file" class="input-file-trigger" tabindex="0">Choisir un fichier ...</label>
       <br/><h5 class="file-label">Modifier ma photo de couverture : </h5>
 	    <input class="inline input-file" id="my-file" type="file" name="cover">
      <label for="my-file" class="input-file-trigger" tabindex="0">Choisir un fichier ...</label>
 	 </div>
    <div class="text">
    <h3 class="header-tilte">Ajouter une biographie à mon profil :</h3>
		<div class="header-separation"></div>
     <form action="" method="post">
  	  <textarea name="text" class="text-area" placeholder="Votre message ..."></textarea>
  	  *Votre biographie ne peut contenir que 80 caractères maximum
     </form>
    </div>
   <form action="" id="php" method="post">
  	<input type="submit" class="submit" name="submit" value="Enregistrer">
  </form>
</div>