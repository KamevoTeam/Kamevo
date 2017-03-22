<?php

include('mp.class.php');
$mpBox = new mpClass($user);
?>

<div class="chat">
 <div class="chat-header">
  <h4 class="chat-title">Messagerie</h4>	
 </div>

  <div class="chatbox">

  <?php $mpBox->displayUserFollowed(); ?>

 </div>
</div>
<div class="messager">
 <div class="messager-header">
  <img src="img/Ionic.png" alt="chatter-img" class="messager-img">	
   <h5 class="messager-name">Zelkyo</h5>
   <span class="chatter-closer">X</span>
  </div>
  <div class="messager-messages">
  	<div class="a-message">
  		<p class="msg-l">Salut !</p>
  	</div>
  	<div class="my-message">
  		<p class="msg-r">Salut !</p>
  	</div>
  	<div class="a-message">
  		<p class="msg-l">Ca va ?</p>
  	</div>
  	<div class="my-message">
  		<p class="msg-r">Bien et toi ?</p>
  	</div>
  	<div class="a-message">
  		<p class="msg-l">Super ! Pas mal hein Kamevo ?</p>
  	</div>
  	<div class="my-message">
  		<p class="msg-r">Pas mal du tout ! J'adore le concept ! Franchement c'est génial ce truc</p>
  	</div>
  	<div class="a-message">
  		<p class="msg-l">J'avoue que c'est du lourd !</p>
  	</div>
  	<div class="my-message">
  		<p class="msg-r">Les développeurs doivent être trop fort ;)</p>
  	</div>
  	<div class="a-message">
  		<p class="msg-l">Je rêve d'arriver à coder un truc pareil !</p>
  	</div>
  	<div class="my-message">
  		<p class="msg-r">J'avoue ! Viens on va sur openclassroom.com et on commence la programmation ?</p>
  	</div>
  	<div class="a-message">
  		<p class="msg-l">Super idée !</p>
  	</div>
  	<div class="my-message">
  		<p class="msg-r">On y va !</p>
  	</div>
  </div>
  <form action="" method="" class="messager-sender">
  	<input type="text" name="messenger" class="messager-input" placeholder="Message">
  </form>
</div>
<script src="js/chatter.js" type="text/javascript"></script>

