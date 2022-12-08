<?php
session_start();
$_SESSION['login'] = 1;

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
			<?php
			//include file o day
			?>
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