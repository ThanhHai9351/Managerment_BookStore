<?php
        session_start();
        include '../include/connect.php';
        include '../class/Favourite.php';
        
        $iduser = $_SESSION['IDUser'];
        $idpro = $_GET['idpro'];
        if(Favourite::isHaveFavorite($pdo,$iduser,$idpro)) {
            header("Location: ../favourite.php");
            exit();
        }else{
            Favourite::saveToDatabase($pdo,$idpro,$iduser);
            header("Location: ../favourite.php");
            exit();
            
        }
        
?>