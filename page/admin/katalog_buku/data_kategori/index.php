<?php
include_once("../../../../class/User.php");
include_once("../../../../class/Kategori.php");

session_start();
$kategori = new Kategori;
$data_kategori = $kategori->all();

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
    include_once("../../../../partials/links.php");

    ?>
    <title>Data Buku</title>
</head>

<body>
    <?php
    include_once("../../../../partials/sidebar_admin.php");
    ?><div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> DATA KATEGORI</i>
        </div>
        <div class="alert">
            <span class="alert-logo">
                <ion-icon name="alert-circle"></ion-icon>
            </span>
            <span>Selamat Datang <B> <?= $data_user["fullname"] ?></B> di E - PERPUS SMKN 64 JAKARTA
            </span>
        </div>


        <div class="btnku">
            <a href="tambah.php">
                <button class="continue-application">
                    <div>
                        <div class="pencil"></div>
                        <div class="folder">
                            <div class="top">
                                <svg viewBox="0 0 24 27">
                                    <path d="M1,0 L23,0 C23.5522847,-1.01453063e-16 24,0.44771525 24,1 L24,8.17157288 C24,8.70200585 23.7892863,9.21071368 23.4142136,9.58578644 L20.5857864,12.4142136 C20.2107137,12.7892863 20,13.2979941 20,13.8284271 L20,26 C20,26.5522847 19.5522847,27 19,27 L1,27 C0.44771525,27 6.76353751e-17,26.5522847 0,26 L0,1 C-6.76353751e-17,0.44771525 0.44771525,1.01453063e-16 1,0 Z"></path>
                                </svg>
                            </div>
                            <div class="paper"></div>
                        </div>
                    </div>
                    Tambah Data
                </button>
            </a>
        </div>
        <hr>

        <table id="tabel-data" class="table table-striped table-hover mt-4">
            <thead id="tabel-data" class="table-dark mt-4">
                <tr>
                    <th>No</th>
                    <th>Kode Kategori</th>
                    <th>Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($data_kategori as $key => $a) {
                ?>
                    <tr>
                        <td><?= $key + 1 ?></td>
                        <td><?= $a["kode"] ?></td>
                        <td><?= $a["nama"] ?></td>
                        <td>
                            <a class="btn-edit" href="edit.php?id=<?= $a["id"] ?>">
                                <button type="button" class="btn btn-success">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </button>
                            </a>

                            <a onclick="hapus(<?= $a['id'] ?>)" href="hapus.php?id=<?= $a["id"] ?>">
                                <button type="button" class="btn btn-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
                                        <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                </button>
                            </a>


                        </td>
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
include_once("../../../../partials/script.php");
?>

</html>