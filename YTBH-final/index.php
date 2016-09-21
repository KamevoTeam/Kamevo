<!DOCTYPE html>
<html>
<head>
	<title>Youtub'Heure - Accueil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="pubs/pub.css">
	<link rel="stylesheet" href="css-circle/css/circle.css">
	<link rel="stylesheet" href="css/feed.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
</head>
<body>
	<header class="header">
	 <nav class="menu" id="top">
	  <ul>
	    <a href="#" class="log" id="icon"></a>
	     <a href="#"><li class="logo"> YTBH </li></a><div class="line-separator"></div>
	    <a href="#"><li class="title"> YOUTUB'HEURE</li></a>
	     <div class="mme">
	        <a class="js" href="#"><li class="link"><i class="fa fa-user-plus" id="icon"></i> Inscription</li></a>
	         <a class="js" href="#"><li class="link"><i class="fa fa-sign-in" id="icon"></i> Connexion</li></a>
	         <a class="js poplight" href="#?w=50%" rel="popup_name"><li class="link"><i class="fa fa-compass" id="icon"></i> Explorer</li></a>
	        <a class="js" href="#"><li class="link"><i class="fa fa-home" id="icon"></i> Accueil</li></a>
	     </div>
	     <li class="link-look"><form class="form" action="" method="post">
	       <input type="search" class="f-input" name="search" placeholder=" Rechercher un profil">
	       <i class="looking fa fa-search" id="icon"></i></form>
	    </li>
	  </ul>
	 </nav>
	</header>
	<div class="site-pusher">
		<div class="container">
		<?php
			include("pubs/index.php");
		?>
			<div class="info">
		<div class="users">
			<h4>UTILISATEURS</h4>
			<div class="line-separator5"></div>
			<h6>Inscrits : <strong>4765</strong></h6>
			<h6>Connectés : <strong>521</strong></h6>
			<h6>Visites : <strong>145 000</strong></h6>
		</div>
		<div class="users">
			<h4>MISES A JOUR</h4>
			<div class="line-separator5"></div>
			<h6>14/08 : <strong>Menu responsive</strong></h6>
			<h6>21/10 : <strong>Fil d'actualité</strong></h6>
			<h6>30/12 : <strong>Thême 2017</strong></h6>
		</div>
	</div>
	<div class="groups">
		<h4>GROUPES</h4>
		<div class="line-separator5"></div>
		<div class="group">
			<img class="group-img" src="img/team.png" alt="William">
		<h6 class="group-name">YTBH - Staff<br/> Membres : <strong >4765 </strong></h6>
		</div>
		<div class="group">
			<img class="group-img" src="img/team.png" alt="William">
		<h6 class="group-name">Minecraft <br/>Membres : <strong >125 </strong></h6>
		</div>
		<div class="group">
			<img class="group-img" src="img/team.png" alt="William">
		<h6 class="group-name">EnjoyPhoenix <br/>Membres : <strong >541 </strong></h6>
		</div>
		<div class="aboutabout">
			<i class="fblue fa fa-cog" id="icon"></i> <a href="#" class="param-groups">A propos : ici</a>
		</div>
	</div>
	<!-- ************************************ -->
<!-- **************** BLOCK 1**************** -->
	<!-- ************************************ -->

		<?php include('display_posts.php');  ?>
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

	//window.onresize = function(){ location.reload(); }

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