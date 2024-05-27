<?php
 session_start();
 require '../include/connect.php';
 require '../class/ShoppingCart.php';
 $id = $_GET['id'];

 if(ShoppingCart::deleteShoppingCart($pdo, $id))
 {
     header("Location: ../shoppingcart.php");
     exit();
 }