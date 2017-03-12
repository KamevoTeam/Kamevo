	<header class="header">
	 <nav class="menu" id="top">
	 <div class="menu-box-gl">
	  <ul>
	    <a href="index.php" class="log" id="icon"></a>
	     <a href="index.php"><li class="logo"><img src="img/kamelogo.png" class="kamelogo" alt="logo"></li></a><!-- <div class="line-separator"></div> -->
	    <a href="index.php"><li class="title"> KAMEVO</li></a>

	     <div class="mme">
	         <a class="js" href="deco.php"><li class="link"><i class="fa fa-sign-out" id="icon"></i> Déconnexion</li></a>
	         <a class="js popopen" href="#"><li class="link"><i class="fa fa-compass" id="icon"></i> Explorer</li></a>
			  <a class="" href="user.php?id=<?php echo $_SESSION['ID']; ?>"><li class="linkz"><div class="notes-block">
				 <div class="profile-note">
				 <img src="img/Ionic.png" alt="profile" class="profile-note">
				 </div>
				</div>
			  </div></li></a>
	        <a class="" href="#"><li class="linkz"><div class="notes-block">
				<div class="note">
				 <div class="notif">
				  <img src="img/alarm.png" alt="notif" class="note-img">
				  <span class="not-value">5</span>
				 </div>
				</div>
				<div class="note">
				 <div class="message">
				  <img src="img/message.png" alt="message" class="note-img">
				  <span class="mes-value">1</span>
				 </div>
				</div>
			  </div></li></a>
	     </div>
	     <li class="link-look"><form class="form" action="" method="post">
	       <input type="search" id="search" class="f-input" name="search" placeholder=" Rechercher un profil">
	       <i class="looking fa fa-search" id="icon"></i></form>
	    </li>
	   </ul>
	 	
	 </div>
	  </nav>
	 </header>

<div class="results"> 


</div>
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
	 <?php require("php/notes.php"); ?>
	 <script src="js/ajax.js" type="text/javascript"></script>
	 <script src="js/search.js" type="text/javascript"></script>