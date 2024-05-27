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
    <title>Giỏ hàng</title>
</head>

<body>
    <?php
    ob_start();
    include_once './include/function.php';
    require './include/connect.php';
    include_once './include/layout/headerPage.php';
    $shoppingCarts = ShoppingCart::getAllShoppingCarts($pdo,$_SESSION['IDUser']);
    $total = getTotalMoney($_SESSION['IDUser']);

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $quantity = $_POST['Quantity'];
        $id = $_POST['ID'];
        $price = Product::getPriceProduct($pdo,$_POST['ProductID']) * $quantity;
        global $pdo;
        $sqlQuery = "Update shoppingcart set Quantity = $quantity,TotalMoney = $price where ID = $id";
        $pdo->exec($sqlQuery);
        header('Location: ./shoppingcart.php');
    }
    ob_end_flush();
?>
    <div class="main p-3 text-center" style="border: 1px solid #cdcdcd">
        <h4 class="text-start bg-secondary p-3 text-white">Giỏ hàng</h4>
        <?php
            if($shoppingCarts != NULL)
            {
                ?>
        <div class="row mt-3">
            <h5 class="col-md-4">Sản phẩm</h5>
            <h5 class="col-md-3">Giá</h5>
            <h5 class="col-md-2">Số lượng</h5>
            <h5 class="col-md-3">Tổng</h5>
            <?php
                foreach($shoppingCarts as $cart):
            ?>
            <hr>
            <div class="row col-md-4">
                <div class="col-md-6">
                    <div class="col-md-6">
                        <button class="btn btn-danger">
                            <a class="text-white text-decoration-none"
                                href="./handle/handleRemoveShoppingCart.php?id=<?=$cart['ID'] ?>">X</a>
                        </button>
                    </div>
                </div>
                <div class="col-md-6">
                    <img class="w-75" src="<?= $cart['Image'] ?>" alt="">
                </div>
                <div class="col-md-12 text-center p-3">
                    <h6>
                        <a class="text-decoration-none"
                            href="./detail.php?id=<?=$cart['ProductID']?>"><?= $cart['ProductName']  ?></a>
                    </h6>
                </div>
            </div>
            <div class="col-md-3">
                <p class="text-danger"><?= $cart['Price'] ?></p>
            </div>
            <div class="col-md-2">
                <div class="d-flex m-auto">
                    <form method="post" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $cart['ID'] ?>" name="ID" />
                        <input type="hidden" value="<?= $cart['ProductID'] ?>" name="ProductID" />
                        <input type="number" style="border-radius: 5px" class="quantity text-center w-50 mx-2 mr-2"
                            min="1" name="Quantity" value="<?= $cart['Quantity'] ?>" />
                        <button class="btn btn-success update" type="submit"></button>
                    </form>
                </div>
            </div>
            <div class="col-md-3">
                <h6 class="text-danger"><?= number_format($cart['TotalMoney'],0,",",".").'đ' ?></h6>
            </div>
            <?php
                    endforeach;
                ?>
            <h5 class="text-start m-4 text-danger"><?= number_format($total,0,",",".").'đ' ?></h5>
            <form method="POST" action="./handle/handleBuyProduct.php">
                <input type="hidden" name="money" value="<?= $total ?>">
                <button class="w-25 m-auto btn btn-danger" type="submit" name="payUrl">Thanh toán Momo</button>
                <button class="w-25 m-auto btn btn-primary" type="submit" name="redirect">Thanh toán VNPay</button>
            </form>
        </div>
        <?php
            }else{
                ?>
        <h6>Hiện tại không có sản phẩm nào ở giỏ hàng!!</h6>
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