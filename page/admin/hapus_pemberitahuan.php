<?php
include_once("../../class/User.php");

$id = $_GET["id"];

$user = new Pemberitahuan;
$user->delete($id);

header("Location: index.php?pesan=hapus_sukses");
