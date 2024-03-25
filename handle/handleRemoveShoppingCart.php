<?php
 session_start();
 $con = new mysqli('localhost','ThanhHai','hai123', 'nhasachpn');
 $id = $_GET['id'];
 if ($con->connect_error) {
     die("Connection failed: " . $con->connect_error);
 }
 $sqlQuery= "DELETE FROM shoppingcart WHERE ID = $id";
 if($con -> query($sqlQuery))
 {
     header("Location: ../shoppingcart.php");
     exit();
 }