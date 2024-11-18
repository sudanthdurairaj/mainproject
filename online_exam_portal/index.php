<?php
session_start(); // Start the session

// Check if the user is logged in and is a teacher
if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'teacher') {
    // If not logged in or role is not teacher, redirect to login page
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teacher Portal - Online Examination</title>
  <link rel="stylesheet" href="teach.css">
</head>
<body>
  <!-- Header Section -->
  <header class="header">
    <div class="header-content">
      <h1>Rajalakshmi Engineering College</h1>
      <p>Online Examination System - Teacher Portal</p>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <!-- Syllabus Entry Section -->
    <div class="syllabus-section">
      <h2>Enter Syllabus Details</h2>
      <textarea id="syllabus" rows="4" cols="50" placeholder="Enter syllabus content here..."></textarea>
    </div>

    <!-- Question Format Selection -->
    <div class="question-format-section">
      <h2>Select Question Format</h2>
      <label for="questionType">Choose Question Type:</label>
      <select id="questionType">
        <option value="mcq">Multiple Choice</option>
        <option value="short">Short Answer</option>
      </select>
      <label for="numQuestions">Number of Questions:</label>
      <input type="number" id="numQuestions" value="5" min="1">
    </div>

    <!-- Generate Questions Button -->
    <button id="generateQuestionsBtn">Generate Questions</button>

    <!-- Display Generated Questions -->
    <div id="questionsContainer"></div>
  </div>

  <script src="script.js"></script>
</body>
</html>
