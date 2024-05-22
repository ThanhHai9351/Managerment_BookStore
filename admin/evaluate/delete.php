<?php
require '../../include/connect.php';    
include_once '../include/function.php';
$evaluateID = $_POST['evaluate_id'];

if(Evaluate::deleteEvaluateInDatabase($pdo, $evaluateID))
{
    header('Location: ./index.php');
}
else
{ 
    echo "Error when deleting evaluate";
}