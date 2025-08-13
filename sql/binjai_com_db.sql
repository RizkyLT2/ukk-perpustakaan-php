-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Agu 2025 pada 04.03
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `binjai_com_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `judul` varchar(50) DEFAULT NULL,
  `pengarang` varchar(50) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `judul`, `pengarang`, `tahun_terbit`, `status`) VALUES
(4, 'Matematika Dasar', 'abaad', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_peminjam`
--

CREATE TABLE `tbl_peminjam` (
  `id_peminjam` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `tanggal_pengembalian` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_peminjam`
--

INSERT INTO `tbl_peminjam` (`id_peminjam`, `id_buku`, `id_siswa`, `tanggal_pinjam`, `tanggal_pengembalian`, `status`) VALUES
(2, 4, 2, '2025-08-06', '2025-08-07', 'Dipinjam'),
(9, 4, 3, '2025-08-07', '2025-08-16', 'Dipinjam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(50) DEFAULT NULL,
  `kelas` varchar(50) DEFAULT NULL,
  `nomor_induk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `nama_siswa`, `kelas`, `nomor_induk`) VALUES
(2, 'budi', '10 RPL 1', '1234'),
(3, 'asda', '10 RPL 1', '0987'),
(4, 'okl', 'kkkj', 'uuu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `role` varchar(15) DEFAULT NULL,
  `nama` char(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT 'NULL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `email`, `role`, `nama`, `password`) VALUES
(1, 'admin@mail.com', NULL, 'Admin', '$2y$10$fczUcyb5r/XP6GtYPr2.sOIR5ir95.fV0jbsS2Eu/AM'),
(3, 'test@mail.com', NULL, 'test', '$2y$10$tZ.Ow3pQNlHbboXUdMxKd.o1BTTDv2Z.MVp4M1J0lt9'),
(4, 'a@gmail.com', NULL, 'Agus', '$2y$10$X5oyff0T.X7ailJzuRmY.eTdP3.JPPZv20QzFN6Y9yq'),
(5, 'qwerty@gmail.com', NULL, 'ertyfyg', '$2y$10$CkUUumzw6wORE/Mfu1mxH.cSFWP8mOs2P7eziS67Q/7'),
(7, 'ky@gmail.com', NULL, 'rizky', '$2y$10$mjUxJomOrdE.J/uBOjgKquemf24qjM5yhbmdqgEr5.l'),
(8, 'op_1@mail.com', NULL, 'operator', '$2y$10$NJ/DUuWdFN8Z0gRuYeZYIub39zSkhsQKg5s0vaFbE04aaWbXlg7qy');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `tbl_peminjam`
--
ALTER TABLE `tbl_peminjam`
  ADD PRIMARY KEY (`id_peminjam`),
  ADD KEY `tbl_peminjam_relation_buku` (`id_buku`),
  ADD KEY `tbl_peminjam_relation_siswa` (`id_siswa`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_peminjam`
--
ALTER TABLE `tbl_peminjam`
  MODIFY `id_peminjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_peminjam`
--
ALTER TABLE `tbl_peminjam`
  ADD CONSTRAINT `tbl_peminjam_relation_buku` FOREIGN KEY (`id_buku`) REFERENCES `tbl_buku` (`id_buku`),
  ADD CONSTRAINT `tbl_peminjam_relation_siswa` FOREIGN KEY (`id_siswa`) REFERENCES `tbl_siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
