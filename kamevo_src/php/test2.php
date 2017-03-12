<?php


$mess = "Coucou @koko je te remercie pour tes tutoriels! Regarde aussi @Wistaro et @root";

 
function replaceText($matches) { 
    
    include 'co_pdo.php';
    // membre.php?id=[id de l'utilisateur] 
    var_dump($matches); 

    $req = $bdd->prepare('SELECT ID FROM users WHERE pseudo = ?'); 


    $req->execute(array($matches[1])); 
 
    if($req->rowCount() == 1) { 


        $idUtilisateur = $req->fetch()['ID']; 


        return '<a href="membre.php?id='.$idUtilisateur.'">'.$matches[0].'</a>'; 
    }



    return $matches[0]; 
} 
 
$mess = preg_replace_callback('#@([A-Za-z0-9]+)#', 'replaceText', $mess); 
 
echo $mess; 
 
?> 














?>