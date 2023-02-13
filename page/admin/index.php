<?php

include_once("../../class/Buku.php");
include_once("../../class/Peminjaman.php");



session_start();
$user = new User;
$data_user = $user->find($_SESSION['id']);


$anggota = new User;
$data_anggota = $anggota->viewAnggota();


$buku = new Buku;
$data_buku = $buku->all();


$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->allPeminjaman();


if (isset($_SESSION['id'])) {
    $data_user = $user->find($_SESSION['id']);
    if ($data_user['role'] == 'user') {
        header('location: http://localhost/eperpus/page/user/index.php');
    }
}



?>


<!DOCTYPE html>
<html lang="en">




<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once("../../partials/links.php");
    ?>
    <title>DASHBOARD ADMIN</title>
</head>

<body>
    <?php
    include_once("../../partials/sidebar_admin.php");
    ?>
    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> DASHBOARD ADMIN</i>
        </div>

        <div class="alert">
            <span class="alert-logo">
                <ion-icon name="alert-circle"></ion-icon>
            </span>
            <span>Selamat Datang <B> <?= $data_user["fullname"] ?></B> di E - PERPUS SMKN 64 JAKARTA
            </span>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row mb-3">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card-ds p-4 shadow">
                            <div class="d-flex align-items-center px-2">
                                <ion-icon name="person-circle-outline"></ion-icon>
                                <div class="card-body text-end">
                                    <h5 class="card-title"><b><?= count($data_anggota) ?></b></h5>
                                    <p class="card-text mb-3">Anggota</p>
                                </div>
                            </div>
                            <div class="card text-start bg-dark">
                                <a href="http://localhost/perpus64/admin/master_data/data_anggota/index.php"><small class="text-center fw-bold"> Lihat Profil</small></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card-ds p-4 shadow">
                            <div class="d-flex align-items-center px-2">
                                <ion-icon name="book"></ion-icon>
                                <div class="card-body text-end">
                                    <h5 class="card-title"><b><?= count($data_buku)  ?></b></h5>
                                    <p class="card-text mb-3">Buku</p>
                                </div>
                            </div>
                            <div class="card text-start bg-dark">
                                <a href="http://localhost/perpus64/admin/katalog_buku/data_buku/index.php"><small class="text-center fw-bold"> Lihat Buku</small></a>
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
                                <a href="http://localhost/perpus64/admin/katalog_buku/data_peminjaman/index.php"><small class="text-center fw-bold"> Lihat Peminjaman</small></a>
                            </div>
                        </div>
                    </div>
                    <div class=" col-12 col-sm-6 col-md-6 col-lg-3">
                        <div class="card-ds p-4 shadow">
                            <div class="d-flex align-items-center px-2">
                                <ion-icon name="reload-outline"></ion-icon>
                                <div class="card-body text-end">
                                    <h5 class="card-title"><b>IDENTITAS</b></h5>
                                    <p class="card-text mb-3">Identitas Aplikasi </p>
                                </div>
                            </div>
                            <div class="card bg-dark">
                                <a href="http://localhost/perpus64/admin/identitas_aplikasi/index.php"><small class="text-center fw-bold"> Lihat Identitas</small></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- <?php
                foreach ($data_buku as $key => $buku) {
                ?>
            <tr>
                <td><?= $key + 1 ?></td>
                <td><?= $buku["judul"] ?></td>
                <td><?= $buku["pengarang"] ?></td>
                <td><?= $buku["nama_penerbit"] ?></td>
            </tr>
        <?php
                }
        ?> -->

        <!-- <div class=" logo-library">
            <span><ion-icon name="library"></ion-icon></span>
            <span><i>E-PERPUS</i></span>
        </div> -->
    </div>

</body>

<?php
include_once("../../partials/script.php");
?>

</html>