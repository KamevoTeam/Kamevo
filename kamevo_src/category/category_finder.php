<div class="c-finder">
 <ul class="c-finder-ul">
   <?php 
    $category = $bdd->prepare('SELECT * FROM categories');
    $category->execute();

   	while($finder = $category->fetch()){

   		$results = $bdd->prepare('SELECT * FROM users WHERE category = ?');
   		$results->execute(array($finder['name']));
   		$num_t = $results->rowCount(); 
   		echo '<a href="index.php?cat='.$finder['name'].'"><li class="c-link actived">'.utf8_encode($finder['french']).'<span class="c-count">'.$num_t.'</span></li></a>';
   	}
   ?>
 </ul>
</div>