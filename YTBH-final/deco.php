<?php
session_start();
$_SESSION['ID'] == '';
unset($_SESSION);
session_destroy();

header('location: index.php');