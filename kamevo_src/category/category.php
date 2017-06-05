<?php 
    if(isset($_GET['cat'])){
      $category = htmlspecialchars($_GET['cat']);
    }else{
      $category = 'technology';
    }
    $catGetName = $bdd->prepare("SELECT * FROM categories WHERE name = ?");
    $catGetName->execute(array($category));
    $catName = $catGetName->fetch();
?>
<div class="category">
  <h3 class="c-title"><?= utf8_encode($catName['french']) ?></h3>
 <?php 

    $results = $bdd->prepare('SELECT * FROM users WHERE category = ?');
    $results->execute(array($category));
    $countUsers = $results->rowCount();

    if($countUsers == 0){
      echo '<div class="cat_empty">Aucun profil n\'appartient à cette catégorie</div>';
    }else{

    while($cat = $results->fetch()){


      echo '<div class="c-profile">
        <a href="#" class="cp-link">
         <img src="../img/Kamevo-logo.png" alt="profile-image" class="c-avatar">
        <div class="c-details">
         <h5 class="c-name">'.utf8_encode($cat['pseudo']).'</h5>
          <h6 class="c-bio">'.utf8_encode($cat['bio']).'</h6>
         <h6 class="c-points"><b>Points :</b> '.utf8_encode($cat['points']).'</h6>
        </div>
         </a>
       </div>';
    }
  }

?>
</div>