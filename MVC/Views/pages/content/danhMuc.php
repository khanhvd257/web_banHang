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
            background: linear-gradient(#ee8d9af2, #4d2577);
            color: #fff;
            overflow: hidden;
            transition: all 200ms;
        }

        .container_item:hover {

            transition: all 0.4s;
            transform: scale(1.04);

        }


        .imgItem {
            border: solid #fff;
            max-width: 220px;
            max-height: 200px;
            min-width: 220px;
            min-height: 200px;

        }

        .tenSpham_container {
            max-width: 200px;
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
        }

        .btnMua:hover {
            transition: all;
            background: #ee8d9af2;
            color: white;

        }

        .container_item:hover {
            cursor: pointer;
        }

        .tenSP {
            margin-top: 12px;
            text-align: center;
            width: 100%;
            font-size: 18px;
            text-transform: capitalize;
            font-family: monospace;
        }

        .giaSP {
            font-size: 14px;
            text-align: center;
            margin: 8px 0px;
        }

        .motaItem {
            min-width: 100%;
            display: flex;
            justify-content: space-evenly;
        }
    </style>
</head>

<body>
    <div class="wrap_container">
        <?php while ($sanpham = mysqli_fetch_assoc($data['data'])) : ?>
            <div class="container_item">
                <div class="imgItem_container">
                    <a href="http://localhost/btl_web/product/detail/<?php echo $sanpham['productID'] ?>"><img class="imgItem" src="http://localhost/BTL_WEB/public/img/LOGO.gif" alt="gif"></a>
                </div>
                <div class="tenSpham_container">
                    <div class="tenSP"><?php echo $sanpham['tenSanPham'] ?></div>
                    <div class="motaItem">
                        <span class="badge badge-warning giaSP "><?php echo "Giá: " . $sanpham['giaSanPham'] . '$' ?></span>
                    </div>
                    <div class="motaItem">
                        <button class="btnMua">Thêm giỏ</button>
                        <button class="btnMua">Mua hàng</button>
                    </div>
                </div>
            </div>
        <?php endwhile ?>

    </div>
</body>

</html>