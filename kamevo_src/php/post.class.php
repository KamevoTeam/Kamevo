<?php


class Post{

	private $dataForm = array();
	private $fileForm = array();

	private $text;
	private $catego = 'unclassed';
	private $videoType;
	private $author;
	private $idImg = '';
	private $video = '';



	public $errorReturn = '';




	function __construct($author,$dataForm,$fileForm = array()){

		if(sizeof($this->dataForm) == 0){

			$this->dataForm = $dataForm;
			$this->fileForm = $fileForm;
			$this->author = $author;

		}else{

			$this->errorReturn = '<h5 class="error-text">NoData</h5>';
		}

	}

	public function checkData(){

		
		if($this->errorReturn == ''){

			if(isset($this->dataForm['text'])){

				if(!empty($this->dataForm['text'])){

						
						if($this->checkLink(htmlspecialchars($this->dataForm['video']))){

							//si tout est OK on rempli notre classe
							$this->text = htmlspecialchars($this->dataForm['text']);
							$this->video = htmlspecialchars($this->dataForm['video']);
							$this->catego = htmlspecialchars($this->dataForm['categorie']);


							//$this->errorReturn = '<h5 class="error-text">DataOK</h5>';

							$result = $this->checkFile(); //Vérifions le fichier envoyé
							if($result){

								$this->errorReturn = '<h5 class="error-textOK">Post publié!</h5>';

								$this->saveDataInDb(); //on enregistre dans la base de donnée

							}

							

							
						

						}else{

							$this->errorReturn = '<h5 class="error-text">Erreur dans le lien</h5>';

						}

				}else{

					$this->errorReturn = '<h5 class="error-text">Vous devez saisir du texte</h5>';

				}
			}

		}
		
	}

	private function checkLink($link){

		return TRUE; //pour l'instant pas de vérification

		$pattern = "#(youtube)#i";
		preg_match($pattern, $link);
		
		//$this->errorReturn = '<h5 class="error-text">Mauvais lien</h5>';

	}

	private function checkFile(){

		
	
		if(count($this->fileForm) >= 1){

			if($this->fileForm['picture']['error'] != 4){


				if($this->fileForm['picture']['error'] == 0){

					if(!empty($this->dataForm['video'])){
						$this->errorReturn = '<h5 class="error-text">Vous ne pouvez pas poster une image et une vidéo dans la même publication!</h5>';
						return false;

					}

					$ext_img_auth = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
					$ext_file = strtolower(  substr(  strrchr($this->fileForm['picture']['name'], '.')  ,1)  );
					$maxFileSize = 1048576;


					if(in_array($ext_file,$ext_img_auth)){ // si l'exentention du fichier est OK


						if($this->fileForm['picture']['size'] <= $maxFileSize){ //si le fichier n'est pas trop gros

							$this->errorReturn = '<h5 class="error-text">Fichier OK!</h5>';

							$idPic = md5(uniqid(rand(), true)); //génération d'un identifiant unique

							$pathOfPic = 'userDataUpload/picPost/';
							$finalNameFile = $pathOfPic.$idPic.'.'.$ext_file;
							$this->idImg = $idPic.'.'.$ext_file;

							$movePic = move_uploaded_file($_FILES['picture']['tmp_name'],$finalNameFile);
							return true;


						}else{

							$this->errorReturn = '<h5 class="error-text">Fichier Trop gros!</h5>';
							return false;

						}

						



					}else{

						$this->errorReturn = '<h5 class="error-text">Fichier .'.$ext_file.' non autorisé!</h5>';
						return false;

					}

				}else{


					$this->errorReturn = '<h5 class="error-text">Erreur dans l\'upload!</h5>';
					return false;
				}
			}else{

				return true;
			}

			//if ( in_array($ext_file,$ext_img_auth) ) echo "Extension correcte";

		}else{

			return true;
		}
		





	}
		

	private function saveDataInDb(){

		require('co_pdo.php');

		$mess = $this->text;

		date_default_timezone_set ( 'Europe/Paris' );
		$dateCre = date('d m Y H:i');

		$reqSd = $bdd->prepare('INSERT INTO posts(author,message,datecreation,title,video,image,categorie) VALUES(?,?,?,?,?,?,?)');
		$reqSd->execute(array($this->author, $mess,$dateCre,'No title',$this->video,$this->idImg,$this->catego)) or die('FATAL ERROR: '.print_r($reqSd->errorInfo(), TRUE));;
		$reqSd->closeCursor();
		return;


	}

}

?>