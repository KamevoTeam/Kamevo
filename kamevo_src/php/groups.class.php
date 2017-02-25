<?php
	
	class group extends userProfile{


		private $dataForm = array();
		private $fileForm = array();

		public $errorReturn = '';
		private $authorObject; //all infos on the current user in one object :)
		private $creator;

		private $avatar = 'defaultGroupAvatar.png'; //default avatar string
		private $banner = 'defaultGroupBanner.png'; //default avatar string

		private $groupeId;
		private $numberOfPubli = 0;
		private $numberOfMember = 0;
		private $authorOfGroup;

		private $nameOfGroup;






		function __construct($idOfGroup){

			


			 if($idOfGroup > 0) {
			 $this->groupeId = $idOfGroup;
			 $this->initializeGroup();
			}

			

		}



		private function initializeGroup(){

			include 'php/co_pdo.php';

			$req = $bdd->prepare('SELECT * FROM groups WHERE ID = ?');
			$req->execute(array($this->groupeId));
			$rep = $req->fetch();

			$this->authorOfGroup= $rep['author'];
			$this->nameOfGroup= $rep['name'];

			$this->avatar = $rep['avatar'];
			$this->banner = $rep['banner'];

			$this->nbpubli = $rep['nb_publi'];

			$this->numberOfMember = $rep['nb_members'];

			$this->nameOfGroup = $rep['name'];


			$req->closeCursor();


		}

		public function getAuthorGroup(){


			return $this->authorOfGroup;

		}
		public function getAvatarGroup(){


			return 'userDataUpload/picProfileGroup/'.$this->avatar;

		}
		public function getCoverGroup(){


			return 'userDataUpload/picCoverGroup/'.$this->banner;

		}
		public function getNameGroup(){


			return $this->nameOfGroup;

		}
		public function getNbPubliGroup(){


			return $this->nbpubli;

		}
		public function getNbMemberGroup(){


			return $this->numberOfMember;

		}

		public function createNewGroup($author, $dataForm,$fileForm = array()){


			if(sizeof($this->dataForm) == 0){

				$this->dataForm = $dataForm;
				$this->fileForm = $fileForm;
				$this->creator = $author->idUser;
				$this->authorObject = $author;


				$this->checkDatas();





			}else{

				$this->errorReturn = '<h5 class="error-text">NoData</h5>';
			}

		}

		private function checkDatas(){


			include 'php/co_pdo.php';

			if($this->errorReturn == ''){

				if(isset($this->dataForm['nameOfGroup']) && !empty($this->dataForm['nameOfGroup'])){

					if($this->ifGroupExist($this->dataForm['nameOfGroup']) == 'no'){

							if(strlen(htmlspecialchars($this->dataForm['nameOfGroup'])) < 20) {

								$this->nameOfGroup = htmlspecialchars($this->dataForm['nameOfGroup']);

								if(count($this->fileForm) > 0){ //groupe fil upload

									if($this->fileForm['profile']['error'] != 4){ //profilePic

										if($this->fileForm['profile']['error'] == 0){

											$ext_img_auth = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'bmp');
											$ext_file = strtolower(  substr(  strrchr($this->fileForm['profile']['name'], '.')  ,1)  );
											$maxFileSize = 1048000;


											if(in_array($ext_file,$ext_img_auth)){

												if($this->fileForm['profile']['size'] <= $maxFileSize){ 


													$idPic = md5(uniqid(rand(), true)); //génération d'un identifiant unique

													$pathOfPic = 'userDataUpload/picProfileGroup/';
													$finalNameFile = $pathOfPic.$idPic.'.'.$ext_file;
													$this->avatar= $idPic.'.'.$ext_file;

													$movePic = move_uploaded_file($_FILES['profile']['tmp_name'],$finalNameFile);

									


												}else{

													$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Photo de profile tros grosse! Max = '.$maxFileSize.'</h5>';

												}

											}else{

												$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Mauvais format: '.$ext_file.'</h5>';

											}

									}else{

										$this->errorReturn = $this->errorReturn.'<h5 class="error-text">La photo de groupe contient des erreurs!</h5>';

									}
							} //end of profile pic

								if($this->fileForm['cover']['error'] != 4){ //groupe cover

										if($this->fileForm['cover']['error'] == 0){

											$ext_img_auth = array( 'jpg' , 'jpeg' , 'gif' , 'png' , 'bmp');
											$ext_file = strtolower(  substr(  strrchr($this->fileForm['cover']['name'], '.')  ,1)  );
											$maxFileSize = 1048000;


											if(in_array($ext_file,$ext_img_auth)){

												if($this->fileForm['cover']['size'] <= $maxFileSize){ 


													$idPic = md5(uniqid(rand(), true)); //génération d'un identifiant unique

													$pathOfPic = 'userDataUpload/picCoverGroup/';
													$finalNameFile = $pathOfPic.$idPic.'.'.$ext_file;
													$this->banner= $idPic.'.'.$ext_file;

													$movePic = move_uploaded_file($_FILES['cover']['tmp_name'],$finalNameFile);

									


												}else{

													$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Couverture tros grosse! Max = '.$maxFileSize.'</h5>';

												}

											}else{

												$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Mauvais format: '.$ext_file.'</h5>';

											}

									}else{

										$this->errorReturn = $this->errorReturn.'<h5 class="error-text">La couverture contient des erreurs!</h5>';

									}
							} 





						}//end of parsing files

						$this->errorReturn = $this->errorReturn.'<h5 class="error-textOK">Tout est OK</h5>';

						$create = $bdd->prepare('INSERT INTO groups(author, name, avatar, banner) VALUES (?,?,?,?) ');
						$create->execute(array($this->authorObject->idUser, htmlspecialchars($this->nameOfGroup), htmlspecialchars($this->avatar), htmlspecialchars($this->banner)));

						$id_groupe = $bdd->lastInsertId();

						$create->closeCursor();

						date_default_timezone_set ( 'Europe/Paris' );
						$currentDate = date('d/m/Y - H:i 	s\s');

						$req = $bdd->prepare('INSERT INTO groups_members(user, groupId, date, perm) VALUES (?,?,?,?)');
						$req->execute(array($this->authorObject->idUser, $id_groupe, $currentDate,'owner'));
						$req->closeCursor();
						
						echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="group.php?groupId='.$id_groupe.'"</SCRIPT>';


							}else{


								$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Nom trop long, max = 20 </h5>';

							}

					}else{

						$this->errorReturn = $this->errorReturn.'<h5 class="error-text">Le groupe existe déjà! </h5>';


					}
				}


				} //end 

			} //no error end


		

		private function ifGroupExist($name){ //cette propriété peut aussi être statique, à voir. (Wistaro)


			include 'php/co_pdo.php';
			$check = $bdd->prepare('SELECT ID FROM groups WHERE name = ?');
			$check->execute(array($name));
			$nb =  $check->rowCount();
			$check->closeCursor();

			if($nb > 0){

				return 'yes';

			}else{

				return 'no';
			}

		}

}










































?>