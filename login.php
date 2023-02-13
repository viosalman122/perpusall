<?php
include_once("class/Login.php");
include_once("class/User.php");

session_start();

$user = new User;

if (isset($_SESSION['id'])) {
    $data_user = $user->find($_SESSION['id']);


    if ($data_user['role'] == 'admin') {
        header("location: page/admin/index.php");
    } elseif ($data_user['role'] == 'user') {
        header("Location: page/user/index.php");
    }
}

// INSTANSIASI LOGIN
$login = new Login;
if (isset($_POST['submit'])) {
    $login->authLogin(
        [
            "username" => $_POST['username'],
            "password" => $_POST['password'],
        ]
    );
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/login.css">
    <title>Login </title>
</head>

<body>


    <div class="wrapper">
        <div class="logo">
            <img src="imgs/logo.png" alt="">
        </div>
        <div class="text-center mt-5 name">
            E-PERPUS
        </div>
        <form class="p-3 mt-3" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn btn-danger mb-2" name="submit">Login</button>
            <!-- <a href="register.php">
                <button class="btn-regis btn-danger m-0">Daftar sebagai member

                </button>
            </a> -->
        </form>
        <div class="text-center fs-6">
            <a href="register.php">Daftar Sebagai Member?</a>
        </div>
    </div>

</html>