<?php
//session_start();
?>
<!DOCTYPE html>
<html>
<head>
<?php
	require ("head.php");
?>
</head>
<?php
	//if(isset($_SESSION['id'])){
?>
<body>
	<div class="container">
		<div class="selection">
		   <h1>ACHETER UN ABONNNEMENT</h1>
			<form class="formed" action="" method="post">
			<input type="text" name="name"  readonly="readonly" value="William" class="name-secure"/><br/>
			<!-- <?php echo $_SESSION['name']; ?> -->
			 <select class="select" name="options">
			 	<option value="default">Choisir une durée</option>
			 	<option value="1">1 mois</option>
			 	<option value="3">3 mois</option>
			 	<option value="6">6 mois</option>
			 	<option value="12">1 an / 12 mois</option>
			 </select><br/>
				<h4 class="inline">TYPE DE PAIEMENT : <b>PAYPAL</b> !</h4>
			 <input type="submit" class="href3 inline" value="Payer" name="submit">
			</form>
			<div class="more" id="element">
			<div class="alert3">
				<p class="alert-text">INFOS  : un abonnement dure un certaine période, elle commencera au moment ou vous aurez payé , pas de remboursements possibles !</p>
			</div>
			</div>
		</div>
	</div>
</body>
<?php
//}
//else{
 ?>
  <body>
   <?php
	//require ("problem.php");
   ?>
  </body>
<?php
// }	
?>
</html>
<?php
	require ("verify.php");
?>