<?php
$hostname = "localhost";
$database_name = "ideasdb";  
$database_user = "ideasuser";
$database_user_password = "123"; 
$dsn = "mysql:host=$hostname;dbname=$database_name;charset=utf8mb4";

try {
    $connection = new PDO($dsn, $database_user, $database_user_password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database Connection Failed: " . $e->getMessage());
}
?>
