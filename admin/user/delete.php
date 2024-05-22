<?php
require '../../include/connect.php';    
include_once '../include/function.php';
$userID = $_POST['user_id'];

if(UserLogin::deleteUserInDatabase($pdo, $userID))
{
    header('Location: ./index.php');
}
else
{
    echo "Error when deleting receipt";
}