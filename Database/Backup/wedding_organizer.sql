-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 16, 2024 at 12:41 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wedding_organizer`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_catalogues`
--

CREATE TABLE `tb_catalogues` (
  `pk_tb_catalogue` int(4) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `fk_tb_user` int(4) NOT NULL,
  `is_published` tinyint(1) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_catalogues`
--

INSERT INTO `tb_catalogues` (`pk_tb_catalogue`, `product_name`, `description`, `image`, `price`, `fk_tb_user`, `is_published`, `created_date`, `updated_date`) VALUES
(6, 'Akad Nikah Super Hemat', '<p><span style=\"font-family: Poppins, sans-serif;\">Paket lengkap yang mencakup rias dan busana, dekorasi, serta dokumentasi untuk memastikan setiap momen penuh makna terabadikan dengan sempurna</span></p><p></p><ul class=\"ul-list__title-menu\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; list-style: none; text-indent: -20px; color: rgb(60, 72, 88); font-family: Poppins, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin: 10px 0px 3px;\"><span style=\"font-family: Poppins, sans-serif;\">1. RIAS DAN BUSANA PENGANTIN PRIA DAN WANITA</span></li></ul><ul class=\"ul-list__title-menu\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; list-style: none; text-indent: -20px; color: rgb(60, 72, 88); font-family: Poppins, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin: 10px 0px 3px;\"><span style=\"font-family: Poppins, sans-serif;\">2. DEKORASI :</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">A. Meja Akad</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">B. Kursi Akad 6 Pcs</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">C. Backdrop Akad Nikah</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">D. 1 Meja Tamu</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">E. 1 Buku Tamu</span></li></ul><ul class=\"ul-list__title-menu\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; -webkit-font-smoothing: antialiased; list-style: none; text-indent: -20px; color: rgb(60, 72, 88); font-family: Poppins, sans-serif;\"><li style=\"-webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: uppercase; font-weight: 700; letter-spacing: 1px; margin: 10px 0px 3px;\"><span style=\"font-family: Poppins, sans-serif;\">3. DOKUMENTASI</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; -webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">A. Foto</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; -webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">B. 1 Album Kolase Eksklusif Uk. 20 X 30, 10 Sheet ( 20 Hal )</span></li></ul><ul class=\"ul-list__sub-menu-nolist\" style=\"-webkit-tap-highlight-color: transparent; margin-right: 0px; margin-left: 10px; -webkit-font-smoothing: antialiased; list-style: none; padding: 0px 0px 0px 10px;\"><li style=\"background-image: none; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; -webkit-tap-highlight-color: transparent; -webkit-font-smoothing: antialiased; text-transform: capitalize; letter-spacing: inherit; margin: 0px 0px 5px; display: inherit; color: inherit;\"><span style=\"font-family: Poppins, sans-serif;\">C. 1 Flashdisk Isi Foto Master Dan Editing</span></li></ul><p></p>\r\n', 'Public/Uploads/666be821ccc186.72858002.jpeg', 7500000, 1, 1, '2024-06-14 13:50:09', '2024-06-16 17:36:18'),
(8, 'Akad Nikah Hemat Lengkap', '<p>Paket pernikahan lengkap yang dirancang untuk memenuhi segala kebutuhan Anda pada hari istimewa. Dari rias dan busana, dekorasi elegan, hingga dokumentasi profesional, setiap detail diperhatikan dengan seksama untuk menciptakan momen yang tak terlupakan.</p><p><strong>1. Prasmanan untuk 100 Orang</strong></p><p>A. <strong>Nasi (pilih dua):</strong></p><ul><li>Nasi Putih</li><li>Nasi Goreng Jawa (Best Seller 1)</li><li>Nasi Goreng XO (Best Seller 2)</li><li>Nasi Goreng Oriental</li><li>Nasi Goreng Teri</li><li>Nasi Goreng Sosis</li><li>Nasi Goreng Kunyit</li><li>Nasi Goreng Nanas dengan Kismis</li><li>Nasi Goreng Kampung Ikan Asin</li><li>Nasi Goreng Tomyam</li></ul><p>B. <strong>Sup (pilih satu):</strong></p><ul><li>Sup Manten Tiga Dara (Best Seller 1)</li><li>Sup Tomyam (Best Seller 2)</li><li>Sup Bakso Sosis</li><li>Sup Ayam Jagung</li><li>Sup Asam Pedas Szechuan Style</li><li>Sup Makaroni dengan Bakso</li><li>Sup Ayam dengan Jamur</li></ul><p>C. <strong>Ayam (pilih satu):</strong></p><ul><li>Ayam Rica-Rica (Best Seller 1)</li><li>Ayam Goreng dengan Bumbu Special Tiga Dara (Best Seller 2)</li><li>Ayam Bumbu Rujak</li><li>Ayam Cabai Hijau</li><li>Ayam Balado</li><li>Ayam Blackpepper</li><li>Ayam Sambal Matah</li><li>Ayam Rendang</li><li>Ayam Bumbu Kari</li><li>Ayam Kuluyuk</li><li>Ayam Goreng Saus Padang</li><li>Ayam Goreng Betutu</li><li>Ayam Goreng Szechuan dengan Cabai Kering</li><li>Ayam Goreng Mentega</li><li>Ayam Woku</li><li>Ayam Goreng Saus Curry</li><li>Ayam Goreng Saus Oley</li><li>Ayam Goreng Saus Hawaiian</li></ul><p>D. <strong>Ikan (pilih satu):</strong></p><ul><li>Ikan Dori Fillet Asam Manis (Best Seller 1)</li><li>Ikan Goreng Saus Lemon (Best Seller 2)</li><li>Ikan Goreng Saus Padang</li><li>Ikan Goreng Saus Thai</li><li>Ikan Goreng Cabai Hijau</li><li>Ikan Bumbu Rujak</li><li>Ikan Bumbu Balado</li><li>Ikan Garang Asam</li><li>Ikan Pesmol</li><li>Ikan Sambal Matah</li><li>Ikan Goreng Saus Singapore</li><li>Ikan Goreng Saus Teriyaki</li><li>Ikan Goreng Saus Asam Padeh</li><li>Ikan Dori Fillet Saus Curry</li><li>Ikan Dori Fillet Saus Oley</li><li>Ikan Dori Fillet Saus Hawaiian</li></ul><p>E. <strong>Salad (pilih satu):</strong></p><ul><li>Asinan Sayuran (Best Seller 1)</li><li>Salad Bangkok (Best Seller 2)</li><li>Gado-Gado Betawi</li><li>Pecel Sayuran</li><li>Rujak Pengantin</li><li>Karedok</li><li>Salad Kentang dengan Sayuran</li></ul><p>F. <strong>Pudding</strong></p><p>G. <strong>Soft Drink</strong></p><p>H. <strong>Buah</strong></p><p>I. <strong>Kerupuk</strong></p><p>J. <strong>Air Mineral</strong></p><p><strong>2. Rias dan Busana Pengantin Pria dan Wanita</strong></p><p><strong>3. Rias dan Busana untuk 4 Orang Tua</strong></p><p><strong>4. Dekorasi</strong></p><p>A. Meja Akad<br>B. Kursi Akad (6 pcs)<br>C. Backdrop Akad Nikah<br>D. 1 Meja Tamu<br>E. 1 Buku Tamu</p><p><strong>5. Dokumentasi</strong></p><p>A. Foto dan Video Shooting<br>B. 1 Album Kolase Eksklusif Ukuran 20 x 30, 10 Sheet (20 Halaman)<br>C. 1 Flashdisk Isi File Foto dan Video<br>D. Video Klip 1 Menit untuk Diunggah ke Media Sosial (Instagram, Facebook, dll)</p><p>Dengan layanan yang komprehensif ini, kami berkomitmen untuk menghadirkan pengalaman pernikahan yang memukau dan penuh kenangan. Kami siap mendukung setiap langkah perjalanan Anda menuju hari yang penuh kebahagiaan.</p>', 'Public/Uploads/666ebeb7147363.45678572.jpeg', 14000000, 1, 1, '2024-06-16 12:52:54', '2024-06-16 17:30:15'),
(9, 'Akad Nikah Hemat Lengkap(Nasi Box)', '<p>Nikmati paket pernikahan lengkap yang mencakup rias dan busana, dekorasi, serta dokumentasi untuk memastikan setiap momen penuh makna terabadikan dengan sempurna. Kami menyediakan pilihan menu prasmanan dan nasi box untuk 100 pax, dengan berbagai pilihan hidangan yang lezat dan berkualitas.</p><p><strong>NASI BOX PAKET FIRST CLASS 100 PAX (BISA CEK DI WEBSITE NASI BOX TIGA DARA) ATAU PRASMANAN 100 PAX, TERDIRI DARI:</strong></p><p><strong>A. NASI, PILIH DUA:</strong></p><ul><li>Nasi Putih</li><li>Nasi Goreng Jawa (Best Seller 1)</li><li>Nasi Goreng XO (Best Seller 2)</li><li>Nasi Goreng Oriental</li><li>Nasi Goreng Teri</li><li>Nasi Goreng Sosis</li><li>Nasi Goreng Kunyit</li><li>Nasi Goreng Nanas Dengan Kismis</li><li>Nasi Goreng Kampung Ikan Asin</li><li>Nasi Goreng Tomyam</li></ul><p><strong>B. SOUP, PILIH SALAH SATU:</strong></p><ul><li>Soup Manten Tiga Dara (Best Seller 1)</li><li>Soup Tomyam (Best Seller 2)</li><li>Soup Bakso Sosis</li><li>Soup Ayam Jagung</li><li>Soup Asam Pedas Szechuan Style</li><li>Soup Makaroni Dengan Bakso</li><li>Soup Ayam Dengan Jamur</li></ul><p><strong>C. AYAM, PILIH SALAH SATU:</strong></p><ul><li>Ayam Rica-Rica (Best Seller 1)</li><li>Ayam Goreng Dengan Bumbu Special Tiga Dara (Best Seller 2)</li><li>Ayam Bumbu Rujak</li><li>Ayam Cabai Hijau</li><li>Ayam Balado</li><li>Ayam Blackpaper</li><li>Ayam Sambal Matah</li><li>Ayam Rendang</li><li>Ayam Bumbu Kari</li><li>Ayam Kuluyuk</li><li>Ayam Goreng Saus Padang</li><li>Ayam Goreng Betutu</li><li>Ayam Goreng Szechuan Dengan Cabai Kering</li><li>Ayam Goreng Mentega</li><li>Ayam Woku</li><li>Ayam Goreng Saos Curry</li><li>Ayam Goreng Saos Oley</li><li>Ayam Goreng Saos Hawaian</li></ul><p><strong>D. IKAN, PILIH SALAH SATU:</strong></p><ul><li>Ikan Dori Fillet Asam Manis (Best Seller 1)</li><li>Ikan Goreng Saus Lemon (Best Seller 2)</li><li>Ikan Goreng Saus Padang</li><li>Ikan Goreng Saus Thai</li><li>Ikan Goreng Cabai Hijau</li><li>Ikan Bumbu Rujak</li><li>Ikan Bumbu Balado</li><li>Ikan Garang Asam</li><li>Ikan Pesmol</li><li>Ikan Sambal Matah</li><li>Ikan Goreng Saus Singapore</li><li>Ikan Goreng Saus Teriyaki</li><li>Ikan Goreng Saus Asam Padeh</li><li>Ikan Dori Fillet Saos Curry</li><li>Ikan Dori Fillet Saos Oley</li><li>Ikan Dori Fillet Saos Hawaian</li></ul><p><strong>E. SALAD, PILIH SALAH SATU:</strong></p><ul><li>Asinan Sayuran (Best Seller 1)</li><li>Salad Bangkok (Best Seller 2)</li><li>Gado-Gado Betawi</li><li>Pecel Sayuran</li><li>Rujak Pengantin</li><li>Karedok</li><li>Salad Kentang Dengan Sayuran</li></ul><p><strong>F. PUDDING</strong></p><p><strong>G. SOFT DRINK</strong></p><p><strong>H. BUAH</strong></p><p><strong>I. KERUPUK</strong></p><p><strong>J. AIR MINERAL</strong></p><p><strong>2. RIAS BUSANA PENGANTIN PRIA &amp; WANITA</strong></p><p><strong>3. RIAS BUSANA UNTUK 4 ORANG TUA</strong></p><p><strong>4. DEKORASI</strong></p><ul><li>Meja Akad</li><li>Kursi Akad 6 Pcs</li><li>Backdrop Akad Nikah</li><li>1 Meja Tamu</li><li>1 Buku Tamu</li></ul><p><strong>5. DOKUMENTASI</strong></p><ul><li>Foto Dan Video Shooting</li><li>1 Album Kolase Eksklusif Uk. 20 X 30 10 Sheet (20 Hal)</li><li>1 Flashdisk Isi File Foto &amp; Video</li><li>Video Klip 1 Menit Untuk Di Upload Ke Sosial Media (Instagram, Facebook, Dll)</li></ul>', 'Public/Uploads/666ec119620a04.48308657.jpeg', 14000000, 1, 1, '2024-06-16 12:53:16', '2024-06-16 17:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `tb_orders`
--

CREATE TABLE `tb_orders` (
  `pk_tb_order` varchar(16) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(16) NOT NULL,
  `fk_tb_catalogue` int(4) NOT NULL,
  `wedding_date` date NOT NULL,
  `status` enum('Requested','Approved','Rejected','Cancel') NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_settings`
--

CREATE TABLE `tb_settings` (
  `pk_tb_setting` int(4) NOT NULL,
  `setting_name` varchar(100) NOT NULL,
  `setting_value` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `pk_tb_user` int(4) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_date` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`pk_tb_user`, `name`, `username`, `password`, `created_date`, `updated_date`) VALUES
(1, 'Calvin Danyalson', 'admin', '$2y$10$O/WdqPemb8o/aP2su76AButb3.CLOZSYwN6OlF21m6dxWbk5ztlES', '2024-06-13 22:25:28', '2024-06-16 17:41:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_catalogues`
--
ALTER TABLE `tb_catalogues`
  ADD PRIMARY KEY (`pk_tb_catalogue`),
  ADD KEY `fk_tb_user` (`fk_tb_user`);

--
-- Indexes for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD PRIMARY KEY (`pk_tb_order`),
  ADD KEY `tb_orders_ibfk_1` (`fk_tb_catalogue`);

--
-- Indexes for table `tb_settings`
--
ALTER TABLE `tb_settings`
  ADD PRIMARY KEY (`pk_tb_setting`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`pk_tb_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_catalogues`
--
ALTER TABLE `tb_catalogues`
  MODIFY `pk_tb_catalogue` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_settings`
--
ALTER TABLE `tb_settings`
  MODIFY `pk_tb_setting` int(4) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `pk_tb_user` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_catalogues`
--
ALTER TABLE `tb_catalogues`
  ADD CONSTRAINT `tb_catalogues_ibfk_1` FOREIGN KEY (`fk_tb_user`) REFERENCES `tb_users` (`pk_tb_user`);

--
-- Constraints for table `tb_orders`
--
ALTER TABLE `tb_orders`
  ADD CONSTRAINT `tb_orders_ibfk_1` FOREIGN KEY (`fk_tb_catalogue`) REFERENCES `tb_catalogues` (`pk_tb_catalogue`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
