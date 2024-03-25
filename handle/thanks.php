<?php
    session_start();
    require '../include/connect.php';
    require '../class/ShoppingCart.php';
    require '../class/Evaluate.php';

    $iduser = $_SESSION['IDUser'];

    $carts = ShoppingCart::getAllShoppingCarts($pdo,$iduser);
   
    try {
        foreach($carts as $cart){
            $idpro = $cart['ProductID'];
            $sql = "insert into evaluate(ProductId,UserID) values ($idpro,$iduser)";
            $pdo->exec($sql);
        }
    } catch(PDOException $e) {
        echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
        return false;
    }
    
    foreach($carts as $cart){
        $id = $cart['ID'];
        $sqlDelete = "Delete from shoppingcart where ID = $id";
        $pdo->exec($sqlDelete);
    }
    header('Location: ../evaluate.php');