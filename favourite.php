<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="./template/css/style.css">
    <title>Yêu thích</title>
</head>

<body>
    <?php
    require './include/connect.php';
    include_once './include/function.php';
    include_once './include/layout/headerPage.php';
    $favourites = Favourite::getAllFavorites($pdo,$_SESSION['IDUser']);
    ?>
    <div class="main p-3 text-center" style="border: 1px solid #cdcdcd">
        <h4 class="text-start bg-secondary p-3 text-white">Yêu thích</h4>
        <?php 
        if(empty($favourites))
        {
            ?>
        <h6 class="text-center">Bạn chưa thích sản phẩm nào</h6>
        <?php
        }else{
            ?>
        <div class="row mt-3">
            <h5 class="col-md-6">Sản phẩm</h5>
            <h5 class="col-md-6">Giá</h5>
            <?php
                foreach ($favourites as $favourite):    
                    ?>
            <hr>
            <div class="row col-md-6">
                <div class="col-md-6">
                    <button class="btn btn-danger">
                        <a class="text-white text-decoration-none   "
                            href="./handle/handleRemoveFavourite.php?id=<?= $favourite['ID'] ?>">X</a>
                    </button>
                </div>
                <div class="col-md-6">
                    <img class="w-50" src="<?= $favourite['Image'] ?>" alt="">
                </div>
                <div class="col-md-12 text-center p-3">
                    <h6><?= $favourite['ProductName'] ?></h6>
                </div>
            </div>
            <div class="col-md-6">
                <p class="fw-bold text-danger"><?= number_format($favourite ['Price'],0,",",".").'đ' ?></p>
            </div>
            <?php
                endforeach;
            ?>
        </div>
        <?php
        }
    ?>
    </div>

    <?php
    include_once './include/layout/footer.php';
    ?>
    <script src="./template/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>