-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 14, 2023 at 01:16 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webbansach`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id_admin` int NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id_admin`, `username`, `password`, `admin_status`) VALUES
(1, 'PhanHieu', '25f9e794323b453885f5181f1b624d0b', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id_cart` int NOT NULL,
  `id_khachhang` int NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `cart_status` int NOT NULL,
  `cart_payment` varchar(50) NOT NULL,
  `cart_shipping` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id_cart`, `id_khachhang`, `code_cart`, `cart_status`, `cart_payment`, `cart_shipping`) VALUES
(140, 50, '8792', 0, 'tienmat', 22);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart_details`
--

CREATE TABLE `tbl_cart_details` (
  `id_cart_details` int NOT NULL,
  `code_cart` varchar(10) NOT NULL,
  `id_sanpham` int NOT NULL,
  `soluongmua` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_cart_details`
--

INSERT INTO `tbl_cart_details` (`id_cart_details`, `code_cart`, `id_sanpham`, `soluongmua`) VALUES
(127, '7477', 89, 1),
(128, '7477', 90, 1),
(129, '3046', 90, 1),
(130, '6521', 89, 1),
(131, '5811', 6, 1),
(132, '4737', 90, 2),
(133, '4737', 89, 1),
(134, '7442', 90, 2),
(135, '1525', 91, 1),
(136, '4960', 91, 1),
(137, '7064', 91, 1),
(138, '7103', 91, 1),
(139, '1113', 91, 1),
(140, '6708', 91, 1),
(141, '9678', 91, 1),
(142, '6088', 99, 1),
(143, '5546', 92, 1),
(144, '9707', 98, 1),
(145, '8792', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dangky`
--

CREATE TABLE `tbl_dangky` (
  `id_dangky` int NOT NULL,
  `tenkhachhang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `matkhau` varchar(100) NOT NULL,
  `dienthoai` varchar(20) NOT NULL,
  `otp` text NOT NULL,
  `tinhtrang` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_dangky`
--

INSERT INTO `tbl_dangky` (`id_dangky`, `tenkhachhang`, `email`, `diachi`, `matkhau`, `dienthoai`, `otp`, `tinhtrang`) VALUES
(50, 'Phan Hiếu', 'tinchuanchuaanh2001@gmail.com', 'Nam thành, yên thành, nghệ an', 'c4ca4238a0b923820dcc509a6f75849b', '0919984769', '0', 'Đã xác nhận');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmuc`
--

CREATE TABLE `tbl_danhmuc` (
  `id_danhmuc` int NOT NULL,
  `tendanhmuc` varchar(100) NOT NULL,
  `thutu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_danhmuc`
--

INSERT INTO `tbl_danhmuc` (`id_danhmuc`, `tendanhmuc`, `thutu`) VALUES
(28, 'Sách Trẻ Em', 1),
(29, 'Sách Cho Nữ', 2),
(30, 'Sách Cho Nam', 3),
(31, 'Sách Khoa Học', 4),
(32, 'Sách Giáo Khoa', 5),
(33, 'Sách Chuyên Ngành', 6),
(34, 'Sách Nước Ngoài', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_danhmucbaiviet`
--

CREATE TABLE `tbl_danhmucbaiviet` (
  `id_baiviet` int NOT NULL,
  `tendanhmuc_baiviet` varchar(255) NOT NULL,
  `thutu` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_danhmucbaiviet`
--

INSERT INTO `tbl_danhmucbaiviet` (`id_baiviet`, `tendanhmuc_baiviet`, `thutu`) VALUES
(4, 'Mẫu mới 2025', 4),
(6, 'giày mới', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `id_sanpham` int NOT NULL,
  `tensanpham` varchar(200) NOT NULL,
  `masp` varchar(100) NOT NULL,
  `giasp` varchar(50) NOT NULL,
  `soluong` int NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `tomtat` tinytext NOT NULL,
  `noidung` text NOT NULL,
  `tacgia` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tinhtrang` int NOT NULL,
  `id_danhmuc` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`id_sanpham`, `tensanpham`, `masp`, `giasp`, `soluong`, `hinhanh`, `tomtat`, `noidung`, `tacgia`, `tinhtrang`, `id_danhmuc`) VALUES
(6, 'Avengers : Secret War', '4', '2300000', -9, '1680577700_55264410._SY475_.jpg', '<p>Secret Wars được l&agrave;m lại dưới ng&ograve;i b&uacute;t của Jonathan Hickman v&agrave; Esad Rib&iacute;c, nhưng lần n&agrave;y lại tập trung v&agrave;o sự sụp đổ của đa vũ trụ</p>\r\n', '<p>Secret Wars được l&agrave;m lại dưới ng&ograve;i b&uacute;t của Jonathan Hickman v&agrave; Esad Rib&iacute;c, nhưng lần n&agrave;y lại tập trung v&agrave;o sự sụp đổ của đa vũ trụ</p>\r\n', 'Phan Công Hiếu', 1, 30),
(7, 'Beast Friend', '5', '10000000', 9, '1683525703_2f326b8077e7aab9f3f6 copy.jpg', '<p>kể về......</p>\r\n', '<p>fkjsdhfjkdfsgfdgfdgdf</p>\r\n', 'Phan công hiếu', 1, 34),
(8, 'Beast Friend', '5', '10000000', 10, '1683525725_2f326b8077e7aab9f3f6 cop2y.jpg', '<p>kể về......</p>\r\n', '<p>fkjsdhfjkdfsgfdgfdgdf</p>\r\n', 'Phan công hiếu', 1, 34),
(88, 'Bé Tập Tô', '1', '12000', -13, '1679848383_55264410._SY475_.jpg', '<p>s&aacute;ch n&oacute;i về cậu b&eacute; thiểu năng v&agrave; h&agrave;nh tr&igrave;nh vẽ vời của n&oacute;</p>\r\n', '<p>s&aacute;ch n&oacute;i về cậu b&eacute; thiểu năng v&agrave; h&agrave;nh tr&igrave;nh vẽ vời của n&oacute;&nbsp;s&aacute;ch n&oacute;i về cậu b&eacute; thiểu năng v&agrave; h&agrave;nh tr&igrave;nh vẽ vời của n&oacute;&nbsp;s&aacute;ch n&oacute;i về cậu b&eacute; thiểu năng v&agrave; h&agrave;nh tr&igrave;nh vẽ vời của n&oacute;&nbsp;s&aacute;ch n&oacute;i về cậu b&eacute; thiểu năng v&agrave; h&agrave;nh tr&igrave;nh vẽ vời của n&oacute;</p>\r\n', 'Phan công hiếu', 1, 28),
(89, 'Avengers : Secret War', '4', '2300000', -9, '1680577700_55264410._SY475_.jpg', '<p>Secret Wars được l&agrave;m lại dưới ng&ograve;i b&uacute;t của Jonathan Hickman v&agrave; Esad Rib&iacute;c, nhưng lần n&agrave;y lại tập trung v&agrave;o sự sụp đổ của đa vũ trụ</p>\r\n', '<p>Secret Wars được l&agrave;m lại dưới ng&ograve;i b&uacute;t của Jonathan Hickman v&agrave; Esad Rib&iacute;c, nhưng lần n&agrave;y lại tập trung v&agrave;o sự sụp đổ của đa vũ trụ</p>\r\n', 'Phan Công Hiếu', 1, 30),
(92, 'Ahjhj D0ng0k', '2', '3300000', 4, '1683524314_2f326b8077e7aab9f3f6 copy.jpg', '<p><strong>Kang Dynasty, hay c&ograve;n được gọi l&agrave; Kang War, l&agrave; một sự kiện k&eacute;o d&agrave;i 16 chương, thuộc bộ&nbsp;<em>Avengers Vol. 3</em></strong></p>\r\n', '<p>Nhận thấy những bất lợi trong cuộc chiến tr&ecirc;n Tr&aacute;i Đất, một số Avengers do Captain America chỉ huy đ&atilde; quyết định ra ngo&agrave;i vũ trụ v&agrave; tấn c&ocirc;ng</p>\r\n', 'Phan công hiếu', 1, 34),
(93, 'The Secret War', '3', '2300000', 5, '1683524185_9780871359032-uk.jpg', '<p><strong>Kang Dynasty, hay c&ograve;n được gọi l&agrave; Kang War, l&agrave; một sự kiện k&eacute;o d&agrave;i 16 chương, thuộc bộ&nbsp;<em>Avengers Vol. 3</em></strong></p>\r\n', '<p>Nhận thấy những bất lợi trong cuộc chiến tr&ecirc;n Tr&aacute;i Đất, một số Avengers do Captain America chỉ huy đ&atilde; quyết định ra ngo&agrave;i vũ trụ v&agrave; tấn c&ocirc;ng</p>\r\n', 'Phan công hiếu', 1, 34),
(94, 'Kang Dynasty', '4', '2300000', 5, '1683524875_2f326b8077e7aab9f3f6.jpg', '<p><strong>Kang Dynasty, hay c&ograve;n được gọi l&agrave; Kang War, l&agrave; một sự kiện k&eacute;o d&agrave;i 16 chương, thuộc bộ&nbsp;<em>Avengers Vol. 3</em></strong></p>\r\n', '<p>Nhận thấy những bất lợi trong cuộc chiến tr&ecirc;n Tr&aacute;i Đất, một số Avengers do Captain America chỉ huy đ&atilde; quyết định ra ngo&agrave;i vũ trụ v&agrave; tấn c&ocirc;ng</p>\r\n', 'Phan công hiếu', 1, 34),
(95, 'Captain Ameria', '6', '24000', 23, '1683524590_2f326b8077e7aab9f3f6 copy.jpg', '<p>anh hieu vjp</p>\r\n', '<p>Super woman</p>\r\n', 'Stan Lee', 1, 28),
(96, 'Fantastic Four', '8', '450000', 12, '1683524849_2f326b8077e7aab9f3f6 cop2y.jpg', '<p>Bộ tứ si&ecirc;u đẳng l&agrave; 4 anh h&ugrave;ng của Marvel Comic</p>\r\n', '<p>&nbsp;</p>\r\n\r\n<p>C&aacute;c nh&acirc;n vật trong nh&oacute;m si&ecirc;u anh h&ugrave;ng n&agrave;y gồm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Mr._Fantastic\" title=\"Mr. Fantastic\">Reed Richards</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_ph%E1%BB%A5_n%E1%BB%AF_t%C3%A0ng_h%C3%ACnh\" title=\"Người phụ nữ tàng hình\">Susan Storm</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Human_Torch\" title=\"Human Torch\">Johnny Storm</a>&nbsp;v&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Thing_(truy%E1%BB%87n_tranh)\" title=\"Thing (truyện tranh)\">Ben Grimm</a>.</p>\r\n', 'Stan Lee', 1, 34),
(97, 'Captain Ameria 2', '11', '2300000', 5, '1683525513_2f326b8077e7aab9f3f6 copy.jpg', '<p>dsadasdasdsa</p>\r\n', '<p>&aacute;dasdasdasdas</p>\r\n', 'Hieu', 1, 28),
(98, 'Fantastic Four 2', '12', '10000000', 10, '1683525558_2f326b8077e7aab9f3f6 cop2y.jpg', '<p>Bộ tứ si&ecirc;u đẳng l&agrave; 4 anh h&ugrave;ng của Marvel Comic</p>\r\n', '<p>C&aacute;c nh&acirc;n vật trong nh&oacute;m si&ecirc;u anh h&ugrave;ng n&agrave;y gồm&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Mr._Fantastic\" title=\"Mr. Fantastic\">Reed Richards</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Ng%C6%B0%E1%BB%9Di_ph%E1%BB%A5_n%E1%BB%AF_t%C3%A0ng_h%C3%ACnh\" title=\"Người phụ nữ tàng hình\">Susan Storm</a>,&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Human_Torch\" title=\"Human Torch\">Johnny Storm</a>&nbsp;v&agrave;&nbsp;<a href=\"https://vi.wikipedia.org/wiki/Thing_(truy%E1%BB%87n_tranh)\" title=\"Thing (truyện tranh)\">Ben Grimm</a>.</p>\r\n', 'Stan Lee', 1, 28),
(99, 'Captain Ameria ', '111', '2300000', 21, '1683525758_2f326b8077e7aab9f3f6 copy.jpg', '<p>ẻwerwer</p>\r\n', '<p>ewrwerwe</p>\r\n', 'Hieu', 1, 34);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_shipping`
--

CREATE TABLE `tbl_shipping` (
  `id_shipping` int NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `id_dangky` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tbl_shipping`
--

INSERT INTO `tbl_shipping` (`id_shipping`, `name`, `phone`, `address`, `note`, `id_dangky`) VALUES
(13, 'Hiếu Phan công', '+91972848538', '80 đỗ  quỳ , hòa xuân , cẩm lệ', 'giao nhanh', 38),
(14, 'Hiếu Phan công', '+91972848538', '80 đỗ  quỳ , hòa xuân , cẩm lệ', 'giao nhanh', 38),
(15, 'Phan Hiếu', '0919984769', 'Nam thành, yên thành, nghệ an', '', 36),
(16, 'Phan Hiếu', '0919984769', 'Nam thành, yên thành, nghệ an', 'giao nhanh lên nhé ', 39),
(17, 'Phan Hiếu', '0919984769', 'Nam thành, yên thành, nghệ an', 'giao nhanh lên nhé ', 43),
(18, 'Phan Công Hiếu', '0972848538', 'Nghệ an', 'giao nhanh lên nhé ', 44),
(19, 'Phan Hiếu', '0919984769', 'Nam thành, yên thành, nghệ an', 'giao nhanh lên nhé ', 45),
(20, 'Phan Hiếu', '0919984769', 'Nam thành, yên thành, nghệ an', 'giao nhanh lên nhé ', 48),
(21, 'Phan Hiếu', '0919984769', 'Nam thành, yên thành, nghệ an', 'giao nhanh lên nhé ', 48),
(22, 'Phan Hiếu', '0919984769', 'Nam thành, yên thành, nghệ an', '', 50);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id_cart`);

--
-- Indexes for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  ADD PRIMARY KEY (`id_cart_details`);

--
-- Indexes for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  ADD PRIMARY KEY (`id_dangky`),
  ADD UNIQUE KEY `otp` (`id_dangky`);

--
-- Indexes for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  ADD PRIMARY KEY (`id_danhmuc`);

--
-- Indexes for table `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  ADD PRIMARY KEY (`id_baiviet`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`id_sanpham`);

--
-- Indexes for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  ADD PRIMARY KEY (`id_shipping`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id_cart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;

--
-- AUTO_INCREMENT for table `tbl_cart_details`
--
ALTER TABLE `tbl_cart_details`
  MODIFY `id_cart_details` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `tbl_dangky`
--
ALTER TABLE `tbl_dangky`
  MODIFY `id_dangky` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_danhmuc`
--
ALTER TABLE `tbl_danhmuc`
  MODIFY `id_danhmuc` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_danhmucbaiviet`
--
ALTER TABLE `tbl_danhmucbaiviet`
  MODIFY `id_baiviet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `id_sanpham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `tbl_shipping`
--
ALTER TABLE `tbl_shipping`
  MODIFY `id_shipping` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
