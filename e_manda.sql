-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 05 Sep 2023 pada 08.27
-- Versi server: 10.4.10-MariaDB
-- Versi PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_manda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id_agenda` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_agenda` varchar(200) NOT NULL,
  `tempat` varchar(200) NOT NULL,
  `leading_sector` varchar(200) NOT NULL,
  `disposisi` varchar(200) NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `jam` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id_agenda`, `id_user`, `nama_agenda`, `tempat`, `leading_sector`, `disposisi`, `keterangan`, `tanggal`, `jam`) VALUES
(1, 2, 'Penyerahan bantuan keapda pedagang kaki lima', 'Pantai Bandengan', 'Ds Bandengan', 'Hadir Pribadi', 'Penyerahan bantuan diberikan oleh bupati kepada para pedagang di sekitar pantai bandengan', '2024-07-09', '08:00:00'),
(6, 2, 'Audiensi Festival kepemudaan Olahraga ', 'R Command Center', 'Pemerintahan', 'Hadir Pribadi', 'Dalam rangka memperingati HUT RI ke 79 Tahun 2024', '2024-07-09', '09:00:00'),
(7, 2, 'Rapat pembahasan Ranperbub tentang perubahan APBD TA 2024', 'R Command Center', 'BPKAD', 'Hadir Pribadi', 'Besar biaya yang akan dianggarkan', '2024-07-09', '11:05:00'),
(12, 2, 'Mendengarkan Pidato Kenegaraan', 'Ruang Paripurna', 'DPRD', 'Diwakilkan Ass 1', 'Berhalangan hadir karena tabrakan dengan agenda lain', '2024-07-09', '13:05:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `id_user_level` int(11) NOT NULL,
  `no_whatsapp` varchar(15) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `jabatan` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_user_level`, `no_whatsapp`, `nama`, `jabatan`, `email`, `username`, `password`) VALUES
(1, 1, '089675439815', 'Muhammad Rizky Setiawan', 'admind kominfo', 'rizkysetiawan010201@gmail.com', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(2, 2, '085712110047', 'Akhmad Rifqun Nabil', 'Bupati Jepara', 'bupatijepara@gmail.com', 'bupati', 'c78de339ede23183fc9655b17fd6ba95'),
(3, 2, '081225046170', 'Afrian Dhimas Anthony', 'Bupati Kudus', '122201902736@mhs.dinus.ac.id', 'afriandimas_', '25d55ad283aa400af464c76d713c07ad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_user_level` int(11) NOT NULL,
  `user_level` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_user_level`, `user_level`) VALUES
(1, 'Administrator'),
(2, 'User');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id_agenda`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_user_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id_agenda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_user_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
