CREATE TABLE users (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  gender enum('Male','Female') NOT NULL,
  date_of_birth date NOT NULL,
  email varchar(255) NOT NULL,
  phone_number varchar(20) NOT NULL,
  password varchar(255) NOT NULL,
  token varchar(255) DEFAULT NULL
);

INSERT INTO users (id, name, gender, date_of_birth, email, phone_number, password, token) VALUES
(1, 'Riski', 'Male', '1996-05-12', 'ah17011966@gmail.com', '0864242466646', '$2y$10$VGGCv.hvV9wViBn/ZxXoqu6SqRrzUvSgH0O7vfbMY40w0AfIo2wGu', 'c38653d4e181d26727da9233ca8c42078879cf965b0287b0c122962a169a3570'),
(2, 'Reza', 'Male', '2003-04-19', 'rezaoktario77@gmail.com', '0853779916605', '$2y$10$Ore4wNdXJfgsZ9kHuvLzq.fKgmDppR3nuSWDabql0WxF.gCgu/D46', 'cec8676187a60f6cac6576b5a65d8369629b136e1dbdae826b6a2800da4b7013'),
(3, 'Heri Wahyudiono', 'Male', '2001-03-15', 'heriwhydiono@gmail.com', '085609839193', '$2y$10$7.F8Qmoiha1KZ7ZMeAB3sOdDgObJOt1vLHUe/Iqz.5ip9GNxqnzNG', 'f3af50d9ec838237450a50ec3fc4c42e1bdd2bdef5f4c41994defd50fa368fc2'),
(4, 'Heri Wahyudiono', 'Male', '2023-07-25', 'heriwahyudiono@outlook.co.id', '085609839193', '$2y$10$e9D8HW/S8wt74eKRvuf6ReaixdcHvIoELMeuuolSali9lpRJz/inW', '3b8653148a81aeaeba85016cb21e7c9ac5cdaec4b34560b22a6abb6fa0c2f102'),
(5, 'Rz', 'Male', '2023-07-02', 'reza@gmail.com', '08976543', '$2y$10$z6UxG8giAVIyeJdA4oV8Q.JPYp6UWUBEv3r476OBrjeVkHMegXlVS', NULL),
(6, 'admin', 'Male', '2023-10-28', 'admin@mail.com', '089617172727', '$2y$10$EpXSKfU4xK82KiZF7XUawuJVtdOc2WyprRF1FWttMZn2MvdA9J8Aa', NULL);

CREATE TABLE data (
  id int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  blok_ke int(11) NOT NULL,
  baris_ke int(11) NOT NULL,
  jumlah int(11) NOT NULL,
  tanggal_hitung date NOT NULL,
  keterangan text DEFAULT NULL
);

INSERT INTO data (id, blok_ke, baris_ke, jumlah, tanggal_hitung, keterangan) VALUES
(1, 1, 1, 7, '2023-03-18', ''),
(2, 1, 2, 8, '2023-03-18', ''),
(3, 1, 3, 8, '2023-03-18', ''),
(4, 1, 4, 9, '2023-03-18', ''),
(5, 1, 5, 10, '2023-03-18', '');
