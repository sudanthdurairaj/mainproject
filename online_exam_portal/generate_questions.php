<?php
header('Content-Type: application/json');
include 'db.php';

// Get the data from the front end
$data = json_decode(file_get_contents("php://input"), true);
$syllabus = $data['syllabus'];
$questionType = $data['questionType'];
$numQuestions = $data['numQuestions'];

// Simple validation
if (!$syllabus || !$questionType || !$numQuestions) {
    echo json_encode(['error' => 'Invalid input']);
    exit;
}

// Insert syllabus into the database
$query = "INSERT INTO syllabi (syllabus) VALUES (:syllabus)";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':syllabus', $syllabus);
$stmt->execute();
$syllabusId = $pdo->lastInsertId();

// Simulate question generation
$generatedQuestions = [];
for ($i = 1; $i <= $numQuestions; $i++) {
    $question = "Sample question $i based on syllabus: " . $syllabus;

    // Insert each generated question into the database
    $query = "INSERT INTO questions (syllabus_id, question, question_type) VALUES (:syllabus_id, :question, :question_type)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':syllabus_id', $syllabusId);
    $stmt->bindParam(':question', $question);
    $stmt->bindParam(':question_type', $questionType);
    $stmt->execute();

    $generatedQuestions[] = $question;
}

// Send back the generated questions as a JSON response
echo json_encode(['questions' => $generatedQuestions]);
?>

