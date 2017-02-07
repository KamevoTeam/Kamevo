<?php

	class settingsControl{

		private $dataForm = array();
		private $fileForm = array();

		public $errorReturn = '';
		private $authorObject; //all infos on the current user in one object :)

		public $numberOfError;

		public $debug = 'debug';


		function __construct($author,$dataForm,$fileForm = array()){

		if(sizeof($this->dataForm) == 0){

			$this->dataForm = $dataForm;
			$this->fileForm = $fileForm;
			$this->author = $author->idUser;
			$this->authorObject = $author;

			$this->numberOfError = 0;

		}else{

			$this->errorReturn = '<h5 class="error-text">NoData</h5>';
		}

	}



	public function checkData(){

		include 'php/co_pdo.php';

		if($this->errorReturn == ''){

			if(isset($this->dataForm['submit']) &&  ($this->dataForm['submit'] == 'Enregistrer')){

				if(isset($this->dataForm['prenom']) && !empty($this->dataForm['prenom'])){

					if(htmlspecialchars($this->dataForm['prenom']) != $this->authorObject->name){

						if(strlen(htmlspecialchars($this->dataForm['prenom'])) < 15) {


								$majPre = $bdd->prepare('UPDATE users SET Nom = ? WHERE ID = ?');
								$majPre->execute(array(htmlspecialchars($this->dataForm['prenom']),$this->authorObject->idUser));
								$majPre->closeCursor();

								$this->errorReturn = $this->errorReturn.'<h5 class="error-textOK">Prénom mis à jour avec succès! </h5>';

								

						}else{

							$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Le prénom est trop grand (max = 15) </h5>';
							

						}


					}else{

						$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Le prénom est identique	</h5>';
						

					}


				}

				if(isset($this->dataForm['pseudo']) && !empty($this->dataForm['pseudo'])){



					if(htmlspecialchars($this->dataForm['pseudo']) != $this->authorObject->pseudo){

						if(strlen(htmlspecialchars($this->dataForm['pseudo'])) < 15) {

								$majPre = $bdd->prepare('UPDATE users SET pseudo = ? WHERE ID = ?');
								$majPre->execute(array(htmlspecialchars($this->dataForm['pseudo']),$this->authorObject->idUser));
								$majPre->closeCursor();

								$this->errorReturn = $this->errorReturn.'<h5 class="error-textOK">Pseudo mis à jour avec succès! </h5>';


						}else{

							$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Le pseudo est trop grand (max = 15) </h5>';
							


						}




					}else{

						$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Le pseudo est identique	</h5>';
						


					}





				}

			}
		}

	} //end of checkData





} //end of class




?>