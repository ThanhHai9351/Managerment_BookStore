<?php
$servername = "localhost"; 
$username = "ThanhHai"; 
$password = "hai123"; 
$dbname = "nhasachpn";
try {
  $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
  echo "Lỗi kết nối đến CSDL: " . $e->getMessage();
}
?>