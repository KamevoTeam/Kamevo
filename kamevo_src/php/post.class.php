<?php


class Post{

	private $dataForm = array();
	private $fileForm = array();

	private $text;
	private $catego;
	private $videoType;




	public $errorReturn = '';




	function __construct($dataForm,$fileForm = array()){

		if(sizeof($this->dataForm) == 0){

			$this->dataForm = $dataForm;
			$this->fileForm = $fileForm;

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

							$this->checkFile(); //Vérifions le fichier envoyé

							

							
						

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

		return TRUE;

		$pattern = "#(youtube)#i";
		preg_match($pattern, $link);
		
		//$this->errorReturn = '<h5 class="error-text">Mauvais lien</h5>';

	}

	private function checkFile(){

		$return  = FALSE;
	
		if(count($this->fileForm) >= 1){

			if($this->fileForm['picture']['error'] != 4){

				if($this->fileForm['picture']['error'] == 0){

					$ext_img_auth = array( 'jpg' , 'jpeg' , 'gif' , 'png' );
					$ext_file = strtolower(  substr(  strrchr($this->fileForm['picture']['name'], '.')  ,1)  );
					$maxFileSize = 1048576;


					if(in_array($ext_file,$ext_img_auth)){


						if($this->fileForm['picture']['size'] <= $maxFileSize){

							$this->errorReturn = '<h5 class="error-text">Fichier OK!</h5>';

							$idPic = md5(uniqid(rand(), true));
							$pathOfPic = 'userDataUpload/picPost/';
							$finalNameFile = $pathOfPic.$idPic.'.'.$ext_file;

							$movePic = move_uploaded_file($_FILES['picture']['tmp_name'],$finalNameFile);


						}else{

							$this->errorReturn = '<h5 class="error-text">Fichier Trop gros!</h5>';

						}

						



					}else{

						$this->errorReturn = '<h5 class="error-text">Fichier .'.$ext_file.' non autorisé!</h5>';

					}
				}else{


					$this->errorReturn = '<h5 class="error-text">Erreur dans l\'upload!</h5>';
				}
			}

			//if ( in_array($ext_file,$ext_img_auth) ) echo "Extension correcte";

		}
		





	}
		

}

?>