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
        margin: 20px 0;
        transition: all 200ms;
    }

    .card__item:hover {
        transition: all 0.4s;
        transform: scale(1.04);

    }
</style>

<body>



    <div class="container" style="margin-top: 20px;
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;">
        <?php while ($blog = mysqli_fetch_assoc($data['dataBlog'])) : ?>
            <div class="card card__item" style="width: 18rem;">
                <?php if($blog['hinhAnh']==null):?>
                <img class="card-img-top" src="http://localhost/btl_web/public/img/blog/defaultBlog.jpeg" alt="Card image cap">
                <?php endif ?>
                <img class="card-img-top" src="http://localhost/btl_web/MVC/Views/pages/admin/quanlyBlog/upload/<?php echo $blog['hinhAnh']?>" alt="hinh anh Blog">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $blog['tenBlog'] ?></h5>
                    <p style="margin-bottom: 0;" class="card-text">Thời gian: <?php echo $blog['thoiGian']  ?></p>
                    <p class="card-text">Tác giả: <?php echo $blog['fullName']  ?></p>
                    <a href="http://localhost/btl_web/blog/detailBlog/<?php echo $blog['idBlog'] ?>" class="btn btn-primary">Xem chi tiết</a>
                </div>
            </div>

        <?php endwhile ?>

    </div>


</body>

</html>