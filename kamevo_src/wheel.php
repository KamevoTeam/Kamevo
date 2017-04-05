<?php
session_start();
	include('php/userProfile.class.php');
	include('php/userHome.class.php');
	include('php/users.class.php');

	$user = new users($_SESSION['ID']);
	$home = new userHome(htmlspecialchars($_SESSION['ID']));
	$home->initializeHome();
?>
<html>
<head>
	<meta charset="UTF-8">
	<title>Kamevo - Roulette</title>
	<link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <!-- <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet"> -->
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>
    <link rel="stylesheet" href="frameworks/w3.css">
	<link rel="stylesheet" href="css/menu_co.css">
	<link rel="stylesheet" href="css/notes.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" href="roulette/css/style.max.css">
</head>
<body>
<?php 
	require("menu_co.php");
?>
<div class="container">
 <div class="roulette">
  <h2 class="r-title">Bienvenue sur la roulette des profils de <span class="orange uppercase">Kamevo.com</span></h2>
   <p class="r-desc">La roulette de <span class="orange">Kamevo</span> vous permet de trouver aléatoirement des profils aux mêmes centres d'intérêt que vous.<br/>Et qui sait , peut être faire de belles rencontres parmi la communauté ...</p>
   <p class="r-desc">Vous faites partie de la catégorie <span class="orange">Technologie</span> , la roulette va donc rechercher dans ce sens .</p>
     <br/><a href="#" class="r-btn">Faire tourner la roulette</a>
    <div class="slider">
	 <div class="slides">

		<!-- Auto-generated images -->
	  <?php 
	require("php/co_pdo.php");
	$slide = $bdd->query("SELECT * FROM users");
	$max = $slide->rowCount();
	$mw = $max - 8;
	$w = 120 * $max;
	$width = 120 * $mw;
	$random = rand(1 , $max); // Choosing a random profile

	while($show = $slide->fetch()){
		echo '<div class="slide"><img src="img/'.$show['avatar'].'" alt="slided-image"></div>';
	}


	?>

	<style>
		.slider {
			width: 700px;
			height: 120px;
			overflow: hidden;
			margin: 25px auto;
			border: solid #e67e22 2px;
			opacity: 0.5;
			transition: all ease 1s;
		}
		.omax{
			opacity: 1;
		}
		.slides {
			width: <?= $w ?>;
		}
		.slided{
			transform: translateX(-<?= $width ?>px);
			animation: glisse 3s;
		    animation-timing-function: ease;
		    -webkit-animation-timing-function: ease;
		}
		.slide {
			float: left;
		}
		.slide img{
			width: 120px;
			height: 120px;
		}
		@keyframes glisse {
			0% {
				transform: translateX(0);
			}
			100% {
				transform: translateX(-<?= $width ?>px);
			}
		}
		.slider-founded{
			width: 300px;
			height: 300px;
		}
		.r-result{
			margin: auto;
			width: 800px;
			opacity: 0;
		}
		.r-resulted{
			animation: wait 3s;
			opacity: 1;
		}
		@keyframes wait{
			0%{ opacity: 0;}
			80%{ opacity: 0; }
		}
	</style>

		<!-- End of content . -->

	 </div>
	</div>
	<div class="r-result">
	<?php 

	$results = $bdd->query("SELECT * FROM users WHERE id = ".$random);
	
	while($result = $results->fetch()){
		echo '<h3>Voici le profil de <span class="orange">'.$result['pseudo'].'</span><br/>Nous espèrons qu\'il te plaira !</h3>';
		echo '<img src="img/'.$result['avatar'].'" alt="slided-image" class="slider-founded"><br/><br/><br/>';
		echo '<a href="wheel.php" class="refresh"><i class="fblue fa fa-refresh" id="icon"></i> Recommencer </a>';
	}
	
	?>
	</div>
 </div>
</div>
<script src="roulette/js/slide.js"></script>
</body>
</html>