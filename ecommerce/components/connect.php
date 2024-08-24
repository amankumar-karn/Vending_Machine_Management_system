<?php

$db_host = 'localhost';
$db_name = 'shop_db';
$db_user = 'root';
$db_password = '';

// Construct the DSN
$dsn = "mysql:host=$db_host;dbname=$db_name";

try {
    // Create a new PDO instance
    $conn = new PDO($dsn, $db_user, $db_password);
    
    // Set PDO to throw exceptions on error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Connection successful
} catch (PDOException $e) {
    // Connection failed, display error message
    echo "Connection failed: " . $e->getMessage();
}
?>
