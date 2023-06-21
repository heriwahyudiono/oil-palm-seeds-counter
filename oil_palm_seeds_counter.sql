CREATE DATABASE oil_palm_seeds_counter;

USE oil_palm_seeds_counter;

CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female') NOT NULL,
    date_of_birth DATE NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    token VARCHAR(255)
);

CREATE TABLE data (
    id INT PRIMARY KEY AUTO_INCREMENT,
    blok_ke INT NOT NULL,
    baris_ke INT NOT NULL,
    jumlah INT NOT NULL,
    tanggal_hitung DATE NOT NULL,
    keterangan TEXT DEFAULT NULL
);
