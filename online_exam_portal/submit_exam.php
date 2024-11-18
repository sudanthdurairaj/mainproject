<?php
header('Content-Type: application/json');
include 'db.php';

// Get the student answers from the request
$data = json_decode(file_get_contents("php://input"), true);
$answers = $data['answers'];
$score = 0;

// Simple evaluation logic (you can expand it later based on your question types)
foreach ($answers as $answer) {
    $questionId = $answer['questionId'];
    $answerText = $answer['answer'];

    // Retrieve the correct answer from the database (for simplicity, we assume correct answer is stored)
    $query = "SELECT * FROM questions WHERE id = :id";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':id', $questionId);
    $stmt->execute();
    $question = $stmt->fetch(PDO::FETCH_ASSOC);

    // For simplicity, we assume the correct answer is hardcoded (you can implement this based on your question format)
    $correctAnswer = "Sample answer for question " . $questionId;

    // Check if the student's answer matches the correct one
    if (trim(strtolower($answerText)) == strtolower($correctAnswer)) {
        $score++;
    }
}

// Return the result as JSON
echo json_encode(['result' => "You scored $score out of " . count($answers)]);
?>
