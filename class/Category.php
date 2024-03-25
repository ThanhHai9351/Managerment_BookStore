<?php
class Category {
    public $ID;
    public $CategoryName;

    public function __construct($ID, $CategoryName) {
        $this->ID = $ID;
        $this->CategoryName = $CategoryName;
    }

    
    public function saveToDatabase(PDO $pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO categoty (ID, CategoryName) VALUES (?, ?)");
            $stmt->execute([$this->ID, $this->CategoryName]);
            echo "Tác giả đã được lưu vào CSDL.";
        } catch(PDOException $e) {
            echo "Lỗi khi lưu tác giả vào CSDL: " . $e->getMessage();
        }
    }

    public static function getAllCategories(PDO $pdo) {
        try {
            $sql = "SELECT * FROM category";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }
}