-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 08, 2022 lúc 03:30 PM
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
-- Cơ sở dữ liệu: `shopBanHang`
-- Cơ sở dữ liệu: `shopBanHang`
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
  `thoiGian` date NOT NULL,
  `hinhAnh` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `tblBlog`
--

INSERT INTO `tblBlog` (`idBlog`, `tenBlog`, `noiDung`, `userID`, `thoiGian`, `hinhAnh`) VALUES
(14, 'Bóng chuyền hiện đại', 'Bóng chuyền là 1 môn thể thao Olympic, trong đó 2 đội được tách ra bởi 1 tấm lưới. Mỗi đội cố gắng ghi điểm bằng cách đưa được trái bóng chạm phần sân đối phương theo đúng luật quy định.[1]\r\n\r\nBộ luật hoàn chỉnh khá rộng. Nhưng sơ lược, cách chơi như sau: Vận động viên ở 1 đội bắt đầu lượt đánh bằng cách phát bóng (thảy hoặc thả trái bóng và đánh bằng bàn tay hoặc cánh tay), từ ngoài đường biên cuối sân, qua lưới, và sang phần sân của đội nhận bóng. Đội nhận bóng không được để bóng chạm mặt đất bên phần sân đội mình. Họ được phép chạm bóng tối đa 3 lần. Thông thường, 2 lần chạm đầu tiên được dùng để chuẩn bị cho đội tấn công, đội cố gắng trả trái bóng qua lưới sao cho đội bên kia không thể chặn trái để không chạm mặt đất phần sân đội mình.\r\n\r\nLượt bóng tiếp tục, với mỗi đội được phép chạm bóng nhiều nhất 3 lần liên tục, đến khi một trong 2 điều xảy ra (1): đội thắng lượt bóng, làm cho trái bóng chạm được mặt đất phần sân đối phương; hay (2): đội phạm lỗi và thua lượt banh. Đội thắng lượt bóng ghi được 1 điểm, và được phép giao banh ở lượt tiếp theo. Một vài lỗi phổ thông thường phạm phải là:\r\n\r\nKhiến bóng chạm đất ngoài phần sân đối phương hoặc không đưa được bóng qua lưới;\r\n\"Cầm hoặc ném\" bóng;\r\n\"2 chạm\": 2 lần chạm bóng bởi cùng một vận động viên;\r\n4 lần chạm bóng liên tục bởi cùng một đội;\r\nLỗi chạm lưới: chạm vào lưới trong khi lượt bóng chưa kết thúc;\r\nTrái bóng thường được chơi bằng bàn tay hoặc cánh tay, nhưng người chơi được phép đập hoặc đẩy (chạm bóng trong thời gian ngắn) bằng bất kì bộ phận nào trên cơ thể.\r\n\r\nCó khá nhiều kĩ thuật chơi trong bóng chuyền, bao gồm \"spiking\" (đập bóng) và \"blocking\" (chắn bóng) (bởi vì những ký thuật chơi đó được thực hiện bên trên lưới nhảy thẳng đứng là một trong những kĩ năng được chú trọng trong thể thao) cũng như \"passing\" (bắt bước 1), \"setting\" (chuyền 2), và các vị trí chơi đặc thù và cấu trúc chơi phòng thủ và tấn công.\r\n\r\n', '11', '2022-12-08', 'bóng_chuyen.jpeg'),
(17, 'Hoa Hậu Bị bốc phốt', 'Thời gian gần đây, hai từ \"Hoa hậu\" trở nên phổ biến đến mức thành nỗi \"ám ảnh\" với không ít khán giả. Bên cạnh tình trạng tràn lan các cuộc thi sắc đẹp, câu chuyện Hoa hậu vừa đăng quang đã vướng ồn ào cũng khiến nhiều người ngán ngẩm.\r\nCó trường hợp chỉ vài tiếng sau khi vương miện được trao, tân Hoa hậu đã phải đối mặt với những tin đồn tiêu cực, bị lật lại quá khứ...', '2', '2022-12-08', 'hoa_hau_phuong_khanh.jpeg'),
(18, 'Bóng đá', 'Cuộc chạm trán đội bóng La Liga, Cadiz là trận đấu đầu tiên trong chuyến du đấu Tây Ban Nha của MU. Do thiếu vắng nhiều ngôi sao bận dự World Cup, HLV Erik Ten Hag quyết định đặt niềm tin vào nhóm cầu thủ dự bị như Lindelof, Wan-Bissaka, Van De Beek hay Martial.', '2', '2022-12-08', 'bgda.jpeg'),
(19, 'Cầu Lông', 'Giải cầu lông vô địch thế giới là một giải cầu lông được tổ chức bởi Liên đoàn Cầu lông Thế giới. Giải đấu này cùng với Thế vận hội Olympic là hai sân chơi cao nhất của các tay vợt cầu lông. Wikipedia', '2', '2022-12-07', 'cau_long.jpeg'),
(20, 'TUYÊN DƯƠNG SINH VIÊN 5 TỐT CẤP TRƯỜNG', 'Trong những năm qua, Phong trào “Sinh viên 5 tốt” do Trung ương Hội Sinh viên Việt Nam phát động đã lan tỏa mạnh mẽ, góp phần tạo động lực giúp sinh viên có cơ hội rèn luyện, cống hiến và trưởng thành; phát hiện nhiều tấm gương điển hình, có bản lĩnh chính trị vững vàng, giàu năng lực và nhiệt huyết trong các lĩnh vực. Phong trào được triển khai rộng rãi tại các trường đại học, cao đẳng, học viện nhằm tạo môi trường cho sinh viên trải nghiệm, trau dồi kiến thức và hoàn thiện kỹ năng. Nhằm ghi nhận những cố gắng, phấn đấu của các bạn sinh viên, ngày 04/12/2022 Ban Chấp hành Hội Sinh viên trường Đại học Công nghệ Giao thông vận tải đã tổ chức Lễ tuyên dương Sinh viên 5 Tốt cấp Trường và phát động cuộc vận động Sinh viên 5 Tốt.', '11', '2022-12-04', '318178296_605463054913983_2952680564108493179_n.jpeg');

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
(4, 'Đồ chơi trẻ em'),
(5, 'Đồ dùng cá nhân'),
(6, 'Nhẫn cưới'),
(7, 'Vải may'),
(8, 'Vải may'),
(9, 'Đồ gia dụng'),
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
(69, '2022-11-14', 1, '2', 5, 1),
(70, '2022-11-14', 1, '2', 5, 1),
(73, '2022-11-15', 2, '2', 12, 1),
(84, '2022-11-16', 2, '2', 12, 1),
(85, '2022-11-16', 1, '9', 7, 1),
(86, '2022-11-16', 1, '9', 8, 1),
(90, '2022-12-01', 1, '11', 10, 1),
(91, '2022-12-01', 1, '11', 10, 1),
(95, '2022-12-08', 2, '2', 25, 1),
(102, '2022-12-08', 1, '2', 20, 1),
(114, '2022-12-08', 1, '2', 29, 1),
(115, '2022-12-08', 1, '2', 20, 1),
(116, '2022-12-08', 198, '2', 26, 1),
(117, '2022-12-08', 198, '2', 26, 1),
(118, '2022-12-08', 2, '2', 25, 1),
(119, '2022-12-08', 2, '2', 25, 1),
(120, '2022-12-08', 198, '2', 26, 1),
(133, '2022-12-08', 1, '12', 21, 1),
(135, '2022-12-08', 1, '12', 21, 1),
(139, '2022-12-08', 99, '12', 22, 0);

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
(20, 1, 'Áo Khoác Ấm', 'II. HỖ TRỢ ĐỔI TRẢ THEO QUY ĐỊNH CỦA SHOPEE - Điều kiện áp dụng (trong vòng 3 ngày kể từ khi nhận sản phẩm)  - Hàng hoá bị rách, in lỗi, bung chỉ, và các lỗi do vận chuyển hoặc do nhà sản xuất. 1. Trường hợp được chấp nhận:  - Hàng giao sai size khách đã đặt hàng  - Giao thiếu hàng  2. Trường hợp không đủ điều kiện áp dụng chính sách:  - Quá 2 ngày kể từ khi Quý khách nhận hàng  - Gửi lại hàng không đúng mẫu mã, không phải sản phẩm của Nice Clothes ', 455002, 'Việt Nam', 0, 'mua-quan-ao-am-chat-luong-gia-re-o-dau-tot-nhat-tai-tphcm.png'),
(21, 1, '( FLASH SALE) QD Quần đũi dài nam đẹp', '( FLASH SALE) QD Quần đũi dài nam đẹp , Chất dầy dặn, Thoáng nhẹ, Mềm mát, Thoải mái', 100000, 'Hà Nội', 110, 'e4628831-e0bf-4aa4-88dd-bc1629b58cff.jpeg'),
(22, 2, 'Giầy Adidas', ' Các mẫu giày thể thao Adidas Ultra Boost chính hãng luôn tạo cảm giác thoải mái, dễ chịu, êm ái cho người dùng trong từng bước di chuyển với đế Boost được thiết ...', 120391, 'Quảng Châu', 100, '0f8debddd3369694c9e3918b9c354464.jpeg'),
(23, 4, 'thế giới đồ chơi - toy planet', 'Mua đồ chơi trẻ em giao tận nơi và tham khảo thêm nhiều sản phẩm khác. Miễn phí vận chuyển toàn quốc cho mọi đơn hàng . Đổi trả dễ dàng. Thanh toán ..', 877391, 'Trung Quốc', 12, 'e88c7b96eae2436ad895343106de66e2.jpeg'),
(24, 6, 'Nhẫn Cưới Đẹp 2022, BST Nhẫn Cưới Vàng Cao Cấp PNJ', 'BST 500+ mẫu nhẫn cưới vàng mới nhất với thiết kế vàng trắng, vàng vàng, vàng hồng được các nghệ nhân chế tác tinh xảo từ vàng 10K, 14K, 18K.', 10000000, 'Việt Nam', 122, 'nhan-cuoi-deo-khong-vua-2-667x800.jpeg'),
(25, 1, 'Áo Đẹp Rẻ', 'đẹp xuất sắc', 99999, 'Việt Nam', 1217, 'download (1).jpeg'),
(26, 1, 'Áo Ngắn Dài tay', 'HỖ TRỢ ĐỔI TRẢ THEO QUY ĐỊNH CỦA SHOPEE - Điều kiện áp dụng (trong vòng 3 ngày kể từ khi nhận sản phẩm) ', 898989, 'Quảng Châu', 101, 'download.jpeg'),
(27, 11, 'Kem Nghệ', 'Bôi trị thâm', 15000, 'Việt Nam', 100, 'Screenshot 2022-11-30 at 10.43.02.png'),
(28, 9, 'đồ gia dụng chính hãng', 'gười tiêu dùng có cơ hội sắm nồi, chảo, chén, lẩu điện, máy xay sinh tố, quạt... rẻ hơn ngày thường đến 50%, trên Shop VnExpress.', 200000, 'Việt Nam', 10, '500x350-5701-1562313558.png'),
(29, 10, 'Cải THÌA', 'Cải thìa hay Cải bẹ trắng, Cải chíp, Bạch giới tử là một loài cải thuộc họ cải cùng họ với cải thảo, cải bẹ xanh. Cải thìa là loại rau rất gần gũi với các món ăn của người Việt Nam. ', 10000, 'Việt Nam, Đà Lạt', 99, 'cải-thìa-.jpeg'),
(30, 10, 'Cải Thảo', 'Bắp cải thảo còn được gọi là cải bao, cải cuốn, cải bắp tây, là phân loài thực vật thuộc họ Cải ăn được có nguồn gốc từ Trung Quốc, được sử dụng rộng rãi trong các món ăn ở Đông Nam Á và Đông Á.', 9000, 'Việt Nam, Đà Lạt', 1000, 'imager_13237.jpeg');

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
(1, 'admin', 'admin', 1, 'khánh', 1, '09892822', 'khanh@gmail.com', 'thanh hóa', '2022-11-01', 1, ''),
(2, 'user', 'user', 1, 'Khánh Nhà Thơ', 1, '09871271241', 'khanhvd@gmail.com', 'Thanh Hóa', '2002-11-01', 0, ''),
(7, 'khanhvdinh', 'user', 1, 'Văn Đình Khánh', 1, '08765678', 'khanh@gmail.com', 'Hà Nội', '2022-11-15', 0, ''),
(8, 'Caodn', '1234', 1, 'Cao sỳ tai', 1, '0927141124', 'khanh@gmail.com', 'Việt Nam', '2022-11-15', 0, ''),
(9, 'user11', 'user', 1, 'user11', 1, '0927141124', 'khanh@gmail.com', 'Việt Nam', '2022-11-16', 0, ''),
(10, 'vandinhkhanh02', 'admin', 1, 'Văn Đình Khánh', 1, '', '', 'Việt Nam', '2022-11-30', 0, ''),
(11, 'khanhvd', 'admin', 1, 'BÉ lê văn ĐẬT', 0, '092918313', 'khanh@gmail.com', 'Việt Nam', '2002-07-25', 0, ''),
(12, 'vandinhkhanh', 'admin', 1, 'Văn Khánh', 1, '', '', 'Việt Nam', '2022-12-08', 0, '');

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
  MODIFY `idBlog` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `tblDanhMuc`
--
ALTER TABLE `tblDanhMuc`
  MODIFY `danhMucID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tblOrder`
--
ALTER TABLE `tblOrder`
  MODIFY `orderID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=140;

--
-- AUTO_INCREMENT cho bảng `tblProducts`
--
ALTER TABLE `tblProducts`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tblUsers`
--
ALTER TABLE `tblUsers`
  MODIFY `userID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
