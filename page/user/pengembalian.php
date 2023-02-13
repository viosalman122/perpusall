<?php
include_once("../../class/Peminjaman.php");

session_start();

$pengembalian = new Peminjaman;
$data_pengembalian = $pengembalian->findMyKembali($_SESSION['id']);
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

    <title>Katalog Buku</title>
</head>

<body>
    <?php
    include_once("../../partials/sidebar_user.php");
    ?>

    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> PENGEMBALIAN</i>
        </div>

        <div class="alert">
            <span class="alert-logo">
                <ion-icon name="alert-circle"></ion-icon>
            </span>
            <span>Selamat Datang <B><?= $data_user["fullname"] ?> | <?= $data_user["role"] ?> </B> di E - PERPUS SMKN 64 JAKARTA
            </span>
        </div>


        <div class="form">
            <div class="card">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-bookmark-check-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M2 15.5V2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.74.439L8 13.069l-5.26 2.87A.5.5 0 0 1 2 15.5zm8.854-9.646a.5.5 0 0 0-.708-.708L7.5 7.793 6.354 6.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z" />
                    </svg> Data Pengembalian
                </h5>
                <div class="card-body">

                    <div class="table-responsive">

                        <table id="tabel-data" class="table table-striped table-hover mt-4 ">
                            <thead class="table-dark mt-4">
                                <tr>
                                    <th>No.</th>
                                    <th>Judul Buku</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Kondisi Pinjam</th>
                                    <th>Kondisi Kembali</th>
                                    <th>Denda</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                foreach ($data_pengembalian as $key => $p) {
                                ?>
                                    <tr>
                                        <td><?= $key + 1 ?></td>
                                        <td><?= $p["judul"] ?></td>
                                        <td><?= $p["tanggal_peminjaman"] ?></td>
                                        <td><?= $p["tanggal_pengembalian"] ?></td>
                                        <td><?= $p["kondisi_pinjam"] ?></td>
                                        <td><?= $p["kondisi_kembali"] ?></td>
                                        <td style="color: red;">
                                            <?php
                                            if ($p['kondisi_pinjam'] == 'baik') {
                                                if ($p['kondisi_kembali'] == 'baik') {
                                                    echo "-";
                                                }
                                            }
                                            if ($p['kondisi_pinjam'] == 'baik') {
                                                if ($p['kondisi_kembali'] == 'rusak') {
                                                    echo "Rp.100.000";
                                                }
                                            }
                                            if ($p['kondisi_pinjam'] == 'rusak') {
                                                if ($p['kondisi_kembali'] == 'rusak') {
                                                    echo "-";
                                                }
                                            }
                                            if ($p['kondisi_pinjam'] == 'rusak') {
                                                if ($p['kondisi_kembali'] == 'baik') {
                                                    echo "wkwk mks";
                                                }
                                            }

                                            ?>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                                <a class="btn btn-primary mb-1" href="form_peminjaman.php" role="button">Pinjam Buku</a>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
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