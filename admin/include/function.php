<?php
require '../../class/Product.php';
require '../../class/Category.php';
require '../../class/Author.php';
require '../../class/UserLogin.php';
require '../../class/NXB.php';
require '../../class/Favourite.php';   
require '../../class/ShoppingCart.php'; 
require '../../class/Evaluate.php';


function getAuthorName($id)
{
    global $pdo;
    $Authors = Author::getAllAuthors($pdo);
    foreach ($Authors as $author)
    {
     if($author['ID'] == $id)
         return $author['AuthorName'];
    }
    return null;
}

function getCategoryName($id)
{
    global $pdo;
    $cates = Category::getAllCategories($pdo);
    foreach ($cates as $cate)
    {
     if($cate['ID'] == $id)
         return $cate['CategoryName'];
    }
    return null;
}

function getNXBName($id)
{
    global $pdo;
    $nxbs = NXB::getAllNXBs($pdo);
    foreach ($nxbs as $nxb)
    {
     if($nxb['ID'] == $id)
         return $nxb['NXBName'];
    }
    return null;
}

function getMaxPiceProduct()
{
    global $pdo;
    $products = Product::getAllProducts($pdo);
    $max = 0;
    foreach ($products as $product){
        if($product['Price']>$max)
        {
            $max = $product['Price'];
        }
    }
    return $max;
}

function getTotalMoney($iduser){
    global $pdo;
    $shoppingcarts = ShoppingCart::getAllShoppingCarts($pdo,$iduser);
    $sum = 0;
    foreach ($shoppingcarts as $shopping)
    {
        $sum += $shopping['TotalMoney'];
    }
    return $sum;
}


?>