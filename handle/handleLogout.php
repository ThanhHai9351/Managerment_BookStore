<?php
    session_start();
    $_SESSION['Name']="";
    $_SESSION['IDUser']= "";
    session_unset();
    
header("Location:  ../index.php");
exit();