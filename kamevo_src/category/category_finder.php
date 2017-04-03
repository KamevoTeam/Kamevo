<div class="c-finder">
 <ul class="c-finder-ul">
   <?php 
    $category = $bdd->query('SELECT * FROM categories');

   	while($finder = $category->fetch()){

   		$results = $bdd->query('SELECT * FROM users WHERE category = "'.$finder['name'].'"');
   		$num_t = $results->rowCount(); 
   		echo '<a href="index.php?cat='.$finder['name'].'"><li class="c-link actived">'.$finder['name'].'<span class="c-count">'.$num_t.'</span></li></a>';
   	}
   ?>
 </ul>
</div>