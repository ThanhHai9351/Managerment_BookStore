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
    if(!isset($_GET['proid']))
    {
        die("Pailure Connection Error");
    }
    $product = Product::getProductFromID($pdo,$_GET['proid']);
?>
    <div class="content">
        <table class="table table-hover">
            <tr>
                <th>Name</th>
                <td><?= $product['ProductName'] ?></td>
            </tr>
            <tr>
                <th>Price</th>
                <td><?= $product['Price'] ?></td>
            </tr>
            <tr>
                <th>Quantity</th>
                <td><?= $product['Quantity'] ?></td>
            </tr>
            <tr>
                <th>Description</th>
                <td><?= $product['Description'] ?></td>
            </tr>
            <tr>
                <th>Image</th>
                <td>
                    <img src="<?= $product['Image'] ?>" alt="">
                </td>
            </tr>
            <tr>
                <th>Author</th>
                <td><?= getAuthorName($product['AuthorID']) ?></td>
            </tr>
            <tr>
                <th>Category</th>
                <td><?= getCategoryName($product['CategoryID']) ?></td>
            </tr>
            <tr>
                <th>NXB</th>
                <td><?= getNXBName( $product['NXBID'])?></td>
            </tr>
        </table>
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