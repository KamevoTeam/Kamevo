<?php
include('header.php');
include('php/func_posts.php');
echo '<br /><br /><br />';
if(!isset($_GET['ID'])){

	$id_post = 1;
}else{

	$id_post = (int)$_GET['ID'];
}
	getPosts('onePost',$id_post);
	
include('commentaires.php');
?>