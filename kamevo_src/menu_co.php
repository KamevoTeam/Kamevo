	<header class="header">
	 <nav class="menu" id="top">
	  <ul>
	    <a href="#" class="log" id="icon"></a>
	     <a href="#"><li class="logo"> K </li></a><div class="line-separator"></div>
	    <a href="#"><li class="title"> KAMEVO</li></a>

	     <div class="mme">


 			<a class="js" href="deco.php"><li class="link"><i class="fa fa-user-plus" id="icon"></i> Déconnexion</li></a>
	         <a class="js" href="user.php?id=<?php echo $_SESSION['ID']; ?>"><li class="link"><i class="fa fa-sign-in" id="icon"></i> <?php echo $_SESSION['pseudo']; ?></li></a>

	         <a class="js poplight" href="#?w=50%" rel="popup_name"><li class="link"><i class="fa fa-compass" id="icon"></i> Explorer</li></a>
	        <a class="js" href="."><li class="link"><i class="fa fa-home" id="icon"></i> Accueil</li></a>
	     </div>
	     <li class="link-look"><form class="form" action="" method="post">
	       <input type="search" class="f-input" name="search" placeholder=" Rechercher un profil">
	       <i class="looking fa fa-search" id="icon"></i></form>
	    </li>
	  </ul>
	 </nav>
	</header>