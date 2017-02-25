<!DOCTYPE html>
<html>
<head>
	<title>Kamevo - Bienvenue</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="DESIGN/menu.css">
    <link rel="stylesheet" href="frameworks/w3.css">
    <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
    <script type="text/javascript" src="frameworks/jquery.min.js"></script>
</head>
<body>
<?php require("menu.php") ?>
	<div class="container-left">
		<img src="img/coding.png" width="100%" alt='logo' class="wannado">
	</div><div class="container-right">
	<h1 class="main-title">Bienvenue sur Kamevo.com</h1>
	<h4>Pour continuer votre navigation , veuillez vous créer un compte :</h4><br />
      <form class="content" method='post' action=''>
      <div class="form-row">
        <input type="text" class="input-text" name="psd_ins" id="input" placeholder="Pseudo" />
         <label class="label-helper" for="input">Pseudo</label>
        </div><div class="form-row" >
         <input type="text" class="input-text" name="name_ins" id="input2" placeholder="Prénom" />
        <label class="label-helper" for="input2">Prénom</label>
      </div><div class="form-row" >
        <input type="date" class="input-text" name="birthdate_ins" id="input-date" value="2000-06-08" />
         <label class="label-helper" for="input-date">Date de naissance</label>
        </div><div class="form-row" >
         <input type="password" class="input-text" name="pass_ins" id="input3" placeholder="Mot de passe" />
        <label class="label-helper" for="input3">Mot de passe</label>
      </div><div class="form-row" >
       <input type="password" class="input-text" name="pass_ins_confirm" id="input4" placeholder="Confirmation" />
        <label class="label-helper" for="input3">Confirmation de votre Mot de passe</label>
        </div><div class="form-row" >
         <input type="email" class="input-text" name="mail_ins" id="input5" placeholder="Adresse E-mail" />
        <label class="label-helper" for="input3">Adresse E-Mail</label>
      </div><div class="form-row" >
         <input type="email" class="input-text" name="mail_ins_confirm" id="input6" placeholder="Confirmation" />
        <label class="label-helper" for="input3">Confirmation de votre Adresse E-Mail</label>
      </div>
       <input type="submit" name="go_ins" class="leto" value="S'inscrire">
      <div class="checkall">
      	<input type="checkbox" name="cgu_ins" id="checks" class="checks">
        <label for="checks">J'ai lu et j'accepte les <a href="#">conditions d'utilisations</a> de Kamevo.com .</label>
      </div>
      <?php echo $respIns;
          /*echo '<pre>';
            print_r($_POST); 
            echo '</pre>';*/ ?>
      </form> <!-- end of the content -->
	</div>
</body>
</html>