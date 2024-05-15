<?php
class Product {
    public $ID;
    public $ProductName;
    public $Price;
    public $Quantity;
    public $Image;
    public $Description;
    public $AuthorID;
    public $CategoryID;
    public $NXBID;

    public function __construct( $ProductName, $Price, $Quantity, $Image, $Description, $AuthorID, $CategoryID, $NXBID) {
        $this->ProductName = $ProductName;
        $this->Price = $Price;
        $this->Quantity = $Quantity;
        $this->Image = $Image;
        $this->Description = $Description;
        $this->AuthorID = $AuthorID;
        $this->CategoryID = $CategoryID;
        $this->NXBID = $NXBID;
    }

    public static function getAllProducts(PDO $pdo) {
        try {
            $sql = "SELECT * from product";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public function insertProductInDatabase(PDO $pdo) {
        try {
            $sql = "INSERT INTO product (ProductName, Price, Quantity, Image, Description, AuthorID, CategoryID, NXBID) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->ProductName, $this->Price, $this->Quantity, $this->Image, $this->Description, $this->AuthorID, $this->CategoryID, $this->NXBID]);
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting product into the database: " . $e->getMessage();
            return false;
        }
    }

    public function updateProductInDatabase(PDO $pdo, $productId) {
        try {
            $sql = "UPDATE product SET ProductName = ?, Price = ?, Quantity = ?, Image = ?, AuthorID = ?, CategoryID = ?, NXBID = ? WHERE ID = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->ProductName, $this->Price, $this->Quantity, $this->Image,  $this->AuthorID, $this->CategoryID, $this->NXBID, $productId]);
            return true;
        } catch(PDOException $e) {
            echo "Error when updating product in the database: " . $e->getMessage();
            return false;
        }
    }

    
    public static function deleteProductInDatabase(PDO $pdo, $id) {
        try {
            $sql = "Delete from product where ID = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting product into the database: " . $e->getMessage();
            return false;
        }
    }
    

    public static function getFourBestProducts(PDO $pdo) {
        try {
            $sql = "SELECT * FROM product";
            $stmt = $pdo->query($sql);
            return array_slice($stmt->fetchAll(PDO::FETCH_ASSOC),0,4);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getFourProductsOfStory(PDO $pdo) {
        try {
            $sql = "SELECT * FROM product where CategoryID = 1";
            $stmt = $pdo->query($sql);
            return array_slice($stmt->fetchAll(PDO::FETCH_ASSOC),0,4);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getFourProductsOfSGKs(PDO $pdo) {
        try {
            $sql = "SELECT * FROM product where CategoryID = 2";
            $stmt = $pdo->query($sql);
            return array_slice($stmt->fetchAll(PDO::FETCH_ASSOC),0,4);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getFourProductsOfMems(PDO $pdo) {
        try {
            $sql = "SELECT * FROM product where CategoryID = 4";
            $stmt = $pdo->query($sql);
            return array_slice($stmt->fetchAll(PDO::FETCH_ASSOC),0,4);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getProductFromCategory(PDO $pdo, $id)
    {
        try {
            $sql = "SELECT * FROM product where CategoryID = $id";
            $stmt = $pdo->query($sql);
            return array_slice($stmt->fetchAll(PDO::FETCH_ASSOC),0,4);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getProductFromID(PDO $pdo, $id)
    {
        try {
            $sql = "SELECT * FROM product where ID = $id";
            $stmt = $pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getPriceProduct(PDO $pdo,$id)
    {
        $products = Product::getAllProducts($pdo);
        foreach($products as $product)
        {
            if($product['ID']==$id)
            return $product['Price'];
        }
        return 0;
    }

    public static function getNameProductFromID(PDO $pdo,$id)
    {
        $products = Product::getAllProducts($pdo);
        foreach($products as $product)
        {
            if($product['ID']==$id)
            return $product['ProductName'];
        }
        return null;
    }

    
}