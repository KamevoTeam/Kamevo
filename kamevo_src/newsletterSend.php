<?php session_start(); 

require('php/users.class.php');
require('php/co_pdo.php');

  if(!isset($_SESSION['ID'])){
      header('location:index.php?return=settingsErrorAccess');
        
      if (getGrade($_SESSION['ID']) != 'fondateur') {
          header('location:index.php?return=restrictedAccess');
      }
  }else{
    $user = new users($_SESSION['ID']); //initialize the user objet 
  }

  ?>


<?php
$file = fopen('newsletter/mail.txt', 'r');
$message = fgets($file);
fclose($file);

    if (isset($_POST['destinataires']) && isset($_POST['object'])) {
        if (!empty($_POST['destinataires']) && !empty($_POST['object'])) {
            
            if ($_POST['destinataires'] == 'all') {
                $req = $bdd->query('SELECT email FROM users');
                
                $to = '';
                while ($response = $req->fetch()) {
                    $to = $response['email'];
                    $subject = $_POST['object'];
                    
                    mail($to, $subject, $message);
                }
            } elseif ($_POST['destinataires'] == 'newsletter') {
                $req = $bdd->query('SELECT email FROM users WHERE newsSubscriber = 1');
                
                $to = '';
                while ($response = $req->fetch()) {
                    $to = $response['email'];
                    $subject = $_POST['object'];
                    
                    mail($to, $subject, $message);
                }
            } else {
                if (isset($_POST['id'])) {
                    if (!empty($_POST['id'])) {
                        if ($_POST['destinataires'] == 'One') {
                            $req = $bdd->prepare('SELECT email FROM users WHERE ID = :id');
                            $req->execute(array(
                                'id' => $_POST['id']
                                ));
                            
                            $response = $req->fetch();
                            $to = $response['email'];
                            $subject = $_POST['object'];
                            
                            mail($to, $subject, $message);
                        }
                    }
                }
            }
            
        } else {
            echo '<script>
                window.onload = alert("Merci de remplir tous les champs marqués d\'une asterisque");
            </script>';
        }
    }

?>


<html>
<head>
 <meta charset="UTF-8">
  <link rel="stylesheet" href="css/menu_co.css">
  <link rel="stylesheet" href="css/notes.css">
   <link rel="stylesheet" href="css/popup.css">
  <link rel="stylesheet" href="frameworks/w3.css">
   <link rel="stylesheet" href="newsletter/css/style.max.css">
  <link rel="stylesheet" href="newsletter/css/newsletter.css">
    <link href="https://fonts.googleapis.com/css?family=Baloo" rel="stylesheet">
   <link rel="stylesheet" href="frameworks/font-awesome/css/font-awesome.min.css">
  <script type="text/javascript" src="frameworks/jquery.min.js"></script>
 <title>Kamevo - Newsletter</title>
</head>
<body>
 <?php require("menu_co.php"); ?>
  <div class="container">
      <form method="post" action="newsletterSend.php"><br /><br /><br />
        <p>Destinataires* :
             <select name="destinataires" id='destinataires'>
                  <option value="all">Tous</option>
                  <option value="newsletter">abonnés à la newsletter</option>
                  <option value="One">Une personne</option>
             </select>
            <br /><br />
            id :
                <input type="number" name='id' id='id' placeholder=''/>
            
            
            <br /><br />
            <label for='object'>Objet* : </label><input type='text' name='object' id='object' />
             <input type="submit" value="Go" title="valider pour aller à la page sélectionnée" />

        </p>
    </form>

  </div>
  <script src="js/explore.js"></script>
</body>
</html>