<?php
include_once("../../class/Pesan.php");

session_start();
$pesan = new Pesan;
$data_pesan = $pesan->viewMyPesan($_SESSION['id']);


?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php
    include_once("../../partials/links.php");
    ?>
</head>

<body>
    <?php
    include_once("../../partials/sidebar_user.php");
    ?>
    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="notifications-circle"></ion-icon> PESAN</i>

        </div>

        <div class="alert">
            <span class="alert-logo">
                <ion-icon name="alert-circle"></ion-icon>
            </span>
            <span>Selamat Datang <B><?= $data_user["fullname"] ?> | <?= $data_user["role"] ?> </B> di E - PERPUS SMKN 64 JAKARTA
            </span>
        </div>


        <?php
        foreach ($data_pesan as $key => $p) {
        ?>
            <div class="card w-90 mb-3 pr-3 pt-3 pb-0">
                <div class="card-body">
                    <p>(<?= $key + 1 ?>)</p>
                    <h5 class="card-title fs-2">--<?= $p["judul"] ?>--</h5>
                    <p class="card-text fs-5"><small><?= $p["isi"] ?></small></p>

                    <a style="float:right" href="#" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                        </svg> Hapus Pesan</a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</body>
<?php
include_once("../../partials/script.php");
?>

</html>