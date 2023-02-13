<?php
include_once("Database.php");

class pesan extends Database
{

    public function all()
    {
        $sql = "SELECT * FROM pesan";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function viewMyPesan($id)
    {
        $sql = "SELECT * FROM pesan WHERE id_penerima='$id'";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $judul = $data["judul"];
        $isi = $data["isi"];

        $sql = "INSERT INTO pesan(judul, isi) VALUES('$judul', '$isi')";
        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL MEMBUAT PESAN";
        } else {
            return "GAGAL MEMBUAT PESAN";
        }
    }

    public function update($id, $data)
    {
        $kode = $data["kode"];
        $nama = $data["nama"];

        $sql = "UPDATE pesan SET kode='$kode', nama='$nama'  WHERE id='$id'";
        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL UPDATE PESAN";
        } else {
            return "GAGAL UPDATE PESAN";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE FROM pesan WHERE id ='$id'";
        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL DELETE PESAN";
        } else {
            return "GAGAL DELETE PESAN";
        }
    }

    public function __destruct()
    {
    }
}
