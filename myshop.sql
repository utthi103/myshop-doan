-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 04, 2022 lúc 08:07 AM
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
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(20) NOT NULL,
  `admin_fullname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fullname`, `admin_username`, `admin_password`, `admin_email`, `admin_phone`, `admin_address`) VALUES
(1, 'Trương Thị Út Thi', 'utthi', '76a7879f6e633b3ba621d34b710cb78c', 'truongthiutthi2003@gmail.com', '0364680381', 'Hoài Thanh - Hoài Nhơn - Bình Định');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `auth`
--

CREATE TABLE `auth` (
  `id_auth` int(11) NOT NULL,
  `name_auth` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `detail_auth` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
(4, 'Cây cảnh văn phòng', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id_order` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `name_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pay` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `total` float NOT NULL,
  `status` varchar(70) COLLATE utf8_unicode_ci NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `order_note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id_order`, `id_user`, `name_user`, `phone`, `address`, `pay`, `total`, `status`, `date`, `order_note`) VALUES
(57, 4, 'ut thi', '0364680381', 'binh dinh', 'Check Payment', 1634260, '0', '2022-11-24 04:24:36', 'Giao gio hành chính'),
(58, 4, 'ut thi', '0364680381', 'binh dinh', 'Paypal', 4410, '0', '2022-11-24 04:26:37', 'giao nhanh'),
(59, 4, 'ut thi', '0364680381', 'binh dinh', 'Check Payment', 138570, '0', '2022-11-24 04:30:24', 'sa'),
(60, 4, 'ut thi', '0364680381', 'binh dinh', 'Check Payment', 139758, '0', '2022-11-24 04:54:28', 'ádsad'),
(61, 4, 'ut thi', '0364680381', 'binh dinh', 'Check Payment', 142980, '0', '2022-11-24 06:22:09', 'sadada'),
(62, 4, 'ut thi', '0364680381', 'bình định', 'Check Payment', 273870, '0', '2022-11-29 17:42:46', 'giao ngay 2/1'),
(63, 5, 'thu phuong', '09123323', 'hue', 'Paypal', 281550, '0', '2022-12-01 07:06:50', 'zsadrsa');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `id_order` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `name_product` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `count` int(11) NOT NULL,
  `price` float NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`id_order`, `id_product`, `name_product`, `count`, `price`, `date`) VALUES
(57, 18, 'Cây phát tài núi', 1, 751060, '2022-11-24 04:24:36'),
(57, 20, 'Cay cau lụa vàng', 2, 883200, '2022-11-24 04:24:36'),
(58, 17, 'Cây kim ngân thủy sinh lớn', 1, 4410, '2022-11-24 04:26:37'),
(59, 21, 'Cây quất', 1, 138570, '2022-11-24 04:30:24'),
(60, 21, 'Cây quất', 1, 138570, '2022-11-24 04:54:28'),
(60, 16, 'Cây hạnh phúc thủy sinh', 1, 1187.5, '2022-11-24 04:54:28'),
(61, 21, 'Cây quất', 1, 138570, '2022-11-24 06:22:09'),
(61, 17, 'Cây kim ngân thủy sinh lớn', 1, 4410, '2022-11-24 06:22:09'),
(62, 23, 'Cây cúc mâm xôi', 1, 265050, '2022-11-29 17:42:46'),
(62, 17, 'Cây kim ngân thủy sinh lớn', 2, 8820, '2022-11-29 17:42:46'),
(63, 17, 'Cây kim ngân thủy sinh lớn', 1, 4410, '2022-12-01 07:06:50'),
(63, 21, 'Cây quất', 2, 277140, '2022-12-01 07:06:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price_product` float NOT NULL,
  `count_product` int(11) NOT NULL,
  `image1` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image2` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image3` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `decription_product` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sale_product` int(255) NOT NULL,
  `outstand_product` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_product` timestamp NOT NULL DEFAULT current_timestamp(),
  `price_sale` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `name_product`, `name_category`, `price_product`, `count_product`, `image1`, `image2`, `image3`, `decription_product`, `sale_product`, `outstand_product`, `date_product`, `price_sale`) VALUES
(16, 'Cây hạnh phúc thủy sinh', 'Cây cảnh để bàn', 1250, 11, 'cay1.png', 'cay2.png', 'cay3.png', '<p>Cây có chiều cao khoảng 25 - 30cm cả chậu, phù hợp làm cây để ban công, hiên nhà. Với mùi thơm của cây giúp gia chủ sản khoái và lấy lại cân bằng.<br></p>', 5, 'Có', '2022-11-24 03:33:27', 1187.5),
(17, 'Cây kim ngân thủy sinh lớn', 'Cây cảnh trong nhà', 4500, 5, 'cay4.png', 'cay5.png', 'cay6.png', '<p>Cây có chiều cả cả bình thủy tinh khoảng 45 -50cm, đường kính gốc từ 10 - 11cm. Cây phù hợp để bàn giám đốc, tặng khai trương, tân gia, bàn tiếp khách lớn....<br></p>', 2, 'Có', '2022-11-24 03:35:00', 4410),
(18, 'Cây phát tài núi', 'Cây cảnh để bàn', 799000, 19, 'cay7.png', 'cay8.png', 'cay9.png', '<p>Cây Phát Tài Núi hay còn gọi là cây Đại Lộc đang là một trong những cây nội thất rất được ưa chuộng. Cây có chiều cao 1m6 - 1m7 phù hợp làm quà tặng khai trương, tân gia, cây để văn phòng, trong nhà.<br></p>', 6, 'Có', '2022-11-24 03:38:48', 751060),
(19, 'Cây trúc nhật', 'Cây cảnh văn phòng', 349000, 15, 'cay10.png', 'cay11.png', 'cay12.png', '<p>Cây Trúc Nhật với thân hình mềm mại. Cây mang ý nghĩa phong thủy gặp dữ hóa lành, thăng tiến trong công việc và sự nghiệp nên được tặng trong các dịp như khai trương, sinh nhật hay thăng quan tiến chức.<br></p>', 2, 'Không', '2022-11-24 03:42:27', 342020),
(20, 'Cay cau lụa vàng', 'Cây cảnh văn phòng', 480000, 1, 'cay18.png', 'cay16.png', 'cay15.png', '<p>Cây phù hợp để trước hiên, cạnh cửa sổ, nơi có nhiều ánh sáng</p>', 8, 'Có', '2022-11-24 03:45:41', 441600),
(21, 'Cây quất', 'Cây cảnh văn phòng', 149000, 0, 'cay15.png', 'cay14.png', 'cay13.png', '<p>Cây có độ cao khoảng 70cm phù hợp để bàn, kệ tivi, để quần thu ngân, shop nhỏ...<br></p>', 7, 'Không', '2022-11-24 03:49:53', 138570),
(22, 'Hoa dạ yến thảo', 'Cây cảnh phong thủy', 69000, 12, 'cay20.png', 'cay20.png', 'cay21.png', '<p>Bầu có độ rộng tán tầm 25cm, phù hợp làm cây treo trước cửa nhà, ban công. Hoa nở liên tục đến qua tết. Phù hợp làm cây hoa trưng ngày tết, đón tài lộc.<br></p>', 3, 'Không', '2022-11-24 03:52:18', 66930),
(23, 'Cây cúc mâm xôi', 'Cây cảnh phong thủy', 279000, 17, 'cay24.png', 'cay22.png', 'cay24.png', '<p>Cây cúc mâm xôi với tán rộng 70cm chiều cao 60. Rất hợp chọn làm cây trưng tết đặt ở trước cửa nhà để đón khách. Với ý nghĩa trường thọ và may mắn.<br></p>', 5, 'Có', '2022-11-24 03:54:40', 265050),
(24, 'Cây hạnh phúc', 'Cây cảnh phong thủy', 39000, 24, 'cay27.png', 'cay26.png', 'cay25.png', '<p>Cây cúc mâm xôi với tán rộng 70cm chiều cao 60. Rất hợp chọn làm cây trưng tết đặt ở trước cửa nhà để đón khách. Với ý nghĩa trường thọ và may mắn.<br></p>', 12, 'Không', '2022-11-24 03:58:51', 34320);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `first_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `gender_user` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_user` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address_user` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `account_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `pass_user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `id_auth` int(11) NOT NULL,
  `avt` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`id_user`, `first_name`, `last_name`, `gender_user`, `phone`, `email_user`, `address_user`, `account_user`, `pass_user`, `id_auth`, `avt`) VALUES
(4, 'ut', 'thi', 'nu', '0364680381', 'truongthiutthi2003@gmail.com', 'bình định', 'utthi1510', '0fceba93f3e34a1efa7b2b3470539b56', 2, 'cay3.png'),
(5, 'thu', 'phuong', 'nu', '09123323', 'phuongdtt.21it@vku.udn.vn', 'hue', 'thuphuong', 'e5dc7f41cad23dcf0bbb9335519e1c00', 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `auth`
--
ALTER TABLE `auth`
  ADD PRIMARY KEY (`id_auth`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD KEY `id_order` (`id_order`),
  ADD KEY `id_product` (`id_product`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `auth`
--
ALTER TABLE `auth`
  MODIFY `id_auth` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `order_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD CONSTRAINT `order_detail_ibfk_1` FOREIGN KEY (`id_order`) REFERENCES `order` (`id_order`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_detail_ibfk_2` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
