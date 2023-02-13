<?php
include_once("Database.php");

class Login extends Database
{

    public function authLogin($data)
    {
        $username = $data["username"];
        $password = $data["password"];

        $sql = "SELECT * FROM user WHERE username = '$username'";
        $cek = $this->db->query($sql)->fetch_assoc();

        if (!empty($cek)) {
            if ($password == $cek['password']) {
                $_SESSION['id'] = $cek['id'];

                if ($cek['role'] == 'admin') {
                    header("Location: page/admin/index.php");
                } elseif ($cek['role'] == 'user') {
                    header("Location: page/user/index.php");
                }
            }
        } else {
            echo "gagal Login";
        }
    }

    public function lastLogin($id)
    {

        $now = date('Y-m-d H:i:s');
        $sql = "UPDATE user SET terakhir_login = '$now' WHERE id = '$id' ";

        if ($this->db->query($sql) === TRUE) {
            return "BERHASIL HAPUS USER";
        } else {
            return "GAGAL HAPUS USER";
        }
    }
}
