-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 16, 2023 lúc 10:25 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopphp`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `id_user`, `create_at`, `update_at`) VALUES
(1, 'Điện thoại', 3, '2023-08-31 08:07:37', '2023-08-31 08:07:37'),
(2, 'Laptop', 3, '2023-08-31 08:07:37', '2023-08-31 08:07:37'),
(3, 'Dụng cụ học tập', 3, '2023-08-31 08:12:43', '2023-08-31 08:12:43'),
(4, 'Đồ gia dụng', 3, '2023-08-31 08:12:43', '2023-08-31 08:12:43'),
(5, 'Sách Pro', 3, '2023-08-31 08:13:45', '2023-08-31 08:13:45'),
(6, 'Phụ kiện ', 3, '2023-08-15 08:14:09', '2023-08-15 08:14:09'),
(7, 'Xe hơi', 3, '2023-08-16 04:18:57', '2023-08-16 04:18:57'),
(8, 'Thể thao', 3, '2023-08-16 04:19:42', '2023-08-16 04:19:42'),
(9, 'Áo quần', 3, '2023-08-16 04:20:27', '2023-08-16 04:20:27'),
(10, 'NY', 3, '2023-08-16 04:21:05', '2023-08-16 04:21:05'),
(11, 'Xe máy', 3, '2023-08-16 04:21:09', '2023-08-16 04:21:09'),
(20, 'sấccascdscsdc', 3, '2023-08-16 10:18:23', '2023-08-16 10:18:23'),
(21, 'Laptop', 1, '2023-08-16 20:16:42', '2023-08-16 20:16:42'),
(22, 'Xe', 1, '2023-08-16 20:16:47', '2023-08-16 20:16:47'),
(23, 'Điện thoại', 1, '2023-08-16 20:16:52', '2023-08-16 20:16:52'),
(24, 'NY', 1, '2023-08-16 20:17:00', '2023-08-16 20:17:00'),
(25, 'PC', 1, '2023-08-16 20:17:07', '2023-08-16 20:17:07'),
(26, 'Phụ kiện', 1, '2023-08-16 20:22:53', '2023-08-16 20:22:53'),
(27, 'Tai nghe', 1, '2023-08-16 20:22:57', '2023-08-16 20:22:57');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `id_product` int(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `id_product`, `url`, `create_at`, `update_at`) VALUES
(72, 24, 'ShopPHP/View/image/products/6626915009_t3.png', '2023-08-16 02:27:01', '2023-08-16 02:27:01'),
(73, 24, 'ShopPHP/View/image/products/1968255193_t2.jpg', '2023-08-16 02:27:01', '2023-08-16 02:27:01'),
(74, 24, 'ShopPHP/View/image/products/3160484572_t1.jpg', '2023-08-16 02:27:01', '2023-08-16 02:27:01'),
(75, 25, 'ShopPHP/View/image/products/7139567388_a5.jpg', '2023-08-16 02:29:34', '2023-08-16 02:29:34'),
(76, 25, 'ShopPHP/View/image/products/6403986907_s4.jpg', '2023-08-16 02:29:34', '2023-08-16 02:29:34'),
(77, 25, 'ShopPHP/View/image/products/7580408105_â2.jpg', '2023-08-16 02:29:34', '2023-08-16 02:29:34'),
(78, 25, 'ShopPHP/View/image/products/2904928049_a.jpg', '2023-08-16 02:29:34', '2023-08-16 02:29:34'),
(79, 26, 'ShopPHP/View/image/products/3137036004_m4.png', '2023-08-16 02:30:57', '2023-08-16 02:30:57'),
(80, 26, 'ShopPHP/View/image/products/4656967802_m3.png', '2023-08-16 02:30:57', '2023-08-16 02:30:57'),
(81, 26, 'ShopPHP/View/image/products/8391843978_m2.jpg', '2023-08-16 02:30:57', '2023-08-16 02:30:57'),
(82, 26, 'ShopPHP/View/image/products/7388144565_m1.jpg', '2023-08-16 02:30:57', '2023-08-16 02:30:57'),
(83, 27, 'ShopPHP/View/image/products/7504726267_c4.jpg', '2023-08-16 02:31:40', '2023-08-16 02:31:40'),
(84, 27, 'ShopPHP/View/image/products/9051027883_c3.jpg', '2023-08-16 02:31:40', '2023-08-16 02:31:40'),
(85, 27, 'ShopPHP/View/image/products/3604081925_c2.jpg', '2023-08-16 02:31:40', '2023-08-16 02:31:40'),
(86, 28, 'ShopPHP/View/image/products/8560093104_x4.png', '2023-08-16 02:33:34', '2023-08-16 02:33:34'),
(87, 28, 'ShopPHP/View/image/products/6179784538_x3.jpg', '2023-08-16 02:33:34', '2023-08-16 02:33:34'),
(88, 28, 'ShopPHP/View/image/products/3025197766_x2.jpg', '2023-08-16 02:33:34', '2023-08-16 02:33:34'),
(89, 28, 'ShopPHP/View/image/products/2543648489_x1.png', '2023-08-16 02:33:34', '2023-08-16 02:33:34'),
(94, 28, 'ShopPHP/View/image/products/6568228103_x6.jpg', '2023-08-16 02:41:29', '2023-08-16 02:41:29'),
(98, 30, 'ShopPHP/View/image/products/2908913189_152243092_866688673898970_1753245916958145252_n.jpg', '2023-08-16 02:42:38', '2023-08-16 02:42:38'),
(99, 30, 'ShopPHP/View/image/products/5832158141_289842389_1165584064009428_7226259320130116851_n.jpg', '2023-08-16 02:42:38', '2023-08-16 02:42:38'),
(100, 30, 'ShopPHP/View/image/products/1309733040_thanhnhan.jpg', '2023-08-16 02:42:57', '2023-08-16 02:42:57'),
(101, 30, 'ShopPHP/View/image/products/5019402336_thanh-nhan.jpg', '2023-08-16 02:42:57', '2023-08-16 02:42:57'),
(102, 31, 'ShopPHP/View/image/products/5769146295_q4.jpg', '2023-08-16 20:17:36', '2023-08-16 20:17:36'),
(103, 31, 'ShopPHP/View/image/products/6705833364_q3.jpg', '2023-08-16 20:17:36', '2023-08-16 20:17:36'),
(104, 31, 'ShopPHP/View/image/products/3275671506_q2.jpg', '2023-08-16 20:17:36', '2023-08-16 20:17:36'),
(105, 31, 'ShopPHP/View/image/products/2304206269_q1.jpg', '2023-08-16 20:17:36', '2023-08-16 20:17:36'),
(106, 31, 'ShopPHP/View/image/products/4167639111_a5.jpg', '2023-08-16 20:18:38', '2023-08-16 20:18:38'),
(107, 31, 'ShopPHP/View/image/products/7275533000_â2.jpg', '2023-08-16 20:18:38', '2023-08-16 20:18:38'),
(108, 31, 'ShopPHP/View/image/products/5640287437_a.jpg', '2023-08-16 20:18:38', '2023-08-16 20:18:38'),
(109, 32, 'ShopPHP/View/image/products/7492928866_h4.png', '2023-08-16 20:22:38', '2023-08-16 20:22:38'),
(110, 32, 'ShopPHP/View/image/products/8209475175_h3.png', '2023-08-16 20:22:38', '2023-08-16 20:22:38'),
(111, 32, 'ShopPHP/View/image/products/7189646550_h2.jpg', '2023-08-16 20:22:38', '2023-08-16 20:22:38'),
(112, 32, 'ShopPHP/View/image/products/8868718977_h1.png', '2023-08-16 20:22:38', '2023-08-16 20:22:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(255) NOT NULL,
  `id_user` int(255) NOT NULL,
  `id_category` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` float NOT NULL,
  `description` longtext NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `id_user`, `id_category`, `name`, `price`, `description`, `create_at`, `update_at`) VALUES
(24, 3, 5, 'Sách thép đã tôi thế đấy', 290000, 'Thép đã tôi thế đấy  là tác phẩm sử thi, xã hội bậc nhất do Nikolai Ostrovsky (1904 – 1936) viết trong thời kỳ Stalin. Đích thị là một cuốn tiểu thuyết vĩ đại ám ảnh tận cùng hồn tủy con người trong suốt hành trình tìm kiếm một tượng đài xứng đáng chạm khắc mình vào kỷ nguyên mới của nhân loại chứ không riêng gì xứ sở bạch dương.', '2023-08-16 02:27:01', '2023-08-16 02:27:01'),
(25, 3, 2, 'Laptop ASUS', 31000000, 'Với mức giá tầm trung, Lenovo IdeaPad Gaming 3 sẽ mang đến bạn nhiều hơn những gì bạn kỳ vọng. Với cấu hình trên, máy dư sức \"cân\" LOL tại mức max-setting, máy đạt tốc độ khung hình đến 130 FPS. Tuy nhiên, FPS sẽ bị tuột nhẹ còn 110 FPS đến 120 FPS trong những lúc giao tranh nhưng hoàn toàn không làm ảnh hưởng đến trải nghiệm của bạn.', '2023-08-16 02:29:34', '2023-08-16 02:29:34'),
(26, 3, 5, 'Sách Đắc Nhân Tâm ', 29123600, 'Đắc nhân tâm (Được lòng người), tên tiếng Anh là How to Win Friends and Influence People là một quyển sách nhằm tự giúp bản thân (self-help) bán chạy nhất từ trước đến nay. Quyển sách này do Dale Carnegie viết và đã được xuất bản lần đầu vào năm 1936, nó đã được bán 15 triệu bản trên khắp thế giới.[1][2] Nó cũng là quyển sách bán chạy nhất của New York Times trong 10 năm. Tác phẩm được đánh giá là cuốn sách đầu tiên và hay nhất trong thể loại này, có ảnh hưởng thay đổi cuộc đời đối với hàng triệu người trên thế giới.', '2023-08-16 02:30:57', '2023-08-16 02:30:57'),
(27, 3, 1, 'iPhone 14', 320000000, 'Đánh giá iPhone 13 (Tóm tắt)\r\n\r\nThiết kế: iPhone 13 có thiết kế tinh tế và chất lượng xây dựng cao cấp, với sự phát triển từ thế hệ trước. Sự mỏng nhẹ và việc lựa chọn vật liệu, màu sắc mới đóng góp vào sự hấp dẫn của sản phẩm.\r\n\r\nMàn hình: Màn hình OLED của iPhone 13 mang lại màu sắc sống động, đen sâu và hiệu năng tiết kiệm năng lượng. Chất lượng màn hình ảnh và độ phân giải sẽ làm tăng trải nghiệm người dùng.\r\n\r\nHiệu suất: Với chip A-series mới nhất của Apple và đủ RAM, iPhone 13 đảm bảo hiệu suất mượt mà cho đa nhiệm và ứng dụng khởi động nhanh chóng.', '2023-08-16 02:31:40', '2023-08-16 02:31:40'),
(28, 3, 4, 'Xe Hơi VINFAST 2023', 100000000000, 'The 2023 - 2024 VinFast VF 8 is offered in 2 variants - which are priced from 1,109 Triệu to 1,289 Triệu, the base model of vf-8 is VinFast VF 8 Eco 2022 which is at a price of 1,109 Triệu and the top variant of VinFast VF 8 is VinFast VF 8 Plus 2022 which is offered at a price of 1,289 Triệu.', '2023-08-16 02:33:34', '2023-08-16 02:33:34'),
(30, 3, 6, 'NY', 10000000000000, '???????????????????', '2023-08-16 02:42:38', '2023-08-16 02:42:38'),
(31, 1, 25, '2Laptop Acer Aspire 7 Gaming A715 76G', 29999100000, '2Thông tin sản phẩm\r\nMột dòng laptop gaming được cải tiến hoàn toàn mới đến từ nhà Acer, Aspire 7 Gaming 2023 mang ngoại hình tối giản, đẹp mắt cùng những thông số cấu hình mạnh mẽ, vừa đáp ứng được việc chiến game, vừa xử lý hiệu quả mọi tác vụ thường ngày. Laptop Acer Aspire 7 Gaming A715 76G 5132 i5 12450H (NH.QMESV.002) chắc chắn sẽ là sự lựa chọn hoàn hảo dành cho bạn.', '2023-08-16 20:17:36', '2023-08-16 20:17:36'),
(32, 1, 27, 'AirPods (3rd generation)', 1365240000, 'Free Engraving\r\nAirPods (3rd generation) with Lightning Charging Case\r\n£179.00', '2023-08-16 20:22:38', '2023-08-16 20:22:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `avatar` varchar(255) NOT NULL,
  `gender` tinyint(4) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `avatar`, `gender`, `create_at`, `update_at`) VALUES
(1, 'vanmanh@gmail.com', '$2y$10$iETsG6EaSAm8c9fmn.sMT./yoBZO0zF1e7DecdBCr21s9yvB5QNWe', 'Nguyễn Văn Mạnh', 'ShopPHP/View/image/avatars/9119732676_1680405839.jpg', 1, '2023-08-15 07:15:57', '2023-08-15 07:15:57'),
(2, 'kimkhanh@gmail.com', '$2y$10$6BRAevblPrxMeHvsGjcPp.WZ8YgWGSFQOs7v2jc3PFxcY7vKB4A0y', 'Mai Thị Kim Khánh ', 'ShopPHP/View/image/avatars/6600772645_152243092_866688673898970_1753245916958145252_n.jpg', 0, '2023-08-15 07:16:22', '2023-08-15 07:16:22'),
(3, 'giangdth@gmail.com', '$2y$10$tieRc/En265sM2eN.HlkruJBSVPufg.BIqV9boVEoLtVbI8gjMqei', 'Trương Ngọc Hương Giang', 'ShopPHP/View/image/avatars/9461310003_yang.jpg', 0, '2023-08-15 15:49:30', '2023-08-15 15:49:30');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
