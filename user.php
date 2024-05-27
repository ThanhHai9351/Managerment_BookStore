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
    <title>User</title>
    <style>
    a:hover {
        opacity: 0.7;
        color: #cdcdcd;
    }
    </style>
</head>

<body>
    <?php
    include_once './include/function.php';
    require './include/connect.php';
    include_once './include/layout/headerPage.php';
?>
    <div class="m-5">
        <div class="row" style="border: 1px #cdcdcd solid">
            <div class="col-md-2 bg-secondary">
                <div>
                    <img style="border: 2px solid #ffffff; border-radius:50px" class="m-2" width="60px" height="60px"
                        src="./template/images/TH.jpg" alt="">
                    <span class="text-white fw-bold"><?=$_SESSION['Name'] ?></span>
                </div>
                <hr>
                <ul>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white "
                            href="">Thông
                            tin cá nhân</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white"
                            href="./favourite.php">Sản
                            phẩm yêu thích</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white"
                            href="./evaluate.php">Sản
                            phẩm chưa đánh giá</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white"
                            href="./changePass.php">Đổi
                            mật
                            khẩu</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-danger"
                            href="./handle/handleLogout.php">Đăng
                            xuất</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php include_once './include/layout/cardUser.php' ?>
            </div>
        </div>
    </div>
    <?php
    include_once './include/layout/footer.php';
?>
    <script src="../template/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>