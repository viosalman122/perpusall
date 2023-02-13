<?php
include_once("../../../../class/Buku.php");


$id = $_GET["id"];

$Buku = new Buku;
$Buku->delete($id);

header("Location: index.php?pesan=hapus_sukses");
