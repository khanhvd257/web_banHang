<?php
$dataBlog = $data['dataBlog'];
$dataAnh = $dataBlog['hinhAnh'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi tiết Blog</title>
</head>
<style>
    .wrap_content {
        flex-wrap: nowrap;
        flex-direction: row;
    }

    .containerBlog {

        margin: 20px 0;
        margin-left: 40px;
    }

    .blogAnh {
        transform: translateX(30px);
        max-width: 90%;
        max-height: 500px;
    }

    .baivietKhac {
        margin-top: 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .card_item {
        margin: 20px 0;
        transition: all 200ms;
    }

    .card_item:hover {
        transition: all 0.4s;
        transform: scale(1.04);

    }

    .tgia_thoiGian {
        text-align: right;
        font-size: 14px;
        font-family: cursive;
    }

    .title_blog {
        font-family: system-ui;
        text-align: center;
    }

    .noiDug_blog {
        font-family: serif;
        text-align: justify;
        font-size: 20px;
    }

    .tg {
        font-style: italic;
        font-weight: 600;
    }

    .css_img {
        min-width: 286px;
        min-height: 260px;
        max-width: 286px;
        max-height: 260px;
    }

    .css_img1 {

        box-shadow: rgb(149 157 165 / 20%) 0px 8px 24px;
        border-radius: 12px;
    }

    .hinhAnh {
        text-align: center;
        margin-bottom: 30px;
        margin-left: -30px;
    }
</style>

<body>
    <div class="wrap_content row">
        <div class="containerBlog col-8">
            <div class="title_blog">
                <h2><?php echo $dataBlog['tenBlog'] ?></h2>
            </div>
            <div class="hinhAnh">
                <?php if ($dataBlog['hinhAnh'] = null) : ?>
                    <img class="blogAnh css_img1" src="http://localhost/btl_web/public/img/blog/defaultBlog.jpeg" alt="Card image cap">
                <?php else : ?>
                    <img class="blogAnh css_img1" src="http://localhost/btl_web/MVC/Views/pages/admin/quanlyBlog/upload/<?php echo $dataAnh ?>" alt="Anh">
                <?php endif ?>
            </div>
            <div class="tgia_thoiGian">
                <label class="tg">
                    Ngày đăng: <?php echo $dataBlog['thoiGian'] ?>
                </label>
            </div>
            <div class="noiDug_blog">
                <?php echo $dataBlog['noiDung'] ?>
            </div>
            <label class="tg" style=" float: right;">
                Tác giả: <?php echo $dataBlog['fullName'] ?>
            </label>


        </div>
        <div class="baivietKhac col-4">

            <h3>BÀI VIẾT KHÁC</h3>
            <?php foreach (($data['AllBlog']) as $blog) : ?>
                <div class="card card_item" style="width: 18rem;">
                    <a href="http://localhost/btl_web/blog/detailBlog/<?php echo $blog['idBlog'] ?>">
                        <?php if ($blog['hinhAnh'] == null) : ?>
                            <img class="card-img-top css_img" src="http://localhost/btl_web/public/img/blog/defaultBlog.jpeg" alt="Card image cap">
                        <?php endif ?>
                        <img class="card-img-top css_img" src="http://localhost/btl_web/MVC/Views/pages/admin/quanlyBlog/upload/<?php echo $blog['hinhAnh'] ?>" alt="Hinh anh Blog">
                        <div class="card-body">
                            <h5 class="card-text"><?php echo $blog['tenBlog'] ?></h5>
                            <p class="card-text">Tác giả: <?php echo $blog['fullName']  ?></p>
                        </div>
                    </a>
                </div>
            <?php endforeach ?>
            <a href="http://localhost/btl_web/blog">Xem tất cả bài Viết...</a>
            <br>
        </div>
    </div>
</body>

</html>
