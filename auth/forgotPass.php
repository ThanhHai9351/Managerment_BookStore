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
    <link rel="stylesheet" href="../template/css/style.css">
    <title>Quên mật khẩu</title>
</head>

<body>
    <?php
    ob_start();
    require '../include/connect.php';
    include '../include/layout/headerPage.php';
    include_once '../config.php';
    require '../auth/PHPMail/functionSendMail.php';
    $file1 = './class/UserLogin.php';
    if(file_exists($file1))
    {
        require_once($file1);
    }else{
        require_once(".".$file1);
    }
    $errEmail = "";
    if($_SERVER['REQUEST_METHOD'])
    {
        if(empty($_POST['email']))
        {
            $errEmail = "Trường này không được trống!";
        }
        if(empty($errEmail))
        {
            if(UserLogin::isValidEmail($pdo,$_POST['email']))
            {
                $email = $_POST['email'];
                $errEmail = "";
                $_SESSION['isvalid'] = randomSixDigits();
                sendEmail($_POST['email'],"Ivalid Email form Managerment BookStore","Mã <b>".$_SESSION['isvalid']."</b> là mã xác thực Email của bạn tại Managerment BookStore");
                header("Location: ./isValidEmail.php?email=$email");
            }else{
                $errEmail = "Không tìm thấy email này!";
            }
        }
    }
?>
    <form method="post">
        <div class="row w-25 p-3 mt-5 m-auto" style="border: 1px solid #cdcdcd">
            <h2 class="text-center">Forgot Password</h2>
            <div class="col-md-12 mt-3">
                <label for="Email">Nhập Email:</label>
                <input class="form-control" name="email" placehoder="Username" type="text" />
                <span class="field-validation-valid text-danger"><?= $errEmail ?></span>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="mt-3 btn btn-success">Find</button>
            </div>
        </div>
    </form>
    <?php
    include_once '../include/layout/footer.php';
?>
    <script src="../template/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>
</body>

</html>