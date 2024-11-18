<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: login.html');
    exit();
}

if ($_SESSION['role'] == 'teacher') {
    header('Location: index.php');
    exit();
} elseif ($_SESSION['role'] == 'student') {
    header('Location: student_portal.html');
    exit();
}
?>
