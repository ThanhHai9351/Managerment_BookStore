<?php
class Category {
    public $ID;
    public $CategoryName;

    public function __construct($CategoryName) {
        $this->CategoryName = $CategoryName;
    }

    
    public function insertCategoryInDatabase(PDO $pdo) {
        try {
            $sql = "INSERT INTO category(CategoryName) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->CategoryName]);
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting product into the database: " . $e->getMessage();
            return false;
        }
    }

    public function updateCategoryInDatabase(PDO $pdo, $cateID) {
        try {
            $sql = "UPDATE category SET CategoryName = ? WHERE ID = $cateID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->CategoryName]);
            return true;
        } catch(PDOException $e) {
            echo "Error when updating product in the database: " . $e->getMessage();
            return false;
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

    public static function getCategoryFromID(PDO $pdo,$id) {
      $categories = Category::getAllCategories($pdo);
      foreach($categories as $category){
        if($category['ID'] == $id){
          return $category;
        }
      }
      return null;
    }

    
    public static function deleteCategoryInDatabase(PDO $pdo, $id) {
        try {
            $sql = "Delete from category where ID = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting category into the database: " . $e->getMessage();
            return false;
        }
    }
}