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
    <title>product</title>
</head>

<body>

    <?php
    include_once './include/function.php';
    require './include/connect.php';
    include_once './include/layout/headerPage.php';
    $product = Product::getProductFromID($pdo,$_GET['id']);
    $evaluates = Evaluate::getAllEvaluateHaveComment($pdo, $product['ID']);
?>

    <div class="p-3 main" style="border: 1px solid #cdcdcd">
        <div class="row">
            <div class="col-md-5">
                <img class="p-2" style="border: solid 1px #cdcdcd" src="<?= $product['Image'] ?>" alt="">
            </div>
            <div class="col-md-7 p-3">
                <h3 class="p-3 bg-secondary text-white"><?= $product['ProductName']?></h3>
                <hr>
                <div class="row">
                    <p class="col-md-8">Nhà phát hành: </p>
                    <h6 class="col-md-4"><?= getNXBName($product['NXBID'])?></h6>
                    <p class="col-md-8">Tác giả: </p>
                    <h6 class="col-md-4"><?= getAuthorName($product['AuthorID']) ?></h6>
                </div>
                <hr>
                <p class="text-warning">Viết đánh giá của bạn</p>
                <hr>
                <h3 class="text-danger fw-bold"><?= number_format($product['Price'],0,",",".").'đ' ?></h3>
                <div class="row">
                    <p class="col-md-3">Nhà bán hành: </p>
                    <h6 class="col-md-9">Phương Nam</h6>
                    <p class="col-md-3">Số lượng còn lại: </p>
                    <h6 class="col-md-9 text-success"><?= $product['Quantity'] ?></h6>
                    <div class="m-2 p-3 row" style="background-color:#cdcdcd">
                        <div class="col-md-8">
                            <?php
                                if(isset($_SESSION['IDUser']))
                                {
                                    ?>
                            <a class="btn btn-outline-danger" aria-current="page"
                                href="./handle/handleAddFavourite.php?idpro=<?=$product['ID']?>"><i
                                    class="fa-solid fa-heart"></i></i></a>
                            <?php
                                }else{
                                    ?>
                            <a class="btn btn-outline-danger" aria-current="page" href="./auth/login.php"><i
                                    class="fa-solid fa-heart"></i></i></a>
                            <?php
                                }
                            ?>
                        </div>
                        <div class="col-md-4">
                            <button class="btn btn-success d-flex">
                                <?php
                                if(isset($_SESSION['IDUser']))
                                {
                                    ?>
                                <a class="nav-link active" aria-current="page"
                                    href="./handle/handleAddShopingCart.php?id=<?= $product['ID'] ?>"><i
                                        class="fa-solid fa-cart-shopping"></i></i></a>
                                <span class="px-2">Chọn mua</span>
                                <?php
                                }else{
                                    ?>
                                <a class="nav-link active" aria-current="page" href="./auth/login.php"><i
                                        class="fa-solid fa-cart-shopping"></i></i></a>
                                <span class="px-2">Chọn mua</span>
                                <?php
                                }
                            ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="accordion mt-3" id="accordionPanelsStayOpenExample">
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                        Mô tả sản phẩm
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
                    <div class="accordion-body">
                        <p><?= $product['Description'] ?></p>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        Thông tin chi tiết
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Tên sản phẩm: <strong><?= $product['ProductName']?></strong>
                            </li>
                            <li class="list-group-item">Nhà phát hành:
                                <strong><?= getNXBName($product['NXBID'])?></strong>
                            </li>
                            <li class="list-group-item">Tác giả:
                                <strong><?= getAuthorName($product['AuthorID']) ?></strong>
                            </li>
                            <li class="list-group-item">Giá bán:
                                <strong><?= number_format($product['Price'],0,",",".").'đ' ?></strong>
                            </li>
                            <li class="list-group-item">Số lượng còn lại: <strong><?= $product['Quantity'] ?></strong>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        Đánh giá của khách hàng
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        <?php
                        if(count($evaluates)>0)
                        {
                            ?>
                        <ul class="list-group list-group-flush">
                            <?php
                                foreach($evaluates as $evaluate):
                            ?>
                            <li class="list-group-item bg-secondary">
                                <img style="border: 2px solid #ffffff; border-radius:50px" class="m-2" width="40px"
                                    height="40px"
                                    src="https://scontent-hkg1-1.xx.fbcdn.net/v/t39.30808-1/395389873_1411713443025753_2234869436460159356_n.jpg?stp=dst-jpg_p320x320&_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGim_FFjbO3ecoFdTf7cWA3LVRAaZCIdD0tVEBpkIh0PdVeuNFXctuIh1fLuqkBRfYs-b-DjijEVdwuBNKKjIOF&_nc_ohc=K6w3oKu7dY4AX_NjwBM&_nc_ht=scontent-hkg1-1.xx&oh=00_AfD7iGjnpQ5i6TcEF3zKp6AdqKxpiTBz83SwclwwIjIdrA&oe=660E1669"
                                    alt="">
                                <span class="fw-bold"><?=$evaluate['Name']?></span>
                                <span
                                    class="mx-5"><?= str_repeat('<i class="fa-solid fa-star" style="color: yellow"></i>',$evaluate['Star'])?></span>
                                <p class="mx-5 lead text-white"><?=$evaluate['Comment'] ?></p>
                            </li>
                            <?php   
                                endforeach;
                            ?>
                        </ul>
                        <?php
                        }
                    else
                    {
                        ?>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item text-danger">Hiện chưa có đánh giá nào với sách</li>
                        </ul>
                        <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row m-5">
        <h4 style="text-shadow: 5px 5px 3px #cdcdcd">Có thể bạn sẽ thích</h4>
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
                    <a href="" class="text-decoration-none">
                        <h6 class="card-title">
                            <?= strlen($product['ProductName']) < 60 ? $product['ProductName'] : substr($product['ProductName'],0,60).' . . . . . '  ?>
                        </h6>
                    </a>
                    <p class="card-text text-danger fw-bold"><?= number_format($product['Price'],0,",",".").'đ' ?></p>
                    <a href="" class="btn btn-warning text-white w-100 h-25">CHỌN MUA</a>
                    <a class="btn btn-outline-danger mt-2" href="">
                        <i class=" fa-solid fa-heart"></i>
                    </a>
                </div>
            </div>
        </div>
        <?php
    endforeach;
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