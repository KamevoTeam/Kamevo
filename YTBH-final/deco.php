<?php
session_start();
$_SESSION['pseudo'] == '';
unset($_SESSION);
session_destroy();

header('location: index.php');