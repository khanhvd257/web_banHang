-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 16, 2022 lúc 02:01 AM
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
(7, '2022-11-13', 2, '2', 11, 1),
(8, '2022-11-13', 2, '2', 11, 1),
(9, '2022-11-13', 2, '2', 11, 1),
(10, '2022-11-13', 2, '2', 11, 1),
(11, '2022-11-13', 2, '2', 11, 1),
(12, '2022-11-13', 2, '2', 11, 1),
(13, '2022-11-13', 2, '2', 11, 1),
(14, '2022-11-13', 2, '2', 11, 1),
(16, '2022-11-13', 2, '2', 11, 1),
(18, '2022-11-13', 2, '2', 11, 1),
(19, '2022-11-13', 2, '2', 11, 1),
(20, '2022-11-13', 2, '2', 11, 1),
(21, '2022-11-13', 2, '2', 11, 1),
(22, '2022-11-13', 2, '2', 11, 1),
(23, '2022-11-13', 2, '2', 11, 1),
(24, '2022-11-13', 2, '2', 11, 1),
(25, '2022-11-13', 2, '2', 11, 1),
(26, '2022-11-13', 2, '2', 11, 1),
(27, '2022-11-13', 2, '2', 11, 1),
(28, '2022-11-14', 2, '2', 11, 1),
(29, '2022-11-14', 2, '2', 11, 1),
(30, '2022-11-14', 2, '2', 11, 1),
(31, '2022-11-14', 2, '2', 11, 1),
(32, '2022-11-14', 2, '2', 11, 1),
(33, '2022-11-14', 2, '2', 11, 1),
(34, '2022-11-14', 2, '2', 11, 1),
(35, '2022-11-14', 2, '2', 11, 1),
(36, '2022-11-14', 2, '2', 11, 1),
(37, '2022-11-14', 2, '2', 11, 1),
(38, '2022-11-14', 2, '2', 11, 1),
(39, '2022-11-14', 2, '2', 11, 1),
(40, '2022-11-14', 2, '2', 11, 1),
(41, '2022-11-14', 2, '2', 11, 1),
(42, '2022-11-14', 2, '2', 11, 1),
(43, '2022-11-14', 2, '2', 11, 1),
(44, '2022-11-14', 2, '2', 11, 1),
(45, '2022-11-14', 2, '2', 11, 1),
(46, '2022-11-14', 2, '2', 11, 1),
(47, '2022-11-14', 2, '2', 11, 1),
(48, '2022-11-14', 2, '2', 11, 1),
(49, '2022-11-14', 2, '2', 11, 1),
(50, '2022-11-14', 2, '2', 11, 1),
(51, '2022-11-14', 2, '2', 11, 1),
(52, '2022-11-14', 2, '2', 11, 1),
(53, '2022-11-14', 2, '2', 11, 1),
(54, '2022-11-14', 2, '2', 11, 1),
(55, '2022-11-14', 2, '2', 11, 1),
(56, '2022-11-14', 2, '2', 11, 1),
(57, '2022-11-14', 2, '2', 11, 1),
(58, '2022-11-14', 2, '2', 11, 1),
(59, '2022-11-14', 2, '2', 11, 1),
(60, '2022-11-14', 2, '2', 11, 1),
(61, '2022-11-14', 2, '2', 11, 1),
(62, '2022-11-14', 2, '2', 11, 1),
(63, '2022-11-14', 2, '2', 11, 1),
(64, '2022-11-14', 2, '2', 11, 1),
(65, '2022-11-14', 2, '2', 11, 1),
(66, '2022-11-14', 1, '2', 4, 1),
(67, '2022-11-14', 2, '2', 13, 1),
(68, '2022-11-14', 1213, '2', 10, 1),
(69, '2022-11-14', 1, '2', 5, 1),
(70, '2022-11-14', 1, '2', 5, 1),
(71, '2022-11-14', 0, '2', 7, 1),
(72, '2022-11-14', 1, '2', 7, 0),
(73, '2022-11-15', 1, '2', 12, 0),
(74, '2022-11-15', 1, '2', 10, 0),
(75, '2022-11-15', 1, '2', 10, 0),
(76, '2022-11-15', 1, '2', 10, 0),
(77, '2022-11-15', 1, '2', 10, 0),
(78, '2022-11-15', 1, '2', 10, 0),
(79, '2022-11-15', 1, '2', 10, 0),
(80, '2022-11-15', 1, '2', 10, 0),
(81, '2022-11-15', 1, '2', 10, 0);

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
(1, 1, 'Áo ấm siêu ấm', 'Siêu ấm rất chi là ấm', 3000, 'Hàn Quốc', 0, 'z3813209568786_a1b3919d2bb7c246987f0ac76bb6fc36.jpg'),
(2, 1, 'Áo ấm siêu lạnh', 'Siêu lạnh rất chi là ấm', 3000, 'Hàn Quốc', 0, ''),
(3, 11, 'Hàng sale 11/11', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 0, 'z3813209577556_35bf4fe7d2919e7c49377a9f0a192b6b.jpg\r\n'),
(4, 11, 'Hàng sale 12/12', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 0, 'z3813209570578_0cd3d780e7ab9ffe10f0c1ee8a6fc7d6.jpg'),
(5, 11, 'Hàng sale 10/10', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 0, 'z3813209573365_0c5edb9ececcb0a118132347cdb191ac.jpg'),
(7, 11, 'Hàng sale 08/08', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 1, 'z3813209574967_41e7631d860103d3ca9f5a7c109d1ff6.jpg'),
(8, 11, 'Hàng sale 09/09', 'Hàng sale xả, giá ưu đãi bất ngờ nè các bạn ơi, Nhanh tay thêm vào giỏ hàng thôi.', 1000000, '71DCTT23', 1, 'z3813209573768_ad317002f4ef78c4afc7c8ff754c8b6a.jpg'),
(9, 6, 'Nhẫn Cưới Kim Cương', 'Cam kết đảm bảo chất lượng sản phẩm theo tiêu chuẩn tuổi vàng của Hàn Quốc (12K-16K-20K) Bảo hành sản phầm 100 năm ngay cả lỗi người dùng. Duy nhất chỉ có tại Nhẫn cưới NHÓM 6 Bảo hành 100 năm. Cửa hàng Nhẫn cưới uy tín. Nhận hàng sau 3 ngày.', 6868690, 'Nhóm 6', 0, ''),
(10, 6, 'Nhẫn Cưới Hoàng Gia', 'Cam kết đảm bảo chất lượng sản phẩm theo tiêu chuẩn tuổi vàng của Hàn Quốc (12K-16K-20K) Bảo hành sản phầm 100 năm ngay cả lỗi người dùng. Duy nhất chỉ có tại Nhẫn cưới NHÓM 6 Bảo hành 100 năm. Cửa hàng Nhẫn cưới uy tín. Nhận hàng sau 3 ngày.', 6868690, 'Nhóm 6', 100, ''),
(11, 6, 'Nhẫn Cưới Cho Gà', 'Cam kết đảm bảo chất lượng sản phẩm theo tiêu chuẩn tuổi vàng của Hàn Quốc (12K-16K-20K) Bảo hành sản phầm 100 năm ngay cả lỗi người dùng. Duy nhất chỉ có tại Nhẫn cưới NHÓM 6 Bảo hành 100 năm. Cửa hàng Nhẫn cưới uy tín. Nhận hàng sau 3 ngày.', 6868690, 'Nhóm 6', 0, ''),
(12, 6, 'Nhẫn Cưới Cho Gà', 'Cam kết đảm bảo chất lượng sản phẩm theo tiêu chuẩn tuổi vàng của Hàn Quốc (12K-16K-20K) Bảo hành sản phầm 100 năm ngay cả lỗi người dùng. Duy nhất chỉ có tại Nhẫn cưới NHÓM 6 Bảo hành 100 năm. Cửa hàng Nhẫn cưới uy tín. Nhận hàng sau 3 ngày.', 6868690, 'Nhóm 6', 2, ''),
(13, 6, 'Nhẫn Cưới Cho Ngan', 'Cam kết đảm bảo chất lượng sản phẩm theo tiêu chuẩn tuổi vàng của Hàn Quốc (12K-16K-20K) Bảo hành sản phầm 100 năm ngay cả lỗi người dùng. Duy nhất chỉ có tại Nhẫn cưới NHÓM 6 Bảo hành 100 năm. Cửa hàng Nhẫn cưới uy tín. Nhận hàng sau 3 ngày.', 6868690, 'Nhóm 6', 0, '');

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
  `gioiTinh` int(11) NOT NULL,
  `soDienThoai` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `ngaySinh` date NOT NULL,
  `roleName` int(11) NOT NULL,
  `anhDaiDien` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblUsers`
--

INSERT INTO `tblUsers` (`userID`, `loginName`, `password`, `status`, `fullName`, `gioiTinh`, `soDienThoai`, `email`, `diaChi`, `ngaySinh`, `roleName`, `anhDaiDien`) VALUES
(1, 'admin', 'admin', 1, 'khánh', 0, '09892822', 'khanh@gmail.com', 'thanh hóa', '2022-11-01', 1, ''),
(2, 'user', 'user', 1, 'Văn Khánh', 0, '08765678', 'khanh@gmail.com', 'thanh hóa', '2022-11-01', 0, ''),
(7, 'khanhvdinh', 'user', 1, 'Văn Đình Khánh', 1, '08765678', 'khanh@gmail.com', 'Hà Nội', '2022-11-15', 0, ''),
(8, '$user', '$pass', 1, '$fullName', 1, '', '', 'Việt Nam', '2022-11-15', 0, '');

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
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `tblProducts`
--
ALTER TABLE `tblProducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tblUsers`
--
ALTER TABLE `tblUsers`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
