<?php
include_once("../../class/Peminjaman.php");
include_once("../../class/Buku.php");
include_once("../../class/Stock.php");

session_start();

$pengembalian = new Peminjaman;
$buku = new Buku;
$data_buku = $buku->find($_GET['id_buku']);

if (isset($_POST['submit'])) {
    $data = [
        "id" => $_POST['id_buku'],
        "tanggal_pengembalian" => $_POST['tanggal_pengembalian'],
        "kondisi_kembali" => $_POST['kondisi_kembali'],
    ];

    // cek update stock 
    $stock = new Stock;
    if ($_POST["kondisi_kembali"] == "baik") {
        $total_stock = $stock->addGood($id, $data);
    } elseif ($_POST["kondisi_kembali"] == "rusak") {
        $total_stock = $stock->addBad($id, $data);
    }

    $simpan = $pengembalian->formPengembalian($data);
    header("Location: peminjaman.php");
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
    <title>PEMNGEMBALIAN</title>
</head>

<body>
    <?php
    include_once("../../partials/sidebar_user.php");
    ?>
    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> FORM PEMNGEMBALIAN</i>
        </div>

        <div class="form">
            <div class="card">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg> PENGEMBALIAN
                </h5>

                <div class="form_peminjaman">
                    <a href="peminjaman.php">Kembali</a>
                    <form class="row g-3" action="" method="POST">
                        <div class="col-md-6">
                            <label for="">Nama Peminjam</label>
                            <input type="text" class="form-control" disabled value="<?= $data_user["fullname"] ?>">
                            <input type="hidden" name="user" value="<?= $data_user["id"] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="">Judul Buku</label>
                            <input type="text" class="form-select" name="id_buku" value="<?= $data_buku['judul'] ?>" disabled>
                        </div>
                        <div class="col-md-6">
                            <label for="">tanggal_pengembalian</label>
                            <input type="date" class="form-control" name="tanggal_pengembalian" id="" value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="">Kondisi Buku</label>
                            <select class="form-select" name="kondisi_kembali" id="">
                                <option value="" disabled selected>--- pilih opsi ---</option>
                                <option value="baik">Baik</option>
                                <option value="rusak">rusak</option>

                            </select>
                        </div>

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" name="submit" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Kembalikan Buku
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Kembalikan Buku?</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" name="submit" class="btn btn-primary">Kembalikan!</button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
</body>
<?php
include_once("../../partials/script.php");
?>


</html>