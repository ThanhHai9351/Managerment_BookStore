<?php
require '../../include/connect.php';    
include_once '../include/function.php';
$CateID = $_POST['category_id'];

if(Category::deleteCategoryInDatabase($pdo, $CateID))
{
    header('Location: ./index.php');
}
else
{
    echo "Error when deleting Author";
}