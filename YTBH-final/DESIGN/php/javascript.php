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
<!-- ************************************ -->
<!-- **************** IMAGE **************** -->
<!-- ************************************ -->
<?php

	$id = 15;

?>
<script type="text/javascript">
	(function($){


	    $('.image').click(function(e){
	    	   e.preventDefault();
	         $('#<?php echo $id ?>').toggleClass('image-op');
	          $('.fade').fadeIn( 1000 );
	         $('.fade').toggleClass('image-op2');
	          $('.errbut').toggleClass('displayed');
	    })
	    $('.errbut').click(function(e){
	        e.preventDefault();
	         $('#<?php echo $id ?>').toggleClass('image-op');
	        $('.fade').toggleClass('image-op2');
	        $('.errbut').toggleClass('displayed');
	        
	    })
	    $('.fade').click(function(e){
	        e.preventDefault();
	         $('#<?php echo $id ?>').toggleClass('image-op');
	        $('.fade').toggleClass('image-op2');
	        $('.errbut').toggleClass('displayed');
	        
	    })
	    
	})(jQuery);
</script>
<script type="text/javascript">
$(window).bind('scroll', function () {
    var pub = $('.pub');
    if ($(window).scrollTop() > pub.offset().top) {
        pub.addClass('fixed');
    } else {
        pub.removeClass('fixed');
    }
});
</script>