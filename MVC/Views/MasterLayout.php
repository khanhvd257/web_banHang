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
	<title>SHOP VẬT PHẨM</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="Colo Shop Template">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="http://localhost/BTL_WEB/public/Css/bootstrap4/bootstrap.min.css">
	<link rel="icon" href="http://localhost/BTL_WEB/public/img/logoShop.png">
	<link rel="stylesheet" href="http://localhost/BTL_WEB/public/Css/main_styles.css">
	<link rel="stylesheet" href="http://localhost/BTL_WEB/public/plugins/font-awesome-4.7.0/css/font-awesome.css">
</head>

<body>
	<!-- Header -->

	<header class="header">
		<nav class="navbar">
			<div class="logo_container">
				<img id="logo_Shop" src="http://localhost/BTL_WEB/public/img/LOGO.png">
				<h6 style="color: white ;">Phong cách thời trang hiện đại</h6>
			</div>
			<ul class="navbar_menu">

			</ul>
			<ul class="navbar_user ">
				<div class="searchFrom">
					<form action="http://localhost/BTL_WEB/product/searchName" method="post" name="formSearch">
						<input name="txtSearchName" type="text" style="border: none; box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px; font-family: fangsong; border-radius:6px" placeholder="Tìm kiếm sản phẩm">
						<li><button type="submit" class=" button_Search" name="btnSearchProduct"><i class="fa fa-search" aria-hidden="true"></i></button>
					</form>
				</div>
				<li class="checkout">
					<a href="http://localhost/BTL_WEB/order">
						<i class="fa fa-shopping-cart" aria-hidden="true"></i>
						<?php
						if (isset($_SESSION['user'])) : ?>
							<span id="checkout_items" class="checkout_items">
								<?php
								$idUser = $dataUser['userID'];
								$sql = "SELECT *, SUM(soLuong) as TongSL FROM tblOrder, tblProducts, tblUsers WHERE tblUsers.userID = tblOrder.userID 
								AND tblProducts.productID = tblOrder.productID AND tblOrder.userID = '$idUser' AND tblOrder.payStatus='0' GROUP BY tblProducts.productID ORDER BY tblOrder.orderID DESC";
								$kq = mysqli_query($conn, $sql);
								$countOrder = mysqli_num_rows($kq);
								echo $countOrder;
								?>
							<?php endif ?>
							</span>
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
								href="http://localhost/BTL_WEB/profile">Profile</a></li>
								<li><a style="   
								color: black;
								font-size: 14px;
								BORDER: NONE;
								background: none;
								width: 100%;"
							href="http://localhost/BTL_WEB/product/damua" >Hóa Đơn</a></li>
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
				<span>DANH MỤC</span>
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
						<li class="menu-list">
							<a href="http://localhost/btl_web">Tất Cả Danh Mục</a>
						</li>
						<li class="menu-list">
							<a href="http://localhost/btl_web/blog">BLOG</a>
						</li>
						<?php while ($row = mysqli_fetch_array($danhmuc)) : ?>
							<li class="menu-list">
								<a href="http://localhost/btl_web/product/danhmuc/<?php echo $row['danhMucID'] ?>"><?php echo ($row['tenDanhMuc']); ?></a>
							</li>
						<?php endwhile; ?>

					</ul>
				</div>
			</div>
		</div>
		<div class="wrap_Container" style="display: flex;    display: flex; flex-direction: column; flex-grow: 1;">
			<marquee style="color: red">SHOP NHÓM 6 ORDER TẤT CẢ MẶT HÀNG TỪ TRÊN TRỜI DƯỚI ĐẤT CÁC GÌ CŨNG BÁN</marquee>
			<nav aria-label="breadcrumb" style="max-height: 60px; border-radius:0; margin-top: 1px;">
				<ol class="breadcrumb" style="height: 100%; border-radius:0;align-items: center;">
					<li class="breadcrumb-item"><a href="http://localhost/btl_web">Trang Chủ</a></li>
					<?php if ($_SESSION['page'] != "Home") : ?>

						<li class="breadcrumb-item
						 <?php if (isset($_SESSION['pageSub'])) {
								echo "";
							} else {
								echo 'active"';
							} ?>" aria-current="page">

							<?php echo $_SESSION['page'] ?></li>

						<?php if (isset($_SESSION['pageSub'])) : ?>
							<li class="breadcrumb-item active" aria-current="page">
								<?php echo $_SESSION['pageSub'] ?>
							</li>
						<?php endif ?>
					<?php endif ?>
				</ol>

			</nav>
			<?php if (isset($_SESSION['page']))
				if ($_SESSION['page'] == "Home") : ?>
				<div class="container_carousel">
					<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
							<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						</ol>
						<div class="carousel-inner cs_innerCarousel">
							<div class="carousel-item active ">
								<img class="d-block w-100 cs_activeCarou" src="http://localhost/btl_web/public/img/banner.gif" alt="First slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 cs_activeCarou" src="http://localhost/btl_web/public/img/banner1.gif" alt="Second slide">
							</div>
							<div class="carousel-item">
								<img class="d-block w-100 cs_activeCarou" src="http://localhost/btl_web/public/img/banner2.gif" alt="Third slide">
							</div>
						</div>
						<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
							<span class="carousel-control-prev-icon" aria-hidden="true"></span>
							<span class="sr-only">Previous</span>
						</a>
						<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
							<span class="carousel-control-next-icon" aria-hidden="true"></span>
							<span class="sr-only">Next</span>
						</a>
					</div>
				</div>
			<?php endif ?>

			<div class="content_Render">
				<?php
				include_once './MVC/Views/pages/' . $data['page'] . '.php';
				?>
			</div>
		</div>



	</div>
	<!-- Footer -->

	<div class="chan_trang">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
						<ul class="footer_nav">
							<li><a style="color: white;" href="http://localhost/btl_web/blog">Blog</a></li>
							<li><a style="color: white;" href="#">FAQs</a></li>
							<li><a style="color: white;" href="">Contact us</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-6">
					<div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
						<ul>
							<li><a href="#" style="color: white;"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" style="color: white;"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" style="color: white;"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
							<li><a href="#" style="color: white;"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
							<li><a href="#" style="color: white;"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="footer_nav_container">
					<div class="cr" style="color: white;">©2022 NHÓM 6 TT23 TRƯỜNG ĐẠI HỌC CÔNG NGHỆ GIAO THÔNG VẬN TẢI <i class="fa fa-heart-o" aria-hidden="true"></i>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="http://localhost/BTL_WEB/public/Css/bootstrap4/bootstrap.min.js"></script>
	<script src="http://localhost/BTL_WEB/public/js/main.js"></script>
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>