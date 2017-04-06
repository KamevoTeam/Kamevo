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
<div class="messageBoxSpec">
<div class="messager">
<input type="hidden" value="" class="idConv" id="idConv">
 <div class="messager-header">
  <img src="img/Ionic.png" alt="chatter-img" class="messager-img">	
   <h5 class="messager-name">Zelkyo</h5>
   <span class="chatter-closer">X</span>
  </div>
  <div class="messager-messages">

  
</div>

  <form action="" method="" class="messager-sender">
  	<input type="text" name="messenger" class="messager-input" placeholder="Message">
  </form>
</div>

</div>
<script src="js/chatter.js" type="text/javascript"></script>

