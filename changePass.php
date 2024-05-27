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
    <title>Đổi mật khẩu</title>
    <style>
    a:hover {
        opacity: 0.7;
        color: #cdcdcd;
    }
    </style>
</head>

<body>
    <?php
    ob_start();
    include_once './include/function.php';
    require './include/connect.php';
    include_once './include/layout/headerPage.php';
    $errPass="";
    $errRePass= "";
    $iduser = $_SESSION['IDUser'];
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        if(empty($_POST['pass']))
        {
            $errPass="Bạn chưa nhập!";
        }else if($_POST['repass']!=$_POST['pass'])
        {
            $errRePass= "Không trùng khớp!";
        }
        if(empty($errPass)&&empty($errRePass))
        {
            $pass= $_POST['pass'];
            $sql = "Update userlogin set Pass = $pass where ID = $iduser ";
            $pdo->exec($sql);
            header("Location: ./user.php");
        }
    }
    ob_end_flush();
?>
    <form method="post">
        <div class="row w-25 p-3 mt-5 m-auto" style="border: 1px solid #cdcdcd">
            <h2 class="text-center mb-3">Change Password</h2>
            <div class="col-md-12">
                <label for="pass">New Password:</label>
                <input class="form-control" name="pass" placehoder="Enter pass .... " type="password" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Password"
                    data-valmsg-replace="true"><?= $errPass ?></span>
            </div>
            <div class="col-md-12 mt-3">
                <label for="pass">Re NewPassword:</label>
                <input class="form-control" name="repass" placehoder="Enter repass ..." type="password" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Password"
                    data-valmsg-replace="true"><?= $errRePass ?></span>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="mt-3 btn btn-success">Change</button>
            </div>
        </div>
    </form>
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