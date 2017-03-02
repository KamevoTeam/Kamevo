<?php
	
	class group extends userProfile{


		private $dataForm = array();
		private $fileForm = array();

		public $errorReturn = '';
		private $authorObject; //all infos on the current user in one object :)
		private $creator;

		private $avatar = 'defaultGroupAvatar.png'; //default avatar string
		private $banner = 'defaultGroupBanner.png'; //default avatar string

		protected $groupeId;
		private $numberOfPubli = 0;
		private $numberOfMember = 0;
		private $authorOfGroup;

		private $nameOfGroup;
		public $perm;






		function __construct($idOfGroup){

			


			 if($idOfGroup > 0) {
			 $this->groupeId = $idOfGroup;
			 $this->initializeGroup();
			}

			

		}

		static public function printGroupFollowed($idOfUser){

			$idOfUser = (int)$idOfUser;

			include 'co_pdo.php';

			$req = $bdd->prepare('SELECT groupId FROM groups_members WHERE user = ?');
			$req->execute(array($idOfUser));

			$nb = $req->rowCount();

			while($rep = $req->fetch()){

				$req2 = $bdd->prepare('SELECT * FROM groups WHERE ID = ?');
				$req2->execute(array($rep['groupId']));
				$rep2 = $req2->fetch();
				?>

				<a href="group.php?groupId=<?=$rep['groupId'] ?>" class="nodeco">
					<div class="group">
						<img class="group-img" src="userDataUpload/picProfileGroup/<?=$rep2['avatar'] ?>" alt="William">
						<h6 class="group-name"><?=$rep2['name'] ?></h6>
					</div>
				</a>



			<?php  $req2->closeCursor(); }

			$req->closeCursor();
		}

		public function drawButton(){

		
			if(self::ifUserInGroup($_SESSION['ID'], $this->groupeId) <> 'no'){

				echo '<a href="leaveGroup.php?group='.$this->groupeId.'" class="group-btn">Quitter le groupe</a>';

			}else{

				echo '<a href="joinGroup.php?group='.$this->groupeId.'" class="group-btn">Rejoindre le groupe</a>';

			}




		}

		private function getPerm(){


			if(self::ifUserInGroup($_SESSION['ID'], $this->groupeId) <> 'no'){

				$this->perm = self::ifUserInGroup($_SESSION['ID'], $this->groupeId);


			}else{


				$this->perm = 'Non-Membre';

			}



		}

		static public function ifUserInGroup($userIdSearch, $idOfGroup){

			include('co_pdo.php');
			

			$userIdConnected = (int)$userIdSearch;

			$req = $bdd->prepare('SELECT ID,perm FROM groups_members WHERE user = ? AND groupId = ?');
			$req->execute(array($userIdConnected, $idOfGroup));

			$nb = $req->rowCount();

			$rep = $req->fetch();

			$req->closeCursor();
			if($nb == 0){

				return 'no';

			}else{

				return $rep['perm'];
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

			self::getNumberOfMember();
			self::getNumberOfPubli();
			self::getPerm();


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

		private function getNumberOfMember(){

			include 'php/co_pdo.php';

			/* update class properties  */
			$req = $bdd->prepare('SELECT ID FROM groups_members WHERE groupId = ?');
			$req->execute(array($this->groupeId));
			$this->numberOfMember = $req->rowCount();
			$req->closeCursor();

			/* update bdd for further processing  */
			$req2 = $bdd->prepare('UPDATE groups SET nb_members = ? WHERE ID = ?');
			$req2->execute(array($this->numberOfMember, $this->groupeId));

			$req2->closeCursor();




		}
		private function getNumberOfPubli(){

			include 'php/co_pdo.php';

			/* update class properties  */
			$req = $bdd->prepare('SELECT ID FROM posts WHERE groupId = ?');
			$req->execute(array($this->groupeId));
			$this->numberOfPubli = $req->rowCount();
			$req->closeCursor();

			/* update bdd for further processing  */
			$req2 = $bdd->prepare('UPDATE groups SET nb_publi = ? WHERE ID = ?');
			$req2->execute(array($this->numberOfPubli, $this->groupeId));

			$req2->closeCursor();




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
						$req->execute(array($this->authorObject->idUser, $id_groupe, $currentDate,'Créateur'));
						$req->closeCursor();
						
						echo '<SCRIPT LANGUAGE="JavaScript">document.location.href="group.php?groupId='.$id_groupe.'&user='.$this->authorObject->idUser.'"</SCRIPT>';


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