<?php
include_once("../../class/User.php");

// FIND USER
$user = new User;
$data_user = $user->find($_SESSION['id']);


?>

<div class="container_side">
    <div class="navigation">
        <ul>
            <li>
                <a href="#">
                    <span class="icon">
                        <ion-icon name="library-outline"></ion-icon>
                    </span>

                    <span class="title"><?= $data_user["fullname"] ?></span>
                    <br>

                </a>
            </li>
            <li>
                <a href="../user/index.php">
                    <span class="role"><?= $data_user["role"] ?></span>

                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/user/index.php">
                    <span class="icon">
                        <ion-icon name="layers"></ion-icon>
                    </span>
                    <span class="sub-title">Dashboard</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/user/koleksi_buku.php">
                    <span class="icon">
                        <ion-icon name="bookmarks-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Koleksi Buku</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/user/peminjaman.php">
                    <span class="icon">
                        <ion-icon name="repeat-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Peminjaman Buku</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/user/pengembalian.php">
                    <span class="icon">
                        <ion-icon name="reload-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Pengembalian Buku</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/user/pesan.php">
                    <span class="icon">
                        <ion-icon name="notifications-circle-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Pesan</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/user/profil.php">
                    <span class="icon">
                        <ion-icon name="settings-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Profil Saya</span>
                </a>
            </li>

            <li class="sidebar">
                <button class="btn btn-danger mt-3">
                    <a href="../../logout.php">
                        <span class="icon">
                            <ion-icon name="enter-outline"></ion-icon>
                        </span>
                        <span class="sub-title">log-out </span>
                    </a>
                </button>
            </li>
        </ul>
    </div>

</div>


<!-- ========================= Main ==================== -->

<div class="main">
    <div class="topbar">
        <div class="toggle">
            <a href="#"><ion-icon name="menu-outline"></ion-icon></a>
        </div>
        <div class="search">
            <label>

            </label>
        </div>
        <div class="user ms-4">
            <img class=" shadow-lg img-account-profile rounded-circle  mb-2" src="<?= $data_user["foto"] ?>" width="200" alt="">
            <h6 class="mt-3"><?= $data_user["username"] ?></h6>
        </div>
    </div>