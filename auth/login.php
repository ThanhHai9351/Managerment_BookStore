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
    <title>Login</title>
</head>

<body>
    <?php
    ob_start();
    require '../include/connect.php';
    include '../include/layout/headerPage.php';
    include_once '../config.php';
    $file1 = './class/UserLogin.php';
    if(file_exists($file1))
    {
        require_once($file1);
    }else{
        require_once(".".$file1);
    }
     $name = "";
     $ErrName = "";
     $ErrPass = "";
     if($_SERVER['REQUEST_METHOD']=="POST")
     {
        $name = $_POST['username'];
         if(empty($_POST['username']))
         {
             $ErrName = "Không được để trống trường này!";
         }
            else if(!isValidEmail($_POST['username']))
         {
            $ErrName = "Email không hợp lệ!";
            $name = "";
         }
         if(empty($_POST['password'])){
             $ErrPass = "Không được để trống mật khẩu!";
         }
            
            $user = UserLogin::getAccountUser($pdo,$_POST['username'],$_POST['password']);
            if($user!=NULL)
            {
                header("Location: ../index.php");
                }
     }
     ob_end_flush();

    
?>
    <form action="" method="post">
        <div class="row w-25 p-3 mt-5 m-auto" style="border: 1px solid #cdcdcd">
            <h2 class="text-center">Login</h2>
            <div class="col-md-12">
                <label for="Username">Email</label>
                <input class="form-control" data-val-required="Username cannot be blank" name="username"
                    placehoder="Username" type="text" value="<?= $name?>" />
                <span class="field-validation-valid text-danger"><?= $ErrName ?></span>
            </div>
            <div class="col-md-12 mt-3">
                <label for="Password">Password</label>
                <input class="form-control" name="password" placehoder="Password" type="password" />
                <span class="field-validation-valid text-danger" data-valmsg-for="Password"
                    data-valmsg-replace="true"><?= $ErrPass ?></span>
            </div>

            <div class="col-md-12">
                <div class="validation-summary-valid" data-valmsg-summary="true">
                    <ul>
                        <li style="display:none"></li>
                    </ul>
                </div>
            </div>
            <div class="row col-md-12">
                <div class="col-md-8">
                    <p>Bạn chưa có tài khoản!</p>
                </div>
                <div class="col-md-4">
                    <a class="text-right" href="./register.php">Register</a>
                </div>
            </div>
            <div class="col-md-12 text-center">
                <button type="submit" class="mt-3 btn btn-success">Login</button>
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