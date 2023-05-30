<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .wrap_container {
            margin-left: 22px;
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
        }

        .container_item {
            box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
            margin: 20px 20px;
            display: flex;
            min-width: 220px;
            max-width: 220px;
            min-height: 340px;
            border-radius: 16px;
            max-height: 340px;
            flex-direction: column;
            align-items: center;
            background: linear-gradient(223deg, #ed93a0, #7f4782);
            color: #fff;
            overflow: hidden;
            transition: all 200ms;
        }

        .hetHang {
            text-shadow: 5px 3px 4px #202020;
            margin-top: 12px;
            text-align: center;
            white-space: nowrap;
            max-height: 20px;
            width: 100%;
            font-size: 18px;
            text-transform: capitalize;
            font-family: monospace;
            text-decoration: line-through;

        }

        .container_item:hover {

            transition: all 0.4s;
            transform: scale(1.04);

        }


        .imgItem {
            border-bottom: solid #fff;
            max-width: 220px;
            max-height: 200px;
            min-width: 220px;
            min-height: 200px;

        }

        .tenSpham_container {
            max-width: 200px;
            overflow: hidden;
            max-height: 220px;
            display: flex;
            flex-direction: column;
            align-items: flex-end;
            min-width: 90%;

        }

        .dislpay_row {
            display: flex;
            flex-direction: row;
            width: 100%;
            justify-content: space-between;
        }

        .imgItem_container {
            margin-top: 20px;
        }

        .btnMua {
            color: #4d2577;
            position: relative;
            overflow: visible;
            outline: 0;
            background: #fff;
            border: none;
            padding: 5px;
            border-radius: 8px;
            cursor: pointer;
            max-width: 80px;
            min-width: 80px;
            white-space: nowrap;
            transition: all 0.3s;
        }

        .btnMua:hover {
            transition: all 0.3s;
            background: #ee8d9af2;
            color: white;

        }

        .container_item:hover {
            cursor: pointer;
        }

        .tenSP {
            text-shadow: 5px 3px 4px #202020;
            margin-top: 12px;
            text-align: center;
            width: 100%;
            font-size: 18px;
            white-space: nowrap;
            max-height: 20px;
            text-transform: capitalize;
            font-family: monospace;
        }

        .giaSP {
            font-size: 14px;
            text-align: center;
            min-width: 150PX;
            margin: 8px 0px;
        }

        .giaSP::after {
            content: " VND";
        }

        .giaSP::before {
            content: "Giá: ";

        }

        .motaItem {
            min-width: 100%;
            display: flex;
            justify-content: space-evenly;
        }

        .button-hover-addcart {
            border: none;
            background: transparent;
            color: #2805057a;
            text-transform: uppercase;
            overflow: hidden;
            letter-spacing: 0.07rem;
            transition: all 0.2s ease-in-out;
            position: relative;
        }

        .button-hover-addcart span {
            transition: all 0.2s ease-in-out;
        }

        .button-hover-addcart .fa {
            position: absolute;
            font-size: 1.2rem;
            top: 50%;
            /* -webkit-transform: translateY(-50%);
            -ms-transform: translateY(-50%); */
            transform: translateY(-50%);
            color: #fff;
            right: -20px;
            transition: 0.4s right cubic-bezier(0.38, 0.6, 0.48, 1);
        }

        .button-hover-addcart:hover {
            border-color: #fff;
            background: transparent;
            transition: border-color 0.2s;
        }

        .button-hover-addcart:hover span {
            margin-right: 20px;
            color: #fff;
        }

        .button-hover-addcart:hover .fa {
            right: 0px;
        }

        .notFound {
            text-align: center;
            transform: translateY(168px);
            font-family: fantasy;
            font-weight: 900;
            letter-spacing: 8px;
            color: #8f5387;

        }
    </style>
</head>

<body>
    <?php if ($data['total'] > 0) : ?>
        <div class="locSP" style="margin: 10px 47px;">
            <form action="http://localhost/btl_web/product/SortDanhMuc/<?php echo $data['idDanhMuc'] ?>" method="post">
                <label class="mr-sm-2" for="locsanPham">Lọc sản Phẩm: </label>
                <select class="custom-select mr-sm-2" id="locsanPham" name="sortProduct">
                    <option value="ASC" selected>Giá Tiền...</option>
                    <option value="ASC">Giá Tiền Tăng</option>
                    <option value="DESC">Giá tiền Giảm</option>
                </select>
                <button type="submit" class="btn btn-primary">Lọc</button>
            </form>
        </div>
        <div class="wrap_container">

            <?php foreach ($data['data'] as $sanpham) : ?>
                <div class="container_item">
                    <?php if ($sanpham['pathImage'] == "") : ?>
                        <div class="imgItem_container">
                            <a href="http://localhost/btl_web/product/detail/<?php echo $sanpham['productID'] ?>">
                                <img class="imgItem" src="http://localhost/BTL_WEB/public/img/defautImg.gif" alt="gif"></a>
                        </div>
                    <?php endif ?>
                    <?php if ($sanpham['pathImage'] != "") : ?>
                        <div class="imgItem_container">
                            <a href="http://localhost/btl_web/product/detail/<?php echo $sanpham['productID'] ?>">
                                <img class="imgItem" src="http://localhost/BTL_WEB/MVC/Views/pages/admin/quanlySanPham/upload/<?php echo $sanpham['pathImage'] ?>" alt="gif"></a>
                        </div>
                    <?php endif ?>

                    <div class="tenSpham_container">
                        <?php if ($sanpham['soLuongKho'] == "0") : ?>
                            <div class="hetHang"><?php echo $sanpham['tenSanPham'] ?></div>
                        <?php endif ?>
                        <?php if ($sanpham['soLuongKho'] != '0') : ?>
                            <div class="tenSP"><?php echo $sanpham['tenSanPham'] ?></div>
                        <?php endif ?>
                        <div class="motaItem">
                            <span class="badge badge-warning giaSP "><?php echo $sanpham['giaSanPham'] ?></span>
                        </div>
                        <div class="motaItem">
                            <?php if ($sanpham['soLuongKho'] != '0') : ?>
                                <a href="http://localhost/btl_web/order/orderSingle/<?php echo $sanpham['productID'] ?>">
                                    <button class="button-hover-addcart button"><span>Mua ngay</span><i class="fa fa-shopping-cart"></i></button>
                                </a>
                            <?php endif ?>
                            <?php if ($sanpham['soLuongKho'] == '0') : ?>
                                <button type="button" class="btn btn-danger">Đã cháy hàng</button>
                            <?php endif ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
    <?php endif ?>
    <?php if (($data['total']) == 0) : ?>

        <H4 class="notFound">
            DANH MỤC HIỆN KHÔNG CÓ SẢN PHẨM NÀO

        </H4>
        <div class="img_notfound" style=" text-align-last: center; z-index: -10;">
            <img src="http://localhost/btl_web/public/img/search-not-found.gif" alt="" srcset="">
        </div>
    <?php endif ?>

</body>

</html>
