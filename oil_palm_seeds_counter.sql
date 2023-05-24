CREATE DATABASE oil_palm_seeds_counter;

USE oil_palm_seeds_counter;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nama_lengkap VARCHAR(255) NOT NULL,
    jenis_kelamin ENUM('Laki-laki', 'Perempuan') NOT NULL,
    tanggal_lahir DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    nomor_telepon VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    token VARCHAR(255)
);

CREATE TABLE data (
    id INT PRIMARY KEY AUTO_INCREMENT,
    blok_ke INT NOT NULL,
    baris_ke INT NOT NULL,
    jumlah INT NOT NULL,
    tanggal_penghitungan DATE NOT NULL,
    keterangan TEXT DEFAULT NULL
);

