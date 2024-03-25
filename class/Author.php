<?php
 class Author {
    public $ID;
    public $AuthorName;

    public function __construct($ID, $AuthorName) {
        $this->ID = $ID;
        $this->AuthorName = $AuthorName;
    }

    public function saveToDatabase(PDO $pdo) {
        try {
            $stmt = $pdo->prepare("INSERT INTO author (AuthorName) VALUES $this->AuthorName");
            $stmt->execute([$this->AuthorName]);
            echo "Tác giả đã được lưu vào CSDL.";
        } catch(PDOException $e) {
            echo "Lỗi khi lưu tác giả vào CSDL: " . $e->getMessage();
        }
    }

    public static function getAllAuthors(PDO $pdo) {
        try {
            $sql = "SELECT * FROM author";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

}

// // Thông tin kết nối CSDL
// $servername = "localhost"; // Tên máy chủ MySQL
// $username = "username"; // Tên đăng nhập MySQL
// $password = "password"; // Mật khẩu MySQL
// $dbname = "database"; // Tên CSDL

// try {
//     // Tạo kết nối đến MySQL với PDO
//     $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
//     // Thiết lập chế độ lỗi của PDO thành ngoại lệ
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//     // Tạo một đối tượng Author mới
//     $author = new Author(1, "Tên Tác Giả");

//     // Lưu đối tượng Author vào CSDL
//     $author->saveToDatabase($pdo);

//     // Đóng kết nối đến MySQL
//     $pdo = null;
// } catch(PDOException $e) {
//     echo "Lỗi kết nối đến CSDL: " . $e->getMessage();
// }