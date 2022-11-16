-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 05, 2022 lúc 06:24 AM
-- Phiên bản máy phục vụ: 10.4.24-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `myshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id_category`, `name_category`, `note`) VALUES
(1, 'Cây cảnh phong thủy', 'sds'),
(2, 'Cây cảnh trong nhà', 'cay trong nha'),
(3, 'Cây cảnh để bàn', NULL),
(4, 'Cây cảnh văn phòng', NULL),
(27, 'gh', 'qưd'),
(29, 'ew', '<p>đư<b>w</b></p>'),
(30, 'a', '<p>a</p>'),
(31, 'a', NULL),
(32, 'j', NULL),
(33, 're', '<p>ưe</p>'),
(35, 'y', '<p>gk</p>'),
(36, 'sd', '<p>sd</p>'),
(37, 'xs', '<p>s</p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_product` int(11) NOT NULL,
  `count_product` int(11) NOT NULL,
  `image1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decription_product` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sale_product` int(255) NOT NULL,
  `outstand_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_product` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `name_category`, `price_product`, `count_product`, `image1`, `image2`, `image3`, `decription_product`, `sale_product`, `outstand_product`, `date_product`) VALUES
(1, 'Cây kim tiền', 'Cây phong thủy', 100000, 32, 'caykimtien.jpg', 'caykimtien.jpg', 'caykimtien.jpg', 'sdd', 12, 'khong', '2022-10-30 04:09:24'),
(7, 'thi', 'Cây cảnh phong thủy', 121, 13, 'caytrucnhat.jpg', 'cayphattai.jpg', 'cayphuquy.jpg', 'yu', 12, 'Không', '2022-10-31 17:54:53'),
(10, 'xuong rong', 'Cây cảnh phong thủy', 3, 23, 'caytung.jpg', 'cayphattai.jpg', 'caytung.jpg', 'ưer', 12, 'Có', '2022-10-31 18:08:38'),
(11, 'gfd', 'Cây cảnh phong thủy', 243, 12, 'caytrucnhat.jpg', 'caytrucnhat.jpg', 'cayphuquy.jpg', 'dfsd', 123, 'Có', '2022-11-01 08:29:27'),
(12, 'ads', 'j', 12, 121, 'caytung.jpg', 'caytrucnhat.jpg', 'cayphuquy.jpg', '<p>hjgk</p>', 50, 'Có', '2022-11-01 16:57:51'),
(13, 'sds', 'Cây cảnh để bàn', 1256, 34, 'caytung.jpg', 'caytrucnhat.jpg', 'caykimngan.jpg', '<p>sdsa</p>', 12, 'Không', '2022-11-04 19:05:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
