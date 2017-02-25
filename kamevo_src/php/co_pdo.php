<?php
$dsn = 'mysql:dbname=kamevobdd;host=localhost';
$user = 'root';
$password = '';

try {
    $bdd = new PDO($dsn, $user, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo 'Connexion échouée : ' . $e->getMessage();
}

?>
