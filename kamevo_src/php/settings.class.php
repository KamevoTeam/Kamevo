<?php

	class settingsControl{

		private $dataForm = array();
		private $fileForm = array();

		public $errorReturn = '';
		private $authorObject; //all infos on the current user in one object :)

		public $numberOfError;

		public $debug = 'debug';

		private $id_avatar;
		private $id_banner;


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

				if(count($this->fileForm) > 0){

					if($this->fileForm['profile']['error'] != 4){

						if($this->fileForm['profile']['error'] == 0){

							$ext_img_auth = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
							$ext_file = strtolower(  substr(  strrchr($this->fileForm['profile']['name'], '.')  ,1)  );
							$maxFileSize = 1048000;


								if(in_array($ext_file,$ext_img_auth)){

									if($this->fileForm['profile']['size'] <= $maxFileSize){ 

										$this->errorReturn = $this->errorReturn.'<h5 class="error-textOK">Photo de profil uploadée avec succès!</h5>';


										$idPic = md5(uniqid(rand(), true)); //génération d'un identifiant unique

										$pathOfPic = 'userDataUpload/picProfile/';
										$finalNameFile = $pathOfPic.$idPic.'.'.$ext_file;
										$this->id_avatar= $idPic.'.'.$ext_file;

										$movePic = move_uploaded_file($_FILES['profile']['tmp_name'],$finalNameFile);

										if($this->authorObject->avatar != 'defaultAvatar.png') unlink($pathOfPic.$this->authorObject->avatar);
										
										$majAv = $bdd->prepare('UPDATE users SET avatar = ? WHERE ID = ?');
										$majAv->execute(array($this->id_avatar,$this->authorObject->idUser));
										$majAv->closeCursor();

										if($this->authorObject->avatar != 'defaultAvatar.png') unlink($pathOfPic.$this->authorObject->avatar);


									}else{

										$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Photo de profile tros grosse! Max = '.$maxFileSize.'</h5>';

									}

								}else{

									$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Mauvais format: '.$ext_file.'</h5>';

								}

						}else{

							$this->errorReturn = $this->errorReturn.'<h5 class="error-text">La photo de profil contient des erreurs!</h5>';

						}
					} //end of profile pic
					if($this->fileForm['cover']['error'] != 4){

						if($this->fileForm['cover']['error'] == 0){

							$ext_img_auth = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
							$ext_file = strtolower(  substr(  strrchr($this->fileForm['cover']['name'], '.')  ,1)  );
							$maxFileSize = 1048000;


								if(in_array($ext_file,$ext_img_auth)){

									if($this->fileForm['cover']['size'] <= $maxFileSize){ 

										$this->errorReturn = $this->errorReturn.'<h5 class="error-textOK">Photo de couverture uploadée avec succès!</h5>';


										$idPic = md5(uniqid(rand(), true)); //génération d'un identifiant unique

										$pathOfPic = 'userDataUpload/picCover/';
										$finalNameFile = $pathOfPic.$idPic.'.'.$ext_file;
										$this->id_banner= $idPic.'.'.$ext_file;

										$movePic = move_uploaded_file($_FILES['cover']['tmp_name'],$finalNameFile);

										$majBan = $bdd->prepare('UPDATE users SET banner = ? WHERE ID = ?');
										$majBan->execute(array($this->id_banner,$this->authorObject->idUser));
										$majBan->closeCursor();


									}else{

										$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Photo de couverture tros grosse! Max = '.$maxFileSize.'</h5>';

									}

								}else{

									$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Mauvais format: '.$ext_file.'</h5>';

								}

						}else{

							$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Le fichier contient des erreurs!</h5>';

						}
					} //end of profile cover


				} //end of file parsingz

			}
		}

	} //end of checkData





} //end of class




?>