<?php
class Evaluate {
    public $ID;
    public $ProductID;
    public $UserID;
    public $Star;
    public $Comment;

    public function __construct($ID, $ProductID, $UserID, $Star, $Comment) {
        $this->ID = $ID;
        $this->ProductID = $ProductID;
        $this->UserID = $UserID;
        $this->Star = $Star;
        $this->Comment = $Comment;
    }

    public static function getAllEvaluates(PDO $pdo,$iduser) {
        try {   
            $sql = "SELECT evaluate.ID,evaluate.ProductID,product.ProductName,product.Image
             FROM evaluate join product on evaluate.ProductID = product.ID where UserID = $iduser and Comment is null";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getAllEvaluateHaveComment(PDO $pdo,$idpro) {
        try {   
            $sql = "SELECT userlogin.Name,evaluate.Star,evaluate.Comment 
            from evaluate join userlogin on evaluate.UserID = userlogin.ID where ProductID = $idpro  and Comment is not null";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

}