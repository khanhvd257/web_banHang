-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 13, 2022 lúc 08:24 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopQuanAo_btlWeb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblBlog`
--

CREATE TABLE `tblBlog` (
  `idBlog` int(10) NOT NULL,
  `tenBlog` varchar(100) NOT NULL,
  `noiDung` varchar(3000) NOT NULL,
  `userID` varchar(10) NOT NULL,
  `luotThich` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblDanhMuc`
--

CREATE TABLE `tblDanhMuc` (
  `danhMucID` int(11) NOT NULL,
  `tenDanhMuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblDanhMuc`
--

INSERT INTO `tblDanhMuc` (`danhMucID`, `tenDanhMuc`) VALUES
(1, 'Quần áo'),
(2, 'Giày dép'),
(3, 'Mỹ phẩm'),
(4, 'Đồ chơi trẻ em'),
(5, 'Đồ dùng cá nhân'),
(6, 'Nhẫn cưới'),
(7, 'Vải may'),
(8, 'Vải may'),
(9, 'Đồ gia d'),
(10, 'Rau Củ Quả'),
(11, 'Sản phẩm Sale');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblOrder`
--

CREATE TABLE `tblOrder` (
  `orderID` int(10) NOT NULL,
  `ngayOrder` date NOT NULL,
  `soLuong` int(11) NOT NULL,
  `userID` varchar(10) NOT NULL,
  `productID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblOrder`
--

INSERT INTO `tblOrder` (`orderID`, `ngayOrder`, `soLuong`, `userID`, `productID`, `status`) VALUES
(1, '2022-11-13', 1, '2', 5, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblProducts`
--

CREATE TABLE `tblProducts` (
  `productID` int(11) NOT NULL,
  `danhMucID` int(11) NOT NULL,
  `tenSanPham` varchar(50) NOT NULL,
  `moTaSanPham` varchar(3000) NOT NULL,
  `giaSanPham` float NOT NULL,
  `xuatXu` varchar(50) NOT NULL,
  `soLuongKho` int(11) NOT NULL,
  `pathImage` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblProducts`
--

INSERT INTO `tblProducts` (`productID`, `danhMucID`, `tenSanPham`, `moTaSanPham`, `giaSanPham`, `xuatXu`, `soLuongKho`, `pathImage`) VALUES
(1, 1, 'Áo ấm siêu ấm', 'Siêu ấm rất chi là ấm', 3000, 'Hàn Quốc', 10, 'z3813209568786_a1b3919d2bb7c246987f0ac76bb6fc36.jpg'),
(2, 1, 'Áo ấm siêu lạnh', 'Siêu lạnh rất chi là ấm', 3000, 'Hàn Quốc', 11, ''),
(3, 11, 'Hàng sale 11/11', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 1, 'z3813209577556_35bf4fe7d2919e7c49377a9f0a192b6b.jpg\r\n'),
(4, 11, 'Hàng sale 12/12', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 1, 'z3813209570578_0cd3d780e7ab9ffe10f0c1ee8a6fc7d6.jpg'),
(5, 11, 'Hàng sale 10/10', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 1, 'z3813209573365_0c5edb9ececcb0a118132347cdb191ac.jpg'),
(7, 11, 'Hàng sale 08/08', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 1, 'z3813209574967_41e7631d860103d3ca9f5a7c109d1ff6.jpg'),
(8, 11, 'Hàng sale 09/09', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 1, 'z3813209573768_ad317002f4ef78c4afc7c8ff754c8b6a.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblUsers`
--

CREATE TABLE `tblUsers` (
  `userID` int(10) NOT NULL,
  `loginName` varchar(50) NOT NULL,
  `password` varchar(300) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `fullName` varchar(20) NOT NULL,
  `soDienThoai` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `ngaySinh` date NOT NULL,
  `roleName` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblUsers`
--

INSERT INTO `tblUsers` (`userID`, `loginName`, `password`, `status`, `fullName`, `soDienThoai`, `email`, `diaChi`, `ngaySinh`, `roleName`) VALUES
(1, 'admin', 'admin', 1, 'khánh', '09892822', 'khanh@gmail.com', 'thanh hóa', '2022-11-01', 1),
(2, 'user', 'user', 1, 'Văn Khánh', '08765678', 'khanh@gmail.com', 'thanh hóa', '2022-11-01', 0);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblBlog`
--
ALTER TABLE `tblBlog`
  ADD PRIMARY KEY (`idBlog`);

--
-- Chỉ mục cho bảng `tblDanhMuc`
--
ALTER TABLE `tblDanhMuc`
  ADD PRIMARY KEY (`danhMucID`);

--
-- Chỉ mục cho bảng `tblOrder`
--
ALTER TABLE `tblOrder`
  ADD PRIMARY KEY (`orderID`);

--
-- Chỉ mục cho bảng `tblProducts`
--
ALTER TABLE `tblProducts`
  ADD PRIMARY KEY (`productID`);

--
-- Chỉ mục cho bảng `tblUsers`
--
ALTER TABLE `tblUsers`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tblBlog`
--
ALTER TABLE `tblBlog`
  MODIFY `idBlog` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tblDanhMuc`
--
ALTER TABLE `tblDanhMuc`
  MODIFY `danhMucID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tblOrder`
--
ALTER TABLE `tblOrder`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tblProducts`
--
ALTER TABLE `tblProducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `tblUsers`
--
ALTER TABLE `tblUsers`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
