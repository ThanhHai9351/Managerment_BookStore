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
    $ErrName = "";
    $name = "";
    $ErrEmail = "";
    $email = "";
    $ErrPass = "";
    $ErrRePass = "";
    $ErrMobile= "";
    $mobile= "";
    $ErrAdress = "";
    $address ="";
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        if(empty($_POST['Username']))
        {
            $ErrName = "Trường này không được thiếu!";
        }else{
         $name = $_POST['Username'];
        }
        if(!isValidEmail($_POST['Email']))
        {
            $ErrEmail = "Email is not valid";
        }else{
            $email = $_POST['Email'];
        }
        if(empty($_POST['Password']))
        {
            $ErrPass = "Trường này không được trống!";
        }else if($_POST['Password']!=$_POST['ConfirmPassword'])
        {
            $ErrRePass = "Confirm password không trùng với password";
        }
        if(empty($_POST['Mobile']))
        {
            $ErrMobile = "Trường này không được trống!";
        }else{
            $mobile = $_POST['Mobile'];
        }
        if(empty($_POST['Address']))
        {
            $ErrAdress = "Trường này không được trống!";
        }else{
            $address = $_POST['Address'];
        }
        if(empty($ErrName)&&empty($ErrEmail)&&empty($ErrPass)&&empty($ErrRePass)&&empty($ErrMobile)&&empty($ErrAdress))
        {
            UserLogin::addUserToDatabase($pdo,$_POST['Username'],$_POST['Email'],$_POST['Password'],$_POST['Mobile'],$_POST['Address']);
            header("Location: ../auth/login.php");
        }
        ob_end_flush();
    }
    ?>
    <form method="post" class="row w-50 m-auto p-3 mt-5" style="border: solid 1px #cdcdcd">
        <h2 class="text-center mt-3 mb-3">Register</h2>
        <div class="col-md-6">
            <label for="Username">Username</label>
            <input type="text" name="Username" placeholder="Username" value="<?= $name ?>" class="form-control" />
            <span class="field-validation-valid text-danger"><?= $ErrName ?></span>
        </div>
        <div class="col-md-6">
            <label for="Email">Email</label>
            <input type="text" name="Email" placeholder="Email" value="<?= $email ?>" class="form-control" />
            <span class="field-validation-valid text-danger"><?= $ErrEmail ?></span>
        </div>
        <div class="col-md-6">
            <label for="Password">Password</label>
            <input type="password" name="Password" placeholder="Password" class="form-control" />
            <span class="field-validation-valid text-danger"><?= $ErrPass ?></span>
        </div>
        <div class="col-md-6">
            <label for="ConfirmPassword">Confirm Password</label>
            <input type="password" id="ConfirmPassword" name="ConfirmPassword" placeholder="Confirm password"
                class="form-control" />
            <span class="field-validation-valid text-danger"><?= $ErrRePass ?></span>
        </div>
        <div class="col-md-6">
            <label for="Mobile">Mobile</label>
            <input type="text" name="Mobile" placeholder="Mobile" value="<?= $mobile ?>" class="form-control" />
            <span class="field-validation-valid text-danger"><?= $ErrMobile ?></span>
        </div>
        <div class="col-md-6">
            <label for="Address">Address</label>
            <input type="text" name="Address" placeholder="Address" value="<?= $address ?>" class="form-control" />
            <span class="field-validation-valid text-danger"><?= $ErrAdress ?></span>
        </div>
        <div class="row col-md-12 mt-2 mb-2 ">
            <div class="col-md-9">
                <p>Bạn đã có tài khoản</p>
            </div>
            <div class="col-md-3 text-right">
                <a href="./login.php">Login</a>
            </div>
        </div>
        <div class="col-md-12 text-center">
            <button type="submit" class="mt-3 btn btn-success">Register</button>
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