<?php 
    $category = $bdd->query('SELECT * FROM categories');
    $finder = $category->fetch();
?>
<div class="category">
  <h3 class="c-title"><?= $finder['name'] ?></h3>
 <?php 

    $results = $bdd->query('SELECT * FROM users WHERE category = "'.$finder['name'].'"');

    while($cat = $results->fetch()){


      echo '<div class="c-profile">
        <a href="#" class="cp-link">
         <img src="../img/Kamevo-logo.png" alt="profile-image" class="c-avatar">
        <div class="c-details">
         <h5 class="c-name">'.$cat['pseudo'].'</h5>
          <h6 class="c-bio">'.$cat['bio'].'</h6>
         <h6 class="c-points"><b>Points :</b> '.$cat['points'].'</h6>
        </div>
         </a>
       </div>';
    }

?>
</div>