<?php
include_once("Database.php");
include_once("Buku.php");
include_once("User.php");


class Pemberitahuan extends Database
{

    public function notifAktif()
    {
        $sql = "SELECT * FROM pemberitahuan WHERE status = 'aktif'";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }


    public function notifBuku($data)
    {
        $buku = new Buku;
        $buku = $buku->find($data['id_buku']);

        $user = new User;
        $user = $user->find($data['id_user']);

        $isi = "Buku " . $buku["judul"] . " SEDANG DIPINJAM OLEH " . $user["fullname"];

        $sql = "INSERT INTO pemberitahuan(isi,level, status) VALUES('$isi','admin','aktif')";

        if ($this->db->query($sql) === true) {
            echo "BERHASIL";
        } else {
            echo "GAGAL";
        }
    }

    public function create($data)
    {
        $isi = $data["isi"];
        $level = "admin";
        $status = $data["status"];
        $sql = "INSERT INTO pemberitahuan(isi, level, status) VALUES('$isi', '$level', '$status')";

        if ($this->db->query($sql) === TRUE) {
            return "Berhasil menambah data";
        } else {
            return "Gagal menambah data";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE * FROM pemberitahua WHERE id ='$id'";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }
}
