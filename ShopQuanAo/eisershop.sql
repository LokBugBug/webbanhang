-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 29, 2022 lúc 12:25 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eisershop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL,
  `display_status` varchar(10) NOT NULL,
  `create_date` date DEFAULT NULL,
  `delete_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `category_name`, `display_status`, `create_date`, `delete_status`) VALUES
(1, 'Áo Thun Nam', '1', '2018-10-20', '0'),
(3, 'áo đá banh', '1', '2022-03-07', '0'),
(4, 'Quần KaKi Nam', '1', '2022-03-07', '0'),
(5, 'Đồ Thể Thao', '1', '2022-03-07', '0'),
(10, 'áo đá banh', '1', '2018-10-20', '1'),
(12, 'Quần KaKi Namm', '1', '2018-10-20', '0'),
(18, 'áo sơ mi', '1', '2022-03-08', '0'),
(19, 'đầm nữ', '1', '2022-03-08', '0'),
(20, 'váy nữ', '1', '2022-03-08', '0'),
(32, 'Quần KaKi Nammm', '1', '2022-03-08', '0'),
(41, 'Phuoc IT', '1', '2022-03-08', '1'),
(43, 'Phuoc IT1', '1', '2022-03-08', '1'),
(44, 'Phuoc IT2', '1', '2022-03-08', '1'),
(63, 'Quần KaKi Na', '1', '2022-03-09', '1'),
(115, 'Băng Nghiên', '1', '2022-03-20', '0'),
(116, 'Váy Nữ', '1', '2022-03-20', '0'),
(117, 'Băng Nghiên', '1', '2022-03-21', '0'),
(118, 'Váy Nữ', '1', '2022-03-21', '0'),
(119, 'DEMO', '1', '2022-03-26', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `name_user` varchar(50) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `total_money` double DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `order_status` varchar(10) DEFAULT NULL,
  `status_delete` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `name_user`, `address`, `phone`, `email`, `total_money`, `create_date`, `order_status`, `status_delete`) VALUES
(1, 1, 'Viên Băng Nghiên', 'Thượng Hải, Trung Quốc', '0845151117', 'bangnghien@gmail.com', 100000, '2022-03-21', '1', '0'),
(2, 2, 'Viên Băng Nghiên', 'Thượng Hải, Trung Quốc', '0845151117', 'bangnghien@gmail.com', 1000000, '2022-03-23', '1', '0'),
(3, 1, 'Viên Băng Nghiên', 'Thượng Hải', '0845151117', 'bangnghien@gmail.com', 10000005, '2022-03-25', '1', '0'),
(4, 1, 'Viên Băng Nghiên', 'Thượng Hải', '0845151117', 'bangnghien@gmail.com', 10800005, '2022-03-25', '3', '0'),
(5, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 31100015, '2022-03-26', '1', '0'),
(6, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 1700000, '2022-03-26', '0', '0'),
(7, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 500000, '2022-03-26', '0', '0'),
(8, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 200000, '2022-03-26', '0', '0'),
(9, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 10000005, '2022-03-26', '0', '0'),
(10, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 10000005, '2022-03-26', '0', '0'),
(11, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 10000005, '2022-03-26', '0', '0'),
(12, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 500000, '2022-03-26', '0', '0'),
(13, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 10000005, '2022-03-26', '0', '0'),
(14, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 0, '2022-03-26', '0', '0'),
(15, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 200000, '2022-03-26', '0', '0'),
(16, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 200000, '2022-03-26', '0', '0'),
(17, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 10000005, '2022-03-26', '0', '0'),
(18, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 500000, '2022-03-26', '0', '0'),
(19, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 20200010, '2022-03-26', '0', '0'),
(20, 11, 'Ngọc Trang', 'quảng ngãi', '0845151117', 'trankhanhvy@gmail.com', 4000000, '2022-03-26', '1', '0'),
(21, 12, 'Lê Cẩm Tâm', 'Đà nẵng', '0845151117', 'camtam@gmail.com', 20200010, '2022-03-26', '1', '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id_order` int(11) DEFAULT NULL,
  `id_product` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id_order`, `id_product`, `quantity`, `unit_price`) VALUES
(1, 2, 2, 200000),
(1, 1, 3, 200000),
(2, 1, 4, 200000),
(2, 5, 4, 200000),
(2, 7, 14, 200000),
(4, 1, 1, 10000005),
(4, 2, 4, 200000),
(5, 1, 3, 10000005),
(5, 10, 1, 500000),
(5, 7, 3, 200000),
(6, 9, 1, 500000),
(6, 5, 1, 200000),
(6, 10, 2, 500000),
(7, 9, 1, 500000),
(8, 5, 1, 200000),
(9, 1, 1, 10000005),
(10, 1, 1, 10000005),
(11, 1, 1, 10000005),
(12, 10, 1, 500000),
(13, 1, 1, 10000005),
(15, 5, 1, 200000),
(16, 5, 1, 200000),
(17, 1, 1, 10000005),
(18, 9, 1, 500000),
(19, 1, 2, 10000005),
(19, 5, 1, 200000),
(20, 5, 10, 200000),
(20, 2, 10, 200000),
(21, 1, 2, 10000005),
(21, 2, 1, 200000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `name_product` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `descrip` text DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `img_product` varchar(255) NOT NULL,
  `create_date` date DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `delete_status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id_product`, `id_category`, `name_product`, `price`, `quantity`, `descrip`, `company`, `img_product`, `create_date`, `sale`, `delete_status`) VALUES
(1, 3, 'Áo Thun Nam k23', 10000005, 100, 'thoáng mát', 'Phuoc IT', 'ao-so-mi-nu3.jpg', '2022-03-01', 50, '0'),
(2, 1, 'Áo Thun Nam k235', 200000, 10, 'thoáng mát', 'Phuoc IT', '1.jpg', '2022-03-01', 60, '0'),
(5, 1, 'Quần Jean', 200000, 10, 'thoáng', 'PhuocIT', '3.jpg', '2022-03-04', 20, '0'),
(7, 1, 'Áo thun nam k20', 200000, 10, 'mô tả', 'Công Ty TNHH PHUOCMG', 'ao-so-mi-nu-vien-co-hoa-31.jpg', '2022-03-21', 10, '0'),
(8, 18, 'Áo thun nữ t102', 999999, 1000, 'đẹp vl', 'Công Ty TNHH PHUOCMG', '2.jpg', '2022-03-21', 20, '0'),
(9, 4, 'Viên Băng Nghiên', 500000, 10, 'đẹp vãi l', 'Công Ty TNHH PHUOCMG', '3.jpg', '2022-03-22', 10, '0'),
(10, 4, 'Viên Băng Nghiên', 500000, 10, 'đẹp vãi l', 'Công Ty TNHH PHUOCMG', 'ao-so-mi-nu-vien-co-hoa-31.jpg', '2022-03-22', 10, '0'),
(11, 4, 'Trương Dư Hi', 500000, 10, 'đẹp vãi l', 'Công Ty TNHH PHUOCMG', '1.jpg', '2022-03-22', 10, '0'),
(12, 119, 'DEMO', 100000, 100, 'DEMO', 'Công Ty TNHH PHUOCMG', 'ao-so-mi-nu-vien-co-hoa-31.jpg', '2022-03-26', 30, '0');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `pass_word` varchar(50) NOT NULL,
  `full_name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `level_user` varchar(10) DEFAULT NULL,
  `create_date` date DEFAULT NULL,
  `banned` varchar(10) NOT NULL,
  `reason_banned` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `user_name`, `pass_word`, `full_name`, `email`, `phone`, `address`, `level_user`, `create_date`, `banned`, `reason_banned`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Viên Băng Nghiên', 'bangnghien@gmail.com', '0845151117', 'Thượng Hải', 'admin', '2022-03-01', '0', 'Vì quá xinh đẹp nên bị band là đúng'),
(2, 'admin1', '21232f297a57a5a743894a0e4a801fc3', 'Trương Dư Hi', 'duhi@gmail.com', '0845151117', 'Bắc Kinh', 'admin', '2022-03-12', '0', 'Thích thì khóa'),
(3, 'admin2', '21232f297a57a5a743894a0e4a801fc3', 'Viên Băng Nghiên', 'vienbangnghien@gmail.com', '0845151117', 'Thượng Hải', 'admin', '2022-03-21', '0', NULL),
(4, 'phuocit0201', 'd41d8cd98f00b204e9800998ecf8427e', 'Lê Hữu Phước', 'trankhanhvy@gmail.com', '0845151117', 'quảng ngãi', '', '2022-03-25', '0', ''),
(5, 'thuyenmap', '21232f297a57a5a743894a0e4a801fc3', 'Hàn Thuyên', 'thuyen@gmail.com', '0845151117', 'quảng ngãi', '', '2022-03-25', '0', ''),
(6, 'phuocit02011', 'd41d8cd98f00b204e9800998ecf8427e', 'Lê Hữu Phước', 'trankhanhvy@gmail.com', '0845151117', 'quảng ngãi', '', '2022-03-25', '0', ''),
(7, 'phuocit020112', 'd41d8cd98f00b204e9800998ecf8427e', 'Lê Hữu Phước', 'lehuuphuocit0201@gmail.commm', '0845151117', 'quảng ngãi', '', '2022-03-25', '0', ''),
(8, 'phuocit', '21232f297a57a5a743894a0e4a801fc3', 'Lê Hữu Phước', 'trankhanhvy@gmail.com', '0845151117', 'quảng ngãi', 'ADMIN', '2022-03-26', '0', NULL),
(9, 'thuytien', '21232f297a57a5a743894a0e4a801fc3', 'Lê Hữu Phước', 'lehuuphuocit0201@gmail.commm', '0845151117', 'quảng ngãi', '', '2022-03-26', '0', ''),
(10, 'thuydung', 'd41d8cd98f00b204e9800998ecf8427e', 'Thùy Dung', 'trankhanhvy@gmail.com', '0845151117', 'quảng ngãi', '', '2022-03-26', '0', ''),
(11, 'ngoctrang', 'c4ca4238a0b923820dcc509a6f75849b', 'Ngọc Trang', 'trankhanhvy@gmail.com', '0845151117', 'quảng ngãi', '', '2022-03-26', '0', ''),
(12, 'camtam', 'c4ca4238a0b923820dcc509a6f75849b', 'Lê Cẩm Tâm', 'camtam@gmail.com', '0845151117', 'quảng ngãi', '', '2022-03-26', '0', '');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `id_product` (`id_product`),
  ADD KEY `id_order` (`id_order`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`,`id_category`),
  ADD KEY `id_category` (`id_category`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`id_order`) REFERENCES `orders` (`id`);

--
-- Các ràng buộc cho bảng `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
