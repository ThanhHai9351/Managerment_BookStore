<?php
class Receipt {
    public $ID;
    public $UserID;
    public $ProductID;
    public $Quantity;
    public $TotalMoney;
    public $DateReceipt;

    public function __construct($ID, $UserID, $ProductID, $Quantity, $TotalMoney, $DateReceipt) {
        $this->ID = $ID;
        $this->UserID = $UserID;
        $this->ProductID = $ProductID;
        $this->Quantity = $Quantity;
        $this->TotalMoney = $TotalMoney;
        $this->DateReceipt = $DateReceipt;
    }

    public static function getAllReceipts(PDO $pdo) {
        try {
            $sql = "SELECT * FROM receipt";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }
    public static function getReceiptFromId(PDO $pdo, $id)
    {
        try {
            $sql = "SELECT * FROM receipt where ID = $id";
            $stmt = $pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteNXBInDatabase(PDO $pdo, $id) {
        try {
            $sql = "DELETE FROM receipt WHERE ID = $id";
            $stmt = $pdo->prepare($sql);
            return $stmt->execute();
        } catch(PDOException $e) {
            echo "Lỗi khi xóa tác giả trong CSDL: " . $e->getMessage();
            return false;
        }
    }
}