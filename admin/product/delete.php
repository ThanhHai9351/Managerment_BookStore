<?php
require '../../include/connect.php';    
include_once '../include/function.php';
$productId = $_POST['product_id'];

if(Product::deleteProductInDatabase($pdo, $productId))
{
    header('Location: ./index.php');
}
else
{
    echo "Error when deleting product";
}