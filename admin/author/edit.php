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
     session_start();
    if(!isset($_SESSION['IsAdmin']))
    {
        header('location: /NhaSachPN/404');
    }
    require '../../include/connect.php';    
    include_once '../include/function.php';
    include_once '../include/layout/header.php';
    $id = $_GET['id'];
    $author = Author::getAuthorFromID($pdo,$id);
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST['name'];
        $author1 = new Author($name);
        $author1->updateAuthorInDatabase($pdo,$id);
        header('Location: ./index.php');
    }
?>
    <div class="m-3">
        <h3 style="text-shadow: 2px 2px #cdcdcd">Edit Author</h3>
        <form method="POST" class="row p-3 w-25 m-auto"
            style="border: 1px solid #cdcdcd; border-radius: 15px; box-shadow: 5px 5px 5px #cdcdcd;">
            <div class="col-md-12">
                <label class="form-label">Name</label>
                <input type="text" value="<?= $author['AuthorName'] ?>" name="name" class="form-control"
                    placeholder="Enter the name">
            </div>
            <div class="text-center mt-4">
                <button class="btn btn-warning">Update</button>
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