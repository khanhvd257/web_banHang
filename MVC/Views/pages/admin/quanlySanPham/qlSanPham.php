<?php
require_once "./Classes/PHPExcel.php";
include_once "../quanlySanPham/API/APIHelper.php";
$apiCon = new APIHelper();
$con  = mysqli_connect('localhost', 'root', '', 'shopBanHang');

if (isset($_GET['productID'])) {
    $productID = $_GET['productID'];
    $sql = "Select * From tblproducts Where productID='$productID'";
    $kq = mysqli_query($con, $sql);

    if ($kq != null) {
        $row = $kq[0];
        $danhMucID = $row['danhMucID'];
        $tenSanPham = $row['tenSanPham'];
        $moTaSanPham = $row['moTaSanPham'];
        $giaSanPham = $row['giaSanPham'];
        $xuatXu = $row['xuatXu'];
        $soLuongKho = $row['soLuongKho'];
        $pathImage = $row['pathImage'];
    }
}
// code nút tìm kiếm //
if (isset($_POST['btnTimkiem'])) {
    $productID = $_POST['txtproductID'];
    $danhMucID = $_POST['txtdanhMucID'];
    $tenSanPham = $_POST['txttenSanPham'];
    $moTaSanPham = $_POST['txtmoTaSanPham'];
    $giaSanPham = $_POST['txtgiaSanPham'];
    $xuatXu = $_POST['txtxuatXu'];
    $soLuongKho = $_POST['txtsoLuongKho'];
    $pathImage = $_POST['txtpathImage'];
	$method = 'GET';
    $data = array(
        'productID' =>$productID,
        'danhMucID' => $danhMucID,
        'tenSanPham' => $tenSanPham,
        'moTaSanPham' => $moTaSanPham,
        'giaSanPham' => $giaSanPham,
        'xuatXu' => $xuatXu,
        'soLuongKho' => $soLuongKho,
    );
    $queryString = http_build_query($data);
    $endpoint = 'product/findAll.php?'.$queryString;
    $kq1 = $apiCon->callAPI($endpoint,$method)["data"];

} else {
    $endpoint = 'product/getAll.php';
	$method = 'GET';
	$kq1 = $apiCon->callAPI($endpoint, $method)["data"];
  
}
if (isset($_POST['btnReSet'])) {
    $endpoint = 'product/getAll.php';
	$method = 'GET';
	$kq1 = $apiCon->callAPI($endpoint, $method)["data"];
}

if (isset($_POST['btnXuatexcel'])) {
    $objExcel = new PHPExcel();
    $objExcel->setActiveSheetIndex(0);
    $sheet = $objExcel->getActiveSheet()->setTitle('quanliProducts');
    $rowCount = 1;
    //Tạo tiêu đề cho cột trong excel
    $sheet->setCellValue('A' . $rowCount, 'productID');
    $sheet->setCellValue('B' . $rowCount, 'danhMucID');
    $sheet->setCellValue('C' . $rowCount, 'tenSanPham');
    $sheet->setCellValue('D' . $rowCount, 'moTaSanPham');
    $sheet->setCellValue('E' . $rowCount, 'giaSanPham');
    $sheet->setCellValue('F' . $rowCount, 'xuatXu');
    $sheet->setCellValue('G' . $rowCount, 'soLuongKho');
    $sheet->setCellValue('H' . $rowCount, 'pathImage');

    // //định dạng cột tiêu đề
    $sheet->getColumnDimension('A')->setAutoSize(true);
    $sheet->getColumnDimension('B')->setAutoSize(true);
    $sheet->getColumnDimension('C')->setAutoSize(true);
    $sheet->getColumnDimension('D')->setAutoSize(true);
    $sheet->getColumnDimension('E')->setAutoSize(true);
    $sheet->getColumnDimension('F')->setAutoSize(true);
    $sheet->getColumnDimension('G')->setAutoSize(true);
    $sheet->getColumnDimension('H')->setAutoSize(true);
    // //gán màu nền
    $sheet->getStyle('A1:H1')->getFill()->setFillType(\PHPExcel_Style_Fill::FILL_SOLID)->getStartColor()->setRGB('00FF00');
    //căn giữa
    $sheet->getStyle('A1:H1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

    // //Điền dữ liệu vào các dòng. Dữ liệu lấy từ DB
    $sql = "SELECT * FROM tblproducts";
    $kq = mysqli_query($con, $sql);

    while ($row = mysqli_fetch_array($kq)) {
        $rowCount++;
        $sheet->setCellValue('A' . $rowCount, $row['productID']);
        $sheet->setCellValue('B' . $rowCount, $row['danhMucID']);
        $sheet->setCellValue('C' . $rowCount, $row['tenSanPham']);
        $sheet->setCellValue('D' . $rowCount, $row['moTaSanPham']);
        $sheet->setCellValue('E' . $rowCount, $row['giaSanPham']);
        $sheet->setCellValue('F' . $rowCount, $row['xuatXu']);
        $sheet->setCellValue('G' . $rowCount, $row['soLuongKho']);
        $sheet->setCellValue('H' . $rowCount, $row['pathImage']);
    }
    // //Kẻ bảng 
    $styleAray = array(
        'borders' => array(
            'allborders' => array(
                'style' => PHPExcel_Style_Border::BORDER_THIN
            )
        )
    );
    $sheet->getStyle('A1:' . 'H1' . ($rowCount))->applyFromArray($styleAray);
    $objWriter = new PHPExcel_Writer_Excel2007($objExcel);
    $fileName = 'ExportExcel.xlsx';
    // $objWriter->save($fileName);
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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>QUẢN LÝ SẢN PHẨM</title>
    <style type="text/css">
        .header {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 130px;
            background: pink;
            z-index: 10;
        }

        #logo_Shop {
            width: 200px;
            height: 190px
        }

        .logo_contenner {
            display: flex;
            font-family: monospace;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            top: 50px;
            position: fixed;
            transform: translateY(-50%);
            left: 15px;

        }

        .col1 {
            width: 40%;
            color: hotpink;
            padding-left: 150px;
            padding-top: 15px;
        }

        .dd1 {
            width: 100%;
            height: 25px;
            padding-left: 50px;
        }

        tr {
            height: 35px;
        }

        button {
            display: inline-block;
            font-weight: 400;
            background: pink;
            color: white;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            border-color: pink;
            margin-left: 650px;
        }

        .tt {
            display: inline-block;
            background: pink;
            color: white;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            border-color: pink;

        }

        .them {
            position: fixed;
            bottom: 20px;
            left: 10px;
            display: inline-block;
            background: pink;
            color: white;
            font-size: 1rem;
            line-height: 1.5;
            border-radius: 0.25rem;
            border-color: pink;

        }

        .content2 {
            height: 370px;
            padding-top: 150px;
        }

        h1 {
            font-family: Impact;
            font-weight: bold;
            color: white;
            font-style: italic;

        }

        h2 {
            font-family: Impact;
            font-weight: bold;
            color: pink;
            font-style: italic;
            padding-left: 550px;

        }

        .table .thead-dark th {
            width: 150px;
            color: white;
            background-color: pink;
            border-color: pink;

        }

        .table {
            border-color: pink;
            border: 0ch;
        }

        .btn {
            background: pink;
            display: inline-block;
            font-weight: 400;
            color: white;
            border-color: pink;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            transition: color .15s;
            margin-left: 100px;
        }

        .btn1 {
            background: pink;
            display: inline-block;
            font-weight: 400;
            color: white;
            border-color: pink;
            padding: 0.375rem 0.75rem;
            font-size: 1rem;
            line-height: 1.5;
            transition: color .15s;
            margin-left: 400px;

        }

        .table td,
        .table th {
            padding: .75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
            border-color: pink;
        }
    </style>
</head>

<body>

    <div class="menu2">
        <form method="post">
            <div class="header">
                <nav>
                    <div class="logo_contenner">
                        <img id="logo_Shop" src="http://localhost/BTL_WEB/public/img/LOGO.png">
                        <h1>QUẢN LÝ SẢN PHẨM</h1>
                    </div>
                </nav>
            </div>

            <div class="content2">
                <div class="btnTroVe">
                    <button style=" margin-left: 0;"> <a href="http://localhost/BTL_WEB">Trở về</a></button>
                </div>
                <table>
                    <h2>Danh Sách Sản Phẩm</h2>

                    <tr>
                        <td class="col1">Danh Mục</td>
                        <td>
                            <input class="dd1" type="text" name="txtdanhMucID" id="">
                        </td>
                        <td class="col1">Tên Sản Phẩm</td>
                        <td>
                            <input class="dd1" type="text" name="txttenSanPham" id="">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Mô Tả</td>
                        <td>
                            <input class="dd1" type="text" name="txtmoTaSanPham" id="">
                        </td>
                        <td class="col1">Gía Sản Phẩm</td>
                        <td>
                            <input class="dd1" type="text" name="txtgiaSanPham" id="">
                        </td>
                    </tr>
                    <tr>
                        <td class="col1">Xuất xứ</td>
                        <td>
                            <input class="dd1" type="text" name="txtxuatXu" id="">
                        </td>
                        <td class="col1">Số Lượng</td>
                        <td>
                            <input class="dd1" type="text" name="txtsoLuongKho" id="">
                        </td>
                        <td class="col1">Anh</td>
                        <td>
                            <input class="css" type="file" name="txtpathImage" id="">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button type="submit" name="btnTimkiem" class="btn1">Tìm Kiếm</button>&nbsp;&nbsp;
                        </td>
                        <td>
                            <button type="submit" name="btnXuatexcel" class="btn">Xuất Excel</button>&nbsp;&nbsp;
                        </td>
                        <td>
                            <button type="submit" name="btnReSet" class="btn">Reset</button>
                        </td>
                    </tr>
                </table>
                <table class="table">
                    <thead class="thead-dark" style="text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Mã Sản phẩm</th>
                            <th>Danh Mục</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Mô tả</th>
                            <th>Gía Sản phẩm</th>
                            <th>Xuất xứ</th>
                            <th>Số Lượng</th>
                            <th>Anh</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
                        </tr>
                    </thead>
                    <?php

                    $i = 1;
                    foreach ($kq1 as $row ) {
                        if ($i % 2 == 0)
                            echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row['productID'] . '</td>
                        <td>' . $row['tenDanhMuc'] . '</td>
                        <td>' . $row['tenSanPham'] . '</td>
                        <td>' . $row['moTaSanPham'] . '</td>
                        <td>' . $row['giaSanPham'] . '</td>
                        <td>' . $row['xuatXu'] . '</td>
                        <td>' . $row['soLuongKho'] . '</td>
                        <td>
                        <img  style = "width: 100px; "src ="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlySanPham/upload/' . $row['pathImage'] . '">
                        </td>
                        <td><input type="button" class ="tt" name="btnSua" value="Sửa" onclick=\'window.open("Suasp.php?productID=' . $row['productID'] . '","_seft")\' ></td>
                        <td><input type="button" class = "tt" name="btnXoa" value="Xóa" onclick=\'window.open("Xoasp.php?productID=' . $row['productID'] . '","_seft")\'></td>
                        

                        </tr>';
                        else {
                            echo '<tr>
                        <td>' . $i . '</td>
                        <td>' . $row['productID'] . '</td>
                        <td>' . $row['tenDanhMuc'] . '</td>
                        <td>' . $row['tenSanPham'] . '</d>t
                        <td>' . $row['moTaSanPham'] . '</td>
                        <td>' . $row['giaSanPham'] . '</td>
                        <td>' . $row['xuatXu'] . '</td>
                        <td>' . $row['soLuongKho'] . '</td>
                        <td>
                        <img  style = "width: 110px;" src ="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlySanPham/upload/' . $row['pathImage'] . '">
                        </td>
                        <td><input type="button" class = "tt" name="btnSua" value="Sửa" onclick=\'window.open("Suasp.php? productID=' . $row['productID'] . '","_seft")\' ></td>
                        <td><input type="button" class =" tt" name="btnXoa" value="Xóa" onclick=\'window.open("Xoasp.php?productID=' . $row['productID'] . '","_seft")\'></td>
                        
                        </tr>';
                        }
                        $i++;
                    }

                    ?>
                    <?php
                    echo '<tr>
                            <td><input type="button" class = "them" name="btnThem" value="Thêm" onclick=\'window.open("SanPham.php","_seft")\'>
                            </td>
                            </tr>
                        '

                    ?>

                </table>
            </div>
        </form>
    </div>
</body>