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

INSERT INTO data (blok_ke, baris_ke, jumlah, tanggal_penghitungan, keterangan)
VALUES (1, 1, 7, '2023-03-18', NULL),
       (1, 2, 8, '2023-03-18', NULL),
       (1, 3, 8, '2023-03-18', NULL),
       (1, 4, 9, '2023-03-18', NULL),
       (1, 5, 10, '2023-03-18', NULL);

INSERT INTO data (blok_ke, baris_ke, jumlah, tanggal_penghitungan, keterangan)
VALUES (2, 1, 12, '2023-03-18', NULL),
       (2, 2, 11, '2023-03-18', NULL),
       (2, 3, 11, '2023-03-18', NULL),
       (2, 4, 11, '2023-03-18', NULL);

