<?php
include_once("Database.php");
include_once("Buku.php");

class Stock extends Database
{
    public function minusGood($id, $data)
    {
        $buku = new Buku;
        $data_buku = $buku->find($data["id_buku"]);
        $id = $data_buku["id"];

        $currentStock = $data_buku["j_buku_baik"];
        $total = $currentStock - 1;

        $sql = "UPDATE buku set j_buku_baik = '$total' where id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function minusBad($id, $data)
    {
        $buku = new Buku;
        $data_buku = $buku->find($data["id_buku"]);
        $id = $data_buku["id"];

        $currentStock = $data_buku["j_buku_rusak"];
        $total = $currentStock - 1;

        $sql = "UPDATE buku set j_buku_rusak = '$total' where id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }


    public function addGood($id, $data)
    {
        $buku = new Buku;
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $data_buku["id"];

        $currentStock = $data_buku["j_buku_baik"];
        $total = $currentStock + 1;

        $sql = "UPDATE buku set j_buku_baik = '$total' where id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }

    public function addBad($id, $data)
    {
        $buku = new Buku;
        $data_buku = $buku->find($_GET["id_buku"]);
        $id = $data_buku["id"];

        $currentStock = $data_buku["j_buku_rusak"];
        $total = $currentStock + 1;

        $sql = "UPDATE buku set j_buku_rusak = '$total' where id='$id'";

        if ($this->db->query($sql) == true) {
            echo "Berhasil";
        } else {
            echo "Gagal";
        }
    }
}
