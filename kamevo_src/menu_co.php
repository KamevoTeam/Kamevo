	<header class="header">
	 <nav class="menu" id="top">
	  <ul>
	    <a href="#" class="log" id="icon"></a>
	     <a href="#"><li class="logo"> K </li></a><div class="line-separator"></div>
	    <a href="#"><li class="title"> KAMEVO</li></a>

	     <div class="mme">


 			<a class="js" href="deco.php"><li class="link"><i class="fa fa-sign-in" id="icon"></i> Déconnexion</li></a>
	         <a class="js" href="user.php?id=<?php echo $_SESSION['ID']; ?>"><li class="link"><i class="fa fa-user" id="icon"></i> <?php echo $_SESSION['pseudo']; ?></li></a>

	         <a class="js popopen" href="#" rel="popup_name"><li class="link"><i class="fa fa-compass" id="icon"></i> Explorer</li></a>
	        <a class="js" href="."><li class="link"><i class="fa fa-home" id="icon"></i> Accueil</li></a>
	     </div>
	     <li class="link-look"><form class="form" action="" method="post">
	       <input type="search" class="f-input" name="search" placeholder=" Rechercher un profil">
	       <i class="looking fa fa-search" id="icon"></i></form>
	    </li>
	   </ul>
	  </nav>
	 </header>
	<div class="popup-content">
	 <div class="fade-popup"></div>
	  <div class="popup">
	 <h3>Parcourir les catégories <i class="fa fa-compass" id="icon"></i></h3>
	  <a href="technology/" class="nodeco"><div class="category-popup">
	 	Technologie - 3562 personnes
	  </div></a>
	   <a href="Gaming/" class="nodeco"><div class="category-popup">
	 	Gaming - 1253 personnes
	  </div></a>
	   <a href="beauty/" class="nodeco"><div class="category-popup">
	 	Beauté - 3541 personnes
	  </div></a>
	   <a href="making/" class="nodeco"><div class="category-popup">
	 	Bricolage - 451 personnes
	  </div></a>
	   <a href="other/" class="nodeco"><div class="category-popup">
	 	Autres - 784 personnes
	  </div></a>
	</div>
	 </div>