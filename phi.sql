-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 30, 2023 lúc 05:34 AM
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
-- Cơ sở dữ liệu: `phi`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `cate_desc` varchar(500) NOT NULL,
  `thumbnail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `cate_desc`, `thumbnail`) VALUES
(1, 'Nam', 'Thời trang nam', 'https://i.imgur.com/6BBhhqd.jpg'),
(2, 'Nữ', 'Thời trang nữ', 'https://i.imgur.com/oChKEoc.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `name`, `value`) VALUES
(1, 'đen', 'black'),
(2, 'đỏ', 'red'),
(3, 'trắng', 'white'),
(4, 'hồng', 'pink'),
(5, 'vàng', 'yellow'),
(6, 'xám', '#28282B'),
(7, 'bạc', 'silver');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors_products`
--

CREATE TABLE `colors_products` (
  `id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `colors_products`
--

INSERT INTO `colors_products` (`id`, `color_id`, `product_id`) VALUES
(4, 1, 2),
(5, 3, 2),
(6, 1, 3),
(7, 7, 3),
(8, 1, 4),
(9, 3, 4),
(10, 5, 4),
(11, 1, 5),
(12, 6, 5),
(13, 7, 5),
(14, 6, 1),
(15, 7, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `content`, `created_at`, `product_id`) VALUES
(1, 'admin', 'mn@gmail.com', 'Test bình luận', '2021-05-31 14:02:01', 5),
(2, 'admin', 'nguyet@gmail.com', 'test bình luận 2', '2021-05-31 14:07:31', 5),
(3, 'Tuấn Anh', 'ntak@gmail.com', 'sản phẩm tốt', '2021-05-31 14:08:32', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images_product`
--

CREATE TABLE `images_product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `images_product`
--

INSERT INTO `images_product` (`id`, `name`, `link`, `product_id`) VALUES
(22, 'macbook1.jpg', 'assets/uploads/3027977675.jpg', 1),
(23, 'macbook2.jpg', 'assets/uploads/6778085036.jpg', 1),
(24, 'macbook3.jpg', 'assets/uploads/8251359595.jpg', 2),
(25, 'macbook4.jpg', 'assets/uploads/8571913136.jpg', 2),
(26, 'macbook5.jpg', 'assets/uploads/6041455829.jpg', 2),
(27, 'macbook6.jpg', 'assets/uploads/5502085117.jpg', 2),
(28, 'asus0.jpg', 'assets/uploads/5198355030.jpg', 3),
(29, 'asus1.jpg', 'assets/uploads/7405601718.jpg', 3),
(30, 'asus2.jpg', 'assets/uploads/4759551199.jpg', 3),
(31, 'asus0.jpg', 'assets/uploads/4811991864.jpg', 4),
(32, 'asus1.jpg', 'assets/uploads/8694959202.jpg', 4),
(33, 'asus2.jpg', 'assets/uploads/8700777668.jpg', 4),
(34, 'dell2.jpg', 'assets/uploads/9800008635.jpg', 5),
(35, 'dell3.jpg', 'assets/uploads/5918957178.jpg', 5),
(37, 'dell5.jpg', 'assets/uploads/8640996405.jpg', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `memories`
--

CREATE TABLE `memories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `memories`
--

INSERT INTO `memories` (`id`, `name`, `value`) VALUES
(1, '16GB', '16GB'),
(2, '32GB', '32GB'),
(3, '64GB', '64GB'),
(4, '128GB', '128GB'),
(5, '8GB', '8GB');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `memories_products`
--

CREATE TABLE `memories_products` (
  `id` int(11) NOT NULL,
  `memory_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `memories_products`
--

INSERT INTO `memories_products` (`id`, `memory_id`, `product_id`) VALUES
(1, 3, 1),
(2, 4, 1),
(3, 4, 2),
(4, 3, 3),
(5, 4, 3),
(6, 4, 4),
(7, 4, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  `payment` int(1) NOT NULL,
  `total` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `item` int(10) NOT NULL,
  `payed` int(11) NOT NULL DEFAULT 0,
  `active` int(1) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `email`, `phone`, `address`, `note`, `created_at`, `payment`, `total`, `quantity`, `item`, `payed`, `active`, `user_id`) VALUES
(2, 'Nguyệt3', 'nguyet@gmail.com', '0987196888', 'Thái Nguyên', '88', '2021-05-31 00:00:00', 1, 33990000, 1, 1, 0, 1, 1),
(3, 'Nguyệt355', 'nguyet@gmail.com', '0987196888', 'Thái Nguyên', '55', '2021-05-31 00:00:00', 1, 33990000, 1, 1, 0, 0, 1),
(4, 'thanh toan online', 'binhbich@mail.com', '0987196888', 'Thái Nguyên', 'ghi chu binh bich', '2021-05-31 00:00:00', 0, 19990000, 1, 1, 0, 0, 1),
(5, 'Nguyệt3', 'nguyet@gmail.com', '0987196888', 'Thái Nguyên', '89', '2021-05-31 00:00:00', 1, 19990000, 1, 1, 0, 0, 1),
(6, 'final banking', 'final@gmail.com', '0987196888', 'Thasi Binhf', 'thai binh', '2021-05-31 00:00:00', 1, 19990000, 1, 1, 0, 0, 1),
(7, 'something', 'happen@gmail.com', '0987196812', 'with my heart', '', '2021-05-31 00:00:00', 1, 19990000, 1, 1, 1, 0, 1),
(8, 'truong phi', 'p@gmail.com', '0345758757', 'ha noi', '', '2023-11-25 00:00:00', 0, 47000000, 1, 1, 0, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_products`
--

CREATE TABLE `orders_products` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `memory_id` int(11) NOT NULL,
  `ram_id` int(11) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `color_id`, `memory_id`, `ram_id`, `quantity`, `total`) VALUES
(1, 1, 3, 1, 3, 4, 1, 33990000),
(2, 1, 4, 1, 4, 1, 1, 6190000),
(3, 2, 3, 1, 3, 4, 1, 33990000),
(4, 3, 3, 1, 3, 4, 1, 33990000),
(5, 4, 5, 1, 4, 4, 1, 19990000),
(6, 5, 5, 1, 4, 4, 1, 19990000),
(7, 6, 5, 1, 4, 4, 1, 19990000),
(8, 7, 5, 1, 4, 4, 1, 19990000),
(9, 8, 2, 1, 4, 1, 1, 47000000),
(10, 9, 1, 6, 3, 4, 3, 207000000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `price` int(9) NOT NULL,
  `sale_price` int(9) NOT NULL,
  `thumbnail` varchar(255) NOT NULL,
  `product_desc` varchar(500) NOT NULL,
  `sold` int(5) NOT NULL DEFAULT 0,
  `amount` int(5) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `thumbnail`, `product_desc`, `sold`, `amount`, `category_id`) VALUES
(1, 'Áo thun', 70000000, 69000000, 'https://i.imgur.com/LhdHbFi.jpg', 'Áo dày dặn', 0, 100, 1),
(2, 'Quần nam', 48000000, 47000000, 'assets/uploads/6447518175.jpg', 'quần dài', 1, 99, 1),
(3, 'áo nữ', 25000000, 22000000, 'assets/uploads/9464577668.jpg', '', 2, 98, 2),
(4, 'áo trẻ em', 29000000, 28000000, 'assets/uploads/2976683299.jpg', 'hihi', 1, 99, 2),
(5, 'quần bò nam', 31990000, 31790000, '../uploads/5685526996.png', '', 0, 100, 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes`
--

CREATE TABLE `sizes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes`
--

INSERT INTO `sizes` (`id`, `name`, `value`) VALUES
(1, 'S', 'S'),
(2, 'M', 'M'),
(3, 'L', 'L'),
(4, 'XL', 'XL');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sizes_products`
--

CREATE TABLE `sizes_products` (
  `id` int(11) NOT NULL,
  `size_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sizes_products`
--

INSERT INTO `sizes_products` (`id`, `size_id`, `product_id`) VALUES
(2, 1, 2),
(3, 4, 3),
(4, 1, 4),
(5, 2, 4),
(6, 4, 5),
(7, 4, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(500) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `email`, `address`, `phone`, `role`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'HE', 'HE@gmail.com', 'Thái Nguyên', '0988888888', 1),
(2, 'phi', '25d55ad283aa400af464c76d713c07ad', 'truong phi', 'p@gmail.com', 'ha noi', '0345758757', 1),
(3, 'phitruong', 'e10adc3949ba59abbe56e057f20f883e', 'phi', 'phi@gmail.com', 'ha noi', '0345758757', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors_products`
--
ALTER TABLE `colors_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images_product`
--
ALTER TABLE `images_product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `memories`
--
ALTER TABLE `memories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `memories_products`
--
ALTER TABLE `memories_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes`
--
ALTER TABLE `sizes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sizes_products`
--
ALTER TABLE `sizes_products`
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
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `colors_products`
--
ALTER TABLE `colors_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `images_product`
--
ALTER TABLE `images_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `memories`
--
ALTER TABLE `memories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `memories_products`
--
ALTER TABLE `memories_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `orders_products`
--
ALTER TABLE `orders_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sizes`
--
ALTER TABLE `sizes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `sizes_products`
--
ALTER TABLE `sizes_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `carts_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
