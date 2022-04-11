<?php

session_start();
unset($_SESSION['user']['id']);
unset($_SESSION['user']['name']);
unset($_SESSION['user']);
$_SESSION = array();
session_destroy(); 
header("location: index.php");

?>