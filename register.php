<?php
include_once("class/User.php");







?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="assets/css/login.css">
    <title>register</title>
</head>

<body>

    <div class="wrapper">
        <div class="logo">
            <img src="imgs/logo.png" alt="">
        </div>
        <div class="text-center mt-5 name">
            E-PERPUS
            <br>
            <small class="mb-1">(REGISTER)</small>
        </div>
        <form class="p-3 mt-3" method="POST">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="fullname" id="fullname" placeholder="fullname">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="text" name="username" id="userName" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" placeholder="Password">
            </div>
            <button class="btn btn-danger mb-2" name="submit">Register</button>
            <!-- <a href="register.php">
                <button class="btn-regis btn-danger m-0">Daftar sebagai member

                </button>
            </a> -->
            <div class="text-center fs-6">
                <p>Sudah Punya akun? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>

</body>
<?php include_once("partials/script.php"); ?>

</html>
<?php
if (isset($_POST['submit'])) {
    $data = [
        "fullname" => $_POST['fullname'],
        "username" => $_POST['username'],
        "password" => $_POST['password'],
    ];

    $user = new User;
    $submit = $user->createRegis($data);
    echo '<script>
    swal({
        title: "Berhasil registrasi",
        text: "Kamu berhasil membuat akun!",
        icon: "success",
        button: "OKE",
      }) 
      .then(() => {
        window.location.href="login.php"})
      </script> ';
}

?>