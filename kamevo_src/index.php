<?php 
session_start(); //primary include !
if(isset($_SESSION['ID'])){ 

  require('index_co.php'); //load index co


}else{

  require('form_ins_index.php'); //load registery form

}

?>