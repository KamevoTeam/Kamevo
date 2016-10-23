<?php
	if(isset($_POST['submit'])){
		$option = $_POST['options'];
		$no = 'default';
		if($option != $no){
			//ici il faut faire le systême de payment , mais je ne sais pas le faire ^^ 
			//Quand le paiment est est accepté : $sucess = 'true';
			//Dans l'IPN Paypal , on effectue une insertion dans une bdd qui donne la fin de l'abonnement , grace à la fonction time() par exemple ...
		}else{
			$err = 1;
		}
	}
	else{
		
	}

	$err = 1;
	if($err == 1){
		?>
		  <script type="text/javascript">
		 	function(e){
		 		$('#element').addClass("alert5564");
		 	}
		  </script>
		<?php
	}


			//if($err = 2){
			//	echo '
			//<div class="alert1">
			//	<p class="alert-text">ERREUR : Veuillez choisir une valuer pour la durée de votre abonnement !</p>
			//</div>';
			//}elseif(isset($sucess)){ echo '
			//<div class="alert2">
			//	<p class="alert-text">BRAVO : Votre paiement a été accepté , amusez - vous bien ! </p>
			//</div>';
			//}else{ echo '
			//<div class="alert3">
			//	<p class="alert-text">INFOS :un abonnement dure un certaine période, elle commencera au moment ou vous aurez payé , pas de remboursements possibles !</p>
			//</div>';
		//}
?>