<?php
class Favourite {
    public $ID;
    public $ProductID;
    public $UserID;

    public function __construct($ID, $ProductID, $UserID) {
        $this->ID = $ID;
        $this->ProductID = $ProductID;
        $this->UserID = $UserID;
    }

    public static function saveToDatabase(PDO $pdo,$idpro,$iduser) {
        try {
            $sql = "INSERT INTO favourite (ProductID,UserID) VALUES ($idpro,$iduser)";
            $pdo->exec($sql);
        } catch(PDOException $e) {
            echo "Lỗi khi lưu tác giả vào CSDL: " . $e->getMessage();
        }
    }

    public static function getAllFavorites(PDO $pdo,$id) {
        try {
            $sql = "SELECT favourite.ID, product.ProductName, product.Image,product.Price FROM favourite join product on 
            favourite.ProductID = product.ID where UserID = $id";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function removeFavourite(PDO $pdo, $id)
    {
        try {
            $sql = "Delete from favourite where id = $id";
            $pdo->exec($sql);
            return true;
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function isHaveFavorite(PDO $pdo,$iduser,$idpro)
    {
        try {
            $sql = "select * from favourite where UserId = $iduser and ProductId = $idpro";
            $stmt = $pdo->query($sql);
            if(count($stmt->fetchAll(PDO::FETCH_ASSOC))>0)
            return true;
        else return false;
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }
}