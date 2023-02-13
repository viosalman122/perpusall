<?php
include_once("../../class/User.php");
session_start();



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../../partials/links.php"); ?>
    <title>profil</title>
</head>

<body>
    <?php include_once("../../partials/sidebar_user.php"); ?>

    <!-- ==== BIG TITTLES starts === -->
    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> PROFIL SAYA</i>
        </div>

        <!-- ==== ALLERTS starts === -->
        <div class="alert">
            <span class="alert-logo">
                <ion-icon name="alert-circle"></ion-icon>
            </span>
            <span>Selamat Datang <B><?= $data_user["fullname"] ?> | <?= $data_user["role"] ?> </B> di E - PERPUS SMKN 64 JAKARTA
            </span>
        </div>
        <!-- ==== ALLERTS ends === -->

        <!-- ==== CARD PLATE starts === -->
        <div class="card">
            <h5 class="card-header fs-2">
                <button class="btn btn-success"><svg xmlns="http://www.w3.org/2000/svg" width="31" height="31" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg></button>
                Edit Profil
            </h5>

            <!-- ==== PROFILE CARD starts === -->
            <div class="container-xl px-4 mt-4">
                <hr class="mt-0 mb-4">
                <div class="row">
                    <div class="col-xl-4">
                        <!-- form-->
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="card mb-4 mb-xl-0">
                                <div class="card-header"><b>Profile Picture</b></div>
                                <div class="card-body text-center">

                                    <!-- PP IMAGE VIEW -->
                                    <img class=" shadow-lg img-account-profile rounded-circle img-thumbnail mb-2" src="<?= $data_user["foto"] ?>" width="200" alt="">

                                    <!-- CAPTION IMAGE -->
                                    <h3><?= $data_user["fullname"] ?></h3>
                                    <p><?= $data_user["role"] ?> | <?= $data_user["username"] ?></p>
                                    <button class="btn btn-success btn-sm"><i class="bi bi-patch-check"></i>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-check" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M10.354 6.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7 8.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
                                            <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
                                        </svg><?= $data_user['verif'] ?>
                                    </button>

                                    <!-- INPUT IMAGE NYA -->
                                    <div class="mb-3 mt-4">
                                        <input class="form-control" name="foto" type="file" id="formFile">
                                    </div>

                                </div>
                            </div>
                    </div>

                    <div class="col-xl-8">
                        <!-- Account details card-->
                        <div class="card mb-4">
                            <div class="card-header"><b>Account Details</b></div>
                            <div class="card-body">
                                <input class="input" type="hidden" name="id" value="<?= $data_user["id"] ?>">
                                <div class="mb-3">
                                    <label for="inputEmail4" class="form-label">Nama Lengkap <span style="color: red">*</span></label>
                                    <input type="text" class="form-control" name="fullname" value="<?= $data_user["fullname"] ?>">
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">Username <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="username" value="<?= $data_user["username"] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="inputEmail4" class="form-label">Password <span style="color: red">*</span></label>
                                        <input type="password" class="form-control" name="password" value="<?= $data_user["password"] ?>">
                                    </div>
                                </div>
                                <div class="row gx-3 mb-3">
                                    <div class="col-md-6">
                                        <label for="inputPassword4" class="form-label">Kelas <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="kelas" value="<?= $data_user["kelas"] ?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="formGroupExampleInput" class="form-label">Alamat <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="alamat" value="<?= $data_user["alamat"] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="formGroupExampleInput" class="form-label">Status <span style="color: red">*</span></label>
                                        <input type="text" class="form-control" name="verif" value="<?= $data_user["verif"] ?>" disabled>
                                    </div>
                                </div>

                            </div>
                            <!-- Save changes button-->
                            <button name="submit" class="btn btn-primary" type="submit">Save changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ==== PROFILE CARD ends === -->
        </div>
        <!-- ==== CARD PLATE ends === -->
    </div>
    <!-- ==== BIG TITTLES ends === -->


</body>
<?php
include_once("../../partials/script.php");
?>

</html>
<?php
if (isset($_POST["submit"])) {
    $data = [
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        "kelas" => $_POST["kelas"],
        "alamat" => $_POST["alamat"],
        "foto" => $_FILES["foto"],
    ];

    $simpan = $user->update($_POST["id"], $data);
    echo '<script>
    swal({
        title: "Berhasil",
        text: "Kamu berhasil mengubah data!",
        icon: "success",
        button: "OKE",
      }) 
      .then(() => {
        window.location.href="profil.php"})
      </script> ';
}


?>