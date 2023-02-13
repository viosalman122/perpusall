<?php
// include_once("../../class/User.php");
// include_once("../../../../class/User.php");

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
                <a href="http://localhost/eperpus/page/admin/index.php">
                    <span class="icon">
                        <ion-icon name="layers"></ion-icon>
                    </span>
                    <span class="sub-title">Dashboard</span>
                </a>
            </li>
            <!-- =====MASTER DATA===== -->
            <li>
                <a href="http://localhost/eperpus/page/admin/master_data/data_anggota/index.php">
                    <span class="icon">
                        <ion-icon name="person-circle-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Anggota Data</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/eperpus/page/admin/master_data/data_admin/index.php">
                    <span class="icon">
                        <ion-icon name="accessibility-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Admin Data</span>
                </a>
            </li>
            <li>
                <a href="http://localhost/eperpus/page/admin/master_data/data_penerbit/index.php">
                    <span class="icon">
                        <ion-icon name="git-merge-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Penerbit Data</span>
                </a>
            </li>
            <hr>
            <!-- ==== KATALOG BUKU === -->

            <!-- <li>
                <a href="http://localhost/perpus64/user/pesan.php">
                    <span class="icon">
                        <ion-icon name="notifications-circle"></ion-icon>
                    </span>
                    <span class="sub-title">Laporan Perpustakaan</span>
                </a>
            </li> -->

            <li>
                <a href="http://localhost/eperpus/page/admin/peminjaman.php">
                    <span class="icon">
                        <ion-icon name="repeat-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Peminjaman Data</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/admin/pengembalian.php">
                    <span class="icon">
                        <ion-icon name="repeat-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Pengembalian Data</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/admin/katalog_buku/data_buku/index.php">
                    <span class="icon">
                        <ion-icon name="book-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Data Buku</span>
                </a>
            </li>


            <li>
                <a href="http://localhost/eperpus/page/admin/katalog_buku/data_kategori/index.php">
                    <span class="icon">
                        <ion-icon name="albums-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Kategori Buku</span>
                </a>
            </li>
            <hr>
            <!-- 
            <li>
                <a href="http://localhost/perpus64/user/pesan.php">
                    <span class="icon">
                        <ion-icon name="document-text-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Laporan Perpustakaan</span>
                </a>
            </li> -->
            <li>
                <a href="http://localhost/eperpus/page/admin/identitas.php">
                    <span class="icon">
                        <ion-icon name="information-circle-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Identitas Aplikasi</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/page/admin/pemberitahuan.php">
                    <span class="icon">
                        <ion-icon name="notifications-circle-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Pesan</span>
                </a>
            </li>

            <li>
                <a href="http://localhost/eperpus/logout.php">
                    <span class="icon">
                        <ion-icon name="enter-outline"></ion-icon>
                    </span>
                    <span class="sub-title">Keluar </span>
                </a>
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
                <!-- <input type="text" placeholder="Search"> -->
                <!-- <ion-icon name="search-outline"></ion-icon> -->
            </label>
        </div>
        <div class="user">
            <span><?= $data_user["username"] ?></span>
            <!-- <img src="../img/hani.jpg" alt=""> -->
        </div>
    </div>


    <!-- ===== SCRIPT USER === -->
    <script src="../../../assets/main.js"></script>
    <script src="../../assets/main.js"></script>


    <!-- ====== ionicons ======= -->
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>