-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2022 pada 12.16
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppl`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_irs`
--

CREATE TABLE `dokumen_irs` (
  `id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen_irs`
--

INSERT INTO `dokumen_irs` (`id`, `file`) VALUES
(1, 'IRS.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_khs`
--

CREATE TABLE `dokumen_khs` (
  `id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen_khs`
--

INSERT INTO `dokumen_khs` (`id`, `file`) VALUES
(1, 'KHS.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_pkl`
--

CREATE TABLE `dokumen_pkl` (
  `id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen_pkl`
--

INSERT INTO `dokumen_pkl` (`id`, `file`) VALUES
(1, 'PKL.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumen_skirpsi`
--

CREATE TABLE `dokumen_skirpsi` (
  `id` int(11) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokumen_skirpsi`
--

INSERT INTO `dokumen_skirpsi` (`id`, `file`) VALUES
(1, 'SKRIPSI.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `dosen_id` int(10) NOT NULL,
  `kode_wali` varchar(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `matkul` varchar(50) NOT NULL,
  `prodi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`dosen_id`, `kode_wali`, `nip`, `nama`, `email`, `matkul`, `prodi`) VALUES
(1, 'A002', '240066422321', 'Adi Faishal', 'faishal@gmail.com', 'Struktur Data', 'Informatika'),
(2, 'A001', '240066400321', 'Muhammad Rasyid', 'rasyid@gmail.com', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `irs`
--

CREATE TABLE `irs` (
  `irs_id` int(11) NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  `jumlah_sks` int(11) NOT NULL,
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `irs`
--

INSERT INTO `irs` (`irs_id`, `semester_aktif`, `jumlah_sks`, `nim`) VALUES
(1, 5, 90, '24060120100022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `khs`
--

CREATE TABLE `khs` (
  `khs_id` int(11) NOT NULL,
  `semester_aktif` int(11) NOT NULL,
  `jml_sks_sms` int(11) NOT NULL,
  `jml_sks_kml` int(11) NOT NULL,
  `ip_semester` varchar(10) NOT NULL,
  `ip_kumulatif` varchar(10) NOT NULL,
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `khs`
--

INSERT INTO `khs` (`khs_id`, `semester_aktif`, `jml_sks_sms`, `jml_sks_kml`, `ip_semester`, `ip_kumulatif`, `nim`) VALUES
(1, 5, 19, 90, '2,90', '3,12', '24060120100022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswa_id` int(10) NOT NULL,
  `nim` varchar(20) NOT NULL,
  `kode_wali` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `angkatan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_tlp` varchar(20) NOT NULL,
  `status` varchar(30) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `fakultas` varchar(50) NOT NULL,
  `irs_id` int(11) DEFAULT NULL,
  `khs_id` int(11) DEFAULT NULL,
  `skripsi_id` int(11) DEFAULT NULL,
  `pkl_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswa_id`, `nim`, `kode_wali`, `nama`, `alamat`, `kota`, `provinsi`, `angkatan`, `email`, `no_tlp`, `status`, `prodi`, `fakultas`, `irs_id`, `khs_id`, `skripsi_id`, `pkl_id`) VALUES
(1, '24060120100022', 'A001', 'Kamisato Ayaka', 'Tembalang', 'Semarang', 'Jawa Tengah', '2022', 'ayaka@gmail.com', '088806014776', 'Aktif', 'Informatika', 'Sains dan Matematika', 1, 1, 1, 1),
(2, '24060120140122', 'A002', 'Dhanang Kurniawan Diyatama Putra', 'Dukuh Zamrud Blok K18 No.26', 'Bekasi', 'Jawa Barat', '2020', 'dhakurdp@gmail.com', '082213779012', 'Aktif', 'Informatika', 'Sains dan Matematika', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pkl`
--

CREATE TABLE `pkl` (
  `pkl_id` int(11) NOT NULL,
  `status_pkl` varchar(50) NOT NULL,
  `nilai_pkl` int(11) DEFAULT NULL,
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pkl`
--

INSERT INTO `pkl` (`pkl_id`, `status_pkl`, `nilai_pkl`, `nim`) VALUES
(1, 'Belum Ambil', NULL, '24060120100022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skripsi`
--

CREATE TABLE `skripsi` (
  `skripsi_id` int(11) NOT NULL,
  `status_skripsi` varchar(50) NOT NULL,
  `tgl_lulus` date DEFAULT NULL,
  `lama_studi` int(20) DEFAULT NULL,
  `nilai_skripsi` int(11) DEFAULT NULL,
  `nim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skripsi`
--

INSERT INTO `skripsi` (`skripsi_id`, `status_skripsi`, `tgl_lulus`, `lama_studi`, `nilai_skripsi`, `nim`) VALUES
(1, 'Belum Ambil', NULL, NULL, NULL, '24060120100022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(1, 'ayaka', 'd3de8fad30dc375f0495aa1d419bed24', 'ayaka@gmail.com', 'mahasiswa'),
(2, 'dhakurdp', 'a5e6431405456b900f572cba4bd6044b', 'dhakurdp@gmail.com', 'mahasiswa'),
(3, 'faishal', '610411b3fa6d392b21728417512487b0', 'faishal@gmail.com', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dokumen_irs`
--
ALTER TABLE `dokumen_irs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_khs`
--
ALTER TABLE `dokumen_khs`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_pkl`
--
ALTER TABLE `dokumen_pkl`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumen_skirpsi`
--
ALTER TABLE `dokumen_skirpsi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`dosen_id`),
  ADD KEY `kode_wali` (`kode_wali`);

--
-- Indeks untuk tabel `irs`
--
ALTER TABLE `irs`
  ADD PRIMARY KEY (`irs_id`),
  ADD KEY `irs_id` (`irs_id`,`nim`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `khs`
--
ALTER TABLE `khs`
  ADD PRIMARY KEY (`khs_id`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswa_id`),
  ADD KEY `kode_wali` (`kode_wali`),
  ADD KEY `id_skripsi_fk` (`skripsi_id`),
  ADD KEY `id_khs_fk` (`khs_id`),
  ADD KEY `id_irs_fk` (`irs_id`),
  ADD KEY `id_pkl_fk` (`pkl_id`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `pkl`
--
ALTER TABLE `pkl`
  ADD PRIMARY KEY (`pkl_id`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD PRIMARY KEY (`skripsi_id`),
  ADD KEY `nim` (`nim`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dokumen_irs`
--
ALTER TABLE `dokumen_irs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `dokumen_khs`
--
ALTER TABLE `dokumen_khs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `dokumen_pkl`
--
ALTER TABLE `dokumen_pkl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `dokumen_skirpsi`
--
ALTER TABLE `dokumen_skirpsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `irs`
--
ALTER TABLE `irs`
  MODIFY `irs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pkl`
--
ALTER TABLE `pkl`
  MODIFY `pkl_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  MODIFY `skripsi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `irs`
--
ALTER TABLE `irs`
  ADD CONSTRAINT `irs_ibfk_1` FOREIGN KEY (`irs_id`) REFERENCES `dokumen_irs` (`id`),
  ADD CONSTRAINT `irs_ibfk_3` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `irs_ibfk_4` FOREIGN KEY (`irs_id`) REFERENCES `mahasiswa` (`irs_id`);

--
-- Ketidakleluasaan untuk tabel `khs`
--
ALTER TABLE `khs`
  ADD CONSTRAINT `khs_ibfk_1` FOREIGN KEY (`khs_id`) REFERENCES `mahasiswa` (`khs_id`),
  ADD CONSTRAINT `khs_ibfk_2` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `khs_ibfk_3` FOREIGN KEY (`khs_id`) REFERENCES `dokumen_khs` (`id`);

--
-- Ketidakleluasaan untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`mahasiswa_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `mahasiswa_ibfk_3` FOREIGN KEY (`kode_wali`) REFERENCES `dosen` (`kode_wali`);

--
-- Ketidakleluasaan untuk tabel `pkl`
--
ALTER TABLE `pkl`
  ADD CONSTRAINT `pkl_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `pkl_ibfk_2` FOREIGN KEY (`pkl_id`) REFERENCES `mahasiswa` (`pkl_id`),
  ADD CONSTRAINT `pkl_ibfk_3` FOREIGN KEY (`pkl_id`) REFERENCES `dokumen_pkl` (`id`);

--
-- Ketidakleluasaan untuk tabel `skripsi`
--
ALTER TABLE `skripsi`
  ADD CONSTRAINT `skripsi_ibfk_1` FOREIGN KEY (`nim`) REFERENCES `mahasiswa` (`nim`),
  ADD CONSTRAINT `skripsi_ibfk_2` FOREIGN KEY (`skripsi_id`) REFERENCES `mahasiswa` (`skripsi_id`),
  ADD CONSTRAINT `skripsi_ibfk_3` FOREIGN KEY (`skripsi_id`) REFERENCES `dokumen_skirpsi` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
