<?php
include_once("../../class/Buku.php");
include_once("../../class/Peminjaman.php");
include_once("../../class/Stock.php");

session_start();

$buku = new Buku;
$data_buku = $buku->koleksiBuku();


$stock = new Stock;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include_once("../../partials/links.php") ?>
    <title>Koleksi Buku</title>
</head>

<body>
    <?php
    include_once("../../partials/sidebar_user.php");
    ?>

    <div class="cardBox">
        <div class="title-pages mt-5">
            <ion-icon name="book-outline"></ion-icon> Koleksi Buku</i>
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
                </svg> Koleksi Buku
            </h5>
            <div class="card-body">
                <div class="row">
                    <?php
                    foreach ($data_buku as $key => $b) {
                    ?>
                        <div class="col-4">
                            <div class="card mb-3">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="../imgs/htl.jpg" width="100%" class="img-fluid img-thumbnail" alt="...">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $b["judul"] ?></h5>
                                            <p class="card-text">by <?= $b["pengarang"] ?> | <?= $b["nama_kategori"]   ?></p>
                                            <img src="../imgs/star.png" width="100" alt="" srcset="">
                                            <p class="card-text"><small class="text-muted">Jumlah Buku : <?= $b["jumlah"] ?></small></p>

                                            <a href="form_peminjaman.php?id_buku=<?= $b["id"] ?>">
                                                <button type=" button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                    Pinjam Buku
                                                </button>
                                            </a>



                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>
                <a class="btn btn-success mb-3" href="form_peminjaman.php" role="button">Pinjam Buku</a>
            </div>
        </div>
</body>
<?php
include_once("../../partials/script.php");
?>

</html>