<?php
	function getPseudoByID($id_func) {
		include('php/co_pdo.php');
		
		$req1 = $bdd->prepare('SELECT pseudo FROM users WHERE ID = :id');
		$req1->execute(array(
			'id' => $id_func
		));
		while ($results = $req1->fetch()) {
			return $results['pseudo'];
		}
	}
?>