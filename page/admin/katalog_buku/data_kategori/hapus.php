<?php
include_once("../../../../class/Kategori.php");

$id = $_GET["id"];

$kategori = new Kategori;
$kategori->delete($id);

header("Location: index.php?pesan=hapus_sukses");
