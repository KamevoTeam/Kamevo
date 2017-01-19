<!DOCTYPE html>
<html>
<head>
	<title>Youtub'Heure - Profil</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="css/styles.css">
	<link rel="stylesheet" href="css/feeds.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" href="css/profile.css">
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
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
	<div class="container">
		<div class="profile-header">
			<h3 class="name">AXEL | Zelkyo</h3>
			<img class="profile-img" src="img/team.png" alt="profile-image">
			<img class="cover-img" src="img/banner.png" alt="cover-image">
		</div>
		<div class="about">
			<h4>INFORMATIONS</h4>
			<div class="line-separator5"></div>
			<h6 class="infox">Catégorie : <strong>Gaming</strong></h6>
			<h6 class="infox">Amis : <strong>12</strong></h6>
			<h6 class="infox">Groupes : <strong>Staff</strong></h6>
			<h6 class="infox">Activité : <strong>verte</strong></h6>
			<div class="line-separator7"></div>
			<h6 class="infox">Points : <strong>122</strong></h6>
			<h6 class="infox">Posts : <strong>12</strong></h6>
			<h6 class="infox">Vidéos : <strong>2</strong></h6>
			<h6 class="infox">Photos : <strong>5</strong></h6>
			<div class="line-separator7"></div>
		</div>	
		<div class="blocks">
		<div class="block" id="lol">
			<div class="block-title">
			<img class="block-img" src="../img/user.png" alt="William">
			   <h6 class="block-name"><strong>William - Gaming |</strong></h6>
			  <h6 class="block-points">Points : <strong> 155</strong></h6>
			  <p class="block-date">Dernière activité : <strong>26/09/2016 à 16:49</strong></p>
			</div>
			<p class="block-bio">Salut tout le monde , je m'appelle William , ou Wistaro pour les gamers , je joues à Minecraft et je développe en Php !</p>
			<div class="line-separator6"></div>
			  <div class="video">
				<iframe class="iframe"  src="https://www.youtube.com/embed/QtE9zUDriWk" frameborder="0" allowfullscreen></iframe>
			  </div>
			<div class="line-separator6"></div>
			<br/>
			   <div class="abouts">
			   	<h6 class="block-name"><strong>William - Gaming |</strong></h6>
			  <h6 class="block-points">Vues : <strong> 155</strong></h6>
			  <p class="block-date">Le <strong>26/09/2016 à 16:49</strong></p>
			  <a href="#" class="block-more">En savoir plus</a>
			   </div>
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
		</div>
	</div>
	<script>document.write('<script src="http://' + (location.host || 'http://127.0.0.1').split(':')[0] + ':35729/livereload.js?snipver=1"></' + 'script>')
	</script>
	<script type="text/javascript">
	var widthall = $('.container').width();
	var width = widthall - 450;
	$(".block").width(width);
	alert(width);

	</script>
</body>
</html>