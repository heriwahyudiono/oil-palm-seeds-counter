<?php
require_once '../config/connection.php';

class UserModel {
    private $conn;

    public function __construct() {
        $this->conn = openConnection();
    }

    public function registerUser($nama_lengkap, $jenis_kelamin, $tanggal_lahir, $email, $nomor_telepon, $password) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO users (nama_lengkap, jenis_kelamin, tanggal_lahir, email, nomor_telepon, password) VALUES ('$nama_lengkap', '$jenis_kelamin', '$tanggal_lahir', '$email', '$nomor_telepon', '$hashed_password')";

        if ($this->conn->query($sql) === TRUE) {
            header("Location: ../views/hitung.php");
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
        }
    }

    public function getUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = $this->conn->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            return null;
        }
    }

    public function getUserById($id) {
        $sql = "SELECT * FROM users WHERE id='$id'";
        $result = $this->conn->query($sql);
    
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            return $user;
        } else {
            return null;
        }
    }    

    public function closeConnection() {
        $this->conn->close();
    }
}
