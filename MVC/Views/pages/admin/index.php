<?php
session_start();
$_SESSION['login'] = 1;
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "shopBanHang";
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sqlSp = "SELECT COUNT(productID) AS TONGSP FROM `tblProducts` ";
$SQL1 = mysqli_query($conn, $sqlSp);
$sqlkhach = "SELECT COUNT(tblUsers.userID) AS TONGKH FROM tblUsers";
$SQL2 = mysqli_query($conn, $sqlkhach);
$sqlblog = "SELECT COUNT(tblBlog.idBlog) AS TONGBL FROM tblBlog";
$SQL3 = mysqli_query($conn, $sqlblog);

$sqlTong = "SELECT SUM(tblOrder.soLuong*tblProducts.giaSanPham) AS Tong FROM tblOrder, tblProducts WHERE
tblProducts.productID = tblOrder.productID AND tblOrder.status = '1' ";

$SQL4 =  mysqli_query($conn, $sqlTong);
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> Quản trị Admin</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Nhom 6 - tt23">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="http://localhost/BTL_WEB/public/Css/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/BTL_WEB/public/Css/main_styles.css">
	<link rel="stylesheet" href="http://localhost/BTL_WEB/public/plugins/font-awesome-4.7.0/css/font-awesome.css">
	<style>
		.header {
			text-align: center;
			width: 100%;
			height: 124px;
			line-height: 124px;
			font-size: 30px;
			color: wheat;
		}

		.box-til {
			font-size: 20px;
			color: white;
			font-weight: 800;
			background: linear-gradient(#ee4d2d, #ff7337);
			width: 220px;
			text-align: center;
			height: 60px;
			line-height: 60px;
			margin-bottom: 0 !important;
			margin-top: 24px;
		}

		.render_noidung {
			justify-content: space-evenly;
			margin-top: 100px;
			margin-left: 20px;
			display: flex;
			width: 100%;
		}

		.css_img {
			min-width: 286px;
			min-height: 286px;
		}

		.CSS_CARD {}
	</style>

</head>



<body>

	<!-- Header -->

	<header class="header">
		TRANG QUẢN LÝ ADMIN
	</header>

	<div class="noidung">
		<div class="slide-bar">
			<h2 class="box-til">
				<span>QUẢN TRỊ ADMIN</span>
			</h2>
			<div class="category-list">
				<div class="item-list">
					<ul>
						<li class="menu-list">
							<a href="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanLyKhachHang/qlKhachHang.php">Quản lý Khách hàng</a>
						</li>
						<li class="menu-list">
							<a href="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlyBlog/Blog.php">Quản lý BLOG</a>
						</li>
						<li class="menu-list">
							<a href="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlySanPham/qlSanPham.php">Quản lý Sản phẩm</a>
						</li>
						<li class="menu-list">
							<a onclick="confirmLogout()"><i class="fa fa-sign-out" aria-hidden="true"></i>Đăng xuất</a>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<div class="render_noidung">
			<div class="card CSS_CARD" style="width: 18rem;">
				<img class="card-img-top css_img" src="http://localhost/BTL_WEB/public/img/khachHangicon.jpeg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">TỔNG KHÁCH HÀNG <br> --<span style="color: red;"><?php $ROW = mysqli_fetch_assoc($SQL2);
					echo $ROW['TONGKH'] . " Khách đang hoạt động" ?></span> </h5>
					<p class="card-text">Số lượng người tiêu dùng đông đảo, chiếm ưu thế</p>
					<a href="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanLyKhachHang/qlKhachHang.php" class="btn btn-primary">Đi tới quản lý</a>
				</div>
			</div>
			<div class="card CSS_CARD" style="width: 18rem;">
				<img class="card-img-top css_img" src="http://localhost/BTL_WEB/public/img/blogicon.jpeg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">TỔNG SỐ TIN TỨC <br> -- <span style="color: red;"><?php $ROW =  mysqli_fetch_assoc($SQL3);
					echo $ROW['TONGBL'] . " Bài Báo đã đăng" ?></span></h5>
					<p class="card-text">Tin tức cập nhập nhanh chóng, chinh xác đến từng giây</p>
					<a href="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlyBlog/Blog.php" class="btn btn-primary">Đi tới quản lý</a>
				</div>
			</div>
			<div class="card CSS_CARD" style="width: 18rem;">
				<img class="card-img-top css_img" src="http://localhost/BTL_WEB/public/img/sanphamicon.jpeg" alt="Card image cap">
				<div class="card-body">
					<h5 class="card-title">SẢN PHẨM KINH DOANH <br> --<span style="color: red;"><?php $ROW = mysqli_fetch_assoc($SQL1);
					echo $ROW['TONGSP'] . " Sản phẩm Kinh doanh" ?></span></h5>
					<p class="card-text">Sản phẩm đa dạng mẫu mã, mặt hàng</p>
					<a href="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlySanPham/qlSanPham.php" class="btn btn-primary">Đi tới quản lý</a>
				</div>
			</div>

		</div>

	</div>
	<script src="http://localhost/BTL_WEB/public/Styles/bootstrap4/bootstrap.min.js"></script>
	<script type="text/javascript">
		function confirmLogout() {
			if (confirm("Bạn muốn đăng xuất?") == true) {
				window.location = 'admin/dangxuat'

			} else {
				alert("Đăng xuất thất bại");
			}
		}
	</script>
</body>

</html>