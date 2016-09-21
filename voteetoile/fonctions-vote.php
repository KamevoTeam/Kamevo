<?php
	
	//Variable de connexion BDD
	$nom_du_serveur ="localhost";
	$nom_de_la_base ="youtubheure";
	$nom_utilisateur ="root";
    $passe ="";

    //Fonction pour l'ip
function getIp()
{
	if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
	{
		$ip_vote = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}
	elseif(isset($_SERVER['HTTP_CLIENT_IP']))
	{
		$ip_vote = $_SERVER['HTTP_CLIENT_IP'];
	}
	else
	{
		$ip_vote = $_SERVER['REMOTE_ADDR'];
	}
	return $ip_vote;
}
//Ip utilisateur
$ip_vote = getIp();

$dsn = 'mysql:dbname=youtubheure;host=localhost';
$user = 'root';
$password = '';

try {
    $bdd = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

//Fonction pour la notation
function notation($id_vote,$ip_vote){
	
	//L'utilisateur a t'il déjà voté?
	  $deja_voter = mysql_query("SELECT ip FROM note WHERE ip = '".mysql_real_escape_string($ip_vote)."' AND id_page = '".mysql_real_escape_string($id_vote)."'");



}