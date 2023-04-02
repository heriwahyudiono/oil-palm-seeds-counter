<?php
require_once '../config/connection.php';

class DataModel
{
    private $conn;

    public function __construct()
    {
        $this->conn = openConnection();
    }

    public function simpanData($blok_ke, $baris_ke, $jumlah, $keterangan = null)
    {
        $tanggal_penghitungan = date('Y-m-d H:i:s');
        $stmt = $this->conn->prepare("INSERT INTO data(blok_ke, baris_ke, jumlah, keterangan, tanggal_penghitungan) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iiiss", $blok_ke, $baris_ke, $jumlah, $keterangan, $tanggal_penghitungan);
        $stmt->execute();
        $stmt->close();
    }

    public function getData()
    {
        $result = $this->conn->query("SELECT * FROM data");
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $result->close();

        return $data;
    }

    public function getDataById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM data WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();
        $stmt->close();

        return $data;
    }

    public function deleteData($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM data WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }

    public function getDataByBlokBaris($blok_ke, $baris_ke)
    {
        $stmt = $this->conn->prepare("SELECT * FROM data WHERE blok_ke = ? AND baris_ke = ?");
        $stmt->bind_param("ii", $blok_ke, $baris_ke);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();

        return $data;
    }

    public function getDataByBlok($blok_ke)
    {
        $stmt = $this->conn->prepare("SELECT * FROM data WHERE blok_ke = ?");
        $stmt->bind_param("i", $blok_ke);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = array();

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        $stmt->close();

        return $data;
    }

    public function updateData($id, $jumlah, $keterangan = null)
    {
        $tanggal_penghitungan = date('Y-m-d H:i:s');
        $stmt = $this->conn->prepare("UPDATE data SET jumlah = ?, keterangan = ?, tanggal_penghitungan = ? WHERE id = ?");
        $stmt->bind_param("issi", $jumlah, $keterangan, $tanggal_penghitungan, $id);
        $stmt->execute();
        $stmt->close();
    }

    public function closeConnection()
    {
        $this->conn->close();
    }
}
