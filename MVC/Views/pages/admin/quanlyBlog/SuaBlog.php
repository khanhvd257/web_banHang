<?php
session_start();
include_once "../quanlyBlog/API/APIHelper.php";
$apiCon = new APIHelper();
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['login']) || $_SESSION['login'] != 1) {
    // Chưa đăng nhập, chuyển hướng về trang đăng nhập
    header('Location: login.php');
    exit();
}

$thongbao = '';
$kq = '';
$TenBlog = '';
$NoiDung = '';
$HinhAnh = '';
$blogId = $_GET["blogId"]; 

if (isset($_GET['userID'])) {
    $IDUser = $_GET['userID'];
    $con  = mysqli_connect('localhost', 'root', '', 'shopBanHang');
    $sql = "SELECT * FROM tblblog WHERE idBlog = '$blogId'";
    $kq = mysqli_query($con, $sql);
    if ($kq != null) {
        while ($row = mysqli_fetch_array($kq)) {
            $IDUser = $row['userID'];
            $TenBlog = $row['tenBlog'];
            $NoiDung = $row['noiDung'];
            $HinhAnh = $row['hinhAnh'];
        }
    }
}

if (isset($_POST['btnLuu'])) {
    $TenBlog = $_POST["txtTenBlog"];
    $NoiDung = $_POST["txtNoiDung"];
    $endpoint = 'blog/edit.php';
    $method = 'PUT';
    $data = array(
        'blogId' => $blogId,
        'tenBlog' => $TenBlog,
        'noiDung' => $NoiDung,
        'userId' => $IDUser,
    );
    $kq = $apiCon->callAPI($endpoint, $method, $data);
    if ($kq) {
        $thongbao = "Sửa thành công";
        header('Location: Blog.php');
        die();
    } else {
        $thongbao = "Sửa thất bại";
    }
}

// $sql = "UPDATE tblblog SET tenBlog='$TenBlog', noiDung='$NoiDung' WHERE userID='$IDUser'";
// $kql = mysqli_query($mysqli, $sql);
// if ($kql) {
//     $thongbao = "Sửa mới thành công!";
//     header('Location: Blog.php');
//     exit();
// } else {
//     $thongbao = "Sửa mới thất bại!";
// }
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

        .row {
            display: flex;
            min-width: 1000px;
            max-width: 100%;
            justify-content: center;
            /* margin-top: 124px; */
            flex-direction: column;
            align-content: space-between;
            align-items: center;
            margin-top: 100px;
            margin-left: 20px;
        }

        .row1 {
            background-image: url(https://img4.thuthuatphanmem.vn/uploads/2020/08/18/background-go_113443610.jpg);
            background-size: 100%;
            width: 100%;
        }

        .dd1 {
            margin-bottom: 10px;
            margin-left: 10px;
        }
    </style>

</head>



<body>

    <!-- Header -->

    <header class="header">
        TRANG QUẢN LÝ BLOG
    </header>

    <div class="noidung">
        <div class="slide-bar">
            <h2 class="box-til">
                <span>QUẢN LÝ BLOG</span>
            </h2>
            <div class="category-list">
                <div class="item-list">
                    <ul>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/Blog.php">Danh Sách Blog</a>
                        </li>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/TimKiemBlog.php">Tìm Kiếm Blog</a>
                        </li>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/ThemBlog.php">Thêm Blog</a>
                        </li>
                        <!-- <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/SuaBlog.php">Sửa Blog</a>
                        </li>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/XoaBlog.php">Xóa Blog</a>
                        </li> -->
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/admin"><i class="fa fa-sign-out" aria-hidden="true"></i>Thoát</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row1">
            <div class="row" style="display: block;">
                <div class="col-6" style="margin-left: 500px;">
                    <form method="post">
                        <caption>
                            <h3>SỬA BLOG</h3>
                        </caption>
                        <table>
                            <tr>
                                <td colspan="2" style="text-align: center;color: red;">
                                    <?php echo $thongbao ?>

                                </td>
                            </tr>
                            <tr>
                                <td class="col1">ID User: </td>
                                <td class="col2">
                                    <input class="dd1" type="text" name="txtIDUser" value="<?php echo $IDUser ?>" disabled>
                                </td>
                            </tr>
                            <tr>
                                <td class="col1">Tên Blog: </td>
                                <td class="col2">
                                    <input class="dd1" type="text" name="txtTenBlog" value="<?php echo $TenBlog ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="col1">Nội Dung: </td>
                                <td class="col2">
                                    <input class="dd1" type="text" name="txtNoiDung" value="<?php echo $NoiDung ?>">
                                </td>
                            </tr>
                            <tr>
                                <td class="col1"></td>
                                <td class="col2">
                                    <input style="margin-bottom: 10px; margin-left:10px;" type="submit" name="btnLuu" value="Lưu">
                                </td>
                            </tr>

                        </table>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <script src="http://localhost/BTL_WEB/public/Styles/bootstrap4/bootstrap.min.js"></script>
</body>

</html>