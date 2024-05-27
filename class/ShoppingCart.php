<?php
class ShoppingCart {
    public $ID;
    public $UserID;
    public $ProductID;
    public $Quantity;
    public $TotalMoney;

    public function __construct($ID, $UserID, $ProductID, $Quantity, $TotalMoney) {
        $this->ID = $ID;
        $this->UserID = $UserID;
        $this->ProductID = $ProductID;
        $this->Quantity = $Quantity;
        $this->TotalMoney = $TotalMoney;
    }

    public static function getAllShoppingCarts(PDO $pdo,$iduser) {
        try {
            $sql = "SELECT shoppingcart.ID,shoppingcart.UserID,product.Price,shoppingcart.ProductID,product.Image,product.ProductName,shoppingcart.Quantity,shoppingcart.TotalMoney 
            FROM shoppingcart join product on shoppingcart.ProductID = product.ID where UserID = $iduser";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function isHaveShoppingCart(PDO $pdo, $iduser,$idpro)
    {
        try {
            $sql = "select * from shoppingcart where UserId = $iduser and ProductId = $idpro";
            $stmt = $pdo->query($sql);
            if(count($stmt->fetchAll(PDO::FETCH_ASSOC))>0)
            {
                return true;
            }else return false;
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getPriceFromID(PDO $pdo, $iduser,$idpro)
    {
        try {
            $shoppingcarts = ShoppingCart::getAllShoppingCarts($pdo, $iduser);
            foreach($shoppingcarts as $shopping)
            {
                if($shopping['UserID']==$iduser&&$shopping['ProductID']==$idpro)
                return $shopping['Price'];
            }
            return 0;
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return 0;
        }
    }

    public static function getQuantityFromID(PDO $pdo, $iduser,$idpro)
    {
        try {
            $shoppingcarts = ShoppingCart::getAllShoppingCarts($pdo, $iduser);
            foreach($shoppingcarts as $shopping)
            {
                if($shopping['UserID']==$iduser&&$shopping['ProductID']==$idpro)
                return $shopping['Quantity'];
            }
            return 0;
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return 0;
        }
    }

    public static function deleteShoppingCart(PDO $pdo, $id) {
        try {
            $sql = "DELETE FROM shoppingcart WHERE ID = $id";
            $pdo->query($sql);
            return true;
        } catch(PDOException $e) {
            echo "Error when deleting shoppingcart in the database: " . $e->getMessage();
            return false;
        }
    }
}