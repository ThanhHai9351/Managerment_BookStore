<?php
    session_start();
    $_SESSION['Admin']="";
    session_unset();
    
header("Location:  ../../index.php");
exit();