<?php
include_once("../../../../class/User.php");
include_once("../../../../class/Buku.php");
include_once("../../../../class/Penerbit.php");
include_once("../../../../class/Kategori.php");

session_start();
$penerbit = new Penerbit;
$data_penerbit = $penerbit->all();

$kategori = new Kategori;
$data_kategori = $kategori->all();




if (isset($_POST["submit"])) {
    $data = [
        "judul" => $_POST["judul"],
        "pengarang" => $_POST["pengarang"],
        "nama_penerbit" =>  $_POST["nama_penerbit"],
        "kategori" =>  $_POST["kategori"],
        "tahun_terbit" =>  $_POST["tahun_terbit"],
        "isbn" =>  $_POST["isbn"],
        "j_buku_baik" => $_POST["j_buku_baik"],
        "j_buku_rusak" => $_POST["j_buku_rusak"],
    ];

    $buku = new Buku;
    $submit = $buku->create($data);

    header("Location: index.php?pesan=tambah_suskes");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    include_once("../../../../partials/links.php");
    ?>
    <title>Tambah Data Buk</title>
</head>

<body>
    <?php include("../../../../partials/sidebar_admin.php") ?>
    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> TAMBAH BUKU</i>
        </div>
        <a class="btn btn-danger mb-3" href="index.php" role="button">Kembali</a>


        <div class="form">
            <div class="card">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-plus-fill" viewBox="0 0 16 16">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                    </svg> TAMBAH BUKU
                </h5>
                <div class="card-body">
                    <form class="row g-3" method="POST">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Judul Buku<span style="color: red">* wajib di isi</span></label>
                            <input type="text" class="form-control" name="judul" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Nama Pengarang<span style="color: red">* wajib di isi</span></label>
                            <input type="text" class="form-control" name="pengarang" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Tahun Terbit<span style="color: red">* wajib di isi</span></label>
                            <input type="number" class="form-control" name="tahun_terbit" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">ISBN<span style="color: red">* wajib di isi</span></label>
                            <input type="number" class="form-control" name="isbn" required>
                        </div>

                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Jumlah Buku Baik<span style="color: red">* wajib di isi</span></label>
                            <input type="number" class="form-control" name="j_buku_baik" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Jumlah Buku Rusak<span style="color: red">* wajib di isi</span></label>
                            <input type="number" class="form-control" name="j_buku_rusak" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Nama Penerbit</label>
                            <select name="nama_penerbit" id="inputState" class="form-select">
                                <option value="" disabled selected>--- Pilih Penerbit ---</option>

                                <?php
                                foreach ($data_penerbit as $p) {
                                ?>
                                    <option value="<?= $p["id"]  ?>"><?= $p["nama"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="inputState" class="form-label">Nama Kategori</label>
                            <select name="kategori" id="inputState" class="form-select">
                                <option value="" disabled selected>--- Pilih Kategori ---</option>
                                <?php
                                foreach ($data_kategori as $p) {
                                ?>
                                    <option value="<?= $p["id"]  ?>"><?= $p["nama"] ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                                    <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                </svg>Tambah</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</body>
<?php
include_once("../../../../partials/script.php");
?>

</html>