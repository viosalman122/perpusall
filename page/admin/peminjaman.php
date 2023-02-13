<?php
include_once("../../class/Peminjaman.php");
include_once("../../class/Buku.php");



session_start();
$peminjaman = new Peminjaman;
$data_peminjaman = $peminjaman->viewPeminjaman();



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

    <!-- ====================== DATA TABLES SCRIPT ====================== -->
    <!-- <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.1.0.js"></script> -->
    <!-- ====================== DATA TABLES SCRIPT ====================== -->


    <title>data Peminjaman</title>
</head>

<body>
    <?php
    include_once("../../partials/sidebar_admin.php");
    ?>
    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> DATA PEMINJAMAN</i>
        </div>

        <div class="alert">
            <span class="alert-logo">
                <ion-icon name="alert-circle"></ion-icon>
            </span>
            <span>Selamat Datang <B> <?= $data_user["fullname"] ?></B> di E - PERPUS SMKN 64 JAKARTA
            </span>
        </div>



        <hr>

        <table id="tabel-data" class="table table-striped table-hover mt-4">
            <thead id="tabel-data" class="table-dark mt-4">
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Judul Buku</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Kondisi Buku Saat dipinjam</th>
                    <th>status</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data_peminjaman as $key => $a) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $a["peminjam"] ?></td>
                        <td><?= $a["buku"] ?></td>
                        <td><?= $a["tanggal_peminjaman"] ?></td>
                        <td><?= $a["kondisi_pinjam"] ?></td>
                        <td style="color: red;">Belum Dikembalikan</td>
                    </tr>

                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

    <!-- ====================== DATA TABLES SCRIPT ====================== -->
    <!-- <script>
        $(document).ready(function() {
            $('#tabel-data').DataTable();
        });
    </script>

    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script> -->
    <!-- ====================== DATA TABLES SCRIPT ====================== -->




</body>
<?php
include_once("../../partials/script.php");
?>


</html>