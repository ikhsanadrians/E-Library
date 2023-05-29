-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 29 Bulan Mei 2023 pada 17.03
-- Versi server: 5.7.33
-- Versi PHP: 8.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `judul` text NOT NULL,
  `deskripsi` text NOT NULL,
  `image` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `penerbit_id` int(11) NOT NULL,
  `tanggal_terbit` date NOT NULL,
  `penulis_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id`, `judul`, `deskripsi`, `image`, `category_id`, `penerbit_id`, `tanggal_terbit`, `penulis_id`) VALUES
(1, 'Catatan Seorang Demostran', 'Buku ini bercerita tentang Soe Hok Gie yang merupakan seorang aktivis kampus yang memegang teguh prinsipnya dan memiliki cita-cita yang besar. Mimpinya bukan hanya tentang dirinya tapi juga tentang kepentingan orang banyak dan kaum yang termarjinalkan.', './temp/csd.jpg', 2, 1, '2013-05-02', 1),
(2, 'Orang-orang di Persimpangan Kiri Jalan', 'Novel Orang-orang di Persimpangan Kiri Jalan ini sejatinya diangkat dari skripsi karya Soe Hok Gie dengan judul \"Simpang Kiri dari Sebuah Jalan : Kisah Pemberontakan PKI Madiun September 1948\". Novel ini menjelaskan bagaimana sepak terjang dari Komunisme di Indonesia. Novel ini hanya membahas mengenai pemberontakan PKI di Madiun pada 1948 dan konflik internal yang terjadi pada organisasi PKI.\r\n', 'https://images-na.ssl-images-amazon.com/images/S/compressed.photo.goodreads.com/books/1464618963i/1283197.jpg', 1, 1, '2013-05-15', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `rak_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `name`, `rak_id`) VALUES
(1, 'Sejarah', 1),
(2, 'Politik', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone_number` char(13) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `token` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `member`
--

INSERT INTO `member` (`id`, `username`, `fullname`, `password`, `phone_number`, `jenis_kelamin`, `token`) VALUES
(1, 'saugix', 'Ahmad Saugi', 'hahahihi', '081808042380', 'L', 'jCWhKU7yCEnTPWE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `tgl_awal_pinjam` date NOT NULL,
  `tgl_akhir_pinjam` date NOT NULL,
  `kode_peminjaman` char(10) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `buku_id`, `member_id`, `petugas_id`, `tgl_awal_pinjam`, `tgl_akhir_pinjam`, `kode_peminjaman`, `status`) VALUES
(6, 1, 1, 1, '2023-05-29', '2023-05-31', 'pm4KXXxgBQ', 'process'),
(7, 1, 1, 1, '2023-05-30', '2023-05-31', 'pmmLItYvoY', 'process');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `name` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `name`) VALUES
(1, 'Erlangga'),
(2, 'Mizan '),
(3, 'Gramedia'),
(4, 'Elex Media ');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengembalian`
--

CREATE TABLE `pengembalian` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `tgl_pengembalian` date NOT NULL,
  `petugas_id` int(11) NOT NULL,
  `buku_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengembalian`
--

INSERT INTO `pengembalian` (`id`, `member_id`, `tgl_pengembalian`, `petugas_id`, `buku_id`, `status`) VALUES
(1, 1, '2023-05-31', 1, 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penulis`
--

CREATE TABLE `penulis` (
  `id` int(11) NOT NULL,
  `nama` varchar(90) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penulis`
--

INSERT INTO `penulis` (`id`, `nama`, `deskripsi`, `foto`) VALUES
(1, 'Soe Hok Gie', 'Drs. Soe Hok Gie adalah seorang aktivis keturunan Tionghoa-Indonesia yang menentang kediktatoran berturut-turut dari Presiden Soekarno dan Soeharto. Ia adalah mahasiswa Fakultas Sastra Universitas Indonesia Jurusan Sejarah tahun 1962–1969', 'https://www.biografiku.com/wp-content/uploads/2009/02/biografi-soe-hok-gie.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petugas`
--

CREATE TABLE `petugas` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nip` char(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `petugas`
--

INSERT INTO `petugas` (`id`, `username`, `password`, `nip`) VALUES
(1, 'Raya Arizkuy', 'raya-chan', '112233');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rak`
--

CREATE TABLE `rak` (
  `id` int(11) NOT NULL,
  `no_rak` int(11) NOT NULL,
  `nama_rak` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rak`
--

INSERT INTO `rak` (`id`, `no_rak`, `nama_rak`) VALUES
(1, 1, 'Sejarah Dan Politik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `isi` text NOT NULL,
  `time` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `penerbit_id` (`penerbit_id`),
  ADD KEY `penulis_id` (`penulis_id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rak_id` (`rak_id`);

--
-- Indeks untuk tabel `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `phone_number` (`phone_number`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `buku_id` (`buku_id`),
  ADD KEY `petugas_id` (`petugas_id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `member_id` (`member_id`),
  ADD KEY `petugas_id` (`petugas_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indeks untuk tabel `penulis`
--
ALTER TABLE `penulis`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rak`
--
ALTER TABLE `rak`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `member_id` (`member_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `penulis`
--
ALTER TABLE `penulis`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rak`
--
ALTER TABLE `rak`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book`
--
ALTER TABLE `book`
  ADD CONSTRAINT `book_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `book_ibfk_3` FOREIGN KEY (`penerbit_id`) REFERENCES `penerbit` (`id`),
  ADD CONSTRAINT `book_ibfk_4` FOREIGN KEY (`penulis_id`) REFERENCES `penulis` (`id`);

--
-- Ketidakleluasaan untuk tabel `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`rak_id`) REFERENCES `rak` (`id`);

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`buku_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD CONSTRAINT `pengembalian_ibfk_1` FOREIGN KEY (`petugas_id`) REFERENCES `petugas` (`id`),
  ADD CONSTRAINT `pengembalian_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`),
  ADD CONSTRAINT `pengembalian_ibfk_3` FOREIGN KEY (`buku_id`) REFERENCES `book` (`id`);

--
-- Ketidakleluasaan untuk tabel `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `book` (`id`),
  ADD CONSTRAINT `review_ibfk_2` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
