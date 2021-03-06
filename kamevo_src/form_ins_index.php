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
<div class="container">
  <h1 class="main-title">Bienvenue sur <span class="orange uppercase">Kamevo.com</span></h1>
   <h6>Pour continuer votre navigation , veuillez vous créer un compte :</h6><br />
      <form class="content" method='post' action=''>
      <div class="form-row">
        <input type="text" class="input-text i-dib" name="psd_ins" id="input" placeholder="Pseudo" />
         <label class="label-helper" for="input">Pseudo</label>
        </div><div class="form-row" >
         <input type="text" class="input-text i-dib" name="name_ins" id="input2" placeholder="Prénom" />
        <label class="label-helper" for="input2">Prénom</label>
      </div><div class="form-row" >
        <input type="date" class="input-text i-dib" name="birthdate_ins" id="input-date" value="2000-06-08" />
         <label class="label-helper" for="input-date">Date de naissance</label>
        </div><div class="form-row">
        <select name="category">
          <option disabled>----------------------------------------------</option>
          <option value="no" default>Choisir une catégorie</option>
          <option disabled>----------------------------------------------</option>
          <option value="technology">Technologie</option>
          <option value="gaming">Gaming</option>
          <option value="beauty">Beauté & Lifestyle</option>
          <option value="make">Bricolage</option>
          <option value="other">Autre chose ...</option>
        </select>
        </div><div class="form-row" >
         <input type="password" class="input-text i-dib" name="pass_ins" id="input3" placeholder="Mot de passe" />
        <label class="label-helper" for="input3">Mot de passe</label>
      </div><div class="form-row" >
       <input type="password" class="input-text i-dib" name="pass_ins_confirm" id="input4" placeholder="Confirmation" />
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
</form>
  </div>
 </div>
</body>
</html>