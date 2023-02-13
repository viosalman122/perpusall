<?php
include_once("Database.php");
include_once("Buku.php");
include_once("User.php");

class Peminjaman extends Database
{

    public function allPeminjaman()
    {
        $sql = "SELECT * FROM peminjaman";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function viewPeminjaman()
    {
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_pinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_kembali, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is null";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function viewPengembalian()
    {
        $sql = "SELECT user.fullname as peminjam, buku.judul as buku, peminjaman.tanggal_peminjaman, peminjaman.kondisi_pinjam, peminjaman.tanggal_pengembalian, peminjaman.kondisi_kembali, peminjaman.denda FROM peminjaman, buku, user WHERE peminjaman.id_user = user.id AND peminjaman.id_buku = buku.id AND tanggal_pengembalian is not null";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findMyPinjam($id)
    {
        $sql = "SELECT buku.id, buku.judul, peminjaman.id as id_peminjaman, peminjaman.tanggal_peminjaman, peminjaman.kondisi_pinjam FROM peminjaman, buku WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian is null";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function findMyKembali($id)
    {
        $sql = "SELECT buku.judul, peminjaman.tanggal_peminjaman, peminjaman.tanggal_peminjaman,peminjaman.tanggal_pengembalian, peminjaman.kondisi_pinjam, peminjaman.kondisi_kembali, peminjaman.denda FROM buku, peminjaman WHERE peminjaman.id_buku = buku.id AND peminjaman.id_user = $id AND tanggal_pengembalian is not null";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $id_user = $data["id_user"];
        $id_buku = $data["id_buku"];
        $tanggal_peminjaman = $data["tanggal_peminjaman"];
        $kondisi_pinjam = $data["kondisi_pinjam"];

        $sql = "INSERT INTO peminjaman(id_user, id_buku, tanggal_peminjaman, kondisi_pinjam) VALUES('$id_user','$id_buku', '$tanggal_peminjaman', '$kondisi_pinjam')";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL";
        } else {
            return "gagal";
        }
    }

    public function formPengembalian($data)
    {
        $kondisi_kembali = $data['kondisi_kembali'];
        $tanggal_pengembalian = date('Y-m-d');

        $sql = "UPDATE peminjaman SET kondisi_kembali = '$kondisi_kembali', tanggal_pengembalian = '$tanggal_pengembalian' WHERE id = '$_GET[id_peminjaman]'";
        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL";
        } else {
            return "GAGAL";
        }
    }
}
