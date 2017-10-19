<!--  STARTING OF  NOTIFICATIONS !-->
<div class="notes-center">
 <div class="center-res">

  <?php
  $user->printNotifs();
  ?>



 </div>
</div>

<!--  STARTING OF  MESSAGES !-->
<div class="message-center">
 <div class="center-res">
 <?php
  $user->printNotifsMp();
  ?>


  
  </div>
 </div>


<script src="js/notes.js" type="text/javascript"></script>
<script src="js/messages.js" type="text/javascript"></script>