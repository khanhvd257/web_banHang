<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .card__item {
        margin: 20px 40px;
        transition: all 200ms;
    }

    .card__item:hover {
        transition: all 0.4s;
        transform: scale(1.04);

    }

    .cssbtn {
        position: fixed;
        right: 0;
        margin: 15px;
    }

    .css_img {
        min-width: 286px;
        min-height: 260px;
        max-width: 286px;
        max-height: 260px;
    }
</style>

<body>

    <div class="ThemBlog">
        <a href="http://localhost/btl_web/MVC/Views/pages/admin/quanlyBlog/themMoiBlog.php?userID=<?php echo $_SESSION['user']['userID'] ?>">
            <button class="btn btn-primary cssbtn">Viết Blog +</button>
        </a>
    </div>

    <div class="container" style="margin-top: 20px;
    display: flex;
    justify-content: flex-start;
    flex-wrap: wrap;">
        <?php foreach ( ($data['dataBlog']) as $blog) : ?>
            <div class="card card__item" style="width: 18rem;">
                <?php if ($blog['hinhAnh'] == null) : ?>
                    <img class="card-img-top css_img" src="http://localhost/btl_web/public/img/blog/defaultBlog.jpeg" alt="Card image cap">
                <?php endif ?>
                <img class="card-img-top css_img" src="http://localhost/btl_web/MVC/Views/pages/admin/quanlyBlog/upload/<?php echo $blog['hinhAnh'] ?>" alt="hinh anh Blog">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $blog['tenBlog'] ?></h5>
                    <p style="margin-bottom: 0;" class="card-text">Thời gian: <?php echo $blog['thoiGian']  ?></p>
                    <p class="card-text">Tác giả: <?php echo $blog['fullName']  ?></p>
                    <a href="http://localhost/btl_web/blog/detailBlog/<?php echo $blog['idBlog'] ?>" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>

        <?php endforeach; ?>

    </div>


</body>

</html>
