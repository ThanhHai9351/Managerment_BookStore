<?php
require '../../include/connect.php';    
include_once '../include/function.php';
$NXBID = $_POST['nxb_id'];

if(NXB::deleteNXBInDatabase($pdo, $NXBID))
{
    header('Location: ./index.php');
}
else
{
    echo "Error when deleting Author";
}