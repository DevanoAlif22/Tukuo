-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 05:19 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tukuo`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` varchar(300) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tipe` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama`, `deskripsi`, `harga`, `gambar`, `tipe`) VALUES
(1, 'Handphone Iphone 12 2023', 'iPhone 12. Layar Super Retina XDR 6,1 inci yang begitu cerah.1 Ceramic Shield dengan ketahanan jatuh empat kali lebih baik.2 Fotografi pencahayaan rendah yang menakjubkan dengan mode Malam di semua kamera.', 12000000, 'iklanip.jpg', 'iklan'),
(2, 'Motor Yamaha NMAX 2023', 'Harga Yamaha Nmax 2023 di Indonesia dimulai dari Rp 31,42 Juta. Tersedia dalam 5 pilihan warna dan 1 varian di Indonesia. Rem depan menggunakan Disc, sedangkan di belakang Disc.', 31000000, 'iklanempat.png', 'iklan'),
(3, 'Mobil Honda Brio 2023', 'Honda Brio 2022 adalah 5 Seater Hatchback yang tersedia dalam daftar harga Rp 157,9 - 237,4 Juta di Indonesia. Ini tersedia dalam 8 warna, 7 varian, 1 pilihan mesin, dan 2 opsi transmisi: Manual dan CVT di Indonesia.', 158000000, 'iklan.png', 'iklan'),
(4, 'Citroen C3', 'belum ada', 225000000, 'mobil1.png', 'mobil'),
(5, 'Daihatsu rocky', 'belum ada', 205000000, 'mobil2.png', 'mobil'),
(6, 'Toyota Avanza', 'belum ada', 233000000, 'mobil3.png', 'mobil'),
(7, 'Toyota Rush', 'belum ada', 271000000, 'mobil4.png', 'mobil'),
(8, 'Vespa Print', 'belum ada', 51000000, 'motor1.png', 'motor'),
(9, 'Honda Beat', 'belum ada', 17000000, 'motor2.png', 'motor'),
(10, 'Honda Vario 125', 'belum ada', 22000000, 'motor3.png', 'motor'),
(11, 'Honda Scoopy', 'belum ada', 22000000, 'motor4.png', 'motor'),
(12, 'Vivo Y50', 'belum ada', 4000000, 'jadi11.png', 'hp'),
(13, 'Infinix Hot 12', 'belum ada', 3200000, 'hp2.jpg', 'hp'),
(14, 'Oppo Reno 8', 'belum ada', 5000000, 'hp3.png', 'hp'),
(15, 'Redmi Note 11', 'belum ada', 2500000, 'hp4.png', 'hp'),
(20, 'Suzuki Vitara Brezza', 'belum ada', 165000000, 'vitara.png', 'mobil'),
(21, 'Toyota Kijang Innova', 'belum ada', 370000000, 'innova.png', 'mobil'),
(22, 'Daihatsu Sigra', 'belum ada', 132000000, 'sigra.png', 'mobil'),
(23, 'Toyota Calya', 'belum ada', 162000000, 'calya.png', 'mobil'),
(24, 'Samsung galaxy s22', 'belum ada', 13000000, 'galaxy.png', 'hp'),
(25, 'Redmi 9A', 'belum ada', 1200000, 'redmi9A.png', 'hp'),
(26, 'Poco x3', 'belum ada', 3500000, 'pocox3.png', 'hp'),
(27, 'Vivo v21', 'belum ada', 2000000, 'vivo21.png', 'hp'),
(28, 'Honda beat street', 'belum ada', 20000000, 'beetstreet.png', 'motor'),
(29, 'Honda Genio', 'belum ada', 19000000, 'genio.png', 'motor'),
(30, 'Charged Mateo', 'belum ada', 38000000, 'mateo.png', 'motor'),
(31, 'Yamaha Xmax', 'belum ada', 66000000, 'xmax.png', 'motor');

-- --------------------------------------------------------

--
-- Table structure for table `riwayat`
--

CREATE TABLE `riwayat` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `riwayat`
--

INSERT INTO `riwayat` (`id`, `nama`, `tanggal`, `total`) VALUES
(6, 'Devano', '2023-01-11', 180000000),
(7, 'Devano', '2023-01-11', 158000000),
(8, 'Fery', '2023-01-11', 158000000),
(11, 'Dian', '2023-01-12', 158000000),
(12, 'Ryan', '2023-01-12', 22000000),
(13, 'Handika', '2023-01-12', 162000000),
(14, 'Laseri', '2023-01-12', 158000000),
(15, 'Firman', '2023-01-12', 12000000),
(16, 'Fery', '2023-01-12', 323000000),
(17, '300000000', '2023-01-12', 290000000),
(18, 'Bagas', '2023-01-12', 31000000),
(19, 'deni', '2023-01-12', 132000000),
(20, 'andika', '2023-01-12', 160000000);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `riwayat`
--
ALTER TABLE `riwayat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `riwayat`
--
ALTER TABLE `riwayat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
