</div>
	<div id="popup_name" class="popup_block">
		  <h2>EXPLORE LES CATEGORIES</h2>
	       <div class="line-separator3"></div>
		   <a href="#" class="nodeco"><div class="category">
		   		<h6>GAMING - 1535 utilisateurs</h6>
		   </div></a>
		   <a href="#" class="nodeco"><div class="category">
		   		<h6>HIGH-TECH - 1231 utilisateurs</h6>
		   </div></a>
		   <a href="#" class="nodeco"><div class="category">
		   		<h6>DEVELOPPEMENT - 4786 utilisateurs</h6>
		   </div></a>
		   <a href="#" class="nodeco"><div class="category">
		   		<h6>BEAUTE - 7436 utilisateurs</h6>
		   </div></a>
		   <a href="#" class="nodeco"><div class="category">
		   		<h6>BRICOLAGE - 1555 utilisateurs</h6>
		   </div></a>
		   <a href="#" class="nodeco"><div class="category">
		   		<h6>AUTRES - 2345 utilisateurs</h6>
		   </div></a>
		 </div>
			</div>
			</div>
	 	<!-- ************************************ -->
	 <!-- **************** JAVASCRIPT **************** -->
	 	<!-- ************************************ -->
	<script type="text/javascript">
	(function($){
    
	    $('#icon').click(function(e){
	        e.preventDefault();
	        $('body').toggleClass('with-sidebar');
	    })
	    
	})(jQuery);
	</script>

	<script type="text/javascript">

	window.onresize = function(){ location.reload(); }

	var maxed = 1400;
	var mined = 1100;


		if($(window).width() > maxed && $(window).width() > mined){
			var widthall = $(window).width();
			var min = 900;
			var width = widthall - min;
			$(".block").width(width);
			$(".block2").width(width);
		}else{

		}

	</script>
<script type="text/javascript">
    
$(document).ready(function() {
	$('a.poplight[href^=#]').click(function() {
	var popID = $(this).attr('rel'); //Trouver la pop-up correspondante
	var popURL = $(this).attr('href'); //Retrouver la largeur dans le href

	//Récupérer les variables depuis le lien
	var query= popURL.split('?');
	var dim= query[1].split('&amp;');
	var popWidth = dim[0].split('=')[1]; //La première valeur du lien

	//Faire apparaitre la pop-up et ajouter le bouton de fermeture
	$('#' + popID).fadeIn().css({
		'width': ''
	})
	.prepend('<a href="#" class="close"><img src="img/error.png" class="btn_close" title="Fermer" alt="Fermer" /></a>');

	//Récupération du margin, qui permettra de centrer la fenêtre - on ajuste de 80px en conformité avec le CSS
	var popMargTop = ($('#' + popID).height() + 80) / 2;
	var popMargLeft = ($('#' + popID).width() + 40) / 2;

	//On affecte le margin
	$('#' + popID).css({
		'margin-top' : -popMargTop,
		'margin-left' : -popMargLeft
	});

	//Effet fade-in du fond opaque
	$('body').append('<div id="fade"></div>'); //Ajout du fond opaque noir
	//Apparition du fond - .css({'filter' : 'alpha(opacity=80)'}) pour corriger les bogues de IE
	$('#fade').css({'filter' : 'alpha(opacity=80)'}).fadeIn();

	return false;
});

//Fermeture de la pop-up et du fond
$('a.close, #fade').live('click', function() { //Au clic sur le bouton ou sur le calque...
	$('#fade , .popup_block').fadeOut(function() {
		$('#fade, a.close').remove();  //...ils disparaissent ensemble
	});
	return false;
});
});
</script>
<script type="text/javascript" src="../js/menu.js"></script>
</body>
</html>