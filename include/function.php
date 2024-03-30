<?php

require './class/Product.php';
require './class/Category.php';
require './class/Author.php';
require './class/UserLogin.php';
require './class/NXB.php';
require './class/Favourite.php';
require './class/ShoppingCart.php'; 
require './class/Evaluate.php';


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
    global $conn;
    $sqlQuery_getAllCategories = "SELECT * FROM category";
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
        }
        $categories = $conn -> query($sqlQuery_getAllCategories);
        foreach ($categories as $category)
        {
            if($category['ID'] == $id)
                return $category['CategoryName'];
        }
        return '';
}

function getNXBName($id)
{
   global $pdo;
   $NXBs = NXB::getAllNXBs($pdo);
   foreach ($NXBs as $NXB)
   {
    if($NXB['ID'] == $id)
        return $NXB['NXBName'];
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