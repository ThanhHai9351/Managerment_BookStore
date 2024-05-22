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
    <link rel="stylesheet" href="../../template/css/style.css">
    <title>Document</title>
</head>

<body>
    <?php 
    require '../../include/connect.php';    
    include_once '../include/function.php';
    include_once '../include/layout/header.php';
    if(!isset($_GET['id']))
    {
        die("Err 404");
    }
    $id = $_GET['id'];
    $user = UserLogin::getAccountUserWithId($pdo,$id);
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST['Name'];
        $email = $_POST['Email'];
        $phone = $_POST['Phone'];
        $address = $_POST['Address'];
        $user = new UserLogin($name,$email,"",$phone,$address,"");
        $user->updateProductInDatabase($pdo,$id);
        header('Location: ./index.php');
    }
?>
    <div class="m-3">
        <h3 style="text-shadow: 2px 2px #cdcdcd"><?= $user['Name'] ?></h3>
        <form method="POST" class="row p-3"
            style="border: 1px solid #cdcdcd; border-radius: 15px; box-shadow: 5px 5px 5px #cdcdcd;">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" value="<?= $user['Name'] ?>" name="Name" class="form-control"
                    placeholder="Enter the name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Email</label>
                <input type="text" name="Email" value="<?= $user['Email'] ?>" class="form-control"
                    placeholder="Enter the price">
            </div>
            <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="text" name="Phone" value="<?= $user['Phone'] ?>" class="form-control"
                    placeholder="Enter the Phone">
            </div>
            <div class="col-md-6">
                <label class="form-label">Address</label>
                <input type="text" name="Address" value="<?= $user['Address'] ?>" class="form-control"
                    placeholder="Enter the Address" />
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>

    <?php
    include_once '../include/layout/footer.php';
?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
    </script>
</body>

</html>