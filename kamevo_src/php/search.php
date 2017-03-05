<?php
	session_start();
	include('co_pdo.php');

	/*echo '<a href="#">
	   <div class="result">
	    <img src="img/Ionic.png" alt="" class="result-img">
		 <div class="result-about">
	      <p class="r-about"><strong> Zelkyo - Points :</strong> 985 </p>
		</div>
	  </div>
	  </a>';*/

	  if(isset($_POST['keyword'])){

	  	$keyword = htmlspecialchars($_POST['keyword']);

	  	$req = $bdd->prepare('SELECT * FROM users WHERE pseudo LIKE :searchquery');
	  	$req->execute(array(':searchquery' => '%' . $keyword . '%'));
	  	$num = $req->rowCount();

	  	if($num > 0){

	  		while($rep = $req->fetch()){?>

	  			<a href="user.php?id=<?=$rep['ID']; ?>">
				   <div class="result">
				    <img src="userDataUpload/picProfile/<?=$rep['avatar']; ?>" alt="" class="result-img">
					 <div class="result-about">
				      <p class="r-about"><strong> <?=$rep['pseudo']; ?> - Points :</strong> <?=$rep['points']; ?> </p>
					</div>
				  </div>
	  </a>


	  		<?php }



	  	}else{?>

	  		<a href="#">
			   <div class="result">
			    <img src="img/Ionic.png" alt="" class="result-img" style="visibility:hidden;">
				 <div class="result-about">
			      <p class="r-about"><strong> Aucun résultat</strong> 	 </p>
				</div>
			  </div>
	  </a>
	  		

	  	<?php }
	  	


	  }else{

	  	echo 'oupss!';

	  }














?>