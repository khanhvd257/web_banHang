<?php
include './MVC/config.php';
session_start();
if (isset($_SESSION['user'])) {
	$dataUser = $_SESSION['user'];
}
$sql = "SELECT * FROM tblDanhMuc ";
$danhmuc = mysqli_query($conn, $sql);



?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title> SHOP</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="http://localhost/BTL_WEB/public/Css/bootstrap4/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/BTL_WEB/public/Css/main_styles.css">
	<link rel="stylesheet" href="http://localhost/BTL_WEB/public/plugins/font-awesome-4.7.0/css/font-awesome.css">
</head>

<body>
	<!-- Header -->

	<header class="header">
		<nav class="navbar">
			<div class="logo_container">
				<img id="logo_Shop" src="http://localhost/BTL_WEB/public/img/LOGO.png">
				<h6>Phong cách thời trang hiện đại</h6>
			</div>
			<ul class="navbar_menu">

			</ul>
			<ul class="navbar_user ">
				<li><a href="#"><i class="fa fa-search" aria-hidden="true"></i></a>
				<li class="checkout">
					<a href="#">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						<span id="checkout_items" class="checkout_items">2</span>
					</a>
				</li>
				</li>
				<li class="account"><a href="#"><i class="fa fa-user" aria-hidden="true"></i></a>
					<ul class="account_selection">

						<!-- <li><a style="color:black; font-size: 16px;" href="http://localhost/BTL_WEB/auth">Login</a></li> -->
						<?php
						if (isset($_SESSION['user'])) {

							echo '<li><a style="    color: black;
								font-size: 14px;
								BORDER: NONE;
								background: none;
								width: 100%;"
								href="">Profile</a></li>
								<li><a style="   
								color: black;
								font-size: 14px;
								BORDER: NONE;
								background: none;
								width: 100%;"
							href="http://localhost/BTL_WEB/auth/logout" name="btnLogout" >Logout</a></li>
							';
						}
						if (!isset($_SESSION['user'])) {
							echo '<li><a style="    color: black;
								font-size: 14px;
								BORDER: NONE;
								background: none;
								width: 100%;"
								 href="http://localhost/BTL_WEB/auth">Login</a></li>';
						}
						?>

					</ul>
				</li>

				<?php
				if (isset($_SESSION['user'])) {
					echo '<li><span style= "color:white;">Xin chào, ' . ucfirst($_SESSION['user']['fullName']) . '</span></li>';
				} ?>

			</ul>

		</nav>
	</header>

	<div class="noidung">
		<div class="slide-bar">
			<h2 class="box-title">
				<span>CHUYÊN MỤC</span>
			</h2>
			<div class="category-list">
				<div class="item-list">
					<ul>
						<?php
						if (isset($dataUser['roleName'])) {
							if (($dataUser['roleName']) == 1) {
								echo '<li class="menu-list">
									<a href="/BTL_web/admin">Quản lý ADMIN</a>
									</li>';
							}
						}
						?>
						<?php while ($row = mysqli_fetch_array($danhmuc)) : ?>
							<li class="menu-list">
								<a href="http://localhost/btl_web/product/danhmuc/<?php echo $row['danhMucID'] ?>"><?php echo ($row['tenDanhMuc']); ?></a>
							</li>
						<?php endwhile; ?>

					</ul>
				</div>
			</div>
		</div>
		<div class="content_Render" style="width: 100%;">
		<?php
		include_once './MVC/Views/pages/'.$data['page'].'.php';
		?>
		</div>
		

	</div>

	<!-- Footer -->

	<div class="chan_trang">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a href="#">Blog</a></li>
							<li><a href="#">FAQs</a></li>
							<li><a href="contact.html">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="footer_nav_container">
					<div class="cr">©2022 NHÓM 6 TT23 TRƯỜNG ĐẠI HỌC CÔNG NGHỆ GIAO THÔNG VẬN TẢI <i class="fa fa-heart-o" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="http://localhost/BTL_WEB/public/Styles/bootstrap4/bootstrap.min.js"></script>
</body>

</html>