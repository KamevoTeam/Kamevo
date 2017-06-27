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
 	<link rel="icon" type="image/x-icon" href="img/kamico.ico" />
	<title>Kamevo.com - Redirecting</title>
	<link rel="stylesheet" href="css/menu_co.css">
	<link rel="stylesheet" href="css/notes.css">
	<link rel="stylesheet" href="css/popup.css">
	<link rel="stylesheet" href="css/style.max.css">
	<link rel="stylesheet" href="notifications/css/notify.css">
	<!--  LOADING FRAMWORKS   !-->
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/7.0.0/normalize.css">
</head>
<body>
<?php require('menu_co.php'); ?>
	<div class="container">
	 <h1>Vos modifications sont en cours de traitement</h1>
	  <h3>Vous serez redirigé d'ici quelques secondes, une fois vos modifications enregistrées</h3>
	  <h1 class="triple-points"><span>.</span><span>.</span><span>.</span></h1>
	</div>
<?php 

	$dsn = 'mysql:dbname=kamevobdd;host=localhost';
	$user = 'root';
	$password = '';

	try {
	    $bdd = new PDO($dsn, $user, $password);
	    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch (PDOException $e) {
	    echo 'Connexion échouée : ' . $e->getMessage();
	}

	if(isset($_POST['submit'])){
		$positive = "yes";
		$negative = "no";
		$update = $bdd->prepare('UPDATE subs SET notify = ? WHERE abonne = ?');
		$update->execute(array($negative, $_SESSION['ID']));

		if(isset($_POST['notify'])){
			$count = count($_POST['notify']);

			for($i=0; $i<$count; $i++){
				$positive = "yes";
				$negative = "no";
				$final = $bdd->prepare('UPDATE subs SET notify = ? WHERE abonne = ? AND abonnement = ?');
				$final->execute(array($positive, $_SESSION['ID'], $_POST['notify'][$i]));
			}
		}

	}

?>
<script>
	setTimeout(function() {
	    window.location.replace('notifications.php'); 
	 }, 2500);
</script>
<script src="js/explore.js"></script>
</body>
</html>