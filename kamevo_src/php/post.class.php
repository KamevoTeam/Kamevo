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

		

		$this->sendNotifMention();

		$mess = $this->text;

		date_default_timezone_set ( 'Europe/Paris' );
		$dateCre = date('d/m/Y à H:i');

		if(!isset($this->dataForm['group'])){

			$groupToBdd = 0;

		}else{

			$groupToBdd = (int)$this->dataForm['group'];
		}

		// Notify the subscribers who want to be notified

		if(isset($_POST['notify'])){
			$header = "MIME-Version: 1.0\r\n";
			$header.= 'From:"Kamevo.com"<noreply@kamevo.com>'."\n";
			$header.= 'Content-Type:text/html; charset="utf-8"'."\n";
			$header.= 'Content-Transfer-Encoding: 8bit';

			$getSubs = $bdd->prepare('SELECT * FROM subs WHERE abonnement = ?');
			$getSubs->execute(array($_SESSION['ID']));

			while($sub = $getSubs->fetch()){

				$profile = $bdd->prepare('SELECT * FROM users WHERE ID = ?');
				$profile->execute(array($sub['abonne']));
				$profiler = $profile->fetch();

				$getName = $bdd->prepare('SELECT * FROM users WHERE ID = ?');
				$getName->execute(array($sub['abonnement']));
				$named = $getName->fetch();

				$mailContent = '
					<html>
						<head>
							<meta charset="utf-8"/>
						</head>
						<body align="center">
						   <img src="https://skyfight.be/kamevo-mailing-notify.png" alt="mailing-header" style="width: 100%">
							<h1><span style="color: #e67e22;">'.$named['pseudo'].'</span> a publié du nouveau contenu intéressant !</h1>
						   <div class="mail-post" style="width: 65%; border: solid 1px rgba(0,0,0,0.1); border-bottom: solid 1px rgba(0,0,0,0.2); padding: 15px; padding-top: 0px; text-align: left;">
						   <img src="https://skyfight.be/kameprofile.jpg" alt="profile-img" style="width: 30px; height: 30px; border-radius: 5px; float: left; margin-top: 15px;">
						   	<p><span style="color: #e67e22; float: left; margin-left: 6px;"><b>'.$named['pseudo'].'</b></span><br/><span style="font-size: 11px; color: silver; margin-left: 6px;">'.$dateCre.'</span></p><br/>
							<p style="word-wrap: break-word; margin-top: -25px;">"'.mb_substr($mess,0,400).' ..."</p>
						   </div>
						  <h3>Cliquez <a href="#">ici</a> pour voir cette publication !</h3>
						  <br/><br/><h6>Ce message est un message automatique, merci de ne pas y répondre. Pour vous désinscrire des notifications, rendez-vous sur http://www.kamevo.com, puis dans Centre de notifications, et désactivez y les notifications.</h6>
						</body>
					</html>
				';
				mail($profiler['email'], 'Nouvelle notification de '.$named['pseudo'], $mailContent, $header);
			}

		}

		$reqSd = $bdd->prepare('INSERT INTO posts(author,message,datecreation,title,video,image,categorie,groupId) VALUES(?,?,?,?,?,?,?,?)');
		$reqSd->execute(array($this->author, $mess,$dateCre,'No title',$this->video,$this->idImg,$this->catego, $groupToBdd)) or die('FATAL ERROR: '.print_r($reqSd->errorInfo(), TRUE));;
		$reqSd->closeCursor();
		return;

	}

	private function sendNotifMention(){

		$mess = $this->text;


 
		$this->text = preg_replace_callback('#@([A-Za-z0-9]+)#', 'Post::replaceText', $mess); 
 	
 



	}

	static public function replaceText($matches) { 
    
	    include 'co_pdo.php';

	    $req = $bdd->prepare('SELECT ID FROM users WHERE pseudo = ?'); 


	    $req->execute(array($matches[1])); 
	 
	    if($req->rowCount() == 1) { 


	        $idUtilisateur = $req->fetch()['ID']; 

	        /*get the future ID of the publication
	
			
				May it can be false in case of high amount of posts in the same time :)
				(Wistaro)s
	        */

	        $azer = $bdd->query('SELECT ID FROM posts ORDER BY ID desc LIMIT 1');
	        $rep = $azer->fetch();
	        $newId = $rep['ID'] + 1;
	        $azer->closeCursor(); 


	        $notif = $bdd->prepare('INSERT INTO notifs(destinataire, message, ack) VALUES (?, ?, ?)');
	        $notif->execute(array($idUtilisateur, 'Vous avez été mentionné dans <a href="details.php?idpost='.$newId.'">une publication</a>', 'unread'));
	        $notif->closeCursor();


	        return '<a href="user.php?id='.$idUtilisateur.'" class="post-mention">@'.$matches[1].'</a>'; 
	    }



	    return $matches[0]; 
	} 

}

?>