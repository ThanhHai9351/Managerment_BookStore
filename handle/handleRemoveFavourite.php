<?php
        session_start();
        require '../class/Favourite.php';
        require '../include/connect.php';
        $id = $_GET['id'];
        if(Favourite::removeFavourite($pdo,$id))
        {
            header("Location: ../favourite.php");
            exit();
        }
?>