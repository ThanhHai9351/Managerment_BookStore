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
                        src="https://scontent-hkg1-1.xx.fbcdn.net/v/t39.30808-6/395389873_1411713443025753_2234869436460159356_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_eui2=AeGim_FFjbO3ecoFdTf7cWA3LVRAaZCIdD0tVEBpkIh0PdVeuNFXctuIh1fLuqkBRfYs-b-DjijEVdwuBNKKjIOF&_nc_ohc=A00VAJeZ6MMAX_dnzCp&_nc_ht=scontent-hkg1-1.xx&oh=00_AfBm8Zw1isPv092j9WqtLqo_DHktrvoS6lEPNAVPc-cmrw&oe=65F561EB"
                        alt="">
                    <span class="text-white fw-bold"><?=$_SESSION['Name'] ?></span>
                </div>
                <hr>
                <ul>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white "
                            href="">Thông
                            tin cá nhân</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white" href="">Sản
                            phẩm yêu thích</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white"
                            href="">Lịch sử
                            mua hàng</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white" href="">Sản
                            phẩm chưa đánh giá</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-white" href="">Đổi
                            mật
                            khẩu</a></li>
                    <li style="list-style-type: none" class="p-3"><a class="text-decoration-none text-danger"
                            href="./handle/handleLogout.php">Đăng
                            xuất</a></li>
                </ul>
            </div>
            <div class="col-md-10">
                <?php include_once './include/layout/carduser.php' ?>
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