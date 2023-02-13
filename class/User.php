<?php
include_once("Database.php");

class User extends Database
{

    // FIND (PANGGIL SEMUA DENGAN SESUAI ID)
    public function find($id)
    {
        $sql = "SELECT * FROM user WHERE id = '$id'";
        return $this->db->query($sql)->fetch_assoc();
    }

    // AMBIL USER AJA
    public function viewAnggota()
    {
        $sql = "SELECT * FROM user WHERE role = 'user' AND deleted_at IS NULL";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    // AMBIL ADMIN AJA
    public function viewAdmin()
    {
        $sql = "SELECT * FROM user WHERE role = 'admin' AND deleted_at IS NULL";
        return $this->db->query($sql)->fetch_all(MYSQLI_ASSOC);
    }

    // CREATE USER
    public function createAnggota($data)
    {
        $kode = $data["kode"];
        $nis = $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        $now = date('Y-m-d');


        $sql = "INSERT INTO user(kode, nis, fullname,username,password, verif, kelas,alamat, join_date, role) VALUES('$kode','$nis','$fullname','$username','$password', 'verified','$kelas','$alamat', '$now','user')";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL";
        } else {
            return "GAGAL";
        }
    }

    // REGISTRASI
    public function createRegis($data)
    {
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];

        $now = date('y-m-d H:i:s');
        $sql = "INSERT INTO user(fullname,username,password, verif, join_date, role) VALUES('$fullname','$username','$password', 'unverified', '$now','user')";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL";
        } else {
            return "GAGAL";
        }
    }



    // CREATE ADMIN
    public function createAdmin($data)
    {
        $kode = $data["kode"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $alamat = $data["alamat"];
        $now = date('y-m-d');

        $sql = "INSERT INTO user(kode,fullname,username,password,alamat,verif, join_date, role) VALUES('$kode','$fullname','$username','$password','$alamat','verified', '$now','admin')";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL";
        } else {
            return "GAGAL";
        }
    }

    // UPDATE
    public function update($id, $data)
    {
        $fullname = $data["fullname"];
        $username = $data["username"];
        $password = $data["password"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        // $verif = $data["verif"];
        $foto = $data["foto"];

        if ($foto['error'] !== 4) {
            $targetFile = "../../imgs/img/" . date("YmdHis") . basename($foto["name"]);
            move_uploaded_file($foto["tmp_name"], $targetFile);

            $sql = "UPDATE user SET fullname='$fullname', username='$username', password='$password', kelas='$kelas', alamat = '$alamat',foto= '$targetFile' WHERE id = '$id' ";
        } else {
            $sql = "UPDATE user SET fullname='$fullname', username='$username', password='$password', kelas='$kelas', alamat = '$alamat' WHERE id = '$id' ";
        }

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL UPDATE USER";
        } else {
            return "GAGAL UPDATE USER";
        }
    }

    public function updateByAdmin($id, $data)
    {
        $kode = $data["kode"];
        $nis = $data["nis"];
        $fullname = $data["fullname"];
        $username = $data["username"];
        $kelas = $data["kelas"];
        $alamat = $data["alamat"];
        $verif = $data["verif"];

        $sql = "UPDATE user SET kode= '$kode', nis = '$nis', fullname='$fullname', username='$username', kelas='$kelas', alamat = '$alamat', verif = '$verif' WHERE id = '$id' ";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL UPDATE USER";
        } else {
            return "GAGAL UPDATE USER";
        }
    }

    // DELETE
    public function delete($id)
    {
        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE user SET deleted_at = '$now' WHERE id ='$id'";
        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL HAPUS USER";
        } else {
            return "GAGAL HAPUS USER";
        }
    }
}
