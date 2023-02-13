<?php
include_once("../../../../class/User.php");

session_start();

$id_edit = $_GET["id"];

$admin = new User;
$data_admin_edit = $admin->find($id_edit);

if (isset($_POST["submit"])) {
    $data = [
        "fullname" => $_POST["fullname"],
        "username" => $_POST["username"],
        "password" => $_POST["password"],
        // "role" => 'user',
        // "foto" => $_POST["foto"],
    ];

    $admin->update($id_edit, $data);

    header("Location: index.php?pesan=edit_suskes");
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


    <title>edit</title>
</head>

<body>
    <?php
    include_once("../../../../partials/sidebar_admin.php");
    ?>

    <div class="cardBox">
        <div class="title-pages">
            <ion-icon name="book-outline"></ion-icon> EDIT ADMIN</i>
        </div>

        <a class="btn btn-danger mb-3" href="index.php" role="button">Kembali</a>
        <div class="form">
            <div class="card">
                <h5 class="card-header">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                        <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                        <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                    </svg> EDIT ADMIN
                </h5>
                <div class="card-body">
                    <form class="row g-3" method="POST">

                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Nama Anggota <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="fullname" value="<?= $data_admin_edit["fullname"] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputPassword4" class="form-label">Username <span style="color: red">*</span></label>
                            <input type="text" class="form-control" name="username" value="<?= $data_admin_edit["username"] ?>">
                        </div>
                        <div class="col-md-6">
                            <label for="inputEmail4" class="form-label">Password <span style="color: red">*</span></label>
                            <input type="password" class="form-control" name="password" value="<?= $data_admin_edit["password"] ?>">
                        </div>

                        <div class="col-12">
                            <button type="submit" name="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </div>



</body>

</html>
</body>
<?php
include_once("../../../../partials/script.php");
?>

</html>