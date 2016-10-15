<?php
	function getPseudoByID($id_func) {
		include('php/co_pdo.php');
		$req = $bdd->prepare('SELECT pseudo FROM users WHERE ID = :id');
		$req->execute(array(
			'id' => $id_func
		));
		
		$donnees = $req->fetch();
		return $donnees['pseudo'];
	}
?>