<?php
class UserLogin {
    public $ID;
    public $Name;
    public $Email;
    public $Pass;
    public $Phone;
    public $Address;
    public $Role;

    public function __construct( $Name, $Email, $Pass, $Phone, $Address, $Role) {
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

    public function updateProductInDatabase(PDO $pdo, $userId) {
        try {
            $sql = "UPDATE userlogin SET Name = ?, Email = ?, Phone = ?, Address = ? WHERE ID = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->Name, $this->Email, $this->Phone, $this->Address, $userId]);
            return true;
        } catch(PDOException $e) {
            echo "Error when updating user in the database: " . $e->getMessage();
            return false;
        }
    }

    public static function getAccountUser(PDO $pdo, $email,$pass) {
        $users = UserLogin::getAllUsers($pdo);
        foreach ($users as $user) {
            if($user['Email']==$email&&$user['Pass']==$pass&&$user['Role']=='user')
            {
                $_SESSION['Name']=$user['Name'];
                $_SESSION['IDUser'] = $user['ID'];
                return $user;
            }
            if($user['Email']==$email&&$user['Pass']==$pass&&$user['Role']=='admin')
            {
                
                $_SESSION['Admin']=$user['Name'];
                $_SESSION['IsAdmin'] = true;
                return $user;
            }
        }
        return null;
    }

    public static function getAccountUserWithEmail(PDO $pdo, $email) {
        $users = UserLogin::getAllUsers($pdo);
        foreach ($users as $user) {
            if($user['Email']==$email)
            {
                $_SESSION['Name']=$user['Name'];
                $_SESSION['IDUser'] = $user['ID'];
            }
        }
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

    public static function isValidEmail(PDO $pdo, $email) {
        try {
            $sql = "SELECT * FROM userlogin WHERE Email = :email";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(array(':email' => $email));
            
            if($stmt->rowCount() > 0) {
                return true;
            } else {
                return false;
            }
        } catch(PDOException $e) {
            return false;
        }
    }

    public static function getNameUserFromID(PDO $pdo, $id)
    {
        $users = UserLogin::getAllUsers($pdo);
        foreach ($users as $user) {
            if($user['ID']==$id)
            {
                return $user['Name'];
            }
        }
        return null;
    }

    public static function deleteUserInDatabase(PDO $pdo, $id){
        try {
            $sql = "DELETE FROM userlogin WHERE ID = $id";
            $pdo->exec($sql);
            return true;
        } catch(PDOException $e) {
            echo "Error when deleting user in the database: " . $e->getMessage();
            return false;
        }
    }
    
}