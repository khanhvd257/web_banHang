-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th10 27, 2022 lúc 10:56 AM
-- Phiên bản máy phục vụ: 10.4.21-MariaDB
-- Phiên bản PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `BTLWeb_BanQuanAo`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblBlog`
--

CREATE TABLE `tblBlog` (
  `idBlog` varchar(10) NOT NULL,
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
  `danhMucID` varchar(10) NOT NULL,
  `tenDanhMuc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblLogin`
--

CREATE TABLE `tblLogin` (
  `loginName` varchar(50) NOT NULL,
  `loginPassword` varchar(100) NOT NULL,
  `userID` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblOrder`
--

CREATE TABLE `tblOrder` (
  `orderID` varchar(10) NOT NULL,
  `ngayOrder` date NOT NULL,
  `soLuong` int(11) NOT NULL,
  `productID` varchar(10) NOT NULL,
  `userID` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblProducts`
--

CREATE TABLE `tblProducts` (
  `productID` varchar(10) NOT NULL,
  `tenSanPham` varchar(50) NOT NULL,
  `moTaSanPham` varchar(3000) NOT NULL,
  `giaSanPham` float NOT NULL,
  `xuatXu` varchar(50) NOT NULL,
  `danhMucID` varchar(10) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblRoles`
--

CREATE TABLE `tblRoles` (
  `roleID` int(11) NOT NULL,
  `roleName` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tblUsers`
--

CREATE TABLE `tblUsers` (
  `userID` varchar(10) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `soDienThoai` varchar(12) NOT NULL,
  `email` varchar(50) NOT NULL,
  `diaChi` varchar(50) NOT NULL,
  `ngaySinh` date NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tblBlog`
--
ALTER TABLE `tblBlog`
  ADD PRIMARY KEY (`idBlog`),
  ADD UNIQUE KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `tblDanhMuc`
--
ALTER TABLE `tblDanhMuc`
  ADD PRIMARY KEY (`danhMucID`);

--
-- Chỉ mục cho bảng `tblLogin`
--
ALTER TABLE `tblLogin`
  ADD PRIMARY KEY (`loginName`,`userID`);

--
-- Chỉ mục cho bảng `tblOrder`
--
ALTER TABLE `tblOrder`
  ADD PRIMARY KEY (`orderID`),
  ADD UNIQUE KEY `productID` (`productID`,`userID`),
  ADD KEY `userID` (`userID`);

--
-- Chỉ mục cho bảng `tblProducts`
--
ALTER TABLE `tblProducts`
  ADD PRIMARY KEY (`productID`),
  ADD KEY `danhMucID` (`danhMucID`);

--
-- Chỉ mục cho bảng `tblRoles`
--
ALTER TABLE `tblRoles`
  ADD PRIMARY KEY (`roleID`);

--
-- Chỉ mục cho bảng `tblUsers`
--
ALTER TABLE `tblUsers`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tblBlog`
--
ALTER TABLE `tblBlog`
  ADD CONSTRAINT `tblblog_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tblUsers` (`userID`);

--
-- Các ràng buộc cho bảng `tblOrder`
--
ALTER TABLE `tblOrder`
  ADD CONSTRAINT `tblorder_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tblUsers` (`userID`);

--
-- Các ràng buộc cho bảng `tblProducts`
--
ALTER TABLE `tblProducts`
  ADD CONSTRAINT `tblproducts_ibfk_1` FOREIGN KEY (`danhMucID`) REFERENCES `tblDanhMuc` (`danhMucID`),
  ADD CONSTRAINT `tblproducts_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `tblOrder` (`productID`);

--
-- Các ràng buộc cho bảng `tblRoles`
--
ALTER TABLE `tblRoles`
  ADD CONSTRAINT `tblroles_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `tblUsers` (`roleID`);

--
-- Các ràng buộc cho bảng `tblUsers`
--
ALTER TABLE `tblUsers`
  ADD CONSTRAINT `tblusers_ibfk_1` FOREIGN KEY (`userID`) REFERENCES `tblLogin` (`userID`),
  ADD CONSTRAINT `tblusers_ibfk_2` FOREIGN KEY (`roleID`) REFERENCES `tblRoles` (`RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
