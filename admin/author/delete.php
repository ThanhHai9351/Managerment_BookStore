<?php
require '../../include/connect.php';    
include_once '../include/function.php';
$authorID = $_POST['author_id'];

if(Author::deleteAuthorInDatabase($pdo, $authorID))
{
    header('Location: ./index.php');
}
else
{
    echo "Error when deleting Author";
}