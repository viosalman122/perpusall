<?php
include_once("../../class/Peminjaman.php");
include_once("../../class/Pemberitahuan.php");
include_once("../../class/Buku.php");
include_once("../../class/stock.php");

session_start();
$buku = new Buku;
$data_buku = $buku->all();


$pemberitahuan = new Pemberitahuan;


if (isset($_POST["submit"])) {
    $data = [
        "id_user" => $_POST["id_user"],
        "id_buku" => $_POST["id_buku"],
        "tanggal_peminjaman" => $_POST["tanggal_peminjaman"],
        "kondisi_pinjam" => $_POST["kondisi_pinjam"],
    ];

    $notif = $pemberitahuan->notifBuku([
        "id_user" => $_POST["id_user"],
        "id_buku" => $_POST["id_buku"],
    ]);

    // cek update stock 
    $stock = new Stock;
    if ($_POST["kondisi_pinjam"] == "baik") {
        $total_stock = $stock->minusGood($id, $data);
    } elseif ($_POST["kondisi_pinjam"] == "rusak") {
        $total_stock = $stock->minusBad($id, $data);
    }

    $peminjaman = new Peminjaman;
    $data_peminjaman = $peminjaman->create($data);
    header("Location: peminjaman.php");
}



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
            <ion-icon name="book-outline"></ion-icon> FORM PEMINJAMAN</i>
        </div>

        <div class="form">
            <div class="card">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg> PEMINJAMAN
                </h5>

                <div class="form_peminjaman">
                    <a href="peminjaman.php">Kembali</a>
                    <form class="row g-3" action="" method="POST">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Peminjam</label>
                            <input type="text" class="form-control" disabled value="<?= $data_user["fullname"] ?>">
                            <input type="hidden" name="id_user" value="<?= $data_user["id"] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Judul Buku</label>
                            <select name="id_buku" id="" class="form-select">
                                <option value="" disabled selected> --- pilih opsi ----</option>
                                <?php
                                foreach ($data_buku as $b) {
                                ?>
                                    <option value="<?= $b["id"] ?>" <?php if (isset($_GET["id_buku"])) {
                                                                        if ($_GET["id_buku"] == $b["id"]) {
                                                                            echo "selected";
                                                                        } else {
                                                                            echo "";
                                                                        }
                                                                    } else {
                                                                        echo "";
                                                                    }
                                                                    ?>> <?= $b["judul"] ?> | <?= $b["pengarang"] ?> </option>

                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Tanggal Pinjam</label>
                            <input type="date" name="tanggal_peminjaman" class="form-control" id="" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6 mt-3 mb-3">
                            <label for="inputState" class="form-label">Kondisi Buku Saat Dipinjam</label>
                            <select name="kondisi_pinjam" id="inputState" class="form-select">
                                <option value="" disabled selected>--- Pilih Opsi ---</option>
                                <option value="baik">Baik</option>
                                <option value="rusak">Rusak</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <a class="btn btn-danger" href="koleksi_buku.php" role="button">Kembali</a>
                            <button type="button" class="btn btn-primary" name="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                Pinjam Buku
                            </button>

                        </div>


                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-primary" name="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Launch demo modal
                        </button> -->

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Pinjam Buku?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Pinjam!</button>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

</body>
<?php
include_once("../../partials/script.php");
?>

</html>