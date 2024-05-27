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
    $product = Product::getProductFromID($pdo,$id);
    $authors = Author::getAllAuthors($pdo);
    $categories = Category::getAllCategories($pdo);
    $NXBs = NXB::getAllNXBs($pdo);
    if($_SERVER['REQUEST_METHOD']=='POST')
    {
        $name = $_POST['name'];
        $price = $_POST['Price'];
        $quantity = $_POST['Quantity'];
        $image = $_POST['Image'];
        $authorID = $_POST['AuthorID'];
        $categoryID = $_POST['CategoryID'];
        $NXBID = $_POST['NXBID'];
        $product = new Product($name,$price,$quantity,$image,'',$authorID,$categoryID,$NXBID);
        $product->updateProductInDatabase($pdo,$id);
        header('Location: ./index.php');
    }
?>
    <div class="m-3">
        <h3 style="text-shadow: 2px 2px #cdcdcd">Create a product</h3>
        <form method="POST" class="row p-3"
            style="border: 1px solid #cdcdcd; border-radius: 15px; box-shadow: 5px 5px 5px #cdcdcd;">
            <div class="col-md-6">
                <label class="form-label">Name</label>
                <input type="text" value="<?= $product['ProductName'] ?>" name="name" class="form-control"
                    placeholder="Enter the name">
            </div>
            <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="text" name="Price" value="<?= $product['Price'] ?>" class="form-control"
                    placeholder="Enter the price">
            </div>
            <div class="col-md-6">
                <label class="form-label">Quantity</label>
                <input type="text" name="Quantity" value="<?= $product['Quantity'] ?>" class="form-control"
                    placeholder="Enter the quantity">
            </div>
            <div class="col-md-6">
                <label class="form-label">Image</label>
                <input type="text" name="Image" value="<?= $product['Image'] ?>" class="form-control"
                    placeholder="Enter the image URL">
            </div>
            <div class="col-md-6">
                <label class="form-label">Author</label>
                <select name="AuthorID" class="form-select">
                    <option selected value="<?= $product['AuthorID']?>"><?= getAuthorName($product['AuthorID']) ?>
                    </option>
                    <?php
                        foreach($authors as $author):
                    ?>
                    <option value="<?= $author['ID'] ?>"><?= $author['AuthorName'] ?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">Category</label>
                <select name="CategoryID" class="form-select">
                    <option selected value="<?= $product['CategoryID']?>"><?= getCategoryName($product['CategoryID']) ?>
                    </option>
                    <?php
                            foreach($categories as $category):
                        ?>
                    <option value="<?= $category['ID'] ?>"> <?= $category['CategoryName'] ?> </option>
                    <?php
                        endforeach;
                    ?>
                </select>
            </div>
            <div class="col-md-6">
                <label class="form-label">NXB</label>
                <select name="NXBID" class="form-select">
                    <option selected value="<?= $product['NXBID']?>"><?= getNXBName($product['NXBID']) ?>
                        <?php   
                        foreach($NXBs as $NXB):
                    ?>
                    <option value="<?= $NXB['ID'] ?>"><?= $NXB['NXBName'] ?></option>
                    <?php
                        endforeach;
                    ?>
                </select>
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