<?php
include_once("../../class/User.php");
include_once("../../class/Peminjaman.php");
include_once("../../class/Buku.php");

session_start();

$buku = new Buku;
$data_buku = $buku->all();

$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->findMyPinjam($_SESSION['id']);

$pengembalian = new Peminjaman;
$data_pengembalian = $pengembalian->findMyKembali($_SESSION['id']);

$user = new User;
$data_user = $user->find($_SESSION['id']);

if (isset($_SESSION['id'])) {
    $data_user = $user->find($_SESSION['id']);
    if ($data_user['role'] == 'admin') {
        header('location: http://localhost/eperpus/page/admin/index.php');
    }
    if ($data_user['verif'] == 'unverified') {
        header("Location: ../../unverified.php");
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../../partials/links.php"); ?>
    <title>dashboard</title>
</head>

<body>
    <?php include_once("../../partials/sidebar_user.php"); ?>

    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> DASHBOARD USER</i>
        </div>

        <div class="alert">
            <span class="alert-logo">
                <ion-icon name="alert-circle"></ion-icon>
            </span>
            <span>Selamat Datang <B><?= $data_user["fullname"] ?> | <?= $data_user["role"] ?> </B> di E - PERPUS SMKN 64 JAKARTA
            </span>
        </div>

        <div class="card">
            <h5 class="card-header">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                </svg> Dashboard
            </h5>
            <div class="card-body">
                <!-- ====================== ISI ================== -->
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card-ds p-4 shadow">
                                <div class="d-flex align-items-center px-2">
                                    <ion-icon name="person-circle-outline"></ion-icon>
                                    <div class="card-body text-end">
                                        <h5 class="card-title"><b><?= $data_user["fullname"] ?></b></h5>
                                        <p class="card-text mb-3">Profil Saya</p>
                                    </div>
                                </div>
                                <div class="card text-start bg-dark">
                                    <a href="profil.php"><small class="text-center fw-bold"> Lihat Profil</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card-ds p-4 shadow">
                                <div class="d-flex align-items-center px-2">
                                    <ion-icon name="book"></ion-icon>
                                    <div class="card-body text-end">
                                        <h5 class="card-title"><b><?= count($data_buku)  ?></b></h5>
                                        <p class="card-text mb-3">Koleksi Buku</p>
                                    </div>
                                </div>
                                <div class="card text-start bg-dark">
                                    <a href="koleksi_buku.php"><small class="text-center fw-bold"> Lihat Buku</small></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card-ds p-4 shadow">
                                <div class="d-flex align-items-center px-2">
                                    <ion-icon name="repeat-outline"></ion-icon>
                                    <div class="card-body text-end">
                                        <h5 class="card-title"><b><?= count($data_peminjaman) ?></b></h5>
                                        <p class="card-text  mb-3">Peminjaman</p>
                                    </div>
                                </div>
                                <div class="card bg-dark">
                                    <a href="peminjaman.php"><small class="text-center fw-bold"> Lihat Peminjaman</small></a>
                                </div>
                            </div>
                        </div>
                        <div class=" col-12 col-sm-6 col-md-6 col-lg-3">
                            <div class="card-ds p-4 shadow">
                                <div class="d-flex align-items-center px-2">
                                    <ion-icon name="reload-outline"></ion-icon>
                                    <div class="card-body text-end">
                                        <h5 class="card-title"><b><?= count($data_pengembalian) ?></b></h5>
                                        <p class="card-text mb-3">Pengembalian </p>
                                    </div>
                                </div>
                                <div class="card bg-dark">
                                    <a href="pengembalian.php"><small class="text-center fw-bold"> Lihat Pengembalian</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
<?php include_once("../../partials/script.php"); ?>

</html>