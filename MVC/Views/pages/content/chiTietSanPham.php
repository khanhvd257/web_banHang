<?php
$sanpham = mysqli_fetch_assoc($data['data']);
?>

<!DOCTYPE html>
<html lang="en">
<style>
    .wrap_item {
        display: flex;
        justify-content: center;

    }

    .img_item {
        max-width: 360px;
        max-height: 720px;
    }

    .wrap_detail {
        margin-top: 6%;
        display: flex;
        justify-content: flex-start;
        flex-direction: column;
        align-content: space-between;
        align-items: flex-start;
        margin-left: 4%;
    }

    .datHang {
        display: flex;
        align-content: space-between;
    }

    .title {
        color: red;
        font-size: 35px;
        font-family: emoji;
        font-weight: 900;

    }

    .mota {
        max-width: 420px;
    }

    .moTaSP {
        margin-top: 6%;
    }

    .giaTien {
        margin-top: 6%;
        font-size: 22px;
        font-family: monospace;
        color: darkslateblue;
        font-weight: bold;
        font-style: initial;
        text-align: right;
    }

    .btnMua {
        color: chocolate;
        position: relative;
        overflow: visible;
        outline: 0;
        background: #eeeaea;
        border: none;
        padding: 5px;
        border-radius: 8px;
        cursor: pointer;
    }

    .btnMua:hover {
        transition: all 0.4s;
        background: linear-gradient(#ee4d2d, #ff7337);
        color: white;

    }

    .lablecss {
        font-size: 14px;
        font-weight: 600;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <div class="wrap_item">
        <div class="wrap_img">
            <img class="img_item" src="http://localhost/BTL_WEB/public/img/Login.gif" alt="">
        </div>
        <div class="wrap_detail">
            <div class="title">
                <?php echo $sanpham['tenSanPham'] ?>
            </div>
            <div class="giaTien">
                <span class="badge badge-success"><?php echo 'GIÁ:' . $sanpham['giaSanPham'] ?></span>
            </div>
            <div class="moTaSP"><label class="lablecss" for="">Mô tả sản phầm: </label>

                <?php echo $sanpham['moTaSanPham'] ?>
                <br>

                <label for="" class="lablecss">Xuất xứ: &nbsp;</label><?php echo $sanpham['xuatXu'] ?>
            </div>

            <div class="soLuong">
                <label for="" class="lablecss">Số lượng kho: </label> <?php echo $sanpham['soLuongKho'] ?>
            </div>
            <div class="slDat">
                <label for="" class="lablecss">Số Lượng mua&nbsp; &nbsp;</label>
                <input type="number" name="" id="" style="">
            </div>
            <div class="btnDat">
                <button class="btnMua">Đặt hàng</button> &nbsp; <button class="btnMua">Thêm vào giỏ </button>
            </div>
        </div>
    </div>
</body>

</html>