<?php
//
require_once "./Classes/PHPExcel.php";
include_once "../quanlyBlog/API/APIHelper.php";
$apiCon = new APIHelper();
$_SESSION['login'] = 1;
$mysqli = new mysqli("localhost", "root", "", "shopBanHang");
if (isset($_POST['btnSearch'])) {
    $method = 'GET';
    $tenBlog = $_POST['txtTenBlog'];
    $endpoint = 'blog/find.php?tenBlog='.$tenBlog;
    $result = $apiCon->callAPI($endpoint, $method)["data"];
} else {
    $method = 'GET';
    $tenBlog = $_POST['txtTenBlog'];
    $endpoint = 'blog/getAll.php';
    $result = $apiCon->callAPI($endpoint, $method)["data"];
    
}
if (isset($_POST['btnXuatexcel'])) {
    $objExcel = new PHPExcel();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('DSBLG');
    $rowCount = 1;
    //Tạo tiêu đề cho cột trong excel
    $sheet->setCellValue('A' . $rowCount, 'ID Blog');
    $sheet->setCellValue('B' . $rowCount, 'Tên Blog');
    $sheet->setCellValue('C' . $rowCount, 'Nội Dung');
    $sheet->setCellValue('D' . $rowCount, 'ID User');
    $sheet->setCellValue('E' . $rowCount, 'Thời Gian');
    $sheet->setCellValue('F' . $rowCount, 'Hình Ảnh');
    //định dạng cột tiêu đề
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    //gán màu nền
    $sheet->getStyle('A1:F1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
    //căn giữa
    $sheet->getStyle('A1:F1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
    //truyền dữ liệu vào các dòng
    $sql = "SELECT * FROM tblblog ";
    $kq = mysqli_query($mysqli, $sql);
    while ($row = mysqli_fetch_array($result)) {
        $rowCount++;
        $sheet->setCellValue('A' . $rowCount, $row['idBlog']);
        $sheet->setCellValue('B' . $rowCount, $row['tenBlog']);
        $sheet->setCellValue('C' . $rowCount, $row['noiDung']);
        $sheet->setCellValue('D' . $rowCount, $row['userID']);
        $sheet->setCellValue('E' . $rowCount, $row['thoiGian']);
        $sheet->setCellValue('F' . $rowCount, $row['hinhAnh']);
    }
    //Kẻ bảng 
    $styleAray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $sheet->getStyle('A1:' . 'F' . ($rowCount))->applyFromArray($styleAray);
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $fileName = 'BlogExcel.xlsx';
    $objWriter->save($fileName);
    header('Content-Disposition: attachment; filename="' . $fileName . '"');
    header('Content-Type: application/vnd.openxlmformatsofficedocument.speadsheetml.sheet');
    header('Content-Length: ' . filesize($fileName));
    header('Content-Transfer-Encoding:binary');
    header('Cache-Control: must-revalidate');
    header('Pragma: no-cache');
    readfile($fileName);
}
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
        .css_color {
            height: 60px;
            background: linear-gradient(#ee4d2d, #ff7337);
            border: none;
            color: white;
        }
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
        }

        .row {
            width: 100%;
            margin-right: 0px;
            margin-left: 0px;
            background-image: url(data:image/jpeg;base64,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);
            background-size: 100%;
        }
    </style>

</head>



<body>

    <!-- Header -->

    <header class="header">
        TRANG QUẢN LÝ BLOG
    </header>

    <div class="noidung" style="margin-top: 123px;">
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
        <div class="row" style="display: flex;">
            <div class="col-6" style="margin-left: 500px;">
                <form method="post">
                    <caption">
                        <h3 style="margin-top: 30px;">Tìm Kiếm Blog</h3>
                        </caption>
                        <table>
                            <tr style="margin-bottom: 10px;">
                                <td>Tên Blog: </td>
                                <td>
                                    <input style="margin-bottom: 10px; margin-left:10px;" type="text" name="txtTenBlog" id="">
                                </td>
                            </tr>
                            <br>
                            <tr>
                                <td></td>
                                <td>
                                    <button type="submit" style="margin-top: 10px; margin-bottom: 10px; margin-left:10px;" name="btnSearch">
                                        <img src="http://localhost/BTL_WEB/Public/img/search.png"> SEARCH
                                    </button>&nbsp;&nbsp;&nbsp;
                                    <button type="submit" name="btnXuatexcel">
                                        <img src="http://localhost/BTL_WEB/Public/img/xls.gif">
                                        Xuất Excel</button>
                                </td>
                            </tr>
                        </table>
                </form>
            </div>
            <table class="table">
                <thead class="css_color">
                    <tr>
                        <th scope="col">ID Blog</th>
                        <th scope="col">Tên Blog</th>
                        <th scope="col">Nội Dung</th>
                        <th scope="col">ID User</th>
                        <th scope="col">Thời Gian</th>
                        <th scope="col">Hình Ảnh</th>
                        <th scope="col">Sửa</th>
                        <th scope="col">Xóa</th>
                    </tr>
                </thead>
                <?php
                $i = 1;
                foreach ($result as $row) {
                    echo '<tr>
                    <td> ' . $i . '</td>
                    <td> ' . $row['tenBlog'] . '</td>
                    <td> ' . $row['noiDung'] . '</td>
                    <td> ' . $row['userID'] . '</td>
                    <td> ' . $row['thoiGian'] . '</td>
                    <td>
                    <img  style="width: 100px;" src="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlyBlog/upload/' . $row['hinhAnh'] . '">
                    </td>
                    <td><input type="button" name="btnSua"
                    value="Sửa" onclick=\' window.open("SuaBlog.php?userID=' . $row['userID'] . '","_seft") \' ></td>
                    <td><input type="button" name="btnXoa"
                    value="Xóa" onclick=\' window.open("XoaBlog.php?userID=' . $row['userID'] . '","_seft") \'></td>
                    </tr>';
                    $i++;
                }
                ?>
                </tbody>
            </table>
        </div>

    </div>
    <script src="http://localhost/BTL_WEB/public/Styles/bootstrap4/bootstrap.min.js"></script>
</body>

</html>