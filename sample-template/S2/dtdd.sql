-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2025 lúc 10:51 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `dtdd`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Apple'),
(2, 'Samsung');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_customer` varchar(11) NOT NULL,
  `order_status` text NOT NULL,
  `order_note` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`order_id`, `order_date`, `order_customer`, `order_status`, `order_note`) VALUES
(1, '2025-12-01 06:34:54', 'admin', '1', 'Ghi chú');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_detail`
--

CREATE TABLE `order_detail` (
  `order_detail_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_product_id` int(11) NOT NULL,
  `order_product_quantity` int(11) NOT NULL,
  `order_product_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `order_detail`
--

INSERT INTO `order_detail` (`order_detail_id`, `order_id`, `order_product_id`, `order_product_quantity`, `order_product_price`) VALUES
(1, 1, 2, 3, 27480000),
(2, 1, 1, 1, 34990000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(150) NOT NULL,
  `product_price` int(11) NOT NULL,
  `product_img` varchar(100) NOT NULL,
  `product_description` text NOT NULL,
  `product_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_price`, `product_img`, `product_description`, `product_category`) VALUES
(1, 'Điện thoại iPhone 17 Pro 256GB', 34990000, 'img/iphone-17-pro-cam-8-638930812109839492-750x500.jpg', 'Đặc điểm nổi bật của iPhone 17 Pro\r\n• Khẳng định đẳng cấp với khung nhôm nguyên khối chắc chắn và diện mạo mới.\r\n• Hình ảnh hiển thị hoàn hảo, siêu mượt trên màn hình ProMotion viền mỏng hơn.\r\n• Nhiếp ảnh chuyên nghiệp với bộ ba camera 48 MP và khả năng zoom quang học 8x.\r\n• Chinh phục mọi giới hạn với chip A19 Pro được tối ưu bởi tản nhiệt buồng hơi.\r\n• Duy trì hiệu suất đỉnh cao nhờ viên pin lớn, xem video đến 31 giờ.', 1),
(2, 'Điện thoại Samsung Galaxy S25 Ultra 5G 12GB/256GB', 27480000, 'img/galaxy-s25-ultra-xanh-duong-1-638748062746442173-750x500.jpg', 'Samsung đã chính thức trình làng mẫu smartphone cao cấp mới mang tên Samsung Galaxy S25 Ultra. Đây là mẫu sản phẩm được kỳ vọng là “danh mục” chiến lược của Samsung trong năm 2025, hứa hẹn tiếp tục đẩy mạnh vị thế dẫn đầu của hãng trong ngành công nghiệp di động với thiết kế thẩm mỹ, cấu hình và trợ năng AI đỉnh cao.\r\nBo góc đẹp mắt, tinh tế hơn, “xịn hơn”\r\nGalaxy S25 Ultra giữ nguyên thiết kế mạnh mẽ và tinh tế từ dòng S24 Ultra, đồng thời bổ sung một số nâng cấp đáng chú ý. Máy sử dụng khung viền titanium, bền hơn nhôm và mang lại vẻ sang trọng, cao cấp. Mặt lưng kính mờ giúp chống bám vân tay và mang lại cảm giác cầm nắm thoải mái.', 2),
(3, 'Điện thoại iPhone Air 256GB', 32990000, 'img/iphone-air-xanh-8-638930804073268530-750x500.jpg', 'Đặc điểm nổi bật của iPhone Air\r\n• Ấn tượng với độ mỏng nhẹ kỷ lục từ khung Titan cao cấp 6.54 mm.\r\n• Trải nghiệm không gian rộng rãi và sống động trên màn hình ProMotion 120 Hz 6.5 inch.\r\n• Ghi lại khoảnh khắc đáng nhớ một cách dễ dàng qua camera chính 48 MP chất lượng cao.\r\n• Giải quyết mọi công việc với hiệu năng đỉnh cao của chip A19 Pro.\r\n• Luôn tràn đầy năng lượng với thời lượng xem video đến 27 giờ.', 1),
(4, 'Điện thoại iPhone 16e 256GB', 17190000, 'img/iphone-16e-white-3-638756438151866432-750x500.jpg', 'Sau sự thành công của iPhone SE 2022 (SE 3), Apple đã quay trở lại mạnh mẽ hơn với iPhone 16e 256GB, được ra mắt vào tháng 02/2025. Sở hữu thiết kế nhỏ gọn, Face ID tiện lợi, chip A18 mạnh mẽ cùng hệ thống camera 2 trong 1 tinh gọn, thiết bị này hứa hẹn mang lại khả năng hoạt động ấn tượng với mức giá lý tưởng.', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('051rucAFObvHQzYvfGyoLfHJyOkFM0VfrWRnDRi6', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiUUY4N1J4dXhJdVMzeVpiS3RDY25qS0lhdDI3WmNwWkd2RG1JOVl2WiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9naW8taGFuZyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e3M6ODoicHJvZHVjdHMiO2E6Mjp7aTowO2E6NTp7czoyOiJpZCI7czoxOiIxIjtzOjQ6Iml0ZW0iO2k6MjtzOjM6ImltZyI7czo1NDoiaW1nL2lwaG9uZS0xNy1wcm8tY2FtLTgtNjM4OTMwODEyMTA5ODM5NDkyLTc1MHg1MDAuanBnIjtzOjU6InByaWNlIjtpOjM0OTkwMDAwO3M6NDoibmFtZSI7czozNToixJBp4buHbiB0aG/huqFpIGlQaG9uZSAxNyBQcm8gMjU2R0IiO31pOjE7YTo1OntzOjI6ImlkIjtzOjE6IjIiO3M6NDoiaXRlbSI7aToxO3M6MzoiaW1nIjtzOjY0OiJpbWcvZ2FsYXh5LXMyNS11bHRyYS14YW5oLWR1b25nLTEtNjM4NzQ4MDYyNzQ2NDQyMTczLTc1MHg1MDAuanBnIjtzOjU6InByaWNlIjtpOjI3NDgwMDAwO3M6NDoibmFtZSI7czo1NDoixJBp4buHbiB0aG/huqFpIFNhbXN1bmcgR2FsYXh5IFMyNSBVbHRyYSA1RyAxMkdCLzI1NkdCIjt9fX19', 1764555273),
('Df0qP9bBE921cdTcLjOomrmUgeRc83oUYAtNIsnc', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiSWFXU0lhMnhzRDV6VmJSaUFVN2pYdWMyYldZUml5a3dQSHp1cHJvcCI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MzA6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9naW8taGFuZyI7czo1OiJyb3V0ZSI7Tjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo0OiJjYXJ0IjthOjE6e3M6ODoicHJvZHVjdHMiO2E6Mjp7aTowO2E6NTp7czoyOiJpZCI7czoxOiIxIjtzOjQ6Iml0ZW0iO2k6MTtzOjM6ImltZyI7czo1NDoiaW1nL2lwaG9uZS0xNy1wcm8tY2FtLTgtNjM4OTMwODEyMTA5ODM5NDkyLTc1MHg1MDAuanBnIjtzOjU6InByaWNlIjtpOjM0OTkwMDAwO3M6NDoibmFtZSI7czozNToixJBp4buHbiB0aG/huqFpIGlQaG9uZSAxNyBQcm8gMjU2R0IiO31pOjE7YTo1OntzOjI6ImlkIjtzOjE6IjIiO3M6NDoiaXRlbSI7aToxO3M6MzoiaW1nIjtzOjY0OiJpbWcvZ2FsYXh5LXMyNS11bHRyYS14YW5oLWR1b25nLTEtNjM4NzQ4MDYyNzQ2NDQyMTczLTc1MHg1MDAuanBnIjtzOjU6InByaWNlIjtpOjI3NDgwMDAwO3M6NDoibmFtZSI7czo1NDoixJBp4buHbiB0aG/huqFpIFNhbXN1bmcgR2FsYXh5IFMyNSBVbHRyYSA1RyAxMkdCLzI1NkdCIjt9fX19', 1764559173);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(50) NOT NULL,
  `user_password` varchar(50) NOT NULL,
  `user_fullname` varchar(50) NOT NULL,
  `user_address` varchar(50) NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `user_username`, `user_password`, `user_fullname`, `user_address`, `user_role`) VALUES
(1, 'admin', '123', 'Quản trị viên', '33 Vĩnh Viễn, quận 10', 1),
(2, 'dhm', '123', 'Nguyễn Văn A', 'quận 7', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Chỉ mục cho bảng `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  ADD PRIMARY KEY (`order_detail_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Chỉ mục cho bảng `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

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
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `order_detail`
--
ALTER TABLE `order_detail`
  MODIFY `order_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
