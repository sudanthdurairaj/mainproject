<?php
$host = 'localhost';
$username = 'root'; // Default for XAMPP
$password = '';     // Default for XAMPP (or your MySQL password)
$dbname = 'online_exam_portal';

try {
    // Create a PDO instance to connect to the database
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
