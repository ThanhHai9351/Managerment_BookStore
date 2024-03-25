<nav class="navbar navbar-expand-lg" style="border: 1px solid #cdcdcd">
    <div class="container-fluid">
        <a class="navbar-brand" href="http://localhost/NhaSachPN/index.php">
            <img class="mx-3" src="https://nhasachphuongnam.com/images/logos/269/logo_ns-01-01.jpg" width="350px"
                height="80px" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-danger" aria-current="page" href="#">Hotline: 1900 6656<br><span
                            class="text-black">(Giờ Hành chính)</span></a>
                </li>

            </ul>
            <form action="/Product/Index" method="get" class="d-flex">
                <div class="input-group">
                    <input class="form-control bg-outline-success me-2" type="search" name="search" placeholder="Search"
                        aria-label="Search">
                    <button class="btn btn-success" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </div>
            </form>
            <ul class="navbar-nav mb-2 mb-lg-0">
                <?php
                    session_start();
                   if(empty($_SESSION['Name']))
                   {
                    ?>
                <a class="nav-link active" aria-current="page" href="./auth/login.php"><i
                        class="fa-solid fa-heart"></i></a>
                <?php
                   }else{
                    ?>
                <a class="nav-link active" aria-current="page" href="./favourite.php"><i
                        class="fa-solid fa-heart"></i></a>
                <?php
                   }
                   ?>
                <li class="nav-item">
                    <?php
                   if(empty($_SESSION['Name']))
                   {
                    ?>
                    <a class="nav-link active" aria-current="page" href="./auth/login.php"><i
                            class="fa-solid fa-user-group"></i></a>
                    <?php
                   }else{
                    ?>
                    <a class="nav-link active" aria-current="page" href="./user.php"><i
                            class="fa-solid fa-user-group"></i></a>
                    <?php
                   }
                   ?>
                </li>
                <li class="nav-item">
                    <?php
                   if(empty($_SESSION['Name']))
                   {
                    ?>
                    <a class="nav-link active" aria-current="page" href="./auth/login.php"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <?php
                   }else{
                    ?>
                    <a class="nav-link active" aria-current="page" href="./shoppingcart.php"><i
                            class="fa-solid fa-cart-shopping"></i></a>
                    <?php
                   }
                   ?>
                </li>
            </ul>
        </div>
    </div>
</nav>
<?php
        if(!empty($_SESSION['Name']))
    {
        ?>
<div class="p-2" style="text-align: right">
    <h5 class="title mx-3">
        <span>Hello</span>
        <span class="text-danger"><em><?= $_SESSION['Name']?></em></span>
    </h5>
</div>
<?php
    }   
?>

<nav class="navbar navbar-expand-lg bg-success mb-3">
    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
            <a class="nav-link text-white active" aria-current="page" href="http://localhost/NhaSachPN/index.php">Trang
                Chủ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="http://localhost/NhaSachPN/product.php">Sản Phẩm</a>
        </li>
        <?php
            $file = './class/Category.php';
            if(file_exists($file))
            {
                require_once $file;
            }
            else{
                require_once ".".$file;
            }
            $categories = Category::getAllCategories($pdo);
            foreach ($categories as $category):
        ?>
        <li class="nav-item">
            <a class="nav-link text-white"
                href="http://localhost/NhaSachPN/product.php?categoryID=<?=$category['ID'] ?>"><?= $category['CategoryName'] ?></a>
        </li>
        <?php
            endforeach;
        ?>
        <li class="nav-item">
            <a class="nav-link text-white" href="">Liên Hệ</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="">Hỗ Trợ</a>
        </li>
    </ul>
</nav>