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
    $maxPrice = getMaxPiceProduct();
    $page = 1;
    // Số lượng sản phẩm trên mỗi trang
    $productsPerPage = 6;

    // Trang hiện tại
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    // Bỏ qua số lượng sản phẩm cho các trang trước
    $offset = ($page - 1) * $productsPerPage;

    // Tính tổng số trang
    $stmt = $pdo->query("SELECT COUNT(*) FROM product");
    $totalProducts = $stmt->fetchColumn();
    $totalPages = ceil($totalProducts / $productsPerPage);

    // Lấy sản phẩm cho trang hiện tại
    $stmt = $pdo->prepare("SELECT * FROM product LIMIT :limit OFFSET :offset");
    $stmt->bindValue(':limit', $productsPerPage, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    if(!empty($_GET['search']))
    {
        $products = Product::searchProductByName($pdo,$_GET['search']);
    }
    if(!empty($_GET['categoryID']))
    {
            $products = Product::getAllProducts($pdo);
    }
    if(!empty($_GET['categoryID'])){
        $id = $_GET['categoryID'];
        $products = Product::getProductFromCategory($pdo,$id);
    }
?>

    <div class="p-2 row main" style="border: 1px solid #cdcdcd">
        <div class="col-md-3 mt-3">
            <nav class="nav bg-success flex-column">
                <?php
                $categories = Category::getAllCategories($pdo);
                foreach($categories as $category):
                ?>
                <a class="text-white nav-link"
                    href="http://localhost/NhaSachPN/product.php?categoryID=<?=$category['ID'] ?>"><?= $category['CategoryName'] ?></a>
                <?php
                endforeach;
            ?>
                <div class="btn-group dropend">
                    <button type="button" class="btn text-start text-white dropdown-toggle" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Tác Giả
                    </button>
                    <ul class="dropdown-menu bg-success">
                        <?php
                        $authors = Author::getAllAuthors($pdo);
                        foreach($authors as $author):
                    ?>
                        <li><a class="dropdown-item" href=""><?= $author['AuthorName'] ?></a></li>
                        <?php
                        endforeach;
                    ?>
                    </ul>
                </div>
            </nav>
        </div>

        <div class="col-md-9">
            <div class="mt-3">
                <h3 class="mb-3" style="text-shadow: 5px 5px 3px #cdcdcd">Sản Phẩm</h3>
                <div class="dropdown">
                    <button class="btn btn-info dropdown-toggle" type="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Sắp xếp
                    </button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="">Giá tăng dần</a></li>
                        <li><a class="dropdown-item" href="">Giá giảm dần</a></li>
                        <li><a class="dropdown-item" href="">Tên tăng dần</a></li>
                        <li><a class="dropdown-item" href="">Tên giảm dần</a></li>
                    </ul>
                </div>
                <hr>
                <div class="row">
                    <?php
                    
                foreach ($products as $product):
            ?>
                    <div class="col-md-4 mt-2 mb-2">
                        <div class="card card-product me-2">
                            <img src="<?= $product['Image'] ?>" class="card-img-top pt-2 m-auto"
                                style="width: 200px; height: 250px">
                            <div class="card-body">
                                <a href="./detail.php?id=<?= $product['ID'] ?>" class="text-decoration-none">
                                    <h6 class="card-title">
                                        <?= strlen($product['ProductName']) < 60 ? $product['ProductName'] : substr($product['ProductName'],0,60).' . . . . . '  ?>
                                    </h6>
                                </a>
                                <p class="card-text text-danger fw-bold">
                                    <?= number_format($product['Price'],0,",",".").'đ' ?></p>
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
            </div>
        </div>
        <div>
            <nav aria-label="Page navigation example">
                <ul class="pagination justify-content-center">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                    <li class="page-item"><a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a></li>
                    <?php endfor; ?>
                </ul>
            </nav>
        </div>
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