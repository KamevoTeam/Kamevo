<?php	
require('php/users.class.php');

if(isset($_SESSION['ID'])) $user = new users($_SESSION['ID']); //initialize the user objet 

		//if(isset($_SESSION['ID'])){ header("location: index.php"); }else{  print_r($_SESSION);   } 
		$resp = users::waitForInput($_POST);

		$respIns = users::waitForInputIns($_POST);

		if(substr_count($resp,'maintenant') > 0 ){

			echo "

			<script type=\"text/javascript\"> 
				<!-- 
				var obj = 'window.location.replace(\"index.php\");'; 
				setTimeout(obj,3000); 
								// --> 
				</script>";

		}
?>

	<header class="header">
	 <nav class="menu" id="top"><ul>
	    <a href="#" class="log" id="icon"></a>
	     <a href="#"><li class="logo"> K </li></a><div class="line-separator"></div>
	    <a href="#"><li class="title"> KAMEVO</li></a>
	    <div class="mme">
	    <form class="connect" method="post" acion="">
	      <input type="text" name="pseudo" class="connect-text" placeholder="Pseudonyme" />
	    	<input type="password" name="password" class="connect-text-bis" placeholder="Mot de passe"/>
	       <input type="submit" class="connect-submit" name="go" value=" Se connecter" />
	    <label><?=$resp; ?></label></form></div></ul>
	 </nav></header>