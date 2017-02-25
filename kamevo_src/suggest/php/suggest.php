<?php
if (isset($_SESSION['ID'])) { if (!empty($_SESSION['ID'])) { }else { header('location: ..');}}else{ header('location: ..');}
require('../php/co_pdo.php');
$req = $bdd->prepare('SELECT `suggestOK` FROM `users` WHERE `ID` = :ID');
$req->execute(array( 'ID' => $_SESSION['ID']));
$result = $req->fetch();
if ($result['suggestOK'] == 0 || empty($result['suggestOK'])) {
	$ok = true;
}else{
	
}
?>
<div class="publisher">
 <div class="block-title">
  <img class="block-img" src="../img/user.png" alt="William">
   <h6 class="block-name"><strong>William - Gaming </strong></h6>
   <h6 class="block-points">| Points : <strong> 155</strong></h6>
  <p class="block-date">Dernière activité : <strong>26/09/2016 à 16:49</strong></p>
 </div>
 <div class="text">
  <?php if ($ok == true) {?><form action="" method="post">
  	<textarea name="suggest" class="text-area" placeholder="Votre message ..."></textarea>
  	<input type="submit" name="submit" value="Envoyer" class="btn"><!-- envoyer vers une page XXXX.php avec un texte gene "Merci ! " , je ferai le style plus tard -->
  </form>
		<h6>Merci de nous envoyer vos idées pour nous permettre d'améliorer Kamevo ! Nous espérons que votre message nous sera utile !
  <br/>ATTENTION : Vous ne pouvez envoyer qu'une seule suggestion par compte, faites en bon usage !
		<br />ATTENTION : Votre message doit contenir maximum 10 000 caractères ! (ça fait quand même 2 bons baccalauréat de français ;)</h6>
		<?php }elseif ($ok == false) {?> <h1>Vous avez déjà envoyé votre message de suggestion, vous ne pouvez plus en renvoyer !</h1> <?php } ?>
 </div>
</div>