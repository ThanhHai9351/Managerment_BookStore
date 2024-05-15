<?php
 class Author {
    public $ID;
    public $AuthorName;

    public function __construct($AuthorName) {
        $this->AuthorName = $AuthorName;
    }

    public function insertAuthorInDatabase(PDO $pdo) {
        try {
            $sql = "INSERT INTO author (AuthorName) VALUES (?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->AuthorName]);
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting product into the database: " . $e->getMessage();
            return false;
        }
    }

    public function updateAuthorInDatabase(PDO $pdo, $authorID) {
        try {
            $sql = "UPDATE author SET AuthorName = ? WHERE ID = $authorID";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->AuthorName]);
            return true;
        } catch(PDOException $e) {
            echo "Error when updating product in the database: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteAuthorInDatabase(PDO $pdo, $id) {
        try {
            $sql = "Delete from author where ID = $id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Error when inserting author into the database: " . $e->getMessage();
            return false;
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

    public static function getAuthorFromID(PDO $pdo,$id) {
       $authors = Author::getAllAuthors($pdo);
       foreach($authors as $author)
       {
        if($author['ID']==$id)
        return $author;
       }
       return null;
    }

    public static function getNameAuthorFromID(PDO $pdo,$id)
    {
        $authors = Author::getAllAuthors($pdo);
        foreach($authors as $author)
        {
            if($author['ID']==$id)
            return $author['AuthorName'];
        }
        return null;
    }
}