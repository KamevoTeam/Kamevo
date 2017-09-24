<div class="settings">
<div class="header">
		<h3 class="header-tilte">Envoyer un mail à tous les utilisateurs :</h3>
	</div>
	   <div class="text">
     <form action='newsletter/visual.php' method='POST' enctype='multipart/form-data'>
         <p><label for='titre'>Titre</label>
             <input type='text' name='titre' id='titre' autofocus /></p>
         <p>Message : (utilisez [jump] pour effectuer un saut de ligne, [p] pour ouvrir un nouveau paragraphe.)<br />
         utilisez : "[link href=http://www.lien.com link-text=texte /link]" pour créer un lien /!\ ne mettez pas de " ou ' pour encadrer les attributs</p>
  	  <textarea cols="20" rows="20" name="message" class="text-area" height="20"></textarea>
     
         <p><label for='img'>Ajouter une image</label><br /><input type='file' name='img' id='img'></p>
          
  	<input type="submit" class="submit" name="submit" value="Visualiser">

  </form>
</div>