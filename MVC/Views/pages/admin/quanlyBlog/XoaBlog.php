<?php

$_SESSION['login'] = 1;
$mysqli = new mysqli("localhost", "root", "", "shopquanao_btlweb");
$thongbao = '';
$mn = $_GET['userID'];
$sql = " DELETE FROM tblblog WHERE userID = '$mn'";
$kq = mysqli_query($mysqli, $sql);
header('Location: Blog.php');
die();

?>
<!-- <!DOCTYPE html>
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



<body> -->

<!-- Header -->

<!-- <header class="header">
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
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/TimKiemBlog.php">Tìm Kiếm Blog</a>
                        </li>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/ThemBlog.php">Thêm Blog</a>
                        </li>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/SuaBlog.php">Sửa Blog</a>
                        </li>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/MVC/Views/pages/admin/quanlyBlog/XoaBlog.php">Xóa Blog</a>
                        </li>
                        <li class="menu-list">
                            <a href="http://localhost/BTL_web/admin"><i class="fa fa-sign-out" aria-hidden="true"></i>Thoát</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID Blog</th>
                    <th scope="col">Tên Blog</th>
                    <th scope="col">Nội Dung</th>
                    <th scope="col">ID User</th>
                    <th scope="col">Lượt Thích</th>
                    <th scope="col">Thời Gian</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <?php
            $i = 1;
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>
                    <td> ' . $i . '</td>
                    <td> ' . $row['tenBlog'] . '</td>
                    <td> ' . $row['noiDung'] . '</td>
                    <td> ' . $row['userID'] . '</td>
                    <td> ' . $row['luotThich'] . '</td>
                    <td> ' . $row['thoiGian'] . '</td>
                    <td><input type="button" name="btnXoa"
                    value="Xóa" onclick=\' window.open("XoaBlog.php?userID=' . $row['userID'] . '","_seft") \'></td>
                    </tr>';
                $i++;
            }
            ?>
            </tbody>
        </table>

    </div>
    <script src="http://localhost/BTL_WEB/public/Styles/bootstrap4/bootstrap.min.js"></script>
</body>

</html> -->