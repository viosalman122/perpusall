<?php
include_once("../../class/Pemberitahuan.php");
include_once("../../class/User.php");


session_start();

$pemberitahuan = new Pemberitahuan;
$data_pemberitahuan = $pemberitahuan->notifAktif();

if (isset($_POST['submit'])) {
    $data = [
        "isi" => $_POST["isi"],
        "status" => $_POST["status"],

    ];
    $pemberitahuan->create($data);
    header("Location: pemberitahuan.php");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ====================== DATA TABLES SCRIPT ====================== -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
    <!-- ====================== DATA TABLES SCRIPT ====================== -->

    <?php
    include_once("../../partials/links.php");

    ?>
    <title>PENGEMBALIAN</title>
</head>

<body>
    <title>data Peminjaman</title>
    </head>

    <body>
        <?php
        include_once("../../partials/sidebar_admin.php");
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
            foreach ($data_pemberitahuan as $key => $p) {
            ?>
                <div class="card w-90 mb-3 pr-3 pt-3 pb-0">
                    <div class="card-body">
                        <p>(<?= $key + 1 ?>)</p>
                        <h5 class="card-title fs-2">--<?= $p["isi"] ?>--</h5>

                        <a onclick="hapus(<?= $P['id'] ?>)" href="hapus_pemberitahuan.php?id=<?= $a["id"] ?>">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg> Hapus Pesan
                        </a>
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