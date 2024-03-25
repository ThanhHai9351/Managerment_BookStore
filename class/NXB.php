<?php
class NXB {
    public $ID;
    public $NXBName;

    public function __construct($ID, $NXBName) {
        $this->ID = $ID;
        $this->NXBName = $NXBName;
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
}