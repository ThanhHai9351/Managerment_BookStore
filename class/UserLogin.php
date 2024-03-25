<?php
class UserLogin {
    public $ID;
    public $Name;
    public $Email;
    public $Pass;
    public $Phone;
    public $Address;
    public $Role;

    public function __construct($ID, $Name, $Email, $Pass, $Phone, $Address, $Role) {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Email = $Email;
        $this->Pass = $Pass;
        $this->Phone = $Phone;
        $this->Address = $Address;
        $this->Role = $Role;
    }

    public static function getAllUsers(PDO $pdo) {
        try {
            $sql = "SELECT * FROM userlogin";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function getAccountUser(PDO $pdo, $email,$pass) {
        $users = UserLogin::getAllUsers($pdo);
        foreach ($users as $user) {
            if($user['Email']==$email&&$user['Pass']==$pass)
            {
                $_SESSION['Name']=$user['Name'];
                $_SESSION['IDUser'] = $user['ID'];
                return true;
            }
        }
        return false;
    }

    public static function getAccountUserWithId(PDO $pdo,$id) {
        try {
            $sql = "SELECT * FROM userlogin where ID = $id";
            $stmt = $pdo->query($sql);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    public static function addUserToDatabase(PDO $pdo,$name,$email,$password,$mobile,$address)
    {
        try {
            $sql = "INSERT INTO userlogin (Name, Email, Pass, Phone, Address, Role) VALUES ('$name', '$email', '$password', '$mobile', '$address', 'user')";
            $pdo->exec($sql);
            return true;
        } catch(PDOException $e) {
            echo "Lỗi khi lấy tất cả các tác giả từ CSDL: " . $e->getMessage();
            return false;
        }
    }

    
}