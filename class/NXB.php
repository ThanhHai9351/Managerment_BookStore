<?php
class NXB {
    public $ID;
    public $NXBName;

    public function __construct($NXBName) {
        $this->NXBName = $NXBName;
    }

    public function insertNXBInDatabase(PDO $pdo) {
        try {
            $sql = "INSERT INTO nxb(NXBName) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->NXBName]);
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting product into the database: " . $e->getMessage();
            return false;
        }
    }

    public function updateNXBInDatabase(PDO $pdo, $NXBID) {
        try {
            $sql = "UPDATE nxb SET NXBName = ? WHERE ID = $NXBID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->NXBName]);
            return true;
        } catch(PDOException $e) {
            echo "Error when updating product in the database: " . $e->getMessage();
            return false;
        }
    }

    public static function getAllNXBs(PDO $pdo) {
        try {
            $sql = "SELECT * FROM nxb";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các nhà xuất bản từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getNXBFromID(PDO $pdo,$id) {
       $NXBs = NXB::getAllNXBs($pdo);
        foreach($NXBs as $NXB)
        {
            if($NXB['ID'] == $id)
            {
                return $NXB;
            }
        }
        return null;
    }

    public static function deleteNXBInDatabase(PDO $pdo, $id) {
        try {
            $sql = "Delete from NXB where ID = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting NXB into the database: " . $e->getMessage();
            return false;
        }
    }
}