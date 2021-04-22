-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 02:16 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp4pbo2021`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_wishlist`
--

CREATE TABLE `tb_wishlist` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `priority` varchar(10) NOT NULL,
  `status_beli` enum('Belum','Sudah') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_wishlist`
--

INSERT INTO `tb_wishlist` (`id`, `nama_barang`, `harga`, `description`, `link`, `priority`, `status_beli`) VALUES
(5, 'Nintendo Switch', 5815000, 'Nintendo Switch Console New Model V2 Bundle Game - Grey', 'https://www.tokopedia.com/butikgames/nintendo-switch-console-new-model-v2-bundle-game-grey', 'Low', 'Sudah'),
(8, 'Laptop ASUS', 18519000, 'ASUS TUF GAMING A15 FX506IV RYZEN 7 4800H 8GB 512GB RTX2060 6GB 144HZ', 'https://www.tokopedia.com/protechcom/asus-tuf-gaming-a15-fx506iv-ryzen-7-4800h-8gb-512gb-rtx2060-6gb-144hz', 'High', 'Belum');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_wishlist`
--
ALTER TABLE `tb_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
