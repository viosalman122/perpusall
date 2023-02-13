<?php
include_once("Database.php");

class Buku extends Database
{
    public function all()
    {
        $sql = "SELECT * FROM buku";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function allBuku()
    {
        $sql = "SELECT buku.id, buku.judul, buku.pengarang, buku.tahun_terbit, buku.j_buku_baik, buku.j_buku_rusak, buku.j_buku_baik + buku.j_buku_rusak as jumlah,penerbit.nama as nama_penerbit FROM buku, penerbit WHERE buku. id_penerbit = penerbit.id";

        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function find($id)
    {
        $sql = "SELECT * FROM buku WHERE id = '$id'";
        return $this->db->query($sql)->fetch_assoc();
    }


    public function koleksiBuku()
    {
        $sql = "SELECT buku.judul, buku.pengarang, kategori.nama as nama_kategori, buku.id, buku.j_buku_baik + buku.j_buku_rusak as jumlah FROM buku, kategori WHERE buku.id_kategori = kategori.id";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    public function create($data)
    {
        $judul = $data["judul"];
        $kategori = $data["kategori"];
        $nama_penerbit = $data["nama_penerbit"];
        $pengarang = $data["pengarang"];
        $tahun_terbit = $data["tahun_terbit"];
        $isbn = $data["isbn"];
        $j_buku_baik = $data["j_buku_baik"];
        $j_buku_rusak = $data["j_buku_rusak"];

        $sql = "INSERT INTO buku (judul, id_kategori, id_penerbit, pengarang, tahun_terbit, isbn, j_buku_baik, j_buku_rusak) VALUES ('$judul', '$kategori', '$nama_penerbit', '$pengarang', '$tahun_terbit', '$isbn', '$j_buku_baik', '$j_buku_rusak')";
        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL MENAMBAH BUKU";
        } else {
            return "GAGAL MENAMBAH BUKU";
        }
    }

    public function update($id, $data)
    {
        $judul = $data["judul"];
        $id_kategori = $data["id_kategori"];
        $id_penerbit = $data["id_penerbit"];
        $pengarang = $data["pengarang"];
        $tahun_terbit = $data["tahun_terbit"];
        $isbn = $data["isbn"];
        $j_buku_baik = $data["j_buku_baik"];
        $j_buku_rusak = $data["j_buku_rusak"];

        $sql = "UPDATE buku SET judul='$judul', id_kategori='$id_kategori', id_penerbit='$id_penerbit', pengarang='$pengarang', tahun_terbit='$tahun_terbit', isbn='$isbn', j_buku_baik='$j_buku_baik', j_buku_rusak='$j_buku_rusak' WHERE id= '$id'";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL UPDATE BUKU";
        } else {
            return "GAGAL UPDATE BUKU";
        }
    }

    public function delete($id)
    {
        $sql = "DELETE * FROM buku WHERE id = '$id'";

        if ($this->db->query($sql) === TRUE) {
            echo "berhasil";
        } else {
            echo "GAGAL";
        }
    }
}
