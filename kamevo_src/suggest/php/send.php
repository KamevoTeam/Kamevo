<?php
if (isset($_POST['suggest']) && isset($_SESSION['ID'])) {
	if (strlen($_POST['suggest']) <= 10000 && !empty($_SESSION['ID'])) {
	
$mail = 'suggest@kamevo.com';
$sujet = "suggestion | " . $_SESSION['ID'];
$passage_ligne = "\n";

$header = "From: \"kamevo_website\"<suggest@kamevo.com>".$passage_ligne;
$header.= "Reply-to: \"kamevo_website\" <suggest@kamevo.com>".$passage_ligne;
$header.= "MIME-Version: 1.0".$passage_ligne;
$header.= "Content-Type: multipart/mixed;".$passage_ligne;

  $message = $_POST['suggest'];

  mail($mail,$sujet,$message,$header);
 }
}
}
?>