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
    <title>Document</title>
</head>

<body>

    <?php 
    include_once './include/function.php';

    require './include/connect.php';    
    include_once './include/layout/headerPage.php';
    include_once './include/layout/describe.php';
?>
    <div class="row m-5">
        <h4 style="text-shadow: 5px 5px 3px #cdcdcd">Top sản phẩm bán chạy nhất 2024</h4>
        <hr class="mt-2">
        <?php
    $products = Product::getFourBestProducts($pdo);
    foreach ($products as $product):
?>
        <div class="col-md-3 m-3" style="width: 323px; height: 432px">
            <div class="card card-product me-2">
                <img src="<?= $product['Image'] ?>" class="card-img-top pt-2 m-auto"
                    style="width: 200px; height: 250px">
                <div class="card-body">
                    <a href="./detail.php?id=<?= $product['ID'] ?>" class="text-decoration-none">
                        <h6 class="card-title">
                            <?= strlen($product['ProductName']) < 60 ? $product['ProductName'] : substr($product['ProductName'],0,60).' . . . . . '  ?>
                        </h6>
                    </a>
                    <p class="card-text text-danger fw-bold"><?= number_format($product['Price'],0,",",".").'đ' ?></p>
                    <?php
                                if(isset($_SESSION['IDUser']))
                                {
                                    ?>
                    <a href="./handle/handleAddShopingCart.php?id=<?= $product['ID'] ?>"
                        class="btn btn-warning text-white w-100 h-25">CHỌN MUA</a>
                    <?php
                                }else{
                                    ?>
                    <a href="./auth/login.php" class="btn btn-warning text-white w-100 h-25">CHỌN MUA</a>
                    <?php
                                }
                            ?>
                    <?php
                                if(isset($_SESSION['IDUser']))
                                {
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page"
                        href="./handle/handleAddFavourite.php?idpro=<?=$product['ID']?>"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }else{
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page" href="./auth/login.php"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }
                            ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
?>
    </div>

    <div class="row m-5">
        <h4 style="text-shadow: 5px 5px 3px #cdcdcd">Truyện</h4>
        <hr class="mt-2">
        <?php
    $stories = Product::getFourProductsOfStory($pdo);
    foreach ($stories as $product):
?>
        <div class="col-md-3 m-3" style="width: 323px; height: 432px">
            <div class="card card-product me-2">
                <img src="<?= $product['Image'] ?>" class="card-img-top pt-2 m-auto"
                    style="width: 200px; height: 250px">
                <div class="card-body">
                    <a href="./detail.php?id=<?= $product['ID'] ?>" class="text-decoration-none">
                        <h6 class="card-title">
                            <?= strlen($product['ProductName']) < 60 ? $product['ProductName'] : substr($product['ProductName'],0,60).' . . . . . '  ?>
                        </h6>
                    </a>
                    <p class="card-text text-danger fw-bold"><?= number_format($product['Price'],0,",",".").'đ' ?></p>
                    <a href="/PurcharseVoucher/Create/@item.ProductID"
                        class="btn btn-warning text-white w-100 h-25">CHỌN MUA</a>
                    <?php
                                if(isset($_SESSION['IDUser']))
                                {
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page"
                        href="./handle/handleAddFavourite.php?idpro=<?=$product['ID']?>"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }else{
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page" href="./auth/login.php"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }
                            ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
?>
    </div>

    <div class="row m-5">
        <h4 style="text-shadow: 5px 5px 3px #cdcdcd">Sách giáo khoa</h4>
        <hr class="mt-2">
        <?php
    $SGKs = Product::getFourProductsOfSGKs($pdo);
    foreach ($SGKs as $product):
?>
        <div class="col-md-3 m-3" style="width: 323px; height: 432px">
            <div class="card card-product me-2">
                <img src="<?= $product['Image'] ?>" class="card-img-top pt-2 m-auto"
                    style="width: 200px; height: 250px">
                <div class="card-body">
                    <a href="./detail.php?id=<?= $product['ID'] ?>" class="text-decoration-none">
                        <h6 class="card-title">
                            <?= strlen($product['ProductName']) < 60 ? $product['ProductName'] : substr($product['ProductName'],0,60).' . . . . . '  ?>
                        </h6>
                    </a>
                    <p class="card-text text-danger fw-bold"><?= number_format($product['Price'],0,",",".").'đ' ?></p>
                    <a href="/PurcharseVoucher/Create/@item.ProductID"
                        class="btn btn-warning text-white w-100 h-25">CHỌN MUA</a>
                    <?php
                                if(isset($_SESSION['IDUser']))
                                {
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page"
                        href="./handle/handleAddFavourite.php?idpro=<?=$product['ID']?>"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }else{
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page" href="./auth/login.php"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }
                            ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
?>
    </div>

    <div class="row m-5">
        <h4 style="text-shadow: 5px 5px 3px #cdcdcd">Sách mềm</h4>
        <hr class="mt-2">
        <?php
    $mems = Product::getFourProductsOfMems($pdo);
    foreach ($mems as $product):
?>
        <div class="col-md-3 m-3" style="width: 323px; height: 432px">
            <div class="card card-product me-2">
                <img src="<?= $product['Image'] ?>" class="card-img-top pt-2 m-auto"
                    style="width: 200px; height: 250px">
                <div class="card-body">
                    <a href="./detail.php?id=<?= $product['ID'] ?>" class="text-decoration-none">
                        <h6 class="card-title">
                            <?= strlen($product['ProductName']) < 60 ? $product['ProductName'] : substr($product['ProductName'],0,60).' . . . . . '  ?>
                        </h6>
                    </a>
                    <p class="card-text text-danger fw-bold"><?= number_format($product['Price'],0,",",".").'đ' ?></p>
                    <a href="/PurcharseVoucher/Create/@item.ProductID"
                        class="btn btn-warning text-white w-100 h-25">CHỌN MUA</a>
                    <?php
                                if(isset($_SESSION['IDUser']))
                                {
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page"
                        href="./handle/handleAddFavourite.php?idpro=<?=$product['ID']?>"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }else{
                                    ?>
                    <a class="btn btn-outline-danger mt-2" aria-current="page" href="./auth/login.php"><i
                            class="fa-solid fa-heart"></i></i></a>
                    <?php
                                }
                            ?>
                </div>
            </div>
        </div>
        <?php
    endforeach;
?>
    </div>

    <?php
    include_once './include/layout/about.php';
    include_once './include/layout/footer.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>