<?php
include_once("../../../../class/Penerbit.php");
include_once("../../../../class/Peminjaman.php");



session_start();

if (isset($_POST["submit"])) {
    $data = [
        "kode" => $_POST["kode"],
        "pengarang" => $_POST["pengarang"],
        "isbn" => $_POST["isbn"],
        "kode" => $_POST["kode"],
        "nama" => $_POST["nama"],
        "verif" =>  $_POST["verif"],
    ];

    $penerbit = new Penerbit;
    $submit = $penerbit->create($data);

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
    <title>Tambah Data Penerbit</title>
</head>

<body>
    <?php include("../../../../partials/sidebar_admin.php") ?>
    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> TAMBAH PENERBIT</i>
        </div>
        <a class="btn btn-danger mb-3" href="index.php" role="button">Kembali</a>


        <div class="form">
            <div class="card">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cloud-plus-fill" viewBox="0 0 16 16">
                        <path d="M8 2a5.53 5.53 0 0 0-3.594 1.342c-.766.66-1.321 1.52-1.464 2.383C1.266 6.095 0 7.555 0 9.318 0 11.366 1.708 13 3.781 13h8.906C14.502 13 16 11.57 16 9.773c0-1.636-1.242-2.969-2.834-3.194C12.923 3.999 10.69 2 8 2zm.5 4v1.5H10a.5.5 0 0 1 0 1H8.5V10a.5.5 0 0 1-1 0V8.5H6a.5.5 0 0 1 0-1h1.5V6a.5.5 0 0 1 1 0z" />
                    </svg> TAMBAH PENERBIT
                </h5>
                <div class="card-body">
                    <form class="row g-3" method="POST">
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Kode Penerbit <span style="color: red">* wajib di isi</span></label>
                            <input type="text" class="form-control" name="kode" required>
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Nama Penerbit <span style="color: red">* wajib di isi</span></label>
                            <input type="text" class="form-control" name="nama" required>
                        </div>
                        <div class="mb-3">
                            <label for="formGroupExampleInput" class="form-label">Status <span style="color: red">* wajib di isi</span></label>
                            <select name="verif" id="inputState" class="form-select">
                                <option value="" disabled selected>--- Pilih Opsi ---</option>
                                <option value="verified">verified</option>
                                <option value="unverified">Unverified</option>
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