<!DOCTYPE html>
<html>
<head>
<title>Kamevo | shop</title>
 <meta charset="utf-8">
  <link rel="stylesheet" href="css/menu.css">
   <link rel="stylesheet" href="../details/css/line-separator.css">
  <link rel="stylesheet" href="css/style.max.css">
   <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
 <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<?php require("menu.php"); 
	 require("addons.php") ?>
	<div class="container">
		<div class="shop">
		 <div class="verif visible">
		  <h1 class="super-title">Vérifcation de vos informations</h1><br/><br/>
		<input type="text" readonly="readonly" value="Axel" class="name-input"><!-- Remplace  value par with first name -->
		 <input type="text" readonly="readonly" value="axel@skyfight.be" class="mail-input"><!-- Remplace value with e-mail adress -->
		  <button class="pay-btn confirm">Confirmer</button><br/><br/>
		 </div>
	     <div class="choose invisible">
		 <h1 class="super-title">Choix de l'offre</h1><br/>
	      <select class="select">
	       <option>Choisir une offre</option>
	        <option>URL personnalisée - 1€</option>
	       <option>Membre prenium - 5€</option>
	     </select>
	     	<button class="pay-btn choosen">J'ai choisi</button><br/>
	     	 <h3>Nos différents offres :</h3><ul>
	     	 <li>URL personnalisée ; pour que les utilisateurs vous trouvent <br/> plus facilement :<br/>
	     	  <h4>Exemple</h4> <img src="example.png" class="example"></li>
	     	 <li>Membre Prenium ; vous obtenez alors le statut de membre Prenium <br />ce qui vous donne : <br/> <ol>
	     	  <li>La possiblité de créer une URL personnalisée</li>
	     	   <li>Une étiquette Prenium à côté de votre nom</li>
	     	  <li>La possiblité de créer un tchat de groupe</li>
	     	 <li>Le droit de modifier le fond d'écran de votre page de profil </li>
	     	</ol></li></ul></div>
	      <div class="pay invisible">
	      	<h1 class="super-title">Mode de paiement</h1><br/>
	      <select class="select">
	       <option>Choisir un mode de paiement</option>
	        <option>Paypal</option>
	       <option>Bitcoins</option>
	     </select>
	     	<button class="pay-btn">Payer</button><!-- PHP : first verify if user has already paied . Else , simply reload page -->
	     	 <h6>Aucune possibilité de remboursement . Toutes nos offres sont <br />garranties à vie . Tous les fonds récoltés sont utilisés à améliorer Kamevo . <br />
	     	<b>Merci d'avance !</b></h6>
	      </div>
		</div>
	</div>
   <script src="js/index.js"></script>
</body>
</html>