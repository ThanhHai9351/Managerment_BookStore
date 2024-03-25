<?php
    if(!isset($_GET['id']))
    {
        die("404 Page Not Found");
    }

    session_start();
    include '../include/connect.php';
    require '../class/Product.php';
    require '../class/ShoppingCart.php';
    $iduser = $_SESSION['IDUser'];
    $idpro = $_GET['id'];

    
    $product = Product::getProductFromID($pdo,$idpro);
    $price = $product['Price'];
    $quantity = 1;
    if(!ShoppingCart::isHaveShoppingCart($pdo,$iduser,$idpro))
    {
        $sqlQuery = "INSERT INTO shoppingcart(UserID,ProductID,Quantity,TotalMoney) VALUES ($iduser, $idpro,1,$price)";

        $pdo -> exec($sqlQuery);
        header("Location: ../shoppingcart.php");
        exit();
    }else{
        $quantity = ShoppingCart::getQuantityFromID($pdo,$iduser,$idpro) + 1;
        $price = $product['Price'] * $quantity;
        $sqlUpdate = "Update shoppingcart set Quantity = $quantity, TotalMoney = $price where UserID = $iduser and ProductID = $idpro";
        $pdo->exec($sqlUpdate);
        header("Location: ../shoppingcart.php");
        exit();
    }
   


    
    