<?php
include_once("class/Login.php");
session_start();

$login = new Login;
$login->lastLogin($_SESSION['id']);

session_destroy();



header("location: Login.php");
