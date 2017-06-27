<?php
$dsn = 'mysql:dbname=kamevobdd;host=localhost';
$user = 'root';
$password = '';

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>

<h1 class="notify-title">Centre de notifications</h1>
<p class="notify-description">Si vous ne souhaitez plus recevoir de notifications lorsque l'un de vos abonnements publie quelque chose d'important, Indiquez 'Non' à droite du nom de son nom.</p>
<form action="redirecting.php" method="post">
   <?php 
   $getSubs = $bdd->prepare('SELECT * FROM subs WHERE abonne = ?');
   $getSubs->execute(array($_SESSION['ID']));
   $rows = $getSubs->rowCount();
   $i = 1;

   function getSubName($id){
   	global $bdd;
   	 $userName = $bdd->prepare('SELECT * FROM users WHERE ID = ?');
   	  $userName->execute(array($id));
   	 $userNamed = $userName->fetch();
   	return $userNamed['pseudo'];
   }

   if($rows > 0){
      while($sub = $getSubs->fetch()){
      $i++;

    if($sub['notify'] == 'yes'){
      echo '<div class="row">
           <h3 class="notify-profile-name">'.getSubName($sub['abonnement']).' <span class="lowerfont green">( Vous recevez les notifications )</span></h3>
        <div class="notify-controller">
        <input type="checkbox" value="'.$sub['abonnement'].'" id="'.$i.'" name="notify[]" checked/>
         <label for="'.$i.'"></label>
        </div>
       </div>';
    }else{
      echo '
      <div class="row">
           <h3 class="notify-profile-name">'.getSubName($sub['abonnement']).' <span class="lowerfont red">( Vous ne recevez pas les notifications )</span></h3>
        <div class="notify-controller"><input type="checkbox" value="'.$sub['abonnement'].'" id="'.$i.'" name="notify[]" />
          <label for="'.$i.'"></label>
        </div>
       </div>';
    }
     }

   }else{
    echo "<br/><div align='center'><span align='center'>Vous n'êtes abonné à personne</span></div><br/>";
   }
   ?>
   <input type="submit" name="submit" value="Sauvegarder les modifications" class="notify-save js-button">
</form>
<!-- Modifier le style du :checked, toutes les inputs sont non-checked, mais celles des "yes" ont un style qui fait croire qu'elles sont checked -->