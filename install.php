<?php require_once("config.php"); ?>

<?php
try {
    $connection = new PDO($dsn, $database_user, $database_user_password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "CREATE TABLE IF NOT EXISTS ideas (
        id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        title VARCHAR(30) NOT NULL,
        text TEXT NOT NULL
    )";

    $connection->exec($sql);
    echo "Table 'ideas' created successfully!";
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
?>
