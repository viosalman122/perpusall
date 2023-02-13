<?php
include_once("Database.php");

class Identitas extends Database
{



    public function find($id)
    {
        $sql = "SELECT * FROM identitas WHERE id='$id'";
        return $this->db->query($sql)->fetch_assoc();
    }



    public function update($id, $data)
    {
        $nama = $data["nama"];
        $alamat = $data["alamat"];
        $email = $data["email"];
        $nomor = $data["nomor"];
        // $foto = $data["foto"];

        $sql = "UPDATE identitas SET nama = '$nama', alamat = '$alamat', email = '$email', nomor = '$nomor' WHERE id = '$id'";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL";
        } else {
            return "GAGAL";
        }
    }

    public function __destruct()
    {
    }
}
