-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Okt 2022 pada 00.22
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
-- Database: `db_igapin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `kategori_buku` varchar(125) NOT NULL,
  `penerbit_buku` varchar(125) NOT NULL,
  `pengarang` varchar(125) NOT NULL,
  `tahun_terbit` varchar(125) NOT NULL,
  `isbn` int(50) NOT NULL,
  `j_buku_baik` varchar(125) NOT NULL,
  `j_buku_rusak` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id_buku`, `judul_buku`, `kategori_buku`, `penerbit_buku`, `pengarang`, `tahun_terbit`, `isbn`, `j_buku_baik`, `j_buku_rusak`) VALUES
(1, 'Flutter Master', 'Pemrograman', 'Sanji Winaya', 'Rian Pratama', '2022', 817525766, '30', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_app` varchar(50) NOT NULL,
  `alamat_app` text NOT NULL,
  `email_app` varchar(125) NOT NULL,
  `nomor_hp` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_app`, `alamat_app`, `email_app`, `nomor_hp`) VALUES
(1, 'StudentMs', 'Jl. Cisaranten Kulon No.17, Cisaranten Kulon, Kec. Arcamanik, Kota Bandung, Jawa Barat 40293', 'info@smkigasar-pindad.sch.id', '0227800587'),
(2, 'E-Perpus', 'Jl. Cisaranten Kulon No.17, Cisaranten Kulon, Kec. Arcamanik, Kota Bandung, Jawa Barat 40293', 'info@smkigasar-pindad.sch.id', '0227800587');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(50) NOT NULL,
  `nama_kategori` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, 'KT-001', 'Pemrograman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemberitahuan`
--

CREATE TABLE `pemberitahuan` (
  `id_pemberitahuan` int(11) NOT NULL,
  `isi_pemberitahuan` varchar(255) NOT NULL,
  `level_user` varchar(125) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemberitahuan`
--

INSERT INTO `pemberitahuan` (`id_pemberitahuan`, `isi_pemberitahuan`, `level_user`, `status`) VALUES
(1, '<i class=\'fa fa-exchange\'></i> #Ihsan Maulana Telah meminjam Buku', 'Admin', 'Sudah dibaca'),
(2, '<i class=\'fa fa-repeat\'></i> #Ihsan Maulana Telah mengembalikan Buku', 'Admin', 'Sudah dibaca');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `nama_anggota` varchar(125) NOT NULL,
  `judul_buku` varchar(125) NOT NULL,
  `tanggal_peminjaman` varchar(125) NOT NULL,
  `tanggal_pengembalian` varchar(50) NOT NULL,
  `kondisi_buku_saat_dipinjam` varchar(125) NOT NULL,
  `kondisi_buku_saat_dikembalikan` varchar(125) NOT NULL,
  `denda` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `nama_anggota`, `judul_buku`, `tanggal_peminjaman`, `tanggal_pengembalian`, `kondisi_buku_saat_dipinjam`, `kondisi_buku_saat_dikembalikan`, `denda`) VALUES
(1, 'Ihsan Maulana', 'Flutter Master', '23-09-2022', '23-09-2022', 'Baik', 'Hilang', 'Rp 50.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id_penerbit` int(11) NOT NULL,
  `kode_penerbit` varchar(125) NOT NULL,
  `nama_penerbit` varchar(50) NOT NULL,
  `verif_penerbit` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id_penerbit`, `kode_penerbit`, `nama_penerbit`, `verif_penerbit`) VALUES
(1, 'P001', 'Sanji Winaya', 'Terverifikasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` int(11) NOT NULL,
  `penerima` varchar(50) NOT NULL,
  `pengirim` varchar(50) NOT NULL,
  `judul_pesan` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status` varchar(50) NOT NULL,
  `tanggal_kirim` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `penerima`, `pengirim`, `judul_pesan`, `isi_pesan`, `status`, `tanggal_kirim`) VALUES
(1, 'Ihsan Maulana', 'Ihsan Maulana', 'Pengembalian Buku', 'Harap Kembalikan Buku Pada Tanggal 24 September 2022', 'Sudah dibaca', '23-09-2022');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `kode_user` varchar(25) NOT NULL,
  `nis` char(20) NOT NULL,
  `nig` char(20) NOT NULL,
  `fullname` varchar(125) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `mapel` varchar(155) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `verif` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `petugas` varchar(50) NOT NULL,
  `join_date` varchar(125) NOT NULL,
  `terakhir_login` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `kode_user`, `nis`, `nig`, `fullname`, `username`, `password`, `kelas`, `jabatan`, `mapel`, `alamat`, `verif`, `role`, `petugas`, `join_date`, `terakhir_login`) VALUES
(1, '-', '-', '', 'Ihsan Maulana', 'admin', 'admin123', '-', '', '', '-', 'Iya', 'Admin', '', '04-10-2022', '30-10-2022 ( 10:55:24 )'),
(6, 'SW001', '202273847301', '', 'Udin', 'udin', '3af4c9341e31bce1f4262a326285170d', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(7, 'GR002', '', '202273847302', 'Ihsan Maulana', 'ihsan', 'ea1e2b66eb6f4d6a8c6d8555e1b46cea', '', 'Kepala Sekolah', 'PEMROGRAMAN BERORIENTASI OBJEK', 'Bandung', 'Tidak', 'Guru', '', '30-10-2022', ''),
(10, 'SW002', '202273847302', '', 'Sanji Winaya', 'sanji', 'b8f820d759ca9bf6fb4f18b1b42d11d7', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(11, 'SW003', '202273847303', '', 'Tegar Firmansyah', 'tegar', 'd219e623bd90d0074c0904e425faf881', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(12, 'SW004', '202273847304', '', 'Firman Setiadi', 'firman', '7eda9a0d45d4dbfa99e06d4f402c2e67', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(13, 'SW005', '202273847305', '', 'Salman Ilham Salihan', 'salman', '97502267ac1b12468f69c14dd70196e9', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(14, 'SW006', '202273847306', '', 'Ridho Alfarizi', 'ridho', 'c006cfc408a40fc9662b89c1eb962af0', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(15, 'SW007', '202273847307', '', 'Ihsan Maulana', 'ihsan', 'f9c8074d5a013e0729373f8f74cd0648', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', '30-10-2022 ( 10:58:05 )'),
(16, 'SW008', '202273847308', '', 'Imelda Megawati Laksana Putri', 'imelda', '0337e4275a4b546128aa03ce6562550a', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(17, 'SW009', '202273847309', '', 'Rianti Eka Saputri', 'rianti', '53a4c002b3a8ea09a3f060f4453e65d6', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(18, 'SW010', '2022738473010', '', 'Mutiara Rosa', 'mutiara', '491b0ef09d68656789acad87084c8b55', 'XII - Rekayasa Perangkat Lunak', '', '', 'Bandung', 'Tidak', 'Siswa', '', '30-10-2022', ''),
(24, '-', '-', '', 'Miyuki Hime', 'miyuki', 'admin', '-', '', '', '-', 'Iya', 'Petugas', '', '30-10-2022', '30-10-2022 ( 10:57:07 )');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indeks untuk tabel `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  ADD PRIMARY KEY (`id_pemberitahuan`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id_penerbit`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pemberitahuan`
--
ALTER TABLE `pemberitahuan`
  MODIFY `id_pemberitahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id_penerbit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
