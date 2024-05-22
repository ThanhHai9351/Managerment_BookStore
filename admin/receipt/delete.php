<?php
require '../../include/connect.php';    
include_once '../include/function.php';
$receiptID = $_POST['receipt_id'];

if(Receipt::deleteNXBInDatabase($pdo, $receiptID))
{
    header('Location: ./index.php');
}
else
{
    echo "Error when deleting receipt";
}