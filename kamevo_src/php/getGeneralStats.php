<?php


class getGeneralStats{


	function __construct(){



	}

	static public function getUsersIns(){

		require('co_pdo.php');
		$reqGetIns = $bdd->prepare('SELECT * FROM users');
		$reqGetIns->execute();
		return  $reqGetIns->rowCount();

	}

	static public function getUsersOnline(){

		/* require('co_pdo.php');
		$reqGetIns = $bdd->prepare('SELECT * FROM users');
		$reqGetIns->execute();
		return  $reqGetIns->rowCount();
	*/
		return 0;
	}

	static public function getTotalViews(){

		/* require('co_pdo.php');
		$reqGetIns = $bdd->prepare('SELECT * FROM users');
		$reqGetIns->execute();
		return  $reqGetIns->rowCount();
	*/
		return 0;
	}


}