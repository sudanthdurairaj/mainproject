<?php
header('Content-Type: application/json');
include 'db.php';

// Retrieve all questions from the database
$query = "SELECT * FROM questions";
$stmt = $pdo->prepare($query);
$stmt->execute();
$questions = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Return the questions as JSON
echo json_encode(['questions' => $questions]);
?>
