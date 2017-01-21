<div class="publisher">
<?php 
	$sendPost  = new Post($_POST,$_FILES);
	$sendPost->checkData();
	//if(!empty($sendPost->errorReturn)) $sendPost->errorReturn = '<h5 class="error-text">'.$sendPost->errorReturn.'</h5>';
	print_r($_FILES);
?>


 <div class="block-title">
  <img class="block-img" src="img/user.png" alt="William">
   <h6 class="block-name"><strong><?=$user->pseudo; ?> </strong></h6>
   <h6 class="block-points">| Points : <strong> <?=$user->points; ?></strong></h6>
  <p class="block-date">Dernière activité : <strong><?=$user->lastvisit; ?></strong></p>
 </div>
 <div class="submit-btn">
 	<a href="#" class="btn" onclick="document.getElementById('formData').submit();" id="subform">Publier</a><!-- remlace the input type="submit" -->
 </div>
 <div class="text">
  <form action="" method="post" id="formData" enctype="multipart/form-data"	>
  	<textarea name="text" class="text-area" placeholder="Votre message ..."></textarea>
  
 </div>
 <div class="options">
 	<h3 class="options-title">Plus d'options ...</h3>
 	 <div class="photo">
 	  <h5 class="file-label">Ajouter une photo : </h5>
 	   <input type="file" name="picture" class="inline input-file" id="my-file" >
      <label for="my-file" class="input-file-trigger" tabindex="0">Choisir un fichier ...</label>
      <span id="nameOfFile"></span>
 	 </div><br/>
 	 <div class="category">
 	  <h5 class="category-label">Ajouter une catégorie à votre message : </h5>
 	   <select class="select" name="categorie">
 	   	<option value="Technology">Technologie</option>
 	   	 <option value="Gaming">Gaming</option>
 	   	  <option value="Beauty">Beauté</option>
 	   	 <option value="making">Bricolage</option>
 	   	<option value="other">Autre ...</option>
 	   </select>
 	 </div><br/>
 	 <div class="video">
 	  <h5 class="video-label">Ajouter une vidéo à votre message : </h5>
 	   <form action="" method="post">
 	 	<input type="text" class="video-input" name="video" placeholder="URL de votre vidéo - Ex : https://www.youtube.com/watch?v=u9Dg-g7t2l4">
 	  </form>
 	 </div>
 	 <div class="error">
 	 	<!-- Si vous devez afficher un message d'erreur -->
 	 	<?=$sendPost->errorReturn; ?>
 	 	
 	 </div>
 	</form>
 </div>
</div>
<script type="text/javascript">
	
$("#subform").click(function(){

    var fileName = $("my-file").val();

    if(fileName.length != 0){

    	$("#nameOfFile").append(fileName);
        
    }
    else{
       
       $("#nameOfFile").append('Erreur: fichier vide');
        

    }
});


</script>